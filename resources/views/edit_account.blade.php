@extends('layouts.template')

@section('content')
<div class="container">
    @section('title', 'My Account')
  
        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="dash">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">

                                <!--====== Dashboard Features ======-->
                                <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                    <div class="dash__pad-1">

                                        <span class="dash__text u-s-m-b-16">Hello, {{Auth::user()->name}}</span>
                                        <ul class="dash__f-list">
                                            <li>

                                                <a  href="{{Route('myaccount')}}">Manage My Account</a></li>
                                            <li>

                                                <a class="dash-active"  href="">My Profile</a></li>
                                           
                                           
                                            <li>
                                                <a href="{{Route('orders')}}" >My Orders</a></li>                                       
                                        </ul>
                                    </div>
                                </div>
                                <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                    <div class="dash__pad-1">
                                        <ul class="dash__w-list">
                                            <li>
                                                <div class="dash__w-wrap">

                                                    <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>

                                                    <span class="dash__w-text">{{ getOrdersCount(Auth::user()->id)}}</span>

                                                    <span class="dash__w-name">Orders Placed</span></div>
                                            </li>                                         
                                            <li>
                                                <div class="dash__w-wrap">

                                                    <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>

                                                    <span class="dash__w-text">{{Cart::count()}}</span>

                                                    <span class="dash__w-name">Cart</span></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--====== End - Dashboard Features ======-->
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                    <div class="dash__pad-2">
                                        <h1 class="dash__h1 u-s-m-b-14">Edit Profile</h1>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form method="POST" action="{{ route('profile-edit') }}" class="dash-edit-p">
                                                    @csrf
                                                    <div class="gl-inline">
                                                        <div class="u-s-m-b-30">

                                                            <label class="gl-label" for="name">FULL NAME *</label>

                                                            <input class="input-text input-text--primary-style" type="text" name="name" id="name" value="{{Auth::user()->name}}"></div>
                                                            <div class="u-s-m-b-30">
                                                                <label class="gl-label" for="email">EMAIL *</label>
                                                                <input class="input-text input-text--primary-style" type="email" id="email" name="email" value="{{Auth::user()->email}}">
                                                                
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="gl-inline">
                                                        <div class="u-s-m-b-30">

                                                            <label class="gl-label" for="adresse">ADRESSE *</label>

                                                            <input class="input-text input-text--primary-style" type="text" id="adresse" name="adresse" value="{{Auth::user()->lines}}" placeholder="ex: N14 Ctre Ait Youssef Ou Ali "></div>
                                                    </div>
                                                    <div class="gl-inline">
                                                        <div class="u-s-m-b-30">

                                                            <label class="gl-label" for="zipcode">ZIP CODE *</label>

                                                            <input class="input-text input-text--primary-style" type="text" id="zipcode" name="zipcode" value="{{Auth::user()->zip_code}}" placeholder="ex: 32003"></div>
                                                        <div class="u-s-m-b-30">

                                                            <label class="gl-label" for="city">CITY *</label>

                                                            <input class="input-text input-text--primary-style" type="text" id="city" name="city" value="{{Auth::user()->city}}"  placeholder="ex:Al-Hoceima"></div>
                                                        <div class="u-s-m-b-30">

                                                                <label class="gl-label" for="country">COUNTRY *</label>
    
                                                                <input class="input-text input-text--primary-style" type="text" id="country" name="country" value="{{Auth::user()->country}}" placeholder="ex: Morocco"></div>
                                                        
                                                    </div>
                                                    <div class="gl-inline">
                                                       
                                                        <div class="u-s-m-b-30">
                                                            <label class="gl-label" for="password">PASSWORD </label>
                                                            <input class="input-text input-text--primary-style" type="password" id="passsord" name="password" placeholder="Change password">
                                                            
                                                        </div>
                                                        <div class="u-s-m-b-30">
                                                            <label class="gl-label" for="phone">PHONE *</label>
                                                            <input class="input-text input-text--primary-style" type="text" id="phone" name="phone" value="{{Auth::user()->tel}}" placeholder="ex : +212 706465821">
                                                            
                                                        </div>
                                                       
                                                    </div>

                                                    <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
    
</div>
@endsection
