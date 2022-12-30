@extends('layouts.appauth')
<?php   $v = "9.5"?>
<title>Welcome to Alwajeeh!</title>
@section('content')
@section('css')

@endsection
<div class="fluid-container home_container screen_bg_img " style="">

    <div class="screen_bg">
        <div class="col-12 col-lg-12 col-md-12 welcome_head">
            <div class="col-12 col-lg-12 col-md-12 headtext pl-0">
                Get closer<br> to the<br> family
            </div>
            <p class="sub_headtext">Heritage . Family . Business</p>

        </div>

        <div class="button_fixed col-12 m-auto w-100 z-index-1">
            <div class="row">

                <div class="col-6 col-lg-6 col-md-6">
                    <a href="{{url('signUp')}}">
                        <button type="button" class="authButton button_text col-12 p-0">Register
                        </button>
                    </a>

                </div>

                <div class="col-6 col-lg-6 col-md-6">
                    <a href="{{url('login')}}">
                        <button type="button" class="authButton button_text col-12 p-0">Sign In
                        </button>
                    </a>
                </div>

            </div>


        </div>

    </div>


    <!-- <img class="img-fluid home_screen" src="{{ asset('assests/images/home_screen.svg') }}" alt=""> -->
    <img class="img-fluid full_logo" style="position: absolute;top:0px;left: 0px;width: 100%;object-fit: cover;height: 100%;" src="{{ asset('assests/images/full_logo.svg') }}" alt="">

</div>


@endsection