<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Basic -->
	<meta charset="utf-8">
	<title>PROJECT LARAVEL | SHOP</title>
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="YOURStore - Responsive HTML5 Template">
	<meta name="author" content="etheme.com">
	<base href="{{ asset('') }}/shop_asset/">
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
</div>
<!-- HEADER section -->
@include('shop.layouts.header')
<!-- End HEADER section -->
<!-- Slider section --> 
<div class="content offset-top-0" id="slider">
         <!--
            #################################
            - THEMEPUNCH BANNER -
            #################################
        --> 
        <!-- START REVOLUTION SLIDER 3.1 rev5 fullwidth mode -->
        <h2 class="hidden">Slider Section</h2>
        <div class="tp-banner-container">
        	<div class="tp-banner">
        		<ul>
        			<!-- SLIDE -1 -->
        			<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
        				<!-- MAIN IMAGE --> 
        				<img src="images/slides/slide-1.jpg"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" > 
        				<!-- LAYERS --> 
        				<!-- TEXT -->
        				<div class="tp-caption lfl stb" 
        				data-x="205"              
        				data-y="center"    
        				data-voffset="60" 
        				data-speed="600" 
        				data-start="900" 
        				data-easing="Power4.easeOut" 
        				data-endeasing="Power4.easeIn" 
        				style="z-index: 2;">
        				<div class="tp-caption1--wd-1">Spring -Summer 2016</div>
        				<div class="tp-caption1--wd-2">Save 20% on</div>
        				<div class="tp-caption1--wd-3">new arrivals </div>
        				<a href="listing.html" class="link-button button--border-thick" data-text="Shop now!">Shop now!</a>
        			</div>
        		</li>
        		<!-- /SLIDE -1 -->
        		<!-- SLIDE 2  -->            
        		<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
        			<!-- MAIN IMAGE --> 
        			<img src="images/slides/slide-2.jpg"  alt="slide2"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
        			<!-- LAYERS -->
        			<!-- TEXT -->
        			<div class="tp-caption lfr stb" 
        			data-x="right"              
        			data-y="center"    
        			data-voffset="-5"
        			data-hoffset="-205" 
        			data-speed="600" 
        			data-start="900" 
        			data-easing="Power4.easeOut" 
        			data-endeasing="Power4.easeIn" 
        			style="z-index: 2;"
        			>
        			<div class="tp-caption2--wd-1">A great selection of superb brands </div>
        			<div class="tp-caption2--wd-2">50% off</div>
        			<div class="tp-caption2--wd-3">on all clothes</div>
        			<a href="listing.html" class="link-button button--border-thick pull-right" data-text="Shop now!">
        				Shop now!
        			</a>
        		</div>
        	</li>
        	<!-- /SLIDE 2  -->						
        	<!-- SLIDE - 3 -->
        	<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
        		<img src="images/slides/04/intro_img_03.jpg"  alt="slide3"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
        		<!-- LAYER NR. 1 -->
        		<div class="tp-caption tp-fade fadeout fullscreenvideo"
        		data-x="0"
        		data-y="0"
        		data-speed="1000"
        		data-start="1100"
        		data-easing="Power4.easeOut"
        		data-endspeed="1500"
        		data-endeasing="Power4.easeIn"
        		data-autoplay="true"
        		data-autoplayonlyfirsttime="false"
        		data-nextslideatend="true"
        		data-forceCover="1"
        		data-dottedoverlay="twoxtwo"
        		data-aspectratio="16:9"
        		data-forcerewind="on"
        		style="z-index: 2"
        		>
        		<video class="video-js vjs-default-skin" preload="none" 
        		poster='images/slides/video/video_img.jpg' data-setup="{}">
        		<source src='images/slides/video/explore.mp4' type='video/mp4' />
        		<source src='images/slides/video/explore.webm' type='video/webm' />
        		<source src='images/slides/video/explore.ogv' type='video/ogg'  />
        	</video>
        </div>
        <!-- TEXT -->
        <div class="tp-caption lfb stb" 
        data-x="center"              
        data-y="center"    
        data-voffset="0"
        data-hoffset="0" 
        data-speed="600" 
        data-start="900" 
        data-easing="Power4.easeOut" 
        data-endeasing="Power4.easeIn" 
        style="z-index: 2;"
        >
        <div class="tp-caption3--wd-1 color-white">Spring -Summer 2016</div>
        <div class="tp-caption3--wd-2">Season sale!</div>
        <div class="tp-caption3--wd-3 color-white">Get huge</div>
        <div class="tp-caption3--wd-3 color-white">savings!</div>
        <div class="text-center"><a href="listing.html" class="link-button button--border-thick" data-text="Shop now!">
        	Shop now!
        </a>
    </div>
