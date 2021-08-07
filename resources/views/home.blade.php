@extends('layouts.template')

@section('content')
<div class="container">
    @section('brodcump')
    @endsection


        <!--====== Section 1 ======-->

        <!--====== Electronic Category ======-->
        <div class="u-s-p-y-60" id="electronic-01">
            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="block">
                                <span class="block__title"
                                    >TOP CATEGORY</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        @foreach ($cats as $cat)
                        <div
                            class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30"
                        >                                                             
                            <div class="category-o">
                                <div
                                    class="aspect aspect--bg-grey aspect--square category-o__img-wrap"
                                >
                                    <img
                                        class="aspect__img category-o__img"
                                        src="{{$cat->image}}"
                                        alt=""
                                    />
                                </div>
                                <div class="category-o__info">
                                    <a
                                        class="category-o__shop-now btn--e-white-brand"
                                        href="{{Route('items_cats',
                                        ['id_cat' =>$cat->id
                                        ])}}"
                                        >{{$cat->name}}</a
                                    >
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>

        <!--====== Electronic Category ======-->
        <!--====== End - Section 1 ======-->
        <!--====== Section 2 ======-->

        <!--====== End - Section 2 ======-->
        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">
            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-16">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1
                                    class="section__heading u-c-secondary u-s-m-b-12"
                                >
                                    TOP TRENDING
                                </h1>

                                <span class="section__span u-c-silver"
                                    >CHOOSE CATEGORY</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="filter-category-container">
                                <div class="filter__category-wrapper">
                                    <button
                                        class="btn filter__btn filter__btn--style-1 js-checked"
                                        type="button"
                                        data-filter="*"
                                    >
                                        ALL
                                    </button>
                                </div>
                                @foreach ($cats as $cat)
                                <div class="filter__category-wrapper">
                                    <button
                                        class="btn filter__btn filter__btn--style-1"
                                        type="button"
                                        data-filter=".{{$cat->name}}"
                                    >
                                      
                                         {{$cat->name}} 
                                      
                                    </button>
                                </div>
                                @endforeach
                               
                               
                            </div>
                            <div
                                class="filter__grid-wrapper u-s-m-t-30"
                            >
                            <div class="row">

                         @foreach ($products as $product)
                         <div
                         class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item {{$product->Category->name}}">
                         <div
                             class="product-o product-o--hover-on product-o--radius"
                         >
                             <div
                                 class="product-o__wrap"
                             >
                                 <a
                                     class="aspect aspect--bg-grey aspect--square u-d-block"
                                     href="{{Route('product', $product->id)}}"
                                 >
                                     <img
                                         class="aspect__img"
                                         src="{{$product->image}}"
                                         alt=""
                                 /></a>
                                 <div
                                     class="product-o__action-wrap"
                                 >
                                     <ul
                                         class="product-o__action-list"
                                     >
                                         <li>
                                             <a
                                                 data-modal="modal"
                                                 data-modal-id="#quick-look{{$product->id}}"
                                                 data-tooltip="tooltip"
                                                 data-placement="top"
                                                 title="Quick View"
                                                 ><i
                                                     class="fas fa-search-plus"
                                                 ></i
                                             ></a>
                                         </li>
                                         <li>
                                             <form action="{{Route('cart-store')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$product->id}}">
                                               
                                             <a
                                             data-modal="modal"
                                             data-tooltip="tooltip"
                                             data-placement="top"
                                             title="Add to Cart"
                                             class="add_to_cart_form"
                                             onclick="$(this).closest('form').submit();"
                                             ><i
                                                 class="fas fa-plus-circle"
                                             ></i
                                         ></a>
                                            </form>
                                           
                                         </li>
                                       
                                        
                                     </ul>
                                 </div>
                             </div>

                             <span
                                 class="product-o__category"
                             >
                                 <a
                                 href="{{Route('items_cats',
                                 ['id_cat' =>$cat->id
                                 ])}}"
                                     >{{ $product->Category->name}}</a
                                 ></span
                             >

                             <span
                                 class="product-o__name"
                             >
                                 <a
                                     href="{{Route('product', $product->id)}}"
                                     >{{ $product->title }}</a
                                 ></span
                             >
                             <div
                                 class="product-o__rating gl-rating-style"
                             >
                                 <i
                                     class="fas fa-star"
                                 ></i
                                 ><i
                                     class="fas fa-star"
                                 ></i
                                 ><i
                                     class="fas fa-star"
                                 ></i
                                 ><i
                                     class="fas fa-star"
                                 ></i
                                 ><i
                                     class="fas fa-star-half-alt"
                                 ></i>

                             </div>

                             <span
                                 class="product-o__price"
                                 >{{ getPrice($product->price) }}

                                 <span
                                     class="product-o__discount"
                                     >{{getPrice($product->last_price)}}</span
                                 ></span
                             >
                         </div>
                         </div>
                      
            <!--====== Quick Look Modal cats ======-->
            <div class="modal fade quick-look" id="quick-look{{$product->id}}">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content modal--shadow">
                        <button
                            class="btn dismiss-button fas fa-times"
                            type="button"
                            data-dismiss="modal"
                        ></button>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    <!--====== Product Breadcrumb ======-->
                                    <div class="pd-breadcrumb u-s-m-b-30">
                                        <ul class="pd-breadcrumb__list">
                                            <li class="has-separator">
                                                <a href="{{Route('home')}}">Home</a>
                                            </li>                                      
                                            <li class="is-marked">
                                                <a
                                                href="{{Route('items_cats',
                                                ['id_cat' =>$cat->id
                                                ])}}"
                                                    >{{$product->Category->name}}</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                    <!--====== End - Product Breadcrumb ======-->

                                    <!--====== Product Detail ======-->
                                    <div class="pd u-s-m-b-30" style="margin-bottom: 0 !important;height: 80%;">
                                        <div class="pd-wrap" style="height: 100%">
                                            <div id="js-product-detail-modal" style="height: 100%">
                                                <div  style="height: 100%">
                                                    <img
                                                    style="height: 100%"
                                                        class="u-img-fluid"
                                                        src="{{$product->image}}"
                                                        alt=""
                                                    />
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="u-s-m-t-15">
                                            <div
                                                id="js-product-detail-modal-thumbnail"
                                            >
                                               
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <!--====== End - Product Detail ======-->
                                </div>
                                <div class="col-lg-7">
                                    <!--====== Product Right Side Details ======-->
                                    <div class="pd-detail">
                                        <div>
                                            <span class="pd-detail__name"
                                                >{{$product->title}}</span
                                            >
                                        </div>
                                        <div>
                                            <div class="pd-detail__inline">
                                                <span class="pd-detail__price"
                                                    >{{getPrice($product->price)}}</span
                                                >

                                               <del class="pd-detail__del"
                                                    >{{getPrice($product->last_price)}}</del
                                                >
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div
                                                class="pd-detail__rating gl-rating-style"
                                            >
                                                <i class="fas fa-star"></i
                                                ><i class="fas fa-star"></i
                                                ><i class="fas fa-star"></i
                                                ><i class="fas fa-star"></i
                                                ><i
                                                    class="fas fa-star-half-alt"
                                                ></i>

                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div class="pd-detail__inline">
                                                {{checkquantity($product->quantity)}}

                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <span
                                                class="pd-detail__preview-desc"
                                                >{{$product->description}}</span
                                            >
                                        </div>
                                       

                                        <div class="u-s-m-b-15">
                                            <form class="pd-detail__form" action="{{Route('cart-store')}}" method="POST">
                                                
                                                    @csrf
                                                <div class="pd-detail-inline-2">
                                                    <div class="u-s-m-b-15">
                                                        <!--====== Input Counter ======-->
                                                        <div
                                                            class="input-counter"
                                                        >
                                                            <span
                                                                class="input-counter__minus fas fa-minus"
                                                            ></span>

                                                            <input
                                                                class="input-counter__text input-counter--text-primary-style"
                                                                type="text"
                                                                value="1"
                                                                data-min="1"
                                                                data-max="1000"
                                                                name="qntty"
                                                            />

                                                            <span
                                                                class="input-counter__plus fas fa-plus"
                                                            ></span>
                                                        </div>
                                                        <!--====== End - Input Counter ======-->
                                                    </div>
                                                    <div class="u-s-m-b-15">
                                                        
                                                            <input type="hidden" name="id" value="{{$product->id}}">
                                                         <a
                                                         data-modal="modal"
                                                         data-tooltip="tooltip"
                                                         data-placement="top"
                                                         title="Add to Cart"
                                                         class="btn btn--e-brand-b-2"
                                                         onclick="$(this).closest('form').submit();"

                                                         >
                                                         Add to Cart
                                                        </a>
                                                        
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <span
                                                class="pd-detail__label u-s-m-b-8"
                                                >Product Policy:</span
                                            >
                                            <ul class="pd-detail__policy-list">
                                                <li>
                                                    <i
                                                        class="fas fa-check-circle u-s-m-r-8"
                                                    ></i>

                                                    <span
                                                        >Buyer Protection.</span
                                                    >
                                                </li>
                                                <li>
                                                    <i
                                                        class="fas fa-check-circle u-s-m-r-8"
                                                    ></i>

                                                    <span
                                                        >Full Refund if you
                                                        don't receive your
                                                        order.</span
                                                    >
                                                </li>
                                                <li>
                                                    <i
                                                        class="fas fa-check-circle u-s-m-r-8"
                                                    ></i>

                                                    <span
                                                        >Returns accepted if
                                                        product not as
                                                        described.</span
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Product Right Side Details ======-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Quick Look Modal ======-->
                         @endforeach
                          
                    </div>
                               
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="load-more">
                                <a
                                    class="btn btn--e-brand"
                                    type="button"
                                    href="{{Route('items_cats')}}"
                                >
                                    Load More
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->

        <!--====== Section 4 ======-->
        <div class="u-s-p-b-60">
            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1
                                    class="section__heading u-c-secondary u-s-m-b-12"
                                >
                                    LAST ADDED
                                </h1>

                                <span class="section__span u-c-silver"
                                    >GET UP FOR NEW ARRIVALS</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="slider-fouc">
                        <div
                            class="owl-carousel product-slider"
                            data-item="4"
                        >
                        @foreach ($last_added as $item)
                        <div class="u-s-m-b-30">
                            <div
                                class="product-o product-o--hover-on"
                            >
                                <div class="product-o__wrap">
                                    <a
                                        class="aspect aspect--bg-grey aspect--square u-d-block"
                                        href="{{Route('product', $product->id)}}"
                                    >
                                        <img
                                            class="aspect__img"
                                            src="{{$item->image}}"
                                            alt=""
                                    /></a>
                                    <div
                                        class="product-o__action-wrap"
                                    >
                                        <ul
                                            class="product-o__action-list"
                                        >
                                            
                                            <li>
                                                <form action="{{Route('cart-store')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$item->id}}">                                                  
                                                 <a
                                                 data-modal="modal"
                                                 data-tooltip="tooltip"
                                                 data-placement="top"
                                                 title="Add to Cart"
                                                 class="add_to_cart_form"
                                                 onclick="$(this).closest('form').submit();"
                                                 ><i
                                                     class="fas fa-plus-circle"
                                                 ></i
                                             ></a>
                                                </form>
                                            </li>
                                           
                                            
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">
                                    <a
                                    href="{{Route('items_cats',
                                    ['id_cat' =>$cat->id
                                    ])}}"
                                        >{{$item->Category->name}}</a
                                    ></span
                                >

                                <span class="product-o__name">
                                    <a   href="{{Route('product', $item->id)}}"
                                        >{{$item->title}}</a
                                    ></span
                                >
                                <div
                                    class="product-o__rating gl-rating-style"
                                >
                                    <i class="far fa-star"></i
                                    ><i class="far fa-star"></i
                                    ><i class="far fa-star"></i
                                    ><i class="far fa-star"></i
                                    ><i class="far fa-star"></i>

                                   
                                </div>

                                <span class="product-o__price"
                                    >{{getPrice($item->price)}}

                                    <span
                                        class="product-o__discount"
                                        >{{getPrice($item->last_price)}}</span
                                    ></span
                                >
                            </div>
                                                      
                        </div>

                        @endforeach
                           
                         
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 4 ======-->

        <!--====== Section 6 ======-->
        <div class="u-s-p-y-60">
            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1
                                    class="section__heading u-c-secondary u-s-m-b-12"
                                >
                                    FEATURED PRODUCTS
                                </h1>

                                <span class="section__span u-c-silver"
                                    >FIND NEW FEATURED PRODUCTS</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        @foreach ($best_offers as $offer)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30" >
                            <div
                                class="product-o product-o--hover-on u-h-100"
                            >
                                <div class="product-o__wrap">
                                    <a
                                        class="aspect aspect--bg-grey aspect--square u-d-block"
                                        href="{{Route('product', $offer->id)}}"
                                    >
                                        <img
                                            class="aspect__img"
                                            src="{{$offer->image}}"
                                            alt=""
                                    /></a>
                                    <div class="product-o__action-wrap">
                                        <ul
                                            class="product-o__action-list"
                                        >
                                            <li>
                                                <a
                                                    data-modal="modal"
                                                    data-modal-id="#quick-look{{$offer->id}}"
                                                    data-tooltip="tooltip"
                                                    data-placement="top"
                                                    title="Quick View"
                                                    ><i
                                                        class="fas fa-search-plus"
                                                    ></i
                                                ></a>
                                            </li>
                                            <li>
                                                <form action="{{Route('cart-store')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$offer->id}}">
                                                   
                                                 <a
                                                 data-modal="modal"
                                                 data-tooltip="tooltip"
                                                 data-placement="top"
                                                 title="Add to Cart"
                                                 class="add_to_cart_form"
                                                 onclick="$(this).closest('form').submit();"
                                                 ><i
                                                     class="fas fa-plus-circle"
                                                 ></i
                                             ></a>
                                                </form>
                                            </li>
                                           
                                          
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">
                                    <a  href="{{Route('items_cats',
                                    ['id_cat' =>$cat->id
                                    ])}}"
                                        >{{$offer->Category->name}}</a
                                    ></span
                                >

                                <span class="product-o__name">
                                    <a   href="{{Route('product', $offer->id)}}"
                                        >{{$offer->title}}</a
                                    ></span
                                >
                                <div
                                    class="product-o__rating gl-rating-style"
                                >
                                    <i class="fas fa-star"></i
                                    ><i class="fas fa-star"></i
                                    ><i class="fas fa-star"></i
                                    ><i class="fas fa-star"></i
                                    ><i
                                        class="fas fa-star-half-alt"
                                    ></i>

                                   
                                </div>

                                <span class="product-o__price"
                                    >{{getPrice($offer->price)}}

                                    <span class="product-o__discount"
                                        >{{getPrice($offer->last_price)}}</span
                                    ></span
                                >
                            </div>
                        </div>
                          <!--====== Quick Look Modal cats ======-->
            <div class="modal fade quick-look" id="quick-look{{$offer->id}}">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content modal--shadow">
                        <button
                            class="btn dismiss-button fas fa-times"
                            type="button"
                            data-dismiss="modal"
                        ></button>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-5">
                                    <!--====== Product Breadcrumb ======-->
                                    <div class="pd-breadcrumb u-s-m-b-30">
                                        <ul class="pd-breadcrumb__list">
                                            <li class="has-separator">
                                                <a href="{{Route('home')}}">Home</a>
                                            </li>                                      
                                            <li class="is-marked">
                                                <a
                                                href="{{Route('items_cats',
                                                ['id_cat' =>$cat->id
                                                ])}}"
                                                    >{{$offer->Category->name}}</a
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                    <!--====== End - Product Breadcrumb ======-->

                                    <!--====== Product Detail ======-->
                                    <div class="pd u-s-m-b-30" style="margin-bottom: 0 !important;height: 80%;">
                                        <div class="pd-wrap" style="height: 100%">
                                            <div id="js-product-detail-modal" style="height: 100%">
                                                <div  style="height: 100%">
                                                    <img
                                                    style="height: 100%"
                                                        class="u-img-fluid"
                                                        src="{{$offer->image}}"
                                                        alt=""
                                                    />
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="u-s-m-t-15">
                                            <div
                                                id="js-product-detail-modal-thumbnail"
                                            >
                                               
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <!--====== End - Product Detail ======-->
                                </div>
                                <div class="col-lg-7">
                                    <!--====== Product Right Side Details ======-->
                                    <div class="pd-detail">
                                        <div>
                                            <span class="pd-detail__name"
                                                >{{$offer->title}}</span
                                            >
                                        </div>
                                        <div>
                                            <div class="pd-detail__inline">
                                                <span class="pd-detail__price"
                                                    >{{getPrice($offer->price)}}</span
                                                >

                                               <del class="pd-detail__del"
                                                    >{{getPrice($offer->last_price)}}</del
                                                >
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div
                                                class="pd-detail__rating gl-rating-style"
                                            >
                                                <i class="fas fa-star"></i
                                                ><i class="fas fa-star"></i
                                                ><i class="fas fa-star"></i
                                                ><i class="fas fa-star"></i
                                                ><i
                                                    class="fas fa-star-half-alt"
                                                ></i>

                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div class="pd-detail__inline">
                                                {{checkquantity($offer->quantity)}}

                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <span
                                                class="pd-detail__preview-desc"
                                                >{{$offer->description}}</span
                                            >
                                        </div>
                                       

                                        <div class="u-s-m-b-15">
                                            <form class="pd-detail__form" action="{{Route('cart-store')}}" method="POST">
                                                
                                                    @csrf
                                                <div class="pd-detail-inline-2">
                                                    <div class="u-s-m-b-15">
                                                        <!--====== Input Counter ======-->
                                                        <div
                                                            class="input-counter"
                                                        >
                                                            <span
                                                                class="input-counter__minus fas fa-minus"
                                                            ></span>

                                                            <input
                                                                class="input-counter__text input-counter--text-primary-style"
                                                                type="text"
                                                                value="1"
                                                                data-min="1"
                                                                data-max="1000"
                                                                name="qntty"
                                                            />

                                                            <span
                                                                class="input-counter__plus fas fa-plus"
                                                            ></span>
                                                        </div>
                                                        <!--====== End - Input Counter ======-->
                                                    </div>
                                                    <div class="u-s-m-b-15">
                                                        
                                                            <input type="hidden" name="id" value="{{$offer->id}}">
                                                         <a
                                                         data-modal="modal"
                                                         data-tooltip="tooltip"
                                                         data-placement="top"
                                                         title="Add to Cart"
                                                         class="btn btn--e-brand-b-2"
                                                         onclick="$(this).closest('form').submit();"

                                                         >
                                                         Add to Cart
                                                        </a>
                                                        
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <span
                                                class="pd-detail__label u-s-m-b-8"
                                                >Product Policy:</span
                                            >
                                            <ul class="pd-detail__policy-list">
                                                <li>
                                                    <i
                                                        class="fas fa-check-circle u-s-m-r-8"
                                                    ></i>

                                                    <span
                                                        >Buyer Protection.</span
                                                    >
                                                </li>
                                                <li>
                                                    <i
                                                        class="fas fa-check-circle u-s-m-r-8"
                                                    ></i>

                                                    <span
                                                        >Full Refund if you
                                                        don't receive your
                                                        order.</span
                                                    >
                                                </li>
                                                <li>
                                                    <i
                                                        class="fas fa-check-circle u-s-m-r-8"
                                                    ></i>

                                                    <span
                                                        >Returns accepted if
                                                        product not as
                                                        described.</span
                                                    >
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--====== End - Product Right Side Details ======-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Quick Look Modal ======-->
                        @endforeach
                       
       
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 6 ======-->
        <!--====== Section 9 ======-->
        <div class="u-s-p-b-60">
            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="service u-h-100">
                                <div class="service__icon">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="service__info-wrap">
                                    <span class="service__info-text-1"
                                        >Free Shipping</span
                                    >

                                    <span class="service__info-text-2"
                                        >Free shipping on all US order
                                        or order above $200</span
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="service u-h-100">
                                <div class="service__icon">
                                    <i class="fas fa-redo"></i>
                                </div>
                                <div class="service__info-wrap">
                                    <span class="service__info-text-1"
                                        >Shop with Confidence</span
                                    >

                                    <span class="service__info-text-2"
                                        >Our Protection covers your
                                        purchase from click to
                                        delivery</span
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                            <div class="service u-h-100">
                                <div class="service__icon">
                                    <i
                                        class="fas fa-headphones-alt"
                                    ></i>
                                </div>
                                <div class="service__info-wrap">
                                    <span class="service__info-text-1"
                                        >24/7 Help Center</span
                                    >

                                    <span class="service__info-text-2"
                                        >Round-the-clock assistance for
                                        a smooth shopping
                                        experience</span
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 9 ======-->
</div>
@endsection
