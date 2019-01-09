<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Branch;
use App\Stock;
use DB;

class BranchesController extends Controller
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

    public function checkRole()
    {
        $user = Auth::user();
        $role = $user->role_id;
        if ($role == 1 || $role == 4) {
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
            return view('branches.index')->withBranches($branches)->with('role', $role);
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
        if ($this->checkRole()) {
            $user = Auth::user();
            $role = $user->role_id;
            return view('branches.create', compact('role'));
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
        if ($this->checkRole()) {
            $branch = new Branch;
            $branch->town = $request->Input('town');

            $branch->save();

            $stocks = Stock::all();

            if (!is_null($stocks)) {
                foreach ($stocks as $stock) {
                    $new = new Stock;
                    $new->branch_id = $branch->id;
                    $new->product_id = $stock->product_id;
                    $new->save();
                }
            }

            return redirect('/branches')->with('success', 'Branches Details Added Successfully!');
        } else {
            return redirect()->route('home');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($this->checkRole()) {
            $user = Auth::user();
            $role = $user->role_id;
            $branch = Branch::find($id);
            $main_products = $branch->main_products;
            $backup_products = $branch->backup_products;
            $products = $branch->products;
            // dd($products);
            return view('branches.view', compact("role"))
                ->withBranch($branch)
                ->withProducts($products)
                ->with('main_products', $main_products)
                ->with('backup_products', $backup_products);
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
