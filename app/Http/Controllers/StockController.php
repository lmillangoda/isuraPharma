<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Supplier;
use App\Branch;
use DB;
use Illuminate\Support\Facades\Auth;
class StockController extends Controller
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
        $user = Auth::user();
        $role = $user->role_id;
        $branches = Branch::all();
        return view('stock.index')->withBranches($branches)->with('role',$role);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create($branch_id, $product_id, $batch)
     {
       //
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($branch_id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($branch_id, $product_id, $batch)
    {
        $user = Auth::user();
        $role = $user->role_id;
      $branch = Branch::find($branch_id);
      $product = Product::find($product_id);
      $stock = DB::table('stock')->where([['branch_id',$branch_id],['product_id',$product_id],['batch',$batch]])->first();
      return view('stock.create',compact('role'))->withBranch($branch)->withProduct($product)->with('amount',$stock->amount)->with('expDate',$stock->expDate)->with('batch',$batch);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $branch_id, $product_id, $batch)
    {
        $branch = Branch::find($branch_id);
        $product = $branch->main_products->find($product_id);

        $expire = $request->input('expire');
        $amount = $request->input('amount');
        $currentAmount = DB::table('stock')->where([['branch_id',$branch_id],['product_id',$product_id],['batch',$batch]])->value('amount');
        if($batch==1)
        {
          $branch->main_products()->updateExistingPivot($product_id, ['expDate'=>$expire, 'amount'=>$currentAmount + $amount]);
        }
        else if($batch==2)
        {
          $branch->backup_products()->updateExistingPivot($product_id, ['expDate'=>$expire, 'amount'=>$currentAmount + $amount]);
        }
        return redirect()->action(
          'StockController@edit',['branch'=>$branch, 'product'=>$product, 'batch'=>$batch]
        )->with('Status', 'Stock Updated');
    }

    public function substract(Request $request, $branch_id, $product_id, $batch)
    {
      $branch = Branch::find($branch_id);
      $product = $branch->main_products->find($product_id);

      $expire = $request->input('expire');
      $amount = $request->input('amount');
      $currentAmount = DB::table('stock')->where([['branch_id',$branch_id],['product_id',$product_id],['batch',$batch]])->value('amount');
      if($batch==1)
      {
        $branch->main_products()->updateExistingPivot($product_id, ['expDate'=>$expire, 'amount'=>$currentAmount - $amount]);
      }
      else if($batch==2)
      {
        $branch->backup_products()->updateExistingPivot($product_id, ['expDate'=>$expire, 'amount'=>$currentAmount - $amount]);
      }
      return redirect()->action(
        'StockController@edit',['branch'=>$branch, 'product'=>$product, 'batch'=>$batch]
      )->with('Status', 'Stock Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($branch_id, $product_id)
    {
        //
    }

    public function empty(Request $request, $branch_id, $product_id, $batch)
    {
      $branch = Branch::find($branch_id);
      $product = Product::find($product_id);
      if($batch==1)
      {
        $branch->main_products()->updateExistingPivot($product_id, ['amount'=>0, 'expDate'=>null]);
      }
      else if($batch==2)
      {
        $branch->backup_products()->updateExistingPivot($product_id, ['amount'=>0, 'expDate'=>null]);
      }

      return redirect()->action(
        'StockController@edit',['branch'=>$branch, 'product'=>$product, 'batch'=>$batch]
      )->with('Status', 'Stock Updated');
    }
}
