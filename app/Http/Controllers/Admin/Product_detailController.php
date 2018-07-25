<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Color;
use App\Size;
use App\Product;
use App\Image;
use App\Product_detail;
use DB;

class Product_detailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $color = Color::all();
        $size = Size::all();
        return view('admin.product_detail.index',[
            'product' => $product,
            'color'=>$color,
            'size' =>$size
        ]); 
    }

    public function anyData()
    {
        // return Datatables::of(Product_detail::orderBy('id','desc'))
        $product_detail = Product_detail::select('product_details.*', 'colors.color_name as color_name','sizes.size as size', 'products.name as product_name')
        ->join('colors', 'product_details.color_id', '=', 'colors.id')
        ->join('sizes', 'product_details.size_id', '=', 'sizes.id')
        ->join('products', 'product_details.product_id', '=', 'products.id');

        return Datatables::of($product_detail)
        ->addColumn('action', function ($product_detail) {
            return'
            <a showImage="'. $product_detail->id .'" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-picture"></i></a>
            <a edit="'. $product_detail->id .'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>
            <a delete="'. $product_detail->id .'" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            ';
            
        })
        ->setRowClass(function ($product_detail) {
            return $product_detail->id % 2 == 0 ? 'green' : 'green';
        })
        ->setRowId('tr-{{$id}}')
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
        $data['quantity'] = $request['quantity'];
        $data['color_id'] = $request['color_id'];
        $data['size_id'] = $request['size_id'];
        $data['product_id'] = $request['product_id'];
        $product_detail = Product_detail::create($data);
        return $product_detail;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Product_detail::find($id);
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
        $data['quantity'] = $request['quantity'];
        $data['color_id'] = $request['color_id'];
        $data['size_id'] = $request['size_id'];
        $data['product_id'] = $request['product_id'];
        Product_detail::updateData($id, $data);
        $product_detail = Size::find($id);
        return $product_detail;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_detail = new Product_detail();
        return response()->json($product_detail->del($id));
    }

    public function showImage($id)
    {
        // $image = Image::all()->where('product_detail_id',$id)->value('name');
        $image = Image::where('product_detail_id', $id)->get();
        return $image;
        // return response()->json([
        //     'image' => $image
        // ],200);
    }
}
