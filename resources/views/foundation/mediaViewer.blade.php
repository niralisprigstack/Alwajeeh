@extends('layouts.app')
<?php $v = "11.5" ?>
<title>Media Viewer</title>
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
<div>
    <img class="img-fluid w-auto float-right" style="height: 85px;" src="{{ asset('assests/images/register_logo.png') }}" alt="">
</div>

<div class="fluid-container viewerDiv">    
    <div class="mediaViewerSection p-3" onclick="$('.detailScrollableViewerDiv').removeClass('d-none');">        
        <div class="mediaCard">
            <h5 class="viewerText">Photo Title</h5>
            <h6 class="viewerText mb-3">Date</h6>
             </div> 
            <div class="detailScrollableViewerDiv d-none">
                <span class="viewerDesc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s</span>
            </div>              
    </div>
</div>
@endsection