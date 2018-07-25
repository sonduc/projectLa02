<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Product_detail;
use App\User;
use App\Bill;
use App\Bill_detail;
use App\Image;
use App\Color;
use App\Size;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{
	public function index()
	{
		$slide = DB::table('slides')->get();
		$categories = DB::table('categories')->get();
		$products = Product::all();

		foreach ($products as $product) {
			$arr = [];
			$product_details = $product->ProductDetail;
			foreach ($product_details as $detail){
				$images = $detail->Image;
				foreach ($images as $image){
					$path = $image->image;
					array_push($arr,$path);
				}
			}
			array_unique($arr);
			$product->images = $arr[0];
		}		
		return view('shop.pages.home',compact('slide','products','product_details','categories'));
	}
	/**
	 * 
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function modalDetail($id){
		$product = Product::find($id);
		$arr = [];
		$arrDetail = [];
		$product_details = $product->ProductDetail;
		foreach ($product_details as $detail){		
			array_push($arrDetail,$detail);
			$images = $detail->Image;
			foreach ($images as $image){
				$path = $image->image;
				array_push($arr,$path);
			}
		}
		array_unique($arrDetail);
		$color_size = $arrDetail[0];
		$color = Color::find($color_size->color_id);
		$size = Size::find($color_size->size_id);
		array_unique($arr);
		$temp = $arr[0];

		return response()->json([
			'product' => $product,
			'product_details' => $product_details,
			'temp' =>$temp,
			'color' =>$color,
			'size' =>$size,
		]);
	}
	/**
     * Lấy chi tiết 1 sản phẩm theo id
     */
	public function product($id)
	{
		$product = Product::find($id);
		$arr = [];
		$arrDetail = [];
		$arrImage =[];
		$product_details = $product->ProductDetail;
		foreach ($product_details as $detail){		
			array_push($arrDetail,$detail);
			$images = $detail->Image;
			foreach ($images as $image){
				$path = $image->image;
				array_push($arr,$path);
			}
			$detail_images = Image::where('product_detail_id',$detail->id)->get();
			array_push($arrImage,$detail_images);
		}
		array_unique($arrDetail);
		$color_size = $arrDetail[0];
		$color = Color::find($color_size->color_id);
		$size = Size::find($color_size->size_id);
		array_unique($arr);
		$temp = $arr[0];
		$detail_image = $arrImage[0];
		$product_detail = $product_details[0];
		//dd($product_detail,$detail_image);
		return view('shop.pages.product',compact('product','product_detail','temp','color','size','detail_image'));
	}

	public function postCart(Request $request)
	{
		//return $request;
		$cart = Cart::add(
			$request['id'], $request['name'],$request['quantity'], $request['price'],
			['size' => $request->size,'color' => $request->color,'image' => $request->image]);
		return $cart;
	}

	public function destroyDetail(Request $request)
	{
		
		$rowId = $request->input('rowID');
		$cart = Cart::remove($rowId);

		return response()->json($request->rowId);
	}
	public function destroyCart()
	{
		return Cart::destroy();
	}
	public function cart()
	{
		return view('shop.pages.cart');
	}
	public function getCheckout()
	{
		return view('shop.pages.checkout');
	}
	public function postCheckout(Request $request)
	{
		//return $bill_details = Cart::content();
		$arrUser['name'] = $request->name;
		$arrUser['email'] = $request->email;
		$arrUser['address'] = $request->address;
		$arrUser['phone_number'] = $request->phone_number;
		$user = User::create($arrUser);

		$str = str_replace(',', '', Cart::total());
		// return response()->json(var_dump($str));
		$arrBill['total_price'] = floatval($str);
		// return response()->json($arrBill['total_price'] );
		$arrBill['user_id'] = $user->id;
		$bill = Bill::create($arrBill);

		$bill_details = Cart::content();
		foreach ($bill_details as $bill_detail) {
			$arrDeatil['quantity'] = $bill_detail->qty;
			$arrDeatil['unit_price'] = $bill_detail->price;
			$arrDeatil['size'] = $bill_detail->options->size;
			$arrDeatil['color_name'] = $bill_detail->options->color;
			$arrDeatil['image'] = $bill_detail->options->image;
			$arrDeatil['bill_id'] = $bill->id;		
			$arrDeatil['product_detail_id'] = $bill_detail->id;
			Bill_detail::create($arrDeatil);
		}
		
		return Cart::destroy();

	}
}
