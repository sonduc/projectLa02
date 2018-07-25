@extends('shop.layouts.index')
@section('content')
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
            @foreach ($slide as $value)
            <!-- SLIDE -1 -->
            <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
               <!-- MAIN IMAGE --> 
               {{-- <img src="images/slides/slide-1.jpg"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" > --}}
               <img src="http://projectla02.com/upload/slide/{{$value->image}}"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" > 
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
                  <div class="tp-caption1--wd-3">{{$value->name}}</div>
                  <a href="listing.html" class="link-button button--border-thick" data-text="Shop now!">Shop now!</a>
               </div>
            </li>
            <!-- /SLIDE -1 -->
            @endforeach
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
               @foreach ($products as $product)				
               <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 col-xl-3">
                  <!-- product -->
                  <div class="product product--zoom">
                     <div class="product__inside">
                        <!-- product image -->
                        <div class="product__inside__image" idImage="{{$product->id}}">
                           <a href="#">
                           <img class="editImage"  src="{{ asset('storage').'/' . $product->images}}" >
                           </a>											 											
                           <!-- quick-view --> 
                           <a href="#" data-toggle="modal"   data-target="#quickViewModal" class="quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a> 
                           <!-- /quick-view --> 
                        </div>
                        <!-- /product image --> 
                        <!-- product name -->
                        <div class="product__inside__name">
                           <h2><a href="http://projectla02.com/shop/product/{{ $product->id }}">{{ $product->name }}</a></h2>
                        </div>
                        <!-- /product name --> 
                        <!-- product price -->
                        <div class="product__inside__price price-box">{{ number_format($product->promotion_price) }} VNĐ</div>
                        <!-- /product price -->
                        <div class="product__inside__hover">
                           <!-- product rating -->
                           <div class="rating row-mode-hide"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
                           <!-- /product rating --> 
                        </div>
                     </div>
                  </div>
                  <!-- /product --> 
               </div>
               @endforeach
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
                           <div class="product-main-image__item" id="addImage">
                              {{-- <img src='images/product/product-big-1.jpg' alt="" /> --}}
                           </div>
                        </div>
                     </div>
                     <div class="product-info col-xs-12 col-sm-7 col-md-6 col-lg-6">
                        <div class="wrapper">
                           <div class="product-info__sku pull-left">CODE: <strong id="codeProduct"></strong></div>
                           <div class="product-info__availabilitu pull-right">Availability:   <strong class="color">In Stock</strong></div>
                        </div>
                        <div class="product-info__title">
                           <h2 id="nameProduct"></h2>
                        </div>
                        <div class="price-box product-info__price">
                           <span id="promotionPrice" class="price-box__new">$65.00</span>
                           <span id="unitPrice"  class="price-box__old">$84.00</span>
                        </div>
                        <div class="divider divider--xs product-info__divider"></div>
                        <div class="product-info__description">
                           {{-- 
                           <div class="product-info__description__brand"><img src="images/custom/brand.png" alt=""> </div>
                           --}}
                           <div class="product-info__description__text" id="descriptionProduct"></div>
                        </div>
                        <div class="divider divider--xs product-info__divider"></div>
                        <div class="wrapper">
                           <div class="pull-left">
                              <span style="float:left;" class="option-label">COLOR:</span> 
                              <p id="nameColor"></p>
                           </div>
                           <div class="pull-right required">* Required Fields</div>
                        </div>
                        <ul style="margin-top: -25px" class="options-swatch options-swatch--color options-swatch--lg">
                           <div id="colorProduct"></div>
                        </ul>
                        <div id="chuSize" class="wrapper">
                           <div class="pull-left"><span class="option-label">SIZE:</span></div>
                           <div class="pull-left required">*</div>
                        </div>
                        <ul style="float: left;margin-top: 10px" class="options-swatch options-swatch--size options-swatch--lg">
                           <li>
                              <p id="sizeProduct">S</p>
                           </li>
                        </ul>
                        <div class="divider divider--sm"></div>
                        <div style="margin-top: -40px" class="wrapper">
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
</div>
@endsection
@section('script')
<script src="{{ asset('shop_asset/js/js-home.js') }}"></script>
@endsection