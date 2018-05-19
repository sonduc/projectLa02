<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Image;
use App\Product;
use App\Product_detail;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_detail = Product_detail::all();
        return view('admin.image.index',compact('product_detail'));
    }

    public function anyData()
    {
        // return Datatables::of(Image::orderBy('id','desc'))
        return Datatables::of(Image::query())
        // $image = Image::select('images.*', 'producs.name as produc_name')
        // ->join('products', 'product_details.product_id', '=', 'products.id');

        // return Datatables::of($image)
        ->addColumn('action', function ($image) {
            return'
            <a edit="'. $image->id .'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>
            <a delete="'. $image->id .'" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            ';
            
        })
        ->setRowClass(function ($image) {
            return $image->id % 2 == 0 ? 'pink' : 'green';
        })
        ->editColumn('image', function($image) {
            return '<img class="sizeImage" src="' .asset('') . 'storage/'. $image->image .'"/>';
        })
        ->setRowId('tr-{{$id}}')
        ->rawColumns(['image', 'action'])
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

        $data = array();
        $images=array();
        if($files=$request->file('image')){
            foreach($files as $key =>$file){
                $temp = [];
                $temp['image'] = $file->store('images');
                $temp['name'] = $request['name'];
                $temp['product_detail_id'] = $request['product_detail_id'];
                Image::create($temp);
            }
        }
        return response()->json(['data' => $images], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Image::find($id);
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
        if ($request->hasFile('image')) {

            $request->validate([
                'name'       => 'required',
                'product_detail_id'     => 'required',
                'image'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/image'), $imageName);
        }else{
            $request->validate([
                'name'       => 'required',
                'product_detail_id'     => 'required',
            ]);
            $old_image = Image::find($id);
            $imageName= $old_image->image;
        }       
        $data=$request->all();
        unset($data['image']);
        $data['image'] = $imageName;
        Image::updateData($id, $data);
        $image = Image::find($id);
        return $image;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = new Image();
        return response()->json($image->del($id));
    }
}
