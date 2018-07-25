<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Product;
use App\Product_detail;
use App\Category;
use App\Image;
use App\Color;
use App\Size;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\ProductValidation;

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
        $product = Product::all();
        $color = Color::all();
        $size = Size::all();
        return view('admin.product.index',[
            'category' => $category,
            'product' => $product,
            'color'=>$color,
            'size' =>$size
        ]);
    }
    public function anyData()
    {
        // return Datatables::of(Product::orderBy('id','desc'))
        $products = Product::select('products.*', 'categories.name as category_name')->join('categories', 'products.category_id', '=', 'categories.id');

        return Datatables::of($products)
        ->addColumn('action', function ($product) {
            return'
            <a show="'. $product->id .'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-eye-open"></i></a>
            <a edit="'. $product->id .'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i></a>
            <a delete="'. $product->id .'" class="btn btn-xs btn-danger" id="deleteProduct"><i class="glyphicon glyphicon-remove"></i></a>
            ';
            
        })
        ->setRowClass(function ($product) {
            return $product->id % 2 == 0 ? 'green' : 'green';
        })
        ->editColumn('unit_price', '{{ number_format($unit_price)}}')
        ->editColumn('promotion_price', '{{ number_format($promotion_price)}}')
        ->setRowId('tr-{{$id}}')
        ->rawColumns(['description', 'action'])
        ->make(true);
    }
    public function showDetail($id)
    {
        $product_detail = DB::table('product_details')
        ->join('colors', 'product_details.color_id', '=', 'colors.id')
        ->join('sizes', 'product_details.size_id', '=', 'sizes.id')
        ->join('products', 'product_details.product_id', '=', 'products.id')
        ->select('product_details.*', 'colors.color_name as color_name','sizes.size as size', 'products.name as product_name')
        ->where('product_details.product_id',$id);
        return Datatables::of($product_detail)
        ->addColumn('action', function ($product_detail) {
            return'
            <a showImage="'. $product_detail->id .'" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-picture"></i></a>
            <a deleteDetail="'. $product_detail->id .'" class="btn btn-sm btn-danger" id="deleteDetailProduct"><i class="glyphicon glyphicon-remove"></i></a>
            ';
        })
        ->setRowClass(function ($product_detail) {
            return $product_detail->id % 2 == 0 ? 'green' : 'green';
        })
        ->setRowId('tr-{{$id}}')
        ->make(true);
    }

    public function showImage($id)
    {
        $image = Image::where('product_detail_id', $id)->get();
        return $image;
    }

    public function storeDetail(Request $request)
    {
        //return $request;
        $data =[];
        $data['quantity'] = $request['quantity'];
        $data['color_id'] = $request['color_id'];
        $data['size_id'] = $request['size_id'];
        $data['product_id'] = $request['product_id'];
        $productDetail = Product_detail::create($data);
        if($files=$request->file('image')){
            foreach($files as $key =>$file){
                $temp = [];
                $temp['image'] = $file->store('images');
                //$temp['name'] = $request['name'];
                $temp['product_detail_id'] = $productDetail->id;
                Image::create($temp);
            }
        }
        return response()->json([
            'data' => $data,
            'temp' => $temp,          
        ], 200);
    }

    public function storeImage(Request $request)
    {      
        $data = array();
        if($files=$request->file('image')){
            foreach($files as $key =>$file){
                $temp = [];
                $temp['image'] = $file->store('images');
                $temp['product_detail_id'] = $request['product_detail_id'];
                $data[] = Image::create($temp);
            }

        }
        return response()->json($data);
    }

    // get image
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductValidation $request)
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
    public function destroyDetailProduct($id)
    {
        //$product_detail = new Product_detail();
        // DB::table('product_details')->find($id)->delete();
        return DB::table('product_details')->where('id',$id)->delete();
    }
    public function destroyImage($id)
    {
        //$product_detail = new Product_detail();
        // DB::table('product_details')->find($id)->delete();
        $image=DB::table('images')->find($id)->image;
        Storage::disk('local')->delete('public/'.$image);
        return DB::table('images')->where('id',$id)->delete();

    }
}
