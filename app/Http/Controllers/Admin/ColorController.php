<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Size;
use App\Product;
use App\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.color.index');
    }

    public function anyData()
    {
        return Datatables::of(Color::orderBy('id','desc'))
        ->addColumn('action', function ($color) {
            return'
            <a edit="'. $color->id .'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>
            <a delete="'. $color->id .'" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            ';
            
        })
        ->setRowClass(function ($color) {
            return $color->id % 2 == 0 ? 'pink' : 'green';
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
        $data['code'] = $request['code'];
        $data['color_name'] = $request['color_name'];
        $color = Color::create($data);
        return $color;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Color::find($id);
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
        $data['color_name'] = $request['color_name'];
        $data['code'] = $request['code'];
        Color::updateData($id, $data);
        $color = Color::find($id);
        return $color;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = new Color();
        return response()->json($color->del($id));
    }
}
