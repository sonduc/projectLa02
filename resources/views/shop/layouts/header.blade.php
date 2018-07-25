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
									<li class="dropdown dropdown-mega-menu">
										<span class="dropdown-toggle extra-arrow"></span>
										<a href="product.html" class="dropdown-toggle" data-toggle="dropdown"><span class="act-underline">PRODUCT</span></a>
									</li>									
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