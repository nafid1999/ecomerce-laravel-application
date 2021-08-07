@extends('layouts.template')

@section('content')
<div class="container">
    @section('brodcump')
    @endsection
    <!--====== Section 1 ======-->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-p">
                    <div class="shop-p__toolbar u-s-m-b-30">
                        @isset(request()->id_cat)
                        <div class="shop-p__meta-wrap u-s-m-b-60">

                            <span class="shop-p__meta-text-1">FOUND {{$products->count()}} RESULTS</span>
                            <div class="shop-p__meta-text-2 mt-2">
                                @isset(request()->id_cat)
                                <span>Categorie :</span>
                                <span class="gl-tag btn--e-brand-shadow" href="#">{{$cat[0]->name}}</span>
                                @endisset

                            </div>
                        </div>
                        @endisset
                        @isset(request()->search)
                        <div class="shop-p__meta-wrap u-s-m-b-60">

                            <span class="shop-p__meta-text-1">FOUND {{$products->count()}} RESULTS</span>
                            <div class="shop-p__meta-text-2 mt-2">

                                <span>Word searched : </span>
                                <span class="gl-tag btn--e-brand-shadow" href="#">{{request()->search}}</span>
                            </div>
                        </div>
                        @endisset

                        <div class="shop-p__tool-style">
                            <div class="tool-style__group u-s-m-b-8">


                                <span class="js-shop-grid-target is-active">Grid</span>

                                <span class="js-shop-list-target">List</span></div>
                            <form action="" method="POST">
                                @csrf
                                <div class="tool-style__form-wrap">
                                    <div class="u-s-m-b-8"><select name="show_numbers" onchange="this.form.submit()"
                                            class="select-box select-box--transparent-b-2">
                                            <option @if($products->count() <= 8) selected @endif value="8">Show: 8
                                            </option>
                                            <option @if($products->count() <= 12 && $products->count() > 8 )
                                                    selected
                                                    @endif
                                                    value="12">Show: 12</option>
                                            <option @if($products->count() <= 16 && $products->count() > 12)
                                                    selected
                                                    @endif
                                                    value="16">Show: 16</option>
                                            <option @if($products->count() == 24 && $products->count() > 16)
                                                selected
                                                @endif
                                                value="24">Show: 24</option>
                                        </select></div>
                                    <div class="u-s-m-b-8"><select name="sort_by" onchange="this.form.submit()"
                                            class="select-box select-box--transparent-b-2">
                                            <option @if ($slc==1 ) selected @endif value="new">Sort By: Newest Items
                                            </option>
                                            <option @if ($slc==2 ) selected @endif value="cheap">Sort By: Lowest Price
                                            </option>
                                            <option @if ($slc==3 ) selected @endif value="expensive">Sort By: Highest
                                                Price</option>
                                        </select></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="shop-p__collection">
                        <div class="row is-grid-active">

                            @foreach ($products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="product-m">
                                    <div class="product-m__thumb">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                            href="{{Route('product', $product->id)}}">

                                            <img class="aspect__img" src="{{$product->image}}" alt=""></a>
                                        <div class="product-m__quick-look">

                                            <a class="fas fa-search" data-modal="modal"
                                                data-modal-id="#quick-look{{$product->id}}" data-tooltip="tooltip"
                                                data-placement="top" title="Quick Look"></a></div>
                                        <div class="product-m__add-cart">
                                            <form action="{{Route('cart-store')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$product->id}}">

                                                <a data-modal="modal" data-tooltip="tooltip" data-placement="top"
                                                    title="Add to Cart" class="btn--e-brand"
                                                    onclick="$(this).closest('form').submit();">Add to Cart</a>
                                            </form>


                                        </div>
                                    </div>
                                    <div class="product-m__content">
                                        <div class="product-m__category">

                                            <a href="{{Route('items_cats',
                                    ['id_cat' =>$product->Category->id
                                    ])}}">{{$product->Category->name}}</a></div>
                                        <div class="product-m__name">

                                            <a href="{{Route('product', $product->id)}}">{{$product->title}}</a></div>
                                        <div class="product-m__rating gl-rating-style"><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i>

                                        </div>
                                        <div class="product-m__price">{{getPrice($product->price)}}</div>
                                        <div class="product-m__hover">
                                            <div class="product-m__preview-description">

                                                <span>{{$product->description}}</span></div>
                                            <div class="product-m__wishlist">

                                                <a class="far fa-heart" href="#" data-tooltip="tooltip"
                                                    data-placement="top" title="Add to Wishlist"></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--====== Quick Look Modal ======-->
                            <div class="modal fade quick-look" id="quick-look{{$product->id}}">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content modal--shadow">
                                        <button class="btn dismiss-button fas fa-times" type="button"
                                            data-dismiss="modal"></button>
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
                                                                <a href="#">{{$product->Category->name}}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!--====== End - Product Breadcrumb ======-->

                                                    <!--====== Product Detail ======-->
                                                    <div class="pd u-s-m-b-30">
                                                        <div class="pd-wrap">
                                                            <div id="js-product-detail-modal">
                                                                <div>
                                                                    <img class="u-img-fluid" src="{{$product->image}}"
                                                                        alt="" />
                                                                </div>                                                           
                                                            </div>
                                                        </div>
                                                        <div class="u-s-m-t-15">
                                                            <div id="js-product-detail-modal-thumbnail">
                                                              
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--====== End - Product Detail ======-->
                                                </div>
                                                <div class="col-lg-7">
                                                    <!--====== Product Right Side Details ======-->
                                                    <div class="pd-detail">
                                                        <div>
                                                            <span class="pd-detail__name">{{$product->title}}</span>
                                                        </div>
                                                        <div>
                                                            <div class="pd-detail__inline">
                                                                <span
                                                                    class="pd-detail__price">{{getPrice($product->price)}}</span>

                                                                <del class="pd-detail__del">{{getPrice($product->last_price)}}</del>
                                                            </div>
                                                        </div>
                                                        <div class="u-s-m-b-15">
                                                            <div class="pd-detail__rating gl-rating-style">
                                                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                                    class="fas fa-star"></i><i
                                                                    class="fas fa-star"></i><i
                                                                    class="fas fa-star-half-alt"></i>

                                                            </div>
                                                        </div>
                                                        <div class="u-s-m-b-15">
                                                            <div class="pd-detail__inline">
                                                                <span class="pd-detail__stock">200 in stock</span>

                                                                <span class="pd-detail__left">Only 2 left</span>
                                                            </div>
                                                        </div>
                                                        <div class="u-s-m-b-15">
                                                            <span
                                                                class="pd-detail__preview-desc">{{$product->description}}</span>
                                                        </div>


                                                        <div class="u-s-m-b-15">
                                                            <form class="pd-detail__form"
                                                                action="{{Route('cart-store')}}" method="POST">

                                                                @csrf
                                                                <div class="pd-detail-inline-2">
                                                                    <div class="u-s-m-b-15">
                                                                        <!--====== Input Counter ======-->
                                                                        <div class="input-counter">
                                                                            <span
                                                                                class="input-counter__minus fas fa-minus"></span>

                                                                            <input
                                                                                class="input-counter__text input-counter--text-primary-style"
                                                                                type="text" value="1" data-min="1"
                                                                                data-max="1000" />

                                                                            <span
                                                                                class="input-counter__plus fas fa-plus"></span>
                                                                        </div>
                                                                        <!--====== End - Input Counter ======-->
                                                                    </div>
                                                                    <div class="u-s-m-b-15">
                                                                        <input type="hidden" name="id"
                                                                            value="{{$product->id}}">

                                                                        <a class="btn btn--e-brand-b-2"
                                                                            title="Add to Cart"
                                                                            onclick="$(this).closest('form').submit();">
                                                                            Add to Cart
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="u-s-m-b-15">
                                                            <span class="pd-detail__label u-s-m-b-8">Product
                                                                Policy:</span>
                                                            <ul class="pd-detail__policy-list">
                                                                <li>
                                                                    <i class="fas fa-check-circle u-s-m-r-8"></i>

                                                                    <span>Buyer Protection.</span>
                                                                </li>
                                                                <li>
                                                                    <i class="fas fa-check-circle u-s-m-r-8"></i>

                                                                    <span>Full Refund if you
                                                                        don't receive your
                                                                        order.</span>
                                                                </li>
                                                                <li>
                                                                    <i class="fas fa-check-circle u-s-m-r-8"></i>

                                                                    <span>Returns accepted if
                                                                        product not as
                                                                        described.</span>
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
                    <div class="u-s-p-y-60">

                        <!--====== Pagination ======-->

                        {{ $products->links() }}

                        <!--====== End - Pagination ======-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== End - Section 1 ======-->



</div>
@endsection