<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Bill;
use App\Branch;
use App\Product;

class ReportsController extends Controller
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
// Check user level
    public function checkRole()
    {
        $user = Auth::user();
        $role = $user->role_id;
        if ($role == 4) {
            return true;
        } else {
            false;
        }
    }

    public function index()
    {
        if ($this->checkRole()) {
            $user = Auth::user();
            $role = $user->role_id;
            return view('report.report', compact('role'));
        } else {
            return redirect()->route('home');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function displayReport(Request $request)
    {
        if ($this->checkRole()) {
            // echo($request);
            if ($request->ajax()) {
                $date = $request->date;
                $output = '<p>Product Wise Sales Analyze for ' . $date . '</p>
  <table class="table align-items-center table-dark table-flush">
  <thead class="thead-dark">
    <tr>
      <th>Product</th>
      <th>Total Items Sold</th>
      <th>Income</th>
    </tr>
    </thead>
    <tbody>
';
                $bills = DB::table('bill_product')->whereDate('created_at', $date)->get();
                $products = DB::table('bill_product')
                    ->select('product_id')
                    ->groupBy('product_id')
                    ->whereDate('created_at', $date)
                    ->get();

                $product_stat = array();
                for ($i = 0; $i < sizeof($products); $i++) {
                    $product_count = 0;
                    $product_income = 0;
                    foreach ($bills as $bill) {
                        if ($bill->product_id == $products[$i]->product_id) {
                            $product_count += $bill->amount;
                            $product_income += $bill->cost;
                        }
                        $product_stat[$products[$i]->product_id] = array('amount' => $product_count, 'income' => $product_income);
                        // echo($products[$i]->product_id);
                    }

                }
                // $most_sales = DB::table('bill_product')
                //                 ->groupBy('product_id')
                //                 ->having('created_at',$date)
                //                 ->orderBy('amount','desc')
                //                 ->first();
                // $higest_income =  DB::table('bill_product')
                //                 ->whereDate('created_at',$date)
                //                 ->orderBy('cost','desc')
                //                 ->first();

                // $product_stat = array();
                // foreach ($bills as $bill) {
                //   $bill->
                // }

                // foreach ($bills as $bill) {
                //   $output .= $bill;
                // }

                max(array_column($product_stat, 'amount'));
                $max_sales[] = key($product_stat);
                $max_income[] = key($product_stat);
                $total_income = 0;
                foreach ($product_stat as $product_id => $properties) {
                    $total_income += $properties['income'];
                    if ($properties['amount'] == $product_stat[$max_sales[0]]['amount'] && $product_id != $max_sales[0]) {
                        $max_sales[] = $product_id;
                    }
                    if ($properties['amount'] > $product_stat[$max_sales[0]]['amount']) {
                        $max_sales = array($product_id);
                    }

                    if ($properties['income'] == $product_stat[$max_income[0]]['income'] && $product_id != $max_income[0]) {
                        $max_income[] = $product_id;
                    }
                    if ($properties['income'] > $product_stat[$max_income[0]]['income']) {
                        $max_income = array($product_id);
                    }

                    $product = Product::find($product_id);
                    $output .= '
  <tr>
    <td>' . $product->medicalName . '</td>
    <td>' . $properties['amount'] . '</td>
    <td>' . $properties['income'] . '</td>
  </tr>
  ';
                }

                $output .=
                    '<tr>
  <td colspan="3">Total Income for the day : ' . $total_income . 'LKR</td>
</tr>

</tbody>
</table>';

                // $output = array(
                //   'product_stat' => $product_stat,
                //   'max_sales' => $max_sales,
                //   '$max_income' => $max_income,
                // );

                return response()->json($output);
                // return response()->json("Hello");


            }
        } else {
            return redirect()->route('home');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
