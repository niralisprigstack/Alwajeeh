@extends('layouts.app')
<?php $v = "5.5" ?>
<title>Announcement List</title>
@section('content')
@section('css')
<style>
  .commonheadertext {
    padding-left: 10px !important;
    padding-bottom: 30px !important;
    padding-top: 80px !important;
}
.announcementListPageSection{
    overflow-y: scroll !important;
    position: absolute;
    overflow-x: hidden;
    /* max-height: -webkit-fill-available; */
    max-height: 50vh;
    bottom: 12%;
}
.createAnnouncementText{    
    font-weight: 700;
    font-size: 30px;
    line-height: 37px;
    display: flex;
    align-items: center;
    color: #A4894B;
    width:auto !important;
}
.announcementText{
    display: none !important;
}
  </style>
<link href="{{ asset('css/announcement.css?v='.$v) }}" rel="stylesheet">
@endsection
<div class="announcementbody">
    @include('layouts.header', ['headtext' => '','subheadtext'=> 'ANNOUNCEMENTS'])
    @include('layouts.announcementFilter')
    <div class="fluid-container announcementListPageSection">


    @foreach($announcementlists as $announcementlist)
        <div class="announcementListMainDiv mt-3 mb-3 ml-2 mr-2">
            <div class="announcementDiv pt-3 pb-3">
                <div class="row">
                    <div class="col-3 pr-0">
                    <?php
                    $carbon_date = \Carbon\Carbon::parse($announcementlist->created_at);
                    $carbon_date = $carbon_date->addHours(4);
                    $date =  $carbon_date->format('M d');
                    $year =  $carbon_date->format('y');
                    // $object->created_at->format('d')
                    ?>
                     </span>
                     
                        <span class="announcementList">{{$date}} <br/> {{$year}}</span>
                       
                    </div>
                    <div class="col-1 mt-2">
                    <span class="ongoingdot"></span>
                    </div>
                    <div class="col-8">
                        <div class="remainingDiv">
                            <span class="remainingText justify-content-center">Remaining 3d 23h</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-2 pl-0 pr-0">                   
                    <span class="announcementDesc">{{$announcementlist->title}}</span>                                       
                </div>

                <div class="col-12 mt-2 d-flex justify-content-end pl-0 pr-0">                   
                    <span class="viewersSpan">Viewers</span>                                         
                </div>
            </div>            
        </div>

        @endforeach
  

    </div>

</div>
@include('layouts.announcementFooterFilter')
@endsection
@section('script')
@endsection