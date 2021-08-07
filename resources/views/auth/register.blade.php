@extends('layouts.template')

@section('content')
<div class="container">

        <!--====== Section 1 ======-->
        @section('title', 'Sign Up')

        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary">CREATE AN ACCOUNT</h1>
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
                                    <h1 class="gl-h1">PERSONAL INFORMATION</h1>
                                    <div class="u-s-m-b-15">

                                        <a class="l-f-o__create-link btn--e-transparent-brand-b-2" href="{{ Route('login')}}">SIGN IN</a></div>
                                    <form method="POST" action="{{ route('register') }}" class="l-f-o__form">
                                        @csrf                                 
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="reg-fname">{{ __('FULL NAME') }} *</label>

                                            <input class="input-text input-text--primary-style" type="text" id="reg-fname" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="First Name"></div>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="reg-lname">TEL *</label>

                                            <input class="input-text input-text--primary-style" type="text" id="reg-lname" name="tel" value="{{ old('tel') }}" required  placeholder="Phone"></div>
                                            @error('tel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="reg-email">E-MAIL *</label>

                                            <input class="input-text input-text--primary-style" type="text" id="reg-email" name="email" value="{{ old('email') }}" required placeholder="Enter E-mail"></div>
                                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="reg-password">PASSWORD *</label>

                                            <input class="input-text input-text--primary-style" type="text" id="reg-password" name="password" required placeholder="Enter Password"></div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                           @enderror
                                        <div class="u-s-m-b-15">

                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">{{ __('SIGN UP') }}
                                            </button></div>


                                        <a class="gl-link" href="{{Route ('home')}}">Return to Store</a>
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
