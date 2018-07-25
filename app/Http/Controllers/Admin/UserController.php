<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Category;
use App\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }
    public function anyData()
    {
        // return Datatables::of(Category::orderBy('id','desc'))
        return Datatables::of(User::query())
        ->addColumn('action', function ($user) {
            return'
            <a edit="'. $user->id .'" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>
            <a delete="'. $user->id .'" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            ';
            
        })
        ->setRowClass(function ($user) {
            return $user->id % 2 == 0 ? 'green' : 'green';
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

        
        $data['name'] = $request['name'];
        $data['email'] = $request['email'];
        $data['address'] = $request['address'];
        $data['phone_number'] = $request['phone_number'];
        $data['password'] = Hash::make($request['password']);
        //return $data;
        $user = User::create($data);
        return response()->json(['data' => $user], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return User::find($id);
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
        $data['address'] = $request['address'];
        $data['phone_number'] = $request['phone_number'];
        $data['password'] = Hash::make($request['password']);
        User::updateData($id, $data);
        $user = User::find($id);
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = new User();
        return response()->json($user->del($id));
    }
}
