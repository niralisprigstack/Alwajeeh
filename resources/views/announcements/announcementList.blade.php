@extends('layouts.app')
<?php $v = "5.5" ?>
<title>Announcement List</title>
@section('content')
@section('css')
<style>
  .commonheadertext {
    padding-left: 10px !important;
    padding-bottom: 10px !important;
    padding-top: 80px !important;
}
.announcementListPageSection{
    /*padding-top: 20px;*/
    max-height: 60%;
    overflow: auto;
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

    @include('layouts.header', ['headtext' => '','subheadtext'=> 'ANNOUNCEMENTS'])
    @include('layouts.announcementFilter')
    <div class="fluid-container announcementListPageSection">


    @foreach($announcementlists as $announcementlist)
    <?php 
    $created_by=$announcementlist->created_by;
    $showdotandtime="d-none";
    if($created_by=="4"){
        $showdotandtime="";
        if(isset($announcementlist->closing_date)){

        }
    }
    ?>
    <input type="hidden" name="" class='checkedAnnouncement' value="{{url('checkedAnnouncement')}}">
    <input class="csrf-token" type="hidden" value="{{ csrf_token() }}">
    <!-- <a href="{{url('announcementDetail/'. $announcementlist->id)}}" target="_blank" class='' > -->
        <div class="announcementListMainDiv parent m-2 announcementlisting announcement_{{$announcementlist->id}}" onclick="checkedAnnouncement(this);" data-id="{{$announcementlist->id}}" data-user="{{$created_by}}">
            <div class="announcementDiv pt-2 pb-2">
                <div class="d-flex justify-content-between">
                    
                    <?php
                    $carbon_date = \Carbon\Carbon::parse($announcementlist->created_at);
                    $carbon_date = $carbon_date->addHours(4);
                    $date =  $carbon_date->format('M d');
                    $year =  $carbon_date->format('y');
                    // $object->created_at->format('d')
                    ?>
                     
                     
                        <span class="announcementList d-block"><span class="createdDate">{{$date}}</span> <br/> <span class="createdyr">{{$year}}</span></span>
                       
                    
                    
                    <span class="ongoingdot mt-2 {{$showdotandtime}}"></span>
                
                    
                        <div class="remainingDiv {{$showdotandtime}}">
                            <span class="remainingText justify-content-center">Remaining 3d 23h</span>
                        </div>
                   
                </div>

                <div class="col-12 mt-1 pl-0 pr-0">                   
                    <span class="announcementDesc anntitle">{{$announcementlist->title}}</span>                                       
                </div>


                 <!-- user list -->
                    <div class="userlist detailScrollableDiv mt-4  d-none mb-3">

                    </div>

                    <div class="nouserlist detailScrollableDiv mt-4  d-none">
                        <span class="announcementDesc">No Viewers.</span>
                    </div>
                <!-- end -->

                <div class="viewersbtndiv">
                <div class="col-12 d-flex justify-content-end pl-0 pr-0  " > 
                <input type="hidden" name="" class='announcementViewers' value="{{url('checkAnnouncementViewers')}}">
                <input class="csrf-token" type="hidden" value="{{ csrf_token() }}">                  
                    <span class="viewersSpan viewersClick">Viewers</span>                                         
                </div>
            </div>
            </div>            
        </div>



       
     
    <!-- </a> -->
        @endforeach


  
        <div class="closeviewerlist d-none downstaticbtn col-12 m-auto">
         <button type="button" class="mt-4 buttonCss buttonCss button_text col-6 p-0 closeviewersBtn">Close</button>
        </div>

    </div>


    <!-- sort div -->
    <div class="col-12 m-auto footerfiltersortdiv d-none" style="">


<div class="footersortbg col-10 justify-content-center ">
       
        <div class="d-flex justify-content-between align-items-center w-100 ">
  
            <a style="display: grid;" class="mt-2 mb-2" >
                <img class="img-fluid m-auto" style="" src="{{ asset('assests/images/announcement/sortby.svg') }}" alt="">
                <span class="fonthead filtertext navText m-auto">Sort by</span> </i>
            </a>

            <a style="display: grid;" class="mt-2 mb-2" >
                <img class="img-fluid m-auto" style="" src="{{ asset('assests/images/announcement/filter.svg') }}" alt="">
                <span class="fonthead filtertext navText m-auto">Filter</span> </i>
            </a>


            <a style="display: grid;" class="mt-2 mb-2" >
                <img class="img-fluid m-auto" style="" src="{{ asset('assests/images/announcement/businessprofile.svg') }}" alt="">
                <span class="fonthead filtertext navText m-auto">Business Profile</span> </i>
            </a>

         
        </div>
        
    </div>

    </div>
    <!-- end -->


<!-- <div class="" id="nav-upcoming" role="tabpanel"> -->
 <!-- 'announcementFilterpages.familyAnnouncement' , ['announcementlists' => $announcementlists ] -->
    <!-- </div> -->

@include('layouts.announcementFooterFilter')
@endsection
@section('script')

<!-- <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAjWotF6wKKrsQHC18xo0E-W77YpoOY8b8&libraries=places" ></script> -->
<script src="{{asset('/js/announcement.js?v='.$v) }}" ></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.viewersClick').click(function(e){ 
     
     // Do something
     e.stopImmediatePropagation();
     checkViewers(this);
  });
    });
</script>

@endsection
