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
// Check user level
    public function checkRole()
    {
        $user = Auth::user();
        $role = $user->role_id;
        if ($role == 4 || $role == 1) {
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
            $branches = Branch::all();
            return view('stock.index')->withBranches($branches)->with('role', $role);
        } else {
            return redirect()->route('home');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($branch_id, $product_id)
    {
        if ($this->checkRole()) {
            $user = Auth::user();
            $role = $user->role_id;
            $branch = Branch::find($branch_id);
            $product = Product::find($product_id);
            $stock = DB::table('stock')->where([['branch_id', $branch_id], ['product_id', $product_id], ['batch', 1]]);
            return view('stock.create', compact('role'))->withBranch($branch)->withProduct($product)->with(['amount', $stock->amount], ['expDate', $stock->expDate]);
        } else {
            return redirect()->route('home');
        }
      
    }

    public function createBackup($branch_id, $product_id)
    {
        if ($this->checkRole()) {
            $user = Auth::user();
            $role = $user->role_id;
            $branch = Branch::find($branch_id);
            $product = Product::find($product_id);
            $stock = DB::table('stock')->where([['branch_id', $branch_id], ['product_id', $product_id], ['batch', 2]])->first();
            return view('backup_stock.create', compact('role'))->withBranch($branch)->withProduct($product)->with('amount', $stock->amount)->with('expDate', $stock->expDate);
        } else {
            return redirect()->route('home');
        }

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
    public function show($branch_id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($branch_id, $product_id)
    {
        if ($this->checkRole()) {
            $user = Auth::user();
            $role = $user->role_id;
            $branch = Branch::find($branch_id);
            $product = Product::find($product_id);
            $stock = DB::table('stock')->where([['branch_id', $branch_id], ['product_id', $product_id], ['batch', 1]])->first();
            return view('stock.create', compact('role'))->withBranch($branch)->withProduct($product)->with('amount', $stock->amount)->with('expDate', $stock->expDate)->with('status','Action Successfull');
        } else {
            return redirect()->route('home');
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $branch_id, $product_id)
    {
        if ($this->checkRole()) {
            $branch = Branch::find($branch_id);
            $product = $branch->main_products->find($product_id);

            $expire = $request->input('expire');
            $amount = $request->input('amount');
            $currentAmount = DB::table('stock')->where([['branch_id', $branch_id], ['product_id', $product_id], ['batch', 1]])->value('amount');
            $branch->main_products()->updateExistingPivot($product_id, ['expDate' => $expire, 'amount' => $currentAmount + $amount]);

            return redirect()->action(
                'StockController@edit', ['branch' => $branch, 'product' => $product]
            )->with('Status', 'Stock Updated');
        } else {
            return redirect()->route('home');
        }

    }

    public function substract(Request $request, $branch_id, $product_id)
    {
        if ($this->checkRole()) {
            $branch = Branch::find($branch_id);
            $product = $branch->main_products->find($product_id);

            $amount = $request->input('amount');
            $currentAmount = DB::table('stock')->where([['branch_id', $branch_id], ['product_id', $product_id], ['batch', 1]])->value('amount');
            $branch->main_products()->updateExistingPivot($product_id, ['amount' => $currentAmount - $amount]);

            return redirect()->action(
                'StockController@edit', ['branch' => $branch, 'product' => $product]
            )->with('Status', 'Stock Updated');
        } else {
            return redirect()->route('home');
        }

    }

    public function storeBackup(Request $request, $branch_id, $product_id)
    {
        if ($this->checkRole()) {
            $branch = Branch::find($branch_id);
            $product = $branch->products->find($product_id);

            $expire = $request->input('expire');
            $amount = $request->input('amount');
            $currentAmount = DB::table('stock')->where([['branch_id', $branch_id], ['product_id', $product_id], ['batch', 2]])->value('amount');
            $branch->backup_products()->updateExistingPivot($product_id, ['expDate' => $expire, 'amount' => $currentAmount + $amount]);

            return redirect()->action(
                'StockController@createBackup', ['branch' => $branch, 'product' => $product]
            )->with('Status', 'Stock Updated');
        } else {
            return redirect()->route('home');
        }

    }

    public function substractBackup(Request $request, $branch_id, $product_id)
    {
        if ($this->checkRole()) {
            $branch = Branch::find($branch_id);
            $product = $branch->backup_products->find($product_id);

            $amount = $request->input('amount');
            $currentAmount = DB::table('stock')->where([['branch_id', $branch_id], ['product_id', $product_id], ['batch', 2]])->value('amount');
            $branch->backup_products()->updateExistingPivot($product_id, ['amount' => $currentAmount - $amount]);

            return redirect()->action(
                'StockController@createBackup', ['branch' => $branch, 'product' => $product]
            )->with('Status', 'Stock Updated');
        } else {
            return redirect()->route('home');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($branch_id, $product_id)
    {
        if ($this->checkRole()) {
            $branch = Branch::find($branch_id);
            $branch->main_products()->updateExistingPivot($product_id, ['amount' => 0, 'expDate' => null]);
        } else {
            return redirect()->route('home');
        }

    }

    public function destroyBackup($branch_id, $product_id)
    {
        if ($this->checkRole()) {
            $branch = Branch::find($branch_id);
            $branch->backup_products()->updateExistingPivot($product_id, ['amount' => 0, 'expDate' => null]);
        } else {
            return redirect()->route('home');
        }

    }
}
