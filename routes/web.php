<?php
Route::get('/', function () {
	return view('welcome');
});

Auth::routes();
Route::middleware('auth')->group(function (){
	Route::get('/home', 'HomeController@index')->name('home');
});

Route::prefix('admin')->group(function (){
	Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Admin\LoginController@login')->name('admin.post.login');
	Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');

        // Registration Routes...
	Route::get('register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
	Route::post('register', 'Admin\RegisterController@register');

        // Password Reset Routes...
	Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('password/reset', 'Admin\ResetPasswordController@reset');
	// Route::middleware('admin.auth')->group(function (){
	// 	Route::get('dashboard', function () {
	// 		return view('dashboard');			
	// 	});
	// });
});

Route::middleware('admin.auth')->group(function (){
	Route::prefix('admin')->group(function(){	
		Route::prefix('category')->group(function(){
			Route::get('index', 'Admin\CategoryController@index')->name('category.index');
			Route::get('anyData','Admin\CategoryController@anyData')->name('category.anyData');
			Route::post('store','Admin\CategoryController@store')->name('category.store');
			Route::get('edit/{id}','Admin\CategoryController@edit')->name('category.edit');
			Route::post('update/{id}','Admin\CategoryController@update')->name('category.update');
			Route::delete('delete/{id}','Admin\CategoryController@destroy')->name('category.delete');
		});
		Route::prefix('product')->group(function(){
			Route::get('index', 'Admin\ProductController@index')->name('product.index');
			Route::get('anyData','Admin\ProductController@anyData')->name('product.anyData');
			Route::get('showDetail/{id}','Admin\ProductController@showDetail')->name('product.showDetail');
			Route::post('storeDetail','Admin\ProductController@storeDetail')->name('product.storeDetail');
			Route::post('storeImage','Admin\ProductController@storeImage')->name('product.storeImage');
			Route::get('showImage/{id}','Admin\ProductController@showImage')->name('product.showImage');
			Route::post('store','Admin\ProductController@store')->name('product.store');
			Route::get('edit/{id}','Admin\ProductController@edit')->name('product.edit');
			Route::post('update/{id}','Admin\ProductController@update')->name('product.update');
			Route::delete('delete/{id}','Admin\ProductController@destroy')->name('product.delete');
			Route::delete('deleteDetail/{id}','Admin\ProductController@destroyDetailProduct')->name('product.deleteDetail');
			Route::delete('deleteImage/{id}','Admin\ProductController@destroyImage')->name('product.deleteImage');
		});
		Route::prefix('product_detail')->group(function(){
			Route::get('index', 'Admin\Product_detailController@index')->name('product_detail.index');
			Route::get('anyData','Admin\Product_detailController@anyData')->name('product_detail.anyData');
			Route::post('store','Admin\Product_detailController@store')->name('product_detail.store');
			Route::get('showImage/{id}','Admin\Product_detailController@showImage')->name('product_detail.showImage');
			Route::get('edit/{id}','Admin\Product_detailController@edit')->name('product_detail.edit');
			Route::post('update/{id}','Admin\Product_detailController@update')->name('product_detail.update');
			Route::delete('delete/{id}','Admin\Product_detailController@destroy')->name('product_detail.delete');
		});
		Route::prefix('image')->group(function(){
			Route::get('index', 'Admin\ImageController@index')->name('image.index');
			Route::get('anyData','Admin\ImageController@anyData')->name('image.anyData');
			Route::post('store','Admin\ImageController@store')->name('image.store');
			Route::get('edit/{id}','Admin\ImageController@edit')->name('image.edit');
			Route::post('update/{id}','Admin\ImageController@update')->name('image.update');
			Route::delete('delete/{id}','Admin\ImageController@destroy')->name('image.delete');
		});
		Route::prefix('size')->group(function(){
			Route::get('index', 'Admin\SizeController@index')->name('size.index');
			Route::get('anyData','Admin\SizeController@anyData')->name('size.anyData');
			Route::post('store','Admin\SizeController@store')->name('size.store');
			Route::get('edit/{id}','Admin\SizeController@edit')->name('size.edit');
			Route::post('update/{id}','Admin\SizeController@update')->name('size.update');
			Route::delete('delete/{id}','Admin\SizeController@destroy')->name('size.delete');
		});
		Route::prefix('color')->group(function(){
			Route::get('index', 'Admin\ColorController@index')->name('color.index');
			Route::get('anyData','Admin\ColorController@anyData')->name('color.anyData');
			Route::post('store','Admin\ColorController@store')->name('color.store');
			Route::get('edit/{id}','Admin\ColorController@edit')->name('color.edit');
			Route::post('update/{id}','Admin\ColorController@update')->name('color.update');
			Route::delete('delete/{id}','Admin\ColorController@destroy')->name('color.delete');
		});
		Route::prefix('slide')->group(function(){
			Route::get('index', 'Admin\SlideController@index')->name('slide.index');
			Route::get('anyData','Admin\SlideController@anyData')->name('slide.anyData');
			Route::post('store','Admin\SlideController@store')->name('slide.store');
			Route::get('edit/{id}','Admin\SlideController@edit')->name('slide.edit');
			Route::post('update/{id}','Admin\SlideController@update')->name('slide.update');
			Route::delete('delete/{id}','Admin\SlideController@destroy')->name('slide.delete');
		});
		Route::prefix('bill')->group(function(){
			Route::get('index', 'Admin\BillController@index')->name('bill.index');
			Route::get('anyData','Admin\BillController@anyData')->name('bill.anyData');
			Route::get('showDetail/{id}','Admin\BillController@showDetail')->name('bill.showDetail');
			Route::post('store','Admin\BillController@store')->name('bill.store');
			Route::get('edit/{id}','Admin\BillController@edit')->name('bill.edit');
			Route::post('update/{id}','Admin\BillController@update')->name('bill.update');
			Route::delete('delete/{id}','Admin\BillController@destroy')->name('bill.delete');
		});
		Route::prefix('user')->group(function(){
			Route::get('index', 'Admin\UserController@index')->name('user.index');
			Route::get('anyData','Admin\UserController@anyData')->name('user.anyData');
			Route::post('store','Admin\UserController@store')->name('user.store');
			Route::get('edit/{id}','Admin\UserController@edit')->name('user.edit');
			Route::post('update/{id}','Admin\UserController@update')->name('user.update');
			Route::delete('delete/{id}','Admin\UserController@destroy')->name('user.delete');
		});
	});
});

Route::prefix('shop')->group(function (){
	Route::get('index','Shop\ShopController@index')->name('shop.index');
	Route::get('modalDetail/{id}','Shop\ShopController@modalDetail')->name('shop.modalDetail');
	Route::get('product/{id}','Shop\ShopController@product')->name('shop.product');
	Route::post('postCart','Shop\ShopController@postCart')->name('shop.postCart');
	Route::get('cart','Shop\ShopController@cart')->name('shop.cart');
	Route::post('deleteDetail','Shop\ShopController@destroyDetail')->name('shop.deleteDetail');
	Route::post('destroyCart','Shop\ShopController@destroyCart')->name('shop.destroyDetail');
	Route::get('checkout','Shop\ShopController@getCheckout')->name('shop.getCheckout');
	Route::post('postCheckout','Shop\ShopController@postCheckout')->name('shop.postCheckout');
});