<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Branch;
use App\Role;
use App\Product;
use App\Bill;
use PDF;

// set_time_limit(300);

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function checkRole(){
      $user = Auth::user();
      $role = $user->role_id;
      if($role != 3){
          return true;
      }else{
          false;
      }
  }
    public function index()
    {
      if($this->checkRole()){
        $bills = Bill::all();

        return view('bills.index')->withBills($bills);
      }else{

     return redirect()->route('home');}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $products = Product::all();
        return view('bills.create')->withProducts($products);
      // echo DB::table('stock')->where([['branch_id',$branch], ['product_id',$product->id], ['batch',1]])->value('amount');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // echo(DB::table('stock')->where([['branch_id',$branch], ['product_id',$product->id], ['batch',1]])->value('amount'));
        // dd($request);
        $products = array();
        $total = 0;
        foreach ($request->session()->get('cart') as $product_id => $properties) {
          $total+=$properties[1];
          $product = Product::find($product_id);
          $amount = $properties[0];
          $cost = $properties[1];
          $stock_method = $properties[2];
          $branch = Auth::user()->branch_id;

          $products[$product->id] = array('amount' => $amount, 'cost' => $cost);

          //update the stocks
          //check where the stocks are coming from
          //if the tranaction from main stock
          $current_stock = DB::table('stock')->where([['branch_id',$branch], ['product_id',$product->id], ['batch',1]])->value('amount');
          if($stock_method=='main') {
            DB::table('stock')->where([['branch_id',$branch], ['product_id',$product->id], ['batch',1]])->update(['amount'=>$current_stock-$amount]);
          } else if ($stock_method=='combined') {
            $remaining_amount = $amount - $current_stock;
            $backup_stock = DB::table('stock')->where([['branch_id',$branch], ['product_id',$product->id], ['batch',2]])->value('amount');
            //remove main stock
            DB::table('stock')->where([['branch_id',$branch], ['product_id',$product->id], ['batch',1]])->delete();
            //make backup stock as main stock
            DB::table('stock')->where([['branch_id',$branch], ['product_id',$product->id], ['batch',2]])->update(['batch'=>1, 'amount'=>$backup_stock-$remaining_amount]);
            //add backup stock
            $product->branches()->attach([$branch => ['batch' => 2]]);
          }
        }
        $bill = new Bill;
        $bill->cashier_id = Auth::id();
        // $bill->pharmacist_id = Auth::id();
        $bill->save();

        $bill->products()->sync($products);

        //clear the cart
        $request->session()->forget('cart');
        // $this->printBill($bill);
        return redirect()->route('pdf',['bill'=>$bill->id, 'total'=>$total]);
        // return redirect()->route('bills.index');
    }

    public function printBill($bill_id, $total)
    {
      $bill = Bill::find($bill_id);
      $products = $bill->products;
      $data = array(
        'bill' => $bill,
        'products' => $products,
        'total' => $total
      );
      $pdf = PDF::loadView('pdf.invoice',$data);
      return $pdf->download('invoice.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $bill = Bill::find($id);
      $products = $bill->products;

        return view('bills.view')->withBill($bill)->withProducts($products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //function for display the bill while adding items
    public function displayBill(Request $request)
    {
      // dd($request);

      // $request->session()->forget('cart');

      if($request->ajax())
      {
        $product = Product::find($request->product);
        $amount = $request->amount;
        $cost = $product->price*$amount;
        $branch = Auth::user()->branch_id;

        //check for main stock
        $main_stock = DB::table('stock')->where([['branch_id',$branch], ['product_id',$product->id], ['batch',1]])->value('amount');
        //check for backup stock
        $backup_stock = 0;
        if(DB::table('stock')->where([['branch_id',$branch], ['product_id',$product->id], ['batch',2]])->exists()) {
          $backup_stock = DB::table('stock')->where([['branch_id',$branch], ['product_id',$product->id], ['batch',2]])->value('amount');
        }
        // echo $main_stock;


          if ($request->session()->exists('cart') && array_key_exists($product->id, $request->session()->get('cart')))
         {
            $product_temp = $request->session()->get('cart')[$request->product];
            $amount = $product_temp[0] + $amount;
            $cost = $product_temp[1] + $cost;
            //keeps a session variable for the ease of stock updating
            if($main_stock>=$amount) {
              $stock_method = 'main';
            } else if(($main_stock + $backup_stock) > $amount) {
              $stock_method = 'combined';
            }

            $request->session()->put('cart.' . $product->id, array(
              $amount,
              $cost,
              $stock_method
            ));
            // echo "Hello";
          }
          else {
            // array_push($this->products_arr, [
            //   $product->id => array($amount, $cost)
            // ]);
            if($main_stock>=$amount) {
              $stock_method = 'main';
            } else if(($main_stock + $backup_stock) > $amount) {
              $stock_method = 'combined';
            }

            $request->session()->put('cart',
                array_add($request->session()->get('cart'),
                  $product->id, array($amount,$cost,$stock_method)
                )
            );
          }

          $response = $this->setTableRows($request);

          // $response = array(
          //   'hello' => 'world'
          // );

          // print_r($this->products_arr);
        }
        return response()->json($response);
    }

    public function removeItem(Request $request)
    {
      if($request->ajax())
      {
        $request->session()->forget('cart.' . $request->product);

        $response = $this->setTableRows($request);
        return response()->json($response);
      }
    }

    private function setTableRows($request)
    {
      $count = 1;
      $output = '';
      $total = 0;
      foreach ($request->session()->get('cart') as $cart_product=>$properties) {
      // $cart_product = $request->session()->get('cart')[$product->id];
        $p = Product::find($cart_product);
        $output .= '
          <tr id="' . $cart_product . '">
            <td>' . $count . '</td>
            <td>' . $p->medicalName . '</td>
            <td>' . $p->price . '</td>
            <td>' . $properties[0] . '</td>
            <td>' . $properties[1] . '</td>
            <td> <button class="btn btn-sm btn-danger" onclick="removeItem(' . $cart_product . ')"> Remove Item </td>
          </tr>
        ';
        $count++;
        $total+=$properties[1];
      }

      $output .= '
        <tr id="total">
          <td colspan="6"><p align="center">Total : ' . $total . 'LKR</p></td>
        </tr>
      ';

      $response = array(
        'table_data' => $output,
        'total_cost' => $total
      );

      return $response;
    }
}
