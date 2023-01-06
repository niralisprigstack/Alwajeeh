@extends('layouts.app')
<?php $v = "10.5" ?>
<title>Landing Page</title>
@section('content')
@section('css')
<!-- <link href="https://fonts.cdnfonts.com/css/el-messiri" rel="stylesheet"> -->
<link href="{{ asset('css/landingPage.css?v='.$v) }}" rel="stylesheet">
@endsection

@include('layouts.header', ['headtext' => 'ALWAJEEH','subheadtext'=> 'ALWAJEEH'])    
<div class="fluid-container homePageContainer">
    <div class="homePageSection m-2 p-3">
        <div class="p-2">
            <h4 class="homePageTitle mb-0">Sheikh Mostafa Bin Abdullatif<br>
             Foundation</h4>
        </div>                
    </div>
    
    <div class="homePageSection m-2 p-3">
        <div class="p-2 ">
            <h4 class="homePageTitle mb-0">MBAL Investments</h4>
        </div>                
    </div>
    
    <a href="{{url('announcementList')}}">
        <div class="homePageSection m-2 p-3">
            <div class="p-2 ">
                <h4 class="homePageTitle mb-0">Announcements</h4>
                <span class="unreadText">{{$unreadcount}} Unread</span>
            </div>                
        </div>
    </a>    
    
    <div class="homePageSection m-2 p-3">
        <div class="p-2 ">
            <h4 class="homePageTitle mb-0">Family Shop</h4>
        </div>                
    </div>

</div>
@endsection