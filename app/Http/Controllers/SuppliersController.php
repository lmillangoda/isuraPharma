<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use DB;
use Illuminate\Support\Facades\Auth;
class SuppliersController extends Controller
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
      $suppliers = Supplier::all();
      return view('suppliers.index')->withSuppliers($suppliers)->with('role',$role);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $role = $user->role_id;
        return view('suppliers.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'telephone' => 'required',
      ]);

      $supplier = new Supplier;
      $supplier->name = $request->Input('name');
      $supplier->email = $request->Input('email');
      $supplier->telephone = $request->Input('telephone');
      $supplier->save();

      return redirect('/suppliers')->with('success', 'Supplier Details Added Successfully!');
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
        $user = Auth::user();
        $role = $user->role_id;
        $supplier = Supplier::find($id);
        return view('suppliers.create')->with('supplier', $supplier)->with('role',$role);
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
        $supplier = Supplier::find($id);
        $this->validate($request, [
          'name' => 'required',
          'email' => 'required',
          'telephone' => 'required',
        ]);

        $supplier = Supplier::where('id',$id)->first();
        $supplier->name = $request->Input('name');
        $supplier->email = $request->Input('email');
        $supplier->telephone = $request->Input('telephone');
        $supplier->save();

        return redirect('/suppliers')->with('success', 'Supplier Details updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();
        return redirect()->route('suppliers.index');
    }
}
