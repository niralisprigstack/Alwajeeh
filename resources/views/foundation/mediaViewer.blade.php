@extends('layouts.app')
<?php $v = "11.5" ?>
<title>Media Archive</title>
@section('content')
@section('css')
<link href="{{ asset('css/foundation.css?v='.$v) }}" rel="stylesheet">
<style>
    html,
    body {
        font-family: 'Montserrat';
        font-style: normal;
        background-image: url(/assests/images/foundation/mediaViewerBg.jpg);
        width: -webkit-fill-available;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        max-width: 100%;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
@endsection    
<div class="fluid-container foundationContainer">    

    <div class="mediaViewerSection m-2 mb-3">

        

    </div>        

</div>
@endsection