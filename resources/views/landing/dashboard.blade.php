@extends('layouts.app')
<?php $v = "9.5" ?>
<title>Dashboard</title>
@section('content')
@section('css')
<link href="{{ asset('css/landingPage.css?v='.$v) }}" rel="stylesheet">
@endsection

@include('layouts.header', ['headtext' => 'ALWAJEEH','subheadtext'=> 'ALWAJEEH'])    
<div class="fluid-container homePageContainer">
    
    <div class="row col-12 pl-2 pr-2 ml-0 mr-0">
        <div class="col-6 pr-0">
            <div class="dashboardCard m-2">
                <a href="{{url('profile')}}">
                    <div class="p-3">
                        <img class="img-fluid m-auto d-flex justify-content-center" src="{{ asset('assests/images/landing/profile.svg') }}" alt="">
                        <h4 class="dashboardTitle d-block text-center mt-2">My Profile</h4>
                    </div>
                </a>                                
            </div>
        </div>     
        <div class="col-6 pl-0">
            <div class="dashboardCard m-2">
            <a href="{{url('allcontacts')}}">
                <div class="p-3">
                    <img class="img-fluid m-auto d-flex justify-content-center" src="{{ asset('assests/images/landing/contacts.svg') }}" alt="">
                    <h4 class="dashboardTitle d-block text-center mt-2">Contacts</h4>
                </div> 
            </a>               
            </div>
        </div>
    </div>
    
    <div class="row col-12 pl-2 pr-2 ml-0 mr-0">
        <div class="col-6 pr-0">
            <div class="dashboardCard m-2">
                <div class="p-3">
                    <img class="img-fluid m-auto d-flex justify-content-center" src="{{ asset('assests/images/landing/storage.svg') }}" alt="">
                    <h4 class="dashboardTitle d-block text-center mt-2">My Storage</h4>
                </div>                
            </div>
        </div>     
        <div class="col-6 pl-0">
            <div class="dashboardCard m-2">
                <div class="p-3">
                    <img class="img-fluid m-auto d-flex justify-content-center" src="{{ asset('assests/images/landing/media.svg') }}" alt="">
                    <h4 class="dashboardTitle d-block text-center mt-2">My Media</h4>
                </div>                
            </div>
        </div>
    </div>
    
    <div class="row col-12 pl-2 pr-2 ml-0 mr-0">
        <div class="col-6 pr-0">
            <div class="dashboardCard m-2">
                <a href="{{url('announcementList?s=business')}}">
                    <div class="p-3">
                        <img class="img-fluid m-auto d-flex justify-content-center" src="{{ asset('assests/images/landing/businessProfile.svg') }}" alt="">
                        <h4 class="dashboardTitle d-block text-center mt-2">Business Profile</h4>
                    </div>
                </a>                                
            </div>
        </div>     
        <div class="col-6 pl-0">
            <div class="dashboardCard m-2">
                <div class="p-3">
                    <img class="img-fluid m-auto d-flex justify-content-center" src="{{ asset('assests/images/landing/support.svg') }}" alt="">
                    <h4 class="dashboardTitle d-block text-center pb-4 mt-2">Support</h4>
                </div>                
            </div>
        </div>
    </div>

</div>
@endsection