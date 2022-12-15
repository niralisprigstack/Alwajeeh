@extends('layouts.app')
<?php  $v = "5.5" ?>
<title>Announcements</title>
@section('content')
@section('css')
<!--<link href="{{ asset('css/loader.css') }}" rel="stylesheet">-->
<link href="{{ asset('css/announcement.css?v='.$v) }}" rel="stylesheet">
@endsection
<div class="fluid-container announcementContainer">
    <div class="staticBlackBg">
    <img class="img-fluid" style="width: 100px;height: 104.39px;float: right;" src="{{ asset('assests/images/register_logo.svg') }}" alt="">
    <span class="announcementText">ANNOUNCEMENTS</span>
    <span class="createAnnouncementText">Create Announcement</span>
</div>
    <img class="img-fluid profile_headerimg" style="" src="{{ asset('assests/images/profile/bgimg.png') }}" alt="">

    <div class="profile-section ">

    </div>

    <img class="img-fluid profile_footerimg" style="" src="{{ asset('assests/images/profile/profile_footer.svg') }}" alt="">
</div>


@endsection


@section('script')
@endsection