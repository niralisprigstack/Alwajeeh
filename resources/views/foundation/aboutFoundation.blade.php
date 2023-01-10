@extends('layouts.app')
<?php $v = "11.5" ?>
<title>About Foundation</title>
@section('content')
@section('css')
<!-- <link href="https://fonts.cdnfonts.com/css/el-messiri" rel="stylesheet"> -->
<link href="{{ asset('css/foundation.css?v='.$v) }}" rel="stylesheet">
<style>
    html,
body {
    font-family: 'Montserrat';
    font-style: normal; 
    /* margin-top: 70px; */
    background-image: url(/assests/images/foundation/foundationbg.jpg);


    width: -webkit-fill-available;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    /* height: 100%; */
    max-width: 100%;
    background-position: center;
    background-repeat: no-repeat;
}
</style>
@endsection

@include('layouts.header', ['headtext' => 'THE FOUNDATION','subheadtext'=> ''])    
<div class="fluid-container foundationContainer">

<div class="aboutfounPageSection m-2 mb-3 ">
    

        <div class="aboutDiv  pt-3 pl-4 pr-4 pb-4 ">



                <div class="titlediv pb-2">
                Sheikh Mostafa Bin <br>Abdullatif<br> Foundation
                </div>

                <div class="col-10 border-top  mb-5"></div>

                <span class="aboutpagetext">
                Sheikh Mostafa was a well-known and respected merchant of his time. He was one of the pioneers in setting up trade routes and business channels across major hubs such as Bombay, Karachi, Kuwait, Bahrain and Dubai. He was also involved in exporting regional goods with other Arab merchants to France and the United Kingdom. Shipping routes were established by him to facilitate regional business with the West.
                </span>
        </div>


    </div>
    

</div>
@endsection