<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="UTF-8" />
        <!--[if IE
            ]><meta http-equiv="X-UA-Compatible" content="IE=edge"
        /><![endif]-->
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="https://img.icons8.com/cute-clipart/64/000000/shop.png" rel="shortcut icon" />
        <title>
            Bouki Store
        </title>
        @yield('extra-script')

        <!--====== Google Font ======-->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800"
            rel="stylesheet"
        />

		<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<!--====== Vendor Css ======-->
<link rel="stylesheet" href="{{ asset('css/vendor.css') }}" />
        <!--====== Utility-Spacing ======-->
        <link rel="stylesheet" href="{{ asset('css/utility.css') }}" />

        <!--====== App ======-->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/newstyle.css') }}" />
    </head>
    <body class="config">
        <div class="preloader is-active">
            <div class="preloader__wrap">
                <img class="preloader__img" src="images/preloader.png" alt="" />
            </div>
        </div>

        <!--====== Main App ======-->
        <div id="app">
            <!--====== Main Header ======-->
            <header class="header--style-1">
                <!--====== Nav 1 ======-->
                <nav class="primary-nav primary-nav-wrapper--border">
                    <div class="container">
                        <!--====== Primary Nav ======-->
                        <div class="primary-nav">
                            <!--====== Main Logo ======-->

                            <a class="main-logo" href="{{ Route('home')}}">
                                <img src="images/logo/boukishopc.png" alt=""
                            /></a>
                            <!--====== End - Main Logo ======-->

                            <!--====== Search Form ======-->
                            <form action="{{Route('items_cats')}}" method="POST" class="main-form" style="display: inline-flex" >
                                @csrf
                                <label for="main-search"></label>

                                <input
                                    class="input-text input-text--border-radius input-text--style-1"
                                    type="text"
                                    id="main-search"
                                    name="search"
                                    placeholder="Search"
                                   
                                    @isset(request()->search)
                                    value="{{request()->search}}"                                      
                                    @endisset


                                />

                                <button
                                    class="btn btn--icon fas fa-search main-search-button"
                                    type="submit"
                                ></button>
                            </form>
                            <!--====== End - Search Form ======-->

                            <!--====== Dropdown Main plugin ======-->
                            <div class="menu-init" id="navigation">
                                <button
                                    class="btn btn--icon toggle-button toggle-button--secondary fas fa-cogs"
                                    type="button"
                                ></button>

                                <!--====== Menu ======-->
                                <div class="ah-lg-mode">
                                    <span class="ah-close">✕ Close</span>

                                    <!--====== List ======-->
                                    <ul
                                        class="ah-list ah-list--design1 ah-list--link-color-secondary"
                                    >
                                        <li
                                            class="has-dropdown"
                                            data-tooltip="tooltip"
                                            data-placement="left"
                                            title="Account"
                                        >
                                            <a
                                                ><i
                                                    class="far fa-user-circle"
                                                ></i
                                            ></a>

                                            <!--====== Dropdown ======-->

                                            <span class="js-menu-toggle"></span>
                                            <ul style="width: 120px">
                                                <li>
                                                    <a href="{{Route('myaccount')}}"
                                                        ><i
                                                            class="fas fa-user-circle u-s-m-r-6"
                                                        ></i>

                                                        <span>
                                                            @auth
                                                             {{explode(" ",Auth::user()->name)[0]}}
                                                            @endauth
                                                            @guest
                                                                Account
                                                            @endguest
                                                        </span></a
                                                    >
                                                </li>
                                                @guest
                                                <li>
                                                    <a href="{{Route('register')}}"
                                                        ><i
                                                            class="fas fa-user-plus u-s-m-r-6"
                                                        ></i>

                                                        <span>Signup</span></a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="{{Route('login')}}" 
                                                        ><i
                                                            class="fas fa-lock u-s-m-r-6"
                                                        ></i>

                                                        <span>Signin</span></a
                                                    >
                                                </li>
                                                @endguest
                                               @auth
                                               <li>
                                                   <form action="{{Route('logout')}}" method="POST">
                                                       @csrf
                                                       <a style="display: block;
                                                       padding: 8px 20px;
                                                       color: #333333;
                                                       font-size: 12px;
                                                       font-weight: 600;"  onclick="$(this).closest('form').submit();"
                                                       ><i
                                                           class="fas fa-lock-open u-s-m-r-6"
                                                       ></i>
   
                                                       <span>Signout</span></a
                                                   >
                                                   </form>
                                               
                                            </li>
                                               @endauth
                                               
                                            </ul>
                                            <!--====== End - Dropdown ======-->
                                        </li>
                                      
                                        <li
                                            data-tooltip="tooltip"
                                            data-placement="left"
                                            title="Contact"
                                        >
                                            <a href="tel:+212706363231"
                                                ><i
                                                    class="fas fa-phone-volume"
                                                ></i
                                            ></a>
                                        </li>
                                        <li
                                            data-tooltip="tooltip"
                                            data-placement="left"
                                            title="Mail"
                                        >
                                            <a href="mailto:ensah@gmail.com"
                                                ><i class="far fa-envelope"></i
                                            ></a>
                                        </li>
                                    </ul>
                                    <!--====== End - List ======-->
                                </div>
                                <!--====== End - Menu ======-->
                            </div>
                            <!--====== End - Dropdown Main plugin ======-->
                        </div>
                        <!--====== End - Primary Nav ======-->
                    </div>
                </nav>
                <!--====== End - Nav 1 ======-->
                
                <!--====== Nav 2 ======-->
                <nav class="secondary-nav-wrapper">
                    <div class="container">
                        <!--====== Secondary Nav ======-->
                        <div class="secondary-nav">
                            <!--====== Dropdown Main plugin ======-->
                            <div class="menu-init" id="navigation2">
                                <button
                                    class="btn btn--icon toggle-button toggle-button--secondary fas fa-cog"
                                    type="button"
                                ></button>

                                <!--====== Menu ======-->
                                <div class="ah-lg-mode">
                                    <span class="ah-close">✕ Close</span>

                                    <!--====== List ======-->
                                    <ul
                                        class="ah-list ah-list--design2 ah-list--link-color-secondary"
                                    >
                                        <li>
                                            <a href="{{ Route('home')}}"
                                                >HOME</a
                                            >
                                        </li>
                                        <li class="has-dropdown">
                                            <a 
                                                >PAGES<i
                                                    class="fas fa-angle-down u-s-m-l-6"
                                                ></i
                                            ></a>

                                            <!--====== Dropdown ======-->

                                            <span class="js-menu-toggle"></span>
                                            <ul style="width: 170px">
                                                <li
                                                    class="has-dropdown has-dropdown--ul-left-100"
                                                >
                                                    <a href="{{ Route('home')}}"
                                                        >Home
                                                    </a>

                                                </li>
                                                <li
                                                    class="has-dropdown has-dropdown--ul-left-100"
                                                >
                                                    <a  href="{{Route('myaccount')}}"
                                                        >Account</a>
                                                 
                                                </li>
                                              

                                                <li>
                                                    <a href="{{Route('cart')}}">Cart</a>
                                                </li>
                                               
                                                <li>
                                                    <a href="{{Route('checkout')}}"
                                                        >Checkout</a
                                                    >
                                                </li>
                                               
                                                <li>
                                                    <a href="{{Route('about')}}"
                                                        >About us</a
                                                    >
                                                </li>
                                                <li>
                                                    <a href="{{Route('contact')}}"
                                                        >Contact</a
                                                    >
                                                </li>     
                                                <li>
                                                    <a href="{{Route('faq')}}">FAQ</a>
                                                </li>                                     
                                            </ul>
                                            <!--====== End - Dropdown ======-->
                                        </li>                                    
                                        <li class="has-dropdown">
                                            <a
                                                >Categories<i
                                                    class="fas fa-angle-down u-s-m-l-6"
                                                ></i
                                            ></a>

                                            <!--====== Dropdown ======-->
                                            

                                            <span class="js-menu-toggle"></span>
                                            <ul style="width: 170px">
                                               
                                                    @foreach ( App\Models\Category::get() as $cat)
                                                    <li>
                                                        <a  href="{{Route('items_cats',
                                                        ['id_cat' =>$cat->id
                                                        ])}}"
                                                            >{{$cat->name}}</a
                                                        >
                                                    </li>
                                                    @endforeach
                                               
                                               
                                             
                                            </ul>
                                            <!--====== End - Dropdown ======-->
                                        </li>                                    
                                        
                                        <li>
                                            <a   href="{{Route('items_cats',
                                            ['best_offers' =>1
                                            ])}}"
                                                >BEST OFFERS</a
                                            >
                                        </li>                                                                          
                                    </ul>
                                    <!--====== End - List ======-->
                                </div>
                                <!--====== End - Menu ======-->
                            </div>
                            <!--====== End - Dropdown Main plugin ======-->

                            <!--====== Dropdown Main plugin ======-->
                            <div class="menu-init" id="navigation3">
                                <button
                                    class="btn btn--icon toggle-button toggle-button--secondary fas fa-shopping-bag toggle-button-shop"
                                    type="button"
                                ></button>

                                <span class="total-item-round">2</span>

                                <!--====== Menu ======-->
                                <div class="ah-lg-mode">
                                    <span class="ah-close">✕ Close</span>

                                    <!--====== List ======-->
                                    <ul
                                        class="ah-list ah-list--design1 ah-list--link-color-secondary"
                                    >
                                        <li>
                                            <a href="{{Route('home')}}"
                                                ><i
                                                    class="fas fa-home u-c-brand"
                                                ></i
                                            ></a>
                                        </li>
                                       
                                        <li class="has-dropdown">
                                            <a
                                            href="{{Route('cart')}}"
                                            class="mini-cart-shop-link"
                                                ><i
                                                    class="fas fa-shopping-bag"
                                                ></i>

                                                <span class="total-item-round"
                                                    >{{Cart::count()}}</span
                                                ></a
                                            >

                                        </li>
                                    </ul>
                                    <!--====== End - List ======-->
                                </div>
                                <!--====== End - Menu ======-->
                            </div>
                            <!--====== End - Dropdown Main plugin ======-->
                        </div>
                        <!--====== End - Secondary Nav ======-->
                    </div>
                </nav>
                <!--====== End - Nav 2 ======-->
            </header>

            <!-- Start Payment success -->
            @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <p>{{ Session::get('success') }}</p>
            </div>
            @endif
            <!-- End Payment success -->

            <!--====== End - Main Header ======-->
            @section('brodcump')
         <!--====== Section 1 ======-->
               <div class="u-s-p-y-60 py-3">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">

                                <a href="{{ Route('home')}}">Home</a></li>
                            <li class="is-marked">

                                <a > @yield('title') </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
             </div>
    <!--====== End - Section 1 ======-->
            @show
            <!--====== App Content ======-->

         
            
			<div class="app-content">
				@yield('content')
			</div>
            <!--====== End - App Content ======-->

            <!--====== Main Footer ======-->
            <footer>
                <div class="outer-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <div class="outer-footer__content u-s-m-b-40">
                                    <span class="outer-footer__content-title"
                                        >Contact Us</span
                                    >
                                    <div class="outer-footer__text-wrap">
                                        <i class="fas fa-home"></i>

                                        <span
                                            >N28 Centre Ait Yossaf Imzouren
                                            62550 MAROC</span
                                        >
                                    </div>
                                    <div class="outer-footer__text-wrap">
                                        <i class="fas fa-phone-volume"></i>

                                        <span>(+212) 706 1 234</span>
                                    </div>
                                    <div class="outer-footer__text-wrap">
                                        <i class="far fa-envelope"></i>

                                        <span>Ensah@gmail.com</span>
                                    </div>
                                    <div class="outer-footer__social">
                                        <ul>
                                            <li>
                                                <a
                                                    class="s-fb--color-hover"
                                                    href="#"
                                                    ><i
                                                        class="fab fa-facebook-f"
                                                    ></i
                                                ></a>
                                            </li>
                                            <li>
                                                <a
                                                    class="s-tw--color-hover"
                                                    href="#"
                                                    ><i
                                                        class="fab fa-twitter"
                                                    ></i
                                                ></a>
                                            </li>
                                            <li>
                                                <a
                                                    class="s-youtube--color-hover"
                                                    href="#"
                                                    ><i
                                                        class="fab fa-youtube"
                                                    ></i
                                                ></a>
                                            </li>
                                            <li>
                                                <a
                                                    class="s-insta--color-hover"
                                                    href="#"
                                                    ><i
                                                        class="fab fa-instagram"
                                                    ></i
                                                ></a>
                                            </li>
                                            <li>
                                                <a
                                                    class="s-gplus--color-hover"
                                                    href="#"
                                                    ><i
                                                        class="fab fa-google-plus-g"
                                                    ></i
                                                ></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div
                                            class="outer-footer__content u-s-m-b-40"
                                        >
                                            <span
                                                class="outer-footer__content-title"
                                                >Information</span
                                            >
                                            <div
                                                class="outer-footer__list-wrap"
                                            >
                                                <ul>
                                                    <li>
                                                        <a href="{{Route('myaccount')}}"
                                                            >Account</a
                                                        >
                                                    </li> 
                                                    <li>
                                                        <a href="{{Route('cart')}}"
                                                            >Cart</a
                                                        >
                                                    </li>                                                                                                   
                                                    <li>
                                                        <a
                                                            href="{{Route('items_cats')}}"
                                                            >Shop</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div
                                            class="outer-footer__content u-s-m-b-40"
                                        >
                                            <div
                                                class="outer-footer__list-wrap"
                                            >
                                                <span
                                                    class="outer-footer__content-title"
                                                    >Our Company</span
                                                >
                                                <ul>
                                                    <li>
                                                        <a href="{{Route('about')}}"
                                                            >About us</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a href="{{Route('contact')}}"
                                                            >Contact Us</a
                                                        >
                                                    </li>                                             
                                                    <li>
                                                        <a
                                                            href="{{Route('orders')}}"
                                                            >Delivery</a
                                                        >
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="{{Route('items_cats')}}"
                                                            >Store</a
                                                        >
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lower-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="lower-footer__content">
                                    <div class="lower-footer__copyright">
                                        <span>Copyright © 2021</span>

                                        <a href="{{Route('home')}}">BoukiShop</a>

                                        <span>All Right Reserved</span>
                                    </div>
                                    <div class="lower-footer__payment">
                                        <ul>
                                            <li>
                                                <i class="fab fa-cc-stripe"></i>
                                            </li>
                                            <li>
                                                <i class="fab fa-cc-paypal"></i>
                                            </li>
                                            <li>
                                                <i
                                                    class="fab fa-cc-mastercard"
                                                ></i>
                                            </li>
                                            <li>
                                                <i class="fab fa-cc-visa"></i>
                                            </li>
                                            <li>
                                                <i
                                                    class="fab fa-cc-discover"
                                                ></i>
                                            </li>
                                            <li>
                                                <i class="fab fa-cc-amex"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <!--====== Modal Section ======-->


          
        </div>
        <!--====== End - Main App ======-->

        <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->

        @yield('extra-js')
        <script>
            window.ga = function () {
                ga.q.push(arguments);
            };
            ga.q = [];
            ga.l = +new Date();
            ga("create", "UA-XXXXX-Y", "auto");
            ga("send", "pageview");
        </script>
        <script
            src="https://www.google-analytics.com/analytics.js"
            async
            defer
        ></script>
       
        @yield('special_script')

        <!--====== Vendor Js ======-->
        <script src="{{ asset('js/vendor.js') }}"></script>
    	<!-- Jquery -->
      
  
     	<!-- Popper JS -->
    	<script src="{{ asset('js/popper.min.js') }}"></script>
       
     	<!-- Bootstrap JS -->
    	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!--====== jQuery Shopnav plugin ======-->
        <script src="{{ asset('js/jquery.shopnav.js') }}"></script>

        <!--====== App ======-->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/my_script.js') }}"></script>

        <!--====== Noscript ======-->
        <noscript>
            <div class="app-setting">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="app-setting__wrap">
                                <h1 class="app-setting__h1">
                                    JavaScript is disabled in your browser.
                                </h1>

                                <span class="app-setting__text"
                                    >Please enable JavaScript in your browser or
                                    upgrade to a JavaScript-capable
                                    browser.</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </noscript>
    </body>
</html>
