@extends('layouts.appauth')
<?php   $v = "9.5" ?>
<title>Login</title>
@section('content')

<div class="fluid-container row heightmobileview ml-0 mr-0" style="height:100vh">

    <img class="img-fluid" style="position: absolute;top: 0px;left: 0px;"  src="{{ asset('assests/images/alwajeehpillar.svg') }}" alt="">
    <?php if (isset($_COOKIE['user_name']) && isset($_COOKIE['login_pass'])) {
        $user_name = $_COOKIE['user_name'];
        $login_pass  = $_COOKIE['login_pass'];
        $is_remember = "checked='checked'";
    } else {
        $user_name = "";
        $login_pass = "";
        $is_remember = "";
    }
    ?>
    <!-- <div class="col-lg-6 centerBoth hide-on-mobile dekstopView  bg-light bg-gradient welocomeLeftDiv">
        <div class='d-flex align-items-center flex-column'>
            <img class="img-fluid img_logo" src="{{ asset('assests/img/signup_image.svg') }}" alt="">
        </div>

    </div> -->
    <div class="col-lg-6  d-lg-none col-lg-6   pt-2 pr-0 mobileView ">
        <img class="img-fluid mb-3 img_logo step-1-logo deskauth_img" src="{{ asset('assests/images/logo_auth.svg') }}" alt="">
    </div>
    <div class="col-lg-10 col-10 centerBoth mobilestepdiv flex-column pr-0 mb-4  m-auto">
        
            <h2 class='mb-4 font-weight-bold  auth-title col-12 pr-0'>Let’s sign you in</h2>


            <form method="POST" class="form-div-post col-12 pr-0" action="{{ url('/login') }}">

            @csrf
                <div class="form-group row mb-2">
                    <!-- <label for="user_name" class="col-md-12 col-form-label global-font-color">{{ __('Username') }}</label> -->

                    <div class="col-md-12">
                        <input id="user_name" type="text" class="form-control auth-input @error('user_name') is-invalid @enderror shadow-none" name="user_name" value="{{$user_name}}" required autofocus placeholder="Username">

                        @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <!-- <label for="password" class="col-md-12 col-form-label global-font-color">{{ __('Password') }}</label> -->

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control auth-input shadow-none @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="{{$login_pass}}" placeholder="Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                </div>


                <!-- <div class="form-group row">
                            <div class="col-md-6 ">
                                <div class="form-check">
                                    <input class="form-check-input " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                <span class="checkboxdiv">
                    <input class="c-pointer cust-checkbox " type="checkbox" id="rememberMe" name="rememberMe" style="vertical-align: middle;position: relative;bottom: 1px;" {{$is_remember}}>
                    <label class="" for="rememberMe"> <span class="ml-1 r">{{ __('Remember Me') }}</span>
                    </label></span>

                <div class="form-group  mb-0 pt-2">

                    <button type="submit" class="authButton button_text col-12 loginUserbtn ">
                        {{ __('Login') }}
                        <span class="loadingspinner signinloader d-none loader ml-3 " role="status" aria-hidden="true"></span>

                    </button>
                    <div class="text-center d-block mt-3">
                        <a href="{{url('/forgot-password')}}" class=" text-dark text-decoration-underline " style="">Forgot Password?</a>
                        <!-- <a href="{{url('/signUp')}}" class="pull-right text-dark text-decoration-underline global-font-color" style='text-decoration: underline;'>Sign up</a> -->
                    </div>
                    <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                    <!-- <div class="icheck-material-info row col-lg-12 mb-3 mt-4" style="align-items: baseline;display: flex;justify-content: flex-start;">
                      <input class="mr-2" type="checkbox" id="rememberMe" name="rememberMe"   style="" {{$is_remember}}>
                      <label for="rememberMe"><span class="global-font-color" style="display: inline-block;">{{ __('Remember Me') }}</span></label>
                    </div> -->








                </div>

            </form>

        

    </div>
</div>


@endsection