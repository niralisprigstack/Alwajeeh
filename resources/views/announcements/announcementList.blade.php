@extends('layouts.app')
<?php $v = "5.5" ?>
<title>Announcement List</title>
@section('content')
@section('css')
<link href="{{ asset('css/announcement.css?v='.$v) }}" rel="stylesheet">
@endsection
<div class="announcementbody">
    @include('layouts.header', ['headtext' => '','subheadtext'=> 'ANNOUNCEMENTS'])
    <div class="fluid-container announcementListPageSection">

        <div class="announcementListMainDiv mt-3 mb-3 ml-2 mr-2">
            <div class="announcementDiv pt-3 pb-3">
                <div class="row">
                    <div class="col-4">
                        <span class="announcementList">NOV 14 <br /> 22</span>
                    </div>
                    <div class="col-8">
                        <div class="remainingDiv">
                            <span class="remainingText justify-content-center">Remaining 3d 23h</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-2 pl-0 pr-0">                   
                    <span class="announcementDesc">Example of investement project to show interest</span>                                       
                </div>

                <div class="col-12 mt-2 d-flex justify-content-end pl-0 pr-0">                   
                    <span class="viewersSpan">Viewers</span>                                         
                </div>
            </div>            
        </div>

        <div class="announcementListMainDiv mt-3 mb-3 ml-2 mr-2">
            <div class="announcementDiv pt-3 pb-3">
                <div class="row">
                    <div class="col-4">
                        <span class="announcementList">OCT 23 <br /> 22</span>
                    </div>
                    <div class="col-8">
                        <div class="remainingDiv">
                            <span class="remainingText justify-content-center">Remaining 3d 23h</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-2 pl-0 pr-0">                   
                    <span class="announcementDesc">Example of investement project to show interest</span>                                       
                </div>

                <div class="col-12 mt-2 d-flex justify-content-end pl-0 pr-0">                   
                    <span class="viewersSpan">Viewers</span>                                         
                </div>
            </div>
        </div>
        
        <div class="announcementListMainDiv mt-3 mb-3 ml-2 mr-2">
            <div class="announcementDiv pt-3 pb-3">
                <div class="row">
                    <div class="col-4">
                        <span class="announcementList">SEP 14 <br /> 22</span>
                    </div>
<!--                    <div class="col-8">
                        <div class="remainingDiv">
                            <span class="remainingText justify-content-center">Remaining 3d 23h</span>
                        </div>
                    </div>-->
                </div>

                <div class="col-12 mt-2 pl-0 pr-0">                   
                    <span class="announcementDesc">Example of investement project to show interest</span>                                       
                </div>

                <div class="col-12 mt-2 d-flex justify-content-end pl-0 pr-0">                   
                    <span class="viewersSpan">Viewers</span>                                         
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
@section('script')
@endsection