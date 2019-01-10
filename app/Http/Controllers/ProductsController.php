<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Supplier;
use App\Branch;
use DB;
use Storage;

class ProductsController extends Controller
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
        $products = Product::all();
        return view('products.index')->withProducts($products)->with('role',$role);
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
        $suppliers = Supplier::all();
        return view('products.create')->withSuppliers($suppliers)->with('role',$role);
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
        $this->validate($request, [
          'brandName' => 'required',
          'medicalName' => 'required',
          'price' => 'required',
        ]);

        $product = new Product;
        $product->brandName = $request->Input('brandName');
        $product->medicalName = $request->Input('medicalName');
        $product->price = $request->Input('price');
        $product->buying_price = $request->Input('buying_price');
        $product->reorder_level = $request->Input('reorder_level');
        $product->image = $this->filenameToStore($request);

        $product->save();

        //sync suppliers
        $product->suppliers()->sync($request->suppliers, false);

        //sync branches
        $branches = Branch::all();
        foreach ($branches as $branch) {
          $product->branches()->attach([$branch->id => ['batch' => 1]]);
          $product->branches()->attach([$branch->id => ['batch' => 2]]);
        }

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
        $user = Auth::user();
        $role = $user->role_id;
        $product = Product::find($id);
        $suppliers = $product->suppliers;
        $branches = $product->branches;
        return view('products.view')->withProduct($product)->withSuppliers($suppliers)->withBranches($branches)->with('role',$role);
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
        $product = Product::find($id);
        $suppliers = Supplier::all();
        return view('products.create')->withProduct($product)->withSuppliers($suppliers)->with('role',$role);
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
      $product->buying_price = $request->Input('buying_price');
      $product->reorder_level = $request->Input('reorder_level');
      if($request->hasFile('image')){
        $oldFilename = 'public/product_images/'.$product->image;
        $product->image = $this->filenameToStore($request);
        Storage::delete($oldFilename);
      }
      $product->save();
      $product->suppliers()->sync($request->suppliers);

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

    public function search(Request $request)
    {
      if($request->ajax())
      {
        $output = '';
        $keyword = $request->keyword;
        if($keyword!='')
        {
          $data = DB::table('products')
          ->where('medicalName','like','%'.$keyword.'%')
          ->orWhere('brandName','like','%'.$keyword.'%')
          ->get();
        }
        else
        {
          $data = Product::all();
        }

        $total_rows = $data->count();
        if($total_rows>0)
        {
          foreach($data as $row)
          {
            $output .= '
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                  <a href="/products/' . $row->id . '">
                    <img class="card-img-top" src="storage/product_images/' . $row->image . '" alt="Card image cap">
                  </a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="/products/' . $row->id . '/">' . $row->medicalName . '</a>
                    </h4>
                    <p class="card-text">Price : ' . $row->price . 'LKR</p>
                    <div class= "row">
                      <div class = "col-8">
                        <a href="/products/' . $row->id . ' /edit" class="btn btn-primary">Edit</a>
                      </div>
                      <div>
                        <form class="pull-right delete" action="' . route('products.destroy',['id'=>$row->id]) . '" method="post">
                          <input type="hidden" name="_method" value="DELETE"/>
                          <input type="hidden" name="_token" id="csrf-token" value="' . $request->session()->token() . '" />
                          <input class="btn btn-danger" type="submit" name="delete" value="Delete">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            ';
          }
        }
        else {
          $output = '
            <p>No data Found</p>
          ';
        }

        $data = array(
          'cards' => $output
        );

        return response()->json($data);
      }
    }
}
