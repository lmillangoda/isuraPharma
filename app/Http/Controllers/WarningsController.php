<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Branch;
use DB;

class WarningsController extends Controller
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
            $products = Product::all();
            $branches = Branch::all();
            //reorder level warnings
            $warnings = array();
            foreach ($products as $product) {
                foreach ($branches as $branch) {
                    $backup_stock = DB::table('stock')->where([['branch_id', $branch->id], ['product_id', $product->id], ['batch', 2]])->value('amount');
                    $available_stock = DB::table('stock')->where([['branch_id', $branch->id], ['product_id', $product->id], ['batch', 1]])->first();
                    if ($backup_stock == 0 && $product->reorder_level > $available_stock->amount) {
                        $warnings[] = array('product' => $product, 'branch' => $branch, 'available' => $available_stock->amount);
                    }
                }

            }

            // print_r ($warnings);
            return view('warnings.index', compact('role'))->with('warnings', $warnings);
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
