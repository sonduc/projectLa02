<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Basic -->
	<meta charset="utf-8">
	<title>PROJECT LARAVEL | SHOP</title>
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="YOURStore - Responsive HTML5 Template">
	<meta name="author" content="etheme.com">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<base href="{{ asset('shop_asset') }}/">
	<link rel="shortcut icon" href="favicon.ico">
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- External Plugins CSS -->
	<link rel="stylesheet" href="external/slick/slick.css">
	<link rel="stylesheet" href="external/slick/slick-theme.css">
	<link rel="stylesheet" href="external/magnific-popup/magnific-popup.css">
	<link rel="stylesheet" href="external/bootstrap-select/bootstrap-select.css">
	<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="external/rs-plugin/css/settings.css" media="screen" />
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Icon Fonts  -->
	<link rel="stylesheet" href="font/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
	<style type="text/css">
	.editImage{
		height: 200px;
	}
	#colorProduct{
		width: 42px;
		height: 42px;
		float: left;
		border: #8080806b 1px solid;
	}
	#nameColor{
		float: left;
		margin-left: 8px;
		line-height: 27px;
	}
	#chuSize{
		clear: both;
		float: left;
		width: 45px;
		margin-top: 10px;
	}
</style>
<!-- Head Libs -->	
<!-- Modernizr -->
<script src="external/modernizr/modernizr.js"></script>
</head>
<body class="index">
	<div id="loader-wrapper">
		<div id="loader">
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
		</div>
	</div>
	<!-- Back to top -->
	<div class="back-to-top"><span class="icon-keyboard_arrow_up"></span></div>
	<!-- /Back to top -->
	<!-- HEADER section -->
	<div class="header-wrapper">
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="text-align: center;">
					<!-- logo start --> 
					<a href="index.html"><img class="logo replace-2x img-responsive" src="images/logo.png" alt=""/> </a> 
					<!-- logo end --> 
				</div>
			</div>
		</div>
		<div class="stuck-nav">
			<div class="container offset-top-5">
				<div class="row">
					<div class="pull-left col-sm-9 col-md-9 col-lg-10">
						<!-- navigation start -->
						<nav class="navbar">
							<div class="responsive-menu mainMenu">
								<!-- Mobile menu Button-->
								<div class="col-xs-2 visible-mobile-menu-on">
									<div class="expand-nav compact-hidden">
										<a href="#off-canvas-menu" class="off-canvas-menu-toggle">
											<div class="navbar-toggle"> 
												<span class="icon-bar"></span> 
												<span class="icon-bar"></span> 
												<span class="icon-bar"></span> 
												<span class="menu-text">MENU</span> 
											</div>
										</a>
									</div>
								</div>
								<!-- //end Mobile menu Button -->
								<ul class="nav navbar-nav">
									<li class="dl-close"><a href="#"><span class="icon icon-close"></span>close</a></li>
									@foreach (DB::table('categories')->get() as $category)
									<li class="dropdown dropdown-mega-menu">
										<span class="dropdown-toggle extra-arrow"></span>
										<a href="product.html" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">{{ $category->name }}</span></a>
									</li>
									@endforeach
																		
								</ul>
							</div>
						</nav>
					</div>
					<!-- navigation end -->
					<div class="pull-right col-sm-3 col-md-3 col-lg-2">
						<div class="text-right">
							<!-- search start -->
							<div class="search link-inline">
								<a href="#" class="search__open"><span class="icon icon-search"></span></a>
								<div class="search-dropdown">
									<form action="#" method="get">
										<div class="input-outer">
											<input type="search" name="search" value="" maxlength="128" placeholder="SEARCH:">
											<button type="submit" title="" class="icon icon-search"></button>
										</div>
										<a href="#" class="search__close"><span class="icon icon-close"></span></a>									
									</form>
								</div>
							</div>
							<!-- search end -->										
							<!-- account menu start -->
							<div class="account link-inline">
								<div class="dropdown text-right">
									<a class="dropdown-toggle" data-toggle="dropdown">
										<span class="icon icon-person "></span>
									</a>
									<ul class="dropdown-menu dropdown-menu--xs-full">
										<li><a href="login_form.html"><span class="icon icon-person"></span>My Account</a></li>
										<li><a href="wishlist.html"><span class="icon icon-favorite_border"></span>My Wishlist</a></li>
										<li><a href="compare.html"><span class="icon icon-sort"></span>Compare</a></li>
										<li><a href="checkout-step.html"><span class="icon icon-done_all"></span>Checkout</a></li>
										<li><a href="#"  data-toggle="modal" data-target="#modalLoginForm"><span class="icon icon-lock"></span>Log In</a></li>
										<li><a href="login_form.html"><span class="icon icon-person_add"></span>Create an account</a></li>
										<li class="dropdown-menu__close"><a href="#"><span class="icon icon-close"></span>close</a></li>
									</ul>
								</div>
							</div>
							<!-- account menu end -->
							<!-- shopping cart start -->
							<div class="cart link-inline">
								<div class="dropdown text-right">
									<a class="dropdown-toggle" >
										<span id="menuCart" class="icon icon-shopping_basket"></span>
										<span class="badge badge--cart">{{Cart::count()}}</span>
									</a>
								</div>
							</div>
							<!-- shopping cart end -->			
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
</div>
	<!-- End HEADER section -->
	
	<!--Slider section -->
	@yield('content')
	<!--End CONTENT section -->
	<!-- FOOTER section -->
	@include('shop.layouts.footer')
	<!-- END FOOTER section -->
	<div id="productQuickView" class="white-popup mfp-hide">
		<h1>Modal dialog</h1>
		<p>You won't be able to dismiss this by usual means (escape or
			click button), but you can close it programatically based on
			user choices or actions.
		</p>
	</div>
	<!-- Button trigger modal -->
	<!--================== modal ==================-->
	<!-- modalLoginForm-->
	<div class="modal  fade"  id="modalLoginForm" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
		<div class="modal-dialog white-modal modal-sm">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
					<h4 class="modal-title text-center text-uppercase">Login form</h4>
				</div>
				<form>
					<div class="modal-body indent-bot-none">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">
									<span class="icon icon-person"></span>
								</span>
								<input type="text" id="LoginFormName" class="form-control" placeholder="Name:">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">@</span>
								<input type="password" id="LoginFormPass" class="form-control" placeholder="Password:">
							</div>
						</div>
						<div class="checkbox-group">
							<input type="checkbox" id="checkBox2">
							<label for="checkBox2"> 
								<span class="check"></span>
								<span class="box"></span>
								Remember me
							</label>
						</div>
						<button type="button" class="btn btn--ys btn--full btn--lg">Login</button>
						<div class="divider divider--xs"></div>
						<button type="button" class="btn btn--ys btn--full btn--lg btn-blue"><span class="fa fa-facebook"></span> Login with Facebook</button>
						<div class="divider divider--xs"></div>
						<button type="button" class="btn btn--ys btn--full btn--lg btn-red"><span class="fa fa-google-plus"></span> Login with Google</button>
						<div class="divider divider--xs"></div>
						<ul class="list-arrow-right">
							<li><a href="#">Forgot your username?</a></li>
							<li><a href="#">Forgot your password?</a></li>
							<li><a href="#">Create an account</a></li>
						</ul>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /modalLoginForm-->
	<!--================== /modal ==================-->
	<!-- jQuery 1.10.1--> 
	<!-- Latest compiled and minified JS -->
	<!-- Latest compiled and minified CSS & JS -->
	<script src="https://code.jquery.com/jquery.js"></script>
	{{-- <script src="external/jquery/jquery-2.1.4.min.js"></script>  --}}
	<!-- Bootstrap 3--> 
	<script src="external/bootstrap/bootstrap.min.js"></script> 
	<!-- Specific Page External Plugins --> 
	<script src="external/slick/slick.min.js"></script>
	<script src="external/bootstrap-select/bootstrap-select.min.js"></script>  
	<script src="external/countdown/jquery.plugin.min.js"></script> 
	<script src="external/countdown/jquery.countdown.min.js"></script>  			
	<script src="external/nouislider/nouislider.min.js"></script>	
	<script src="external/magnific-popup/jquery.magnific-popup.min.js"></script>  		
	<script src="external/isotope/isotope.pkgd.min.js"></script> 
	<script src="external/imagesloaded/imagesloaded.pkgd.min.js"></script>
	<script src="external/elevatezoom/jquery.elevatezoom.js"></script>
	<script src="external/colorbox/jquery.colorbox-min.js"></script>
	<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
	<script type="text/javascript" src="external/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
	<script type="text/javascript" src="external/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
	<!-- Custom --> 
	<script src="js/custom.js"></script>			
	<script src="js/js-index-01.js"></script>	
	<script src="js/js-product.js"></script>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
	<script src="{{ asset('shop_asset/js/js-home.js') }}"></script>
	
	<script>
		var path = "{{asset('')}}";
	</script>	
	@yield('script')		
</body>
</html>