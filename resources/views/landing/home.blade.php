@extends('layouts.app')
<?php $v = "7.5" ?>
<title>Landing Page</title>
@section('content')
@section('css')
<link href="{{ asset('css/landingPage.css?v='.$v) }}" rel="stylesheet">
@endsection

@include('layouts.header', ['headtext' => 'ALWAJEEH','subheadtext'=> 'ALWAJEEH'])    
<div class="fluid-container homePageContainer">
    <div class="homePageSection m-2 p-3">
        <div class="p-2">
            <h4 class="homePageTitle">Sheikh Mostafa Bin Abdullatif Foundation</h4>
        </div>                
    </div>
    
    <div class="homePageSection m-2 p-3">
        <div class="p-2 pt-4">
            <h4 class="homePageTitle">MBAL Investments</h4>
        </div>                
    </div>
    
    <a href="{{url('announcementList')}}">
        <div class="homePageSection m-2 p-3">
            <div class="p-2 pt-3">
                <h4 class="homePageTitle mb-0">Announcements</h4>
                <span class="unreadText">00 Unread</span>
            </div>                
        </div>
    </a>    
    
    <div class="homePageSection m-2 p-3">
        <div class="p-2 pt-4">
            <h4 class="homePageTitle">Family Shop</h4>
        </div>                
    </div>

</div>
@endsection