<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryValidation;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }
    public function anyData()
    {
        // return Datatables::of(Category::orderBy('id','desc'))
        return Datatables::of(Category::query())
        ->addColumn('action', function ($category) {
            return'
            <a edit="'. $category->id .'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>
            <a delete="'. $category->id .'" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            ';
            
        })
        ->setRowClass(function ($category) {
            return $category->id % 2 == 0 ? 'green' : 'green';
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
    public function store(CategoryValidation $request)
    // public function store(Request $request)
    {
        $data['name'] = $request['name'];
        $data['slug'] = str_slug($request['name']);
        $category = Category::create($data);


        return response()->json(['data' => $category], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Category::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryValidation $request, $id)
    {
        $data['name'] = $request['name'];
        $data['slug'] = str_slug($request['name']);
        Category::updateData($id, $data);
        $category = Category::find($id);
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = new Category();
        return response()->json($category->del($id));
    }
}
