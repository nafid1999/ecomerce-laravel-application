@extends('layouts.template')
@section('extra-script')
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
@endsection

@section('content')
<div class="container">
    @section('title', 'Checkout')
      
        <!--====== Section 3 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="checkout-f">
                        <div class="row">
                            <div class="col-lg-6">
                                <h1 class="checkout-f__h1">DELIVERY INFORMATION</h1>
                                <form class="checkout-f__delivery">
                                    <div class="u-s-m-b-30">
                                        <!--====== First Name, Last Name ======-->
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-15">

                                                <label class="gl-label" for="billing-fname">FIRST NAME *</label>

                                                <input class="input-text input-text--primary-style" type="text" id="billing-fname" data-bill="" value="{{explode(" ",Auth::user()->name)[0]}}" readonly></div>
                                            <div class="u-s-m-b-15">

                                                <label class="gl-label" for="billing-lname">LAST NAME *</label>

                                                <input class="input-text input-text--primary-style" type="text" id="billing-lname" data-bill="" value="{{explode(" ",Auth::user()->name)[1]}}" readonly></div>
                                        </div>
                                        <!--====== End - First Name, Last Name ======-->


                                        <!--====== E-MAIL ======-->
                                        <div class="u-s-m-b-15">

                                            <label class="gl-label" for="billing-email">E-MAIL *</label>

                                            <input class="input-text input-text--primary-style" type="text" id="billing-email" data-bill="" value="{{Auth::user()->email}}"></div>
                                        <!--====== End - E-MAIL ======-->


                                        <!--====== PHONE ======-->
                                        <div class="u-s-m-b-15">

                                            <label class="gl-label" for="billing-phone">PHONE *</label>

                                            <input class="input-text input-text--primary-style" type="text" id="billing-phone" data-bill="" value="{{Auth::user()->tel}}"></div>
                                        <!--====== End - PHONE ======-->


                                        <!--====== Street Address ======-->
                                        <div class="u-s-m-b-15">

                                            <label class="gl-label" for="billing-street">STREET ADDRESS *</label>

                                            <input class="input-text input-text--primary-style" type="text" id="billing-street" placeholder="House name and street name" data-bill="" value="{{Auth::user()->lines}}"></div>
                         
                                        <!--====== End - Street Address ======-->


                                        <!--====== Country ======-->
                                        <div class="u-s-m-b-15">

                                            <!--====== Select Box ======-->

                                            <label class="gl-label" for="billing-country">COUNTRY *</label>
                                            
                                            <input class="input-text input-text--primary-style" type="text" id="country" data-bill="" value="{{Auth::user()->country}}">
                                            <!--====== End - Select Box ======-->
                                        </div>
                                        <!--====== End - Country ======-->


                                        <!--====== Town / City ======-->
                                        <div class="u-s-m-b-15">

                                            <label class="gl-label" for="billing-town-city">CITY *</label>

                                            <input class="input-text input-text--primary-style" type="text" id="billing-town-city" data-bill="" value="{{Auth::user()->city}}"></div>
                                        <!--====== End - Town / City ======-->

                                        <!--====== ZIP/POSTAL ======-->
                                        <div class="u-s-m-b-15">

                                            <label class="gl-label" for="billing-zip">ZIP/POSTAL CODE *</label>

                                            <input class="input-text input-text--primary-style" type="text" id="billing-zip" placeholder="Zip/Postal Code" data-bill="" value="{{Auth::user()->zip_code}}"></div>
                                        <!--====== End - ZIP/POSTAL ======-->

                                        <div>

                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">SAVE</button></div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <h1 class="checkout-f__h1">ORDER SUMMARY</h1>

                                <!--====== Order Summary ======-->
                                <div class="o-summary">
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__item-wrap gl-scroll">
                                            @foreach (Cart::content() as $product_cart)
                                            <div class="o-card">
                                                <div class="o-card__flex">
                                                    <div class="o-card__img-wrap">

                                                        <img class="u-img-fluid" style="height: 100%" src="{{$product_cart->model->image}}" alt=""></div>
                                                    <div class="o-card__info-wrap">

                                                        <span class="o-card__name">

                                                            <a href="{{Route('product', $product_cart->model->id)}}">{{$product_cart->model->title}}</a></span>

                                                        <span class="o-card__quantity">Quantity x {{$product_cart->qty}}</span>

                                                        <span class="o-card__price">{{getPrice($product_cart->model->price)}}</span></div>
                                                </div>
                                                <form action="{{Route('cartdestroy',$product_cart->rowId)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <a class="o-card__del far fa-trash-alt"   onclick="$(this).closest('form').submit();"></a>
                                               </form>
                                            </div>  
                                            @endforeach
                                                                            
                                        </div>
                                    </div>
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <h1 class="checkout-f__h1">SHIPPING & BILLING</h1>
                                            <div class="ship-b">

                                                <span class="ship-b__text">Ship to:</span>
                                                <div class="ship-b__box u-s-m-b-10">
                                                    <p class="ship-b__p">{{Auth::user()->lines}} {{Auth::user()->zip_code}} {{Auth::user()->country}} {{Auth::user()->tel}}</p>

                                                </div>
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <table class="o-summary__table">
                                                <tbody>
                                                    <tr>
                                                        <td>SHIPPING</td>
                                                        <td>FREE</td>
                                                    </tr>
                                                    <tr>
                                                        <td>TAX</td>
                                                        <td>{{getPrice(Cart::tax())}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>SUBTOTAL</td>
                                                        <td>{{getPrice(Cart::subtotal())}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>GRAND TOTAL</td>
                                                        <td>{{getPrice(Cart::total())}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box" style="font-size: 14px">
                                            <h2 class="checkout-f__h1">PAYMENT INFORMATION</h2>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-body">
                                                                                                                                    
                                                            <form role="form" action="{{ route('make-payment') }}" method="post" class="stripe-payment pay_form"
                                                                data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                                id="stripe-payment">
                                                                @csrf
                                          
                                                                <div class='form-row row'>
                                                                    <div class='col-xs-12 form-group required'>
                                                                        <label class='control-label'>Name on Card</label> <input class='input-text input-text--primary-style'
                                                                            size='4' type='text' placeholder='Full Name '>
                                                                    </div>
                                                                </div>
                                          
                                                                <div class='form-row row'>
                                                                    <div class='col-xs-12 form-group card required'>
                                                                        <label class='control-label'>Card Number</label> <input 
                                                                            class='input-text input-text--primary-style card-num' maxlength="19" type='text' placeholder="ex: 4242 4242 4242 4242">
                                                                    </div>
                                                                </div>
                                          
                                                                <div class='form-row row'>
                                                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                                        <label class='control-label'>CVC</label>
                                                                        <input autocomplete='off' class='input-text input-text--primary-style card-cvc' placeholder='e.g 595'
                                                                        maxlength="3" type='text'>
                                                                    </div>
                                                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                                        <label class='control-label'>Expiration Month</label> <input
                                                                            class='input-text input-text--primary-style card-expiry-month' placeholder='MM' size='2' maxlength="2" type='text'>
                                                                    </div>
                                                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                                        <label class='control-label'>Expiration Year</label> <input
                                                                            class='input-text input-text--primary-style card-expiry-year' placeholder='YYYY' size='4' maxlength="4" type='text'>
                                                                    </div>
                                                                </div>
                                          
                                                                <div class='form-row row'>
                                                                    <div class='col-md-12 hide error form-group'>
                                                                        <div class='alert-danger alert'>Fix the errors before you begin.</div>
                                                                    </div>
                                                                </div>
                                          
                                                                <div class="row mx-auto mt-4">
                                                                    <button class="btn btn-md btn-block btn_pay"  type="submit">Pay ({{getPrice(Cart::total())}})</button>
                                                                </div>
                                          
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--====== End - Order Summary ======-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 3 ======-->
  

</div>
@endsection


@section('extra-js')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function () {
        var $form = $(".stripe-payment");
        $('form.stripe-payment').bind('submit', function (e) {
            var $form = $(".stripe-payment"),
                inputVal = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputVal),
                $errorStatus = $form.find('div.error'),
                valid = true;
            $errorStatus.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function (i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorStatus.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-num').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeRes);
            }

        });

        function stripeRes(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });

</script>


@endsection