</div>
</li>
<!-- /SLIDE - 3 -->	
</ul>
</div>
</div>
</div>
<!-- END REVOLUTION SLIDER --> 
<!-- CONTENT section -->
<div id="pageContent">
	<!-- featured products -->
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-8">
					<!-- title -->
					<div class="title-box">
						<h2 class="text-center text-uppercase title-under">FEATURED PRODUCTS</h2>
					</div>
					<!-- /title -->

					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
						<!-- product -->
						<div class="product product--zoom">
							<div class="product__inside">
								<!-- product image -->
								<div class="product__inside__image">
									<a href="product.html"> <img src="images/product/product-4.jpg" alt=""> </a> 
									<!-- quick-view --> 
									<a href="#" data-toggle="modal" data-target="#quickViewModal" class="quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a> 
									<!-- /quick-view --> 
								</div>
								<!-- /product image --> 
								<!-- product name -->
								<div class="product__inside__name">
									<h2><a href="product.html"> Mauris lacinia lectus</a></h2>
								</div>
								<!-- /product name -->                 <!-- product description --> 
								<!-- visible only in row-view mode -->
								<div class="product__inside__description row-mode-visible"> Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </div>
								<!-- /product description -->                 <!-- product price -->
								<div class="product__inside__price price-box">$587.00</div>
								<!-- /product price -->                 <!-- product review --> 
								<!-- visible only in row-view mode -->
								<div class="product__inside__review row-mode-visible">
									<div class="rating row-mode-visible"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
									<a href="#">1 Review(s)</a> <a href="#">Add Your Review</a> 
								</div>
								<!-- /product review --> 
								<div class="product__inside__hover">
									<!-- product info -->
									<div class="product__inside__info">
										<ul class="options-swatch options-swatch--color">
											<li><a href="#"><span class="swatch-label"><img src="images/colors/blue.png"  alt=""/></span></a></li>
											<li><a href="#"><span class="swatch-label"><img src="images/colors/yellow.png"  alt=""/></span></a></li>
											<li><a href="#"><span class="swatch-label"><img src="images/colors/red.png"  alt=""/></span></a></li>
										</ul>
										<div class="product__inside__info__btns"> <a href="#" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
											<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
											<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
											<a href="#" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> Quick view</a> 
										</div>
										<ul class="product__inside__info__link hidden-xs">
											<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
											<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
										</ul>
									</div>
									<!-- /product info --> <!-- product rating -->
									<div class="rating row-mode-hide"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
									<!-- /product rating --> 
								</div>
							</div>
						</div>
						<!-- /product --> 
					</div>
					<!-- /product --> 
				</div>
			</div>
		</div>
		<!-- lookbook -->
		<div class="col-xl-4 visible-xl">
			<!-- title -->
			<div class="title-box">
				<h2 class="text-left text-uppercase title-under pull-left">LOOKBOOK</h2>
			</div>
			<!-- /title -->
			<a class="link-img-hover" href="lookbook.html"><img src="images/custom/lookbook.jpg" class="img-responsive" alt=""></a>
		</div>
		<!-- /lookbook -->
	</div>
</div>
</div>
<!-- news & sale products -->
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-xl-4">
				<!-- title -->
				<div class="title-with-button">
					<div class="carousel-products__button pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
					<h2 class="text-left text-uppercase title-under pull-left">New</h2>
				</div>
				<!-- /title --> 
				<!-- carousel -->
				<div class="carousel-products row" id="carouselNew">
					<div class="col-lg-3">
						<!-- product -->
						<div class="product">
							<div class="product__inside">
								<!-- product image -->
								<div class="product__inside__image">
									<a href="product.html"> <img src="images/product/product-9.jpg" alt=""> </a> 
									<!-- quick-view --> 
									<a href="#" data-toggle="modal" data-target="#quickViewModal" class="quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a> 
									<!-- /quick-view --> 
								</div>
								<!-- /product image --> 
								<!-- label news -->
								<div class="product__label product__label--right product__label--new"> <span>new</span> </div>
								<!-- /label news --> 
								<!-- product name -->
								<div class="product__inside__name">
									<h2><a href="product.html">Mauris lacinia lectus</a></h2>
								</div>
								<!-- /product name --> 
								<!-- product price -->
								<div class="product__inside__price price-box">$46.00</div>
								<!-- /product price --> 
								<div class="product__inside__hover">
									<!-- product info -->
									<div class="product__inside__info">
										<div class="product__inside__info__btns"> <a href="#" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
											<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
											<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
											<a href="#" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> Quick view</a> 
										</div>
										<ul class="product__inside__info__link hidden-xs">
											<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
											<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
										</ul>
									</div>
									<!-- /product info --> 
									<!-- product rating -->
									<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
									<!-- /product rating --> 
								</div>
							</div>
						</div>
						<!-- /product --> 
					</div>
					<div class="col-lg-3">
						<!-- product -->
						<div class="product">
							<div class="product__inside">
								<!-- product image -->
								<div class="product__inside__image">
									<a href="product.html"> <img src="images/product/product-10.jpg" alt=""> </a> 
									<!-- quick-view --> 
									<a href="#" data-toggle="modal" data-target="#quickViewModal" class="quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a> 
									<!-- /quick-view --> 
								</div>
								<!-- /product image --> 
								<!-- label news -->
								<div class="product__label product__label--right product__label--new"> <span>new</span> </div>
								<!-- /label news --> 
								<!-- product name -->
								<div class="product__inside__name">
									<h2><a href="product.html">Mauris lacinia lectus</a></h2>
								</div>
								<!-- /product name --> 
								<!-- product price -->
								<div class="product__inside__price price-box">$133.00</div>
								<!-- /product price --> 
								<div class="product__inside__hover">
									<!-- product info -->
									<div class="product__inside__info">
										<div class="product__inside__info__btns"> <a href="#" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
											<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
											<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
											<a href="#" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> Quick view</a> 
										</div>
										<ul class="product__inside__info__link hidden-xs">
											<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
											<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
										</ul>
									</div>
									<!-- /product info --> 
									<!-- product rating -->
									<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
									<!-- /product rating --> 
								</div>
							</div>
						</div>
						<!-- /product --> 
					</div>
					<div class="col-lg-3">
						<!-- product -->
						<div class="product">
							<div class="product__inside">
								<!-- product image -->
								<div class="product__inside__image">
									<a href="product.html"> <img src="images/product/product-9.jpg" alt=""> </a> 
									<!-- quick-view --> 
									<a href="#" data-toggle="modal" data-target="#quickViewModal" class="quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a> 
									<!-- /quick-view --> 
								</div>
								<!-- /product image --> 
								<!-- label news -->
								<div class="product__label product__label--right product__label--new"> <span>new</span> </div>
								<!-- /label news --> 
								<!-- product name -->
								<div class="product__inside__name">
									<h2><a href="product.html">Mauris lacinia lectus</a></h2>
								</div>
								<!-- /product name --> 
								<!-- product price -->
								<div class="product__inside__price price-box">$46.00</div>
								<!-- /product price --> 
								<div class="product__inside__hover">
									<!-- product info -->
									<div class="product__inside__info">
										<div class="product__inside__info__btns"> <a href="#" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
											<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
											<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
											<a href="#" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> Quick view</a> 
										</div>
										<ul class="product__inside__info__link hidden-xs">
											<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
											<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
										</ul>
									</div>
									<!-- /product info --> 
									<!-- product rating -->
									<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
									<!-- /product rating --> 
								</div>
							</div>
						</div>
						<!-- /product --> 
					</div>
					<div class="col-lg-3">
						<!-- product -->
						<div class="product">
							<div class="product__inside">
								<!-- product image -->
								<div class="product__inside__image">
									<a href="product.html"> <img src="images/product/product-10.jpg" alt=""> </a> 
									<!-- quick-view --> 
									<a href="#" data-toggle="modal" data-target="#quickViewModal" class="quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a> 
									<!-- /quick-view --> 
								</div>
								<!-- /product image --> 
								<!-- label news -->
								<div class="product__label product__label--right product__label--new"> <span>new</span> </div>
								<!-- /label news --> 
								<!-- product name -->
								<div class="product__inside__name">
									<h2><a href="product.html">Mauris lacinia lectus</a></h2>
								</div>
								<!-- /product name --> 
								<!-- product price -->
								<div class="product__inside__price price-box">$133.00</div>
								<!-- /product price --> 
								<div class="product__inside__hover">
									<!-- product info -->
									<div class="product__inside__info">
										<ul class="options-swatch options-swatch--color">
											<li><a href="#"><span class="swatch-label"><img src="images/colors/blue.png" width="10" height="10" alt=""/></span></a></li>
											<li><a href="#"><span class="swatch-label"><img src="images/colors/yellow.png" width="10" height="10" alt=""/></span></a></li>
											<li><a href="#"><span class="swatch-label"><img src="images/colors/red.png" width="10" height="10" alt=""/></span></a></li>
										</ul>
										<div  class="product__inside__info__btns"> <a href="#" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
											<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
											<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
											<a href="#" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> Quick view</a> 
										</div>
										<ul class="product__inside__info__link hidden-xs">
											<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
											<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
										</ul>
									</div>
									<!-- /product info --> 
									<!-- product rating -->
									<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
									<!-- /product rating --> 
								</div>
							</div>
						</div>
						<!-- /product --> 
					</div>
				</div>
				<!-- /carousel --> 
			</div>
			<!-- promo -->
			<div class="col-xl-4 visible-xl">
				<!-- title -->
				<div class="title-box">
					<h2 class="text-left text-uppercase title-under pull-left">PROMOS</h2>
				</div>
				<!-- /title -->
				<div class="text-center promos">
					<div class="promos__image">
						<a href="lookbook.html" class="link-img-hover">
							<img src="images/custom/promos.jpg" class="img-responsive" alt="">
							<span class="promos__label">-20%</span>
						</a>
					</div>
					<h2><a href="lookbook.html">Mauris lacinia lectus</a></h2>
					Dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet, nunc. Ut sit amet turpis.
				</div>
			</div>
			<!-- /promo -->						
			<div class="col-sm-12 col-md-6 col-xl-4">
				<div class="divider--lg visible-sm visible-xs"></div>
				<!-- title -->
				<div class="title-with-button">
					<div class="carousel-products__button pull-right"> <span class="btn-prev"></span> <span class="btn-next"></span> </div>
					<h2 class="text-left text-uppercase title-under pull-left">On Sale</h2>
				</div>
				<!-- /title --> 
				<!-- carousel -->
				<div class="carousel-products row" id="carouselSale">
					<div class="col-lg-3">
						<!-- product -->
						<div class="product">
							<div class="product__inside">
								<!-- product image -->
								<div class="product__inside__image">
									<a href="product.html"> <img src="images/product/product-11.jpg" alt=""> </a> 
									<!-- quick-view --> 
									<a href="#" data-toggle="modal" data-target="#quickViewModal" class="quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a> 
									<!-- /quick-view --> 
								</div>
								<!-- /product image --> 
								<!-- label sale -->
								<div class="product__label product__label--left product__label--sale"> <span>Sale<br>
								-20%</span> 
							</div>
							<!-- /label sale --> 
							<!-- product name -->
							<div class="product__inside__name">
								<h2><a href="product.html">Mauris lacinia lectus</a></h2>
							</div>
							<!-- /product name --> 
							<!-- product price -->
							<div class="product__inside__price price-box">$26.00<span class="price-box__old">$28.00</span></div>
							<!-- /product price --> 
							<div class="product__inside__hover">
								<!-- product info -->
								<div class="product__inside__info">
									<ul class="options-swatch options-swatch--color">
										<li><a href="#"><span class="swatch-label"><img src="images/colors/blue.png" width="10" height="10" alt=""/></span></a></li>
										<li><a href="#"><span class="swatch-label"><img src="images/colors/yellow.png" width="10" height="10" alt=""/></span></a></li>
									</ul>
									<div  class="product__inside__info__btns"> <a href="#" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
										<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
										<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
										<a href="#" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> Quick view</a> 
									</div>
									<ul class="product__inside__info__link hidden-xs">
										<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
										<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
									</ul>
								</div>
								<!-- /product info --> 
								<!-- product rating -->
								<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
								<!-- /product rating --> 
							</div>
						</div>
					</div>
					<!-- /product --> 
				</div>
				<div class="col-lg-3">
					<!-- product -->
					<div class="product">
						<div class="product__inside">
							<!-- product image -->
							<div class="product__inside__image">
								<a href="product.html"> <img src="images/product/product-12.jpg" alt=""> </a> 
								<!-- quick-view --> 
								<a href="#" data-toggle="modal" data-target="#quickViewModal" class="quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a>  
								<!-- /quick-view --> 
							</div>
							<!-- /product image --> 
							<!-- label sale -->
							<div class="product__label product__label--left product__label--sale"> <span>Sale<br>
							-20%</span> 
						</div>
						<!-- /label sale --> 
						<!-- product name -->
						<div class="product__inside__name">
							<h2><a href="product.html">Mauris lacinia lectus</a></h2>
						</div>
						<!-- /product name --> 
						<!-- product price -->
						<div class="product__inside__price price-box">$77.00<span class="price-box__old">$97.00</span></div>
						<!-- /product price --> 
						<div class="product__inside__hover">
							<!-- product info -->
							<div class="product__inside__info">
								<div class="product__inside__info__btns"> <a href="#" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
									<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
									<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
									<a href="#" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> Quick view</a> 
								</div>
								<ul class="product__inside__info__link hidden-xs">
									<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
									<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
								</ul>
							</div>
							<!-- /product info --> 
							<!-- product rating -->
							<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
							<!-- /product rating --> 
						</div>
					</div>
				</div>
				<!-- /product --> 
			</div>
			<div class="col-lg-3">
				<!-- product -->
				<div class="product">
					<div class="product__inside">
						<!-- product image -->
						<div class="product__inside__image">
							<a href="product.html"> <img src="images/product/product-11.jpg" alt=""> </a> 
							<!-- quick-view --> 
							<a href="#" data-toggle="modal" data-target="#quickViewModal" class="quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a> 
							<!-- /quick-view --> 
						</div>
						<!-- /product image --> 
						<!-- label sale -->
						<div class="product__label product__label--left product__label--sale"> <span>Sale<br>
						-20%</span> 
					</div>
					<!-- /label sale --> 
					<!-- product name -->
					<div class="product__inside__name">
						<h2><a href="product.html">Mauris lacinia lectus</a></h2>
					</div>
					<!-- /product name --> 
					<!-- product price -->
					<div class="product__inside__price price-box">$26.00<span class="price-box__old">$28.00</span></div>
					<!-- /product price -->
					<div class="product__inside__hover">
						<!-- product info -->
						<div class="product__inside__info">
							<div class="product__inside__info__btns"> <a href="#" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
								<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
								<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
								<a href="#" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> Quick view</a> 
							</div>
							<ul class="product__inside__info__link hidden-xs">
								<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
								<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
							</ul>
						</div>
						<!-- /product info --> 
						<!-- product rating -->
						<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
						<!-- /product rating --> 
					</div>
				</div>
			</div>
			<!-- /product --> 
		</div>
		<div class="col-lg-3">
			<!-- product -->
			<div class="product">
				<div class="product__inside">
					<!-- product image -->
					<div class="product__inside__image">
						<a href="product.html"> <img src="images/product/product-12.jpg" alt=""> </a> 
						<!-- quick-view --> 
						<a href="#" data-toggle="modal" data-target="#quickViewModal" class="quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a>  
						<!-- /quick-view --> 
					</div>
					<!-- /product image --> 
					<!-- label sale -->
					<div class="product__label product__label--left product__label--sale"> <span>Sale<br>
					-20%</span> 
				</div>
				<!-- /label sale --> 
				<!-- product name -->
				<div class="product__inside__name">
					<h2><a href="product.html">Mauris lacinia lectus</a></h2>
				</div>
				<!-- /product name --> 
				<!-- product price -->
				<div class="product__inside__price price-box">$77.00<span class="price-box__old">$97.00</span></div>
				<!-- /product price -->
				<div class="product__inside__hover">
					<!-- product info -->
					<div class="product__inside__info">
						<div class="product__inside__info__btns"> <a href="#" class="btn btn--ys btn--xl"><span class="icon icon-shopping_basket"></span> Add to cart</a>
							<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-favorite_border"></span></a>
							<a href="#" class="btn btn--ys btn--xl visible-xs"><span class="icon icon-sort"></span></a>
							<a href="#" class="btn btn--ys btn--xl  row-mode-visible hidden-xs"><span class="icon icon-visibility"></span> Quick view</a> 
						</div>
						<ul class="product__inside__info__link hidden-xs">
							<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
							<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#" class="compare-link"><span class="text">Add to compare</span></a></li>
						</ul>
					</div>
					<!-- /product info --> 
					<!-- product rating -->
					<div class="rating"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
					<!-- /product rating --> 
				</div>
			</div>
		</div>
		<!-- /product --> 
	</div>
</div>
<!-- /carousel --> 
</div>
</div>
</div>
</div>
<!-- /news & sale products -->
@include('shop.layouts.brands')
</div>
<!-- End CONTENT section -->
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
<!-- Modal (quickViewModal) -->		
<div class="modal  modal--bg fade"  id="quickViewModal">
	<div class="modal-dialog white-modal">
		<div class="modal-content container">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
			</div>
			<!--  -->
			<div class="product-popup">
				<div class="product-popup-content">
					<div class="container-fluid">
						<div class="row product-info-outer">
							<div class="col-xs-12 col-sm-5 col-md-6 col-lg-6">
								<div class="product-main-image">
									<div class="product-main-image__item"><img src='images/product/product-big-1.jpg' alt="" /></div>
								</div>
							</div>
							<div class="product-info col-xs-12 col-sm-7 col-md-6 col-lg-6">
								<div class="wrapper">
									<div class="product-info__sku pull-left">SKU: <strong>mtk012c</strong></div>
									<div class="product-info__availabilitu pull-right">Availability:   <strong class="color">In Stock</strong></div>
								</div>
								<div class="product-info__title">
									<h2>Lorem ipsum dolor sit ctetur</h2>
								</div>
								<div class="price-box product-info__price"><span class="price-box__new">$65.00</span> <span class="price-box__old">$84.00</span></div>
								<div class="divider divider--xs product-info__divider"></div>
								<div class="product-info__description">
									<div class="product-info__description__brand"><img src="images/custom/brand.png" alt=""> </div>
									<div class="product-info__description__text">Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
								</div>
								<div class="divider divider--xs product-info__divider"></div>
								<div class="wrapper">
									<div class="pull-left"><span class="option-label">COLOR:</span>  Red + $10.00 *</div>
									<div class="pull-right required">* Required Fields</div>
								</div>
								<ul class="options-swatch options-swatch--color options-swatch--lg">
									<li><a href="#"><span class="swatch-label"><img src="images/colors/oldlace.png" alt=""/></span></a></li>
									<li><a href="#"><span class="swatch-label"><img src="images/colors/dark-grey.png" alt=""/></span></a></li>
									<li><a href="#"><span class="swatch-label"><img src="images/colors/grey.png" alt=""/></span></a></li>
									<li><a href="#"><span class="swatch-label"><img src="images/colors/light-grey.png" alt=""/></span></a></li>
								</ul>
								<div class="wrapper">
									<div class="pull-left"><span class="option-label">SIZE:</span></div>
									<div class="pull-left required">*</div>
								</div>
								<ul class="options-swatch options-swatch--size options-swatch--lg">
									<li><a href="#">S</a></li>
									<li><a href="#">M</a></li>
									<li><a href="#">L</a></li>
									<li><a href="#">XL</a></li>
									<li><a href="#">2XL</a></li>
									<li><a href="#">3XL</a></li>
								</ul>
								<div class="divider divider--sm"></div>
								<div class="wrapper">
									<div class="pull-left"><span class="qty-label">QTY:</span></div>
									<div class="pull-left"><input type="text" name="quantity" class="input--ys qty-input pull-left" value="1"></div>
									<div class="pull-left"><button type="submit" class="btn btn--ys btn--xxl"><span class="icon icon-shopping_basket"></span> Add to cart</button></div>
								</div>
								<ul class="product-link">
									<li class="text-right"><span class="icon icon-favorite_border  tooltip-link"></span><a href="#"><span class="text">Add to wishlist</span></a></li>
									<li class="text-left"><span class="icon icon-sort  tooltip-link"></span><a href="#"><span class="text">Add to compare</span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- / -->
		</div>
	</div>
</div>
<!-- / Modal (quickViewModal) -->
<!--================== /modal ==================-->
<!-- jQuery 1.10.1--> 
<script src="external/jquery/jquery-2.1.4.min.js"></script> 
<!-- Bootstrap 3--> 
<script src="external/bootstrap/bootstrap.min.js"></script> 
<!-- Specific Page External Plugins --> 
<script src="external/slick/slick.min.js"></script>
<script src="external/bootstrap-select/bootstrap-select.min.js"></script>  
<script src="external/countdown/jquery.plugin.min.js"></script> 
<script src="external/countdown/jquery.countdown.min.js"></script>  		
<script src="external/instafeed/instafeed.min.js"></script>  		
<script src="external/magnific-popup/jquery.magnific-popup.min.js"></script>  		
<script src="external/isotope/isotope.pkgd.min.js"></script> 
<script src="external/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="external/colorbox/jquery.colorbox-min.js"></script>
<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="external/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script type="text/javascript" src="external/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<!-- Custom --> 
<script src="js/custom.js"></script>			
<script src="js/js-index-01.js"></script>		
</body>
</html>