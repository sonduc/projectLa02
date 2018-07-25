@extends('shop.layouts.index')
@section('content')
<!-- breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb--ys pull-left">
			<li class="home-link"><a href="{{ route('shop.index') }}" class="icon icon-home"></a></li>					
			<li><a href="#">Women’s</a></li>
			<li class="active">Dresses</li>
		</ol>
	</div>
</div>
<!-- /breadcrumbs --> 
<!-- CONTENT section -->
<div id="pageContent">
	<div class="container">				
		<!-- title -->
		<div class="title-box">
			<h1 class="text-center text-uppercase title-under">Giỏ Hàng</h1>
		</div>
		<!-- /title -->
		<div class="row">
			<section class="col-md-8 col-lg-8">
				<!-- Shopping cart table -->
				<div class="container-widget">
					<table class="shopping-cart-table">
						<thead>
							<tr>
								<th>Sản phẩm</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
								<th style="width: 32%">Giá bán</th>
								<th>Số lượng</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach (Cart::content() as $row)
							<tr id="tr-{{$row->id}}" class="tr-cart">
								<td>
									<div class="shopping-cart-table__product-image">
										<a href="product.html">
											<img class="img-responsive" src="http://projectla02.com/storage/{{$row->options->image}}" alt="">
										</a>
									</div>
								</td>
								<td>
									<h5 class="shopping-cart-table__product-name text-left text-uppercase">
										<a href="product.html">{{$row->name}}</a>
									</h5>
									<ul class="shopping-cart-table__list-parameters">
										<li>
											<span>Màu:</span> {{$row->options->color}}
										</li>
										<li>
											<span>Kích cỡ:</span> {{$row->options->size}}
										</li>
									</ul>																				
								</td>
								<td>
									<a class="shopping-cart-table__create icon icon-create " href="#"></a>
									<a class="shopping-cart-table__delete icon icon-delete visible-xs" href="#"></a>
								</td>
								<td style="width: 32%">
									<div class="shopping-cart-table__product-price unit-price">
										{{ number_format($row->price)}}.VNĐ
									</div>
								</td>
								<td>
									<div class="shopping-cart-table__input">
										<!--  -->
										<div class="number input-counter">
											<span class="minus-btn"></span>
											<input type="text" value="{{$row->qty}}" size="5"/>
											<span class="plus-btn"></span>
										</div>
										<!-- / -->
									</div>								
								</td>
								<td >
									<a class="shopping-cart-table__delete icon icon-clear deleteSP"  rowID="{{$row->rowId}}"></a>
									<input type="hidden" id="idSP" idSP="{{$row->id}}">
								</td>
							</tr>	
							@endforeach							
						</tbody>
					</table>
				</div>
				<!-- /Shopping cart table -->						
				<!-- button -->
				<div class="divider divider--xs"></div>
				<div class="row shopping-cart-btns">
					<div class="col-xs-12 col-sm-8 col-md-8">
						<a class="btn btn--ys btn--light pull-left btn-right" href="{{ route('shop.index') }}">
							<span class="icon icon-keyboard_arrow_left"></span>CONTINUE SHOPPING 
						</a>         
						<div class="divider divider--xs visible-xs"></div>
						<a class="btn btn--ys btn--light" id="deleteCart">
							<span class="icon icon-delete"></span>CLEAR SHOPPING CART
						</a>
						
					</div>		           
					<div class="divider divider--xs visible-xs"></div>
					<div class="col-xs-12 col-sm-4 col-md-4 pull-left">
						<a class="btn btn--ys btn--light pull-right" href="#"><span class="icon icon-autorenew"></span>UPDATE SHOPPING CART</a>
					</div>
				</div>	
				<!-- /button -->
				<div class="divider visible-sm visible-xs"></div>
			</section>
			<aside class="col-md-4 col-lg-4 shopping_cart-aside">
				<!-- GRAND TOTAL -->
				<div class="card card--padding fill-bg">
					<table class="table-total">
						<tbody>
							<tr>
								<th class="text-left">Subtotal:</th>
								<td class="text-right">{{Cart::total()}}.VNĐ</td>
							</tr>
							<tr>
								<th class="text-left">Tax:</th>
								<td class="text-right">{{Cart::tax()}}</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<th>GRAND TOTAL:</th>
								<td>{{Cart::total()}}.VNĐ</td>
							</tr>
						</tfoot>
					</table>
					<a href="{{ route('shop.getCheckout') }}" class="btn btn--ys btn--full btn--xl">Thanh toán<span class="icon icon-reply icon--flippedX"></span></a>
					<div class="text-right link-top">
						<a class="link-underline">Checkout with Multiple Addresses</a>
					</div>
				</div>
				<!-- /GRAND TOTAL -->
			</aside>
		</div>				
		
	</div>
</div>
@endsection
@section('script')
{{-- <script src="{{ asset('shop_asset/js/js-home.js') }}"></script> --}}
@endsection