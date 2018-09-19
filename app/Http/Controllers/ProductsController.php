<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index')->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
          'brandName' => 'required',
          'medicalName' => 'required',
          'price' => 'required',
        ]);

        $product = new Product;
        $product->brandName = $request->Input('brandName');
        $product->medicalName = $request->Input('medicalName');
        $product->price = $request->Input('price');
        $product->image = $this->filenameToStore($request);
        $product->save();

        return redirect('/products')->with('success', 'Product Details Added Successfully!');
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
        $product = Product::find($id);
        return view('products.create')->with('product', $product);
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
      $product = Product::find($id);
      $product->brandName = $request->Input('brandName');
      $product->medicalName = $request->Input('medicalName');
      $product->price = $request->Input('price');
      if($request->hasFile('image')){
        $oldFilename = 'public/product_images/'.$product->image;
        $product->image = $this->filenameToStore($request);
        Storage::delete($oldFilename);
      }
      $product->save();

      return redirect('/products')->with('success', 'Product Details Saved Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $file = 'public/product_images/'.$product->image;
        Storage::delete($file);
        $product->delete();

        return redirect('/products')->with('success', 'Product Removed Successfully!');
    }

    public function filenameToStore($request)
    {
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('image')->storeAs('public/product_images', $filenameToStore);

        return $filenameToStore;
    }
}