<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Bill;
use DB;

class BillController extends Controller
{
	public function index()
	{
		return view('admin.bill.index');
	}
	public function anyData()
	{
		$bills = DB::table('bills')
		->join('users', 'bills.user_id', '=', 'users.id')
		->select('bills.*', 'users.name as nameUser');
		//->where('product_details.product_id',$id);
		//$bill = Bill::select('bills.*', 'users.name as nameUser')->join('users', 'bills.user_id', '=', 'users.id');
		return Datatables::of($bills)
		->addColumn('action', function ($bills) {
			return'
			<a show="'. $bills->id .'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-eye-open"></i></a>
			<a edit="'. $bills->id .'" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-edit"></i></a>
			<a delete="'. $bills->id .'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
			';

		})
		->setRowClass(function ($bills) {
			return $bills->id % 2 == 0 ? 'green' : 'green';
		})
		->setRowId('tr-{{$id}}')
		->make(true);
	}
	public function showDetail($id)
	{
		$bill_details = DB::table('bill_details')
        // ->join('products', 'product_details.product_id', '=', 'products.id')
		->select('bill_details.*')
		->where('bill_details.bill_id',$id);
		return Datatables::of($bill_details)
		->setRowClass(function ($bill_details) {
			return $product_detail->id % 2 == 0 ? 'green' : 'green';
		})
		->setRowId('tr-{{$id}}')
		->make(true);
	}
}
