@extends('layouts.app')
<?php  $v = "5.5" ?>
<title>All Announcements</title>
@section('content')
@section('css')
<link href="{{ asset('css/loader.css') }}" rel="stylesheet">
<link href="{{ asset('css/announcement.css?v='.$v) }}" rel="stylesheet">
@endsection
<div class="announcementbody">
@include('layouts.header', ['headtext' => 'ANNOUNCEMENTS','subheadtext'=> 'Create Announcement'])
@include('layouts.announcementFilter')
<div class="fluid-container allannouncementContainer">
    
    
    
 

</div>


@endsection


@section('script')
@endsection