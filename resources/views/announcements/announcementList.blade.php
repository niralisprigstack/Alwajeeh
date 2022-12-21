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
.filtersection{
    margin-top: 140px !important;
}
.announcementListPageSection{
    /* padding-top: 0px; */
    max-height: 46%;
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



    // echo $announcementlist['announcement_views'];
   
    ?>
  
    
    
    <?php 
    
  
     ?>
    <input type="hidden" name="" class='checkedAnnouncement' value="{{url('checkedAnnouncement')}}">
    <input class="csrf-token" type="hidden" value="{{ csrf_token() }}">
    <!-- <a href="{{url('announcementDetail/'. $announcementlist->id)}}" target="_blank" class='' > -->
    <div class="announcementListMainDiv ">
    </div>


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


<div class="footersortbg col-10 justify-content-center pt-4 pb-4 pl-4">
       
     
        <div class="d-flex  w-100 ascdiv " onclick="ascdesclick(this);" data-attr="asc">
        
                <i class="fas fa-arrow-up rotate c-pointer"  ></i>
                <span class="footerfilteredtext pl-3">Sort Date Ascending</span>
                
                </div>
        <span class=" d-block" style="height:25px;"></span>
                

        <div class="d-flex  w-100 desdiv" onclick="ascdesclick(this);" data-attr="desc" disabled style="pointer-events:none">
  
        <i class="fas fa-arrow-up rotate c-pointer down" ></i>
        <span class="footerfilteredtext pl-3">Sort Date Descending</span>
         
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
