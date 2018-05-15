<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Product;
use App\Slides;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.slide.index',compact('product'));
    }

    public function anyData()
    {
        // return Datatables::of(Product::orderBy('id','desc'))
        return Datatables::of(Slides::query())
        ->addColumn('action', function ($slide) {
            return'
            <a edit="'. $slide->id .'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>
            <a delete="'. $slide->id .'" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            ';          
        })
        ->setRowClass(function ($slide) {
            return $slide->id % 2 == 0 ? 'pink' : 'green';
        })
        ->editColumn('image', '<img class="sizeImage" src="http://projectla02.com/upload/slide/{{$image}} "/>')
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
        if ($request->hasFile('image')) {
            $request->validate([
                'name'       => 'required',
                'link'     => 'required',
                'product_id'     => 'required',
                'image'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/slide'), $imageName);
        }else{
            $request->validate([
                'name'       => 'required',
                'link'       => 'required',
                'product_id'     => 'required',
            ]);
            //$imageName='http://localhost:8800/images/posts/userDefault.png';
        }       
        $data=$request->all();
        unset($data['image']);
        $data['image'] = $imageName;
        $slide= Slides::create($data);
        return $slide;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Slides::find($id);
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
                'product_id'     => 'required',
                'link'     => 'required',
                'image'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/slide'), $imageName);
        }else{
            $request->validate([
                'name'       => 'required',
                'product_id'     => 'required',
                'link'     => 'required',
            ]);
            $old_image = Slides::find($id);
            $imageName= $old_image->image;
        }       
        $data=$request->all();
        unset($data['image']);
        $data['image'] = $imageName;
        Slides::updateData($id, $data);
        $slide = Slides::find($id);
        return $slide;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = new Slides();
        return response()->json($slide->del($id));
    }
}
