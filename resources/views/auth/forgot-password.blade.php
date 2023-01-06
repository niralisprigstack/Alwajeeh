@extends('layouts.appauth')
<?php   $v = "11.5" ?>
<title>Forget Password</title>
@section('content')

<input type="hidden" class='entryPassurl' value="{{url('entry-password')}}">
<div class="fluid-container row heightmobileview m-auto " style='height:100vh'>
    <img class="img-fluid" style="position: absolute;top: 0px;right: 0px;" src="{{ asset('assests/images/alwajeehpillar2.svg') }}" alt="">

    <div class="col-lg-6 centerBoth hide-on-mobile dekstopView  bg-light bg-gradient welocomeLeftDiv">
        <div class='d-flex align-items-center flex-column'>
            <img class="img-fluid img_logo" src="{{ asset('assests/img/signup_image.svg') }}" alt="">
        </div>

    </div>
    <div class="col-lg-6  d-lg-none col-lg-6   pt-2 pl-0 mobileView ">
        <img class="img-fluid mb-3 img_logo step-1-logo deskauth_img" src="{{ asset('assests/images/logo_auth.svg') }}" alt="">
    </div>


    <div class="col-md-12 d-none mobileauth_img mb-0 pb-0 pr-0 mr-0">
        <div class="col-md-4" style="margin-left: 0px;"><img class="img-fluid mb-3 mt-3 img_logo all-step-logo " src="{{ asset('assests/img/AWLogo.svg') }}" alt="" style=""></div>
    </div>


    <div class="col-lg-10 col-10 centerBoth mobilestepdiv flex-column pl-0 mb-4  m-auto">



        <h2 class='mb-5 font-weight-bold  auth-title col-12 pl-0'>Reset your password</h2>


        <form method="POST" action="{{ route('password.email') }}" class="form-div-post col-12 pl-0">
            @csrf



            <!-- <p  style='font-weight: normal;' class='text-center titleFont  ml-auto mr-auto welcomeTitle global-font-color' >No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p> -->
            <input type="hidden" class='signupUrl' value="{{url('register')}}">
            <div class="form-group">
                <!-- <label for="password" class=" paraFont col-form-label step1para global-font-color">{{ __('Please input your Email Address for the reset password process') }}</label> -->
                <input id="email" type="email" name="email" :value="old('email')" required autofocus class="form-control auth-input   shadow-none" autocomplete="nope" placeholder="email">
                <p class='entryPassError text-danger'></p>
                <button type="submit" class="authButton button_text col-12">
                    <span>Send Reset Link</span>
                    <span class="loadingspinner  d-none loader ml-3 " role="status" aria-hidden="true"></span>
                </button>
                <div class="d-block mt-2">
                    <!-- <a href="{{url('/')}}" class="pull-right text-dark text-decoration-underline global-font-color" style='text-decoration: underline;'>Back to Login?</a>  -->

                    <x-auth-session-status class="" :status="session('status')" style='color: #aa8940;' />


                </div>
            </div>
        </form>



    </div>


</div>
@endsection