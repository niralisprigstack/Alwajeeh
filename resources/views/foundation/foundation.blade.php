@extends('layouts.app')
<?php $v = "11.5" ?>
<title>The Foundation</title>
@section('content')
@section('css')
<!-- <link href="https://fonts.cdnfonts.com/css/el-messiri" rel="stylesheet"> -->
<link href="{{ asset('css/foundation.css?v='.$v) }}" rel="stylesheet">
@endsection

@include('layouts.header', ['headtext' => 'THE FOUNDATION','subheadtext'=> ''])    
<div class="fluid-container foundationContainer">
<a href="{{url('aboutfoundation')}}">
    <div class="founPageSection m-2 mb-3 ">
    <img class="img-fluid " style="width: 100%;height: auto" src="{{ asset('assests/images/foundation/aboutcard.svg') }}" alt="">
    <div class="belowstaticcardbg">
    About the <br>Foundation   
    </div>
    </div>
</a>
    

<a href="{{url('mediaarchive')}}">
    <div class="founPageSection m-2 mb-3 ">
    <img class="img-fluid " style="width: 100%;height: auto" src="{{ asset('assests/images/foundation/mediaarchivecard.svg') }}" alt="">
    <div class="belowstaticcardbg">
    Media Archive  
    </div>    
    </div>
    </a>
    
   
        <div class="founPageSection m-2 mb-3 ">
        <img class="img-fluid " style="width: 100%;height: auto;object-fit: none;
    border-radius: 10px;" src="{{ asset('assests/images/foundation/timelinecard.svg') }}" alt="">
        <div class="belowstaticcardbg">
   The Timeline 
    </div>    
        </div>
       
    
    

</div>
@endsection