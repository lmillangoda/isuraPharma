<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Branch;
use App\Role;
use App\Product;
use App\Bill;

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

    public function index()
    {
        //
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $products = array();
        foreach ($request->session()->get('cart') as $product_id => $properties) {
          $product = Product::find($product_id);
          $amount = $properties[0];
          $cost = $properties[1];

          $products[$product->id] = array('amount' => $amount, 'cost' => $cost);

          //update the stocks
          
        }

        $bill = new Bill;
        $bill->cashier_id = Auth::id();
        // $bill->pharmacist_id = Auth::id();
        $bill->save();

        $bill->products()->sync($products);

        //clear the cart
        $request->session()->forget('cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        if ($request->session()->exists('cart') && array_key_exists($product->id, $request->session()->get('cart')))
       {
          $product_temp = $request->session()->get('cart')[$request->product];
          $request->session()->put('cart.' . $product->id, array(
            $product_temp[0] + $amount,
            $product_temp[1] + $cost
          ));
          // echo "Hello";
        }
        else {
          // array_push($this->products_arr, [
          //   $product->id => array($amount, $cost)
          // ]);
          $request->session()->put('cart',
              array_add($request->session()->get('cart'),
                $product->id, array($amount,$cost)
              )
          );
        }

        $response = $this->setTableRows($request);

        // $response = array(
        //   'hello' => 'world'
        // );
        return response()->json($response);

        // print_r($this->products_arr);
      }
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
