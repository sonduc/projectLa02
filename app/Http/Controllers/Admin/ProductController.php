<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Product;
use App\Category;
use App\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.product.index',compact('category'));
    }
    public function anyData()
    {
        // return Datatables::of(Product::orderBy('id','desc'))
        $products = Product::select('products.*', 'categories.name as category_name')->join('categories', 'products.category_id', '=', 'categories.id');

        return Datatables::of($products)
        ->addColumn('action', function ($product) {
            return'
            <a show="'. $product->id .'" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-eye-open"></i></a>
            <a edit="'. $product->id .'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>
            <a delete="'. $product->id .'" style="margin-top: 3px" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            ';
            
        })
        ->setRowClass(function ($product) {
            return $product->id % 2 == 0 ? 'pink' : 'green';
        })
        ->editColumn('unit_price', '{{ number_format($unit_price)}}')
        ->editColumn('promotion_price', '{{ number_format($promotion_price)}}')
        ->setRowId('tr-{{$id}}')
        ->rawColumns(['description', 'action'])
        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
        $data['code'] = "#".time();
        $data['name'] = $request['name'];
        $data['description'] = $request['description'];
        $data['unit_price'] = $request['unit_price'];
        $data['promotion_price'] = $request['promotion_price'];
        $data['slug'] = str_slug($request['name']);
        $data['category_id'] = $request['category_id'];
        $product = Product::create($data);
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Product::find($id);
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
        $data['name'] = $request['name'];
        $data['description'] = $request['description'];
        $data['unit_price'] = $request['unit_price'];
        $data['promotion_price'] = $request['promotion_price'];
        $data['slug'] = str_slug($request['name']);
        $data['category_id'] = $request['category_id'];
        Product::updateData($id, $data);
        $product = Product::find($id);
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = new Product();
        return response()->json($product->del($id));
    }
}
