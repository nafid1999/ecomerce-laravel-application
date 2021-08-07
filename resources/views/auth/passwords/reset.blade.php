@extends('layouts.template')

@section('content')
<div class="container">
    @section('title', 'Reset')



            <!--====== Section 2 ======-->
            <div class="u-s-p-b-60">

                <!--====== Section Intro ======-->
                <div class="section__intro u-s-m-b-60">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__text-wrap">
                                    <h1 class="section__heading u-c-secondary">FORGOT PASSWORD?</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Intro ======-->


                <!--====== Section Content ======-->
                <div class="section__content">
                    <div class="container">
                        <div class="row row--center">
                            <div class="col-lg-6 col-md-8 u-s-m-b-30">
                                <div class="l-f-o">
                                    <div class="l-f-o__pad-box">
                                        <h1 class="gl-h1">PASSWORD RESET</h1>

                                        <span class="gl-text u-s-m-b-30">Enter your email or username below and we will send you a link to reset your password.</span>
                                        <form method="POST" action="{{ route('password.email') }}" class="l-f-o__form">
                                            @csrf
                                            <input type="hidden" name="token" value="{{ $token }}">
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reset-email">E-MAIL *</label>

                                                <input class="input-text input-text--primary-style" type="text" id="reset-email" placeholder="Enter E-mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus></div>
                                            <div class="u-s-m-b-30">

                                                <button class="btn btn--e-transparent-brand-b-2" type="submit">SUBMIT</button></div>
                                            <div class="u-s-m-b-30">

                                                <a class="gl-link" href="signin.html">Back to Login</a></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
            <!--====== End - Section 2 ======-->
    
</div>
@endsection
