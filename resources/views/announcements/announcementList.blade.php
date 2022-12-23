@extends('layouts.app')
<?php $v = "5.5" ?>
<title>Announcement List</title>
@section('content')
@section('css')
<style>
  .commonheadertext {
    padding-left: 10px !important;
}
.filtersection{
    padding-top: 140px !important;
}
.announcementListPageSection{
    /* padding-top: 0px; */
    max-height: 50%;
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
    
    @if(isset($_GET['k']) || isset($_GET['m']) || isset($_GET['y']))
    <div class="col-12 row pr-0 resetFilterDiv">
        <div class="col-6"></div>
        <div class="col-6 pr-0">
            <a href="{{url('announcementList')}}"><button type="button" class="buttonCss buttonCss button_text col-12 p-2">Reset Filters</button></a>
        </div>        
    </div>
    @endif
    
    <div class="fluid-container announcementListPageSection">

    @if(count($announcementlists) > 0)
        @php $showHideSection = "d-none"; @endphp
    @else
        @php $showHideSection = ""; @endphp
    @endif
    
    @foreach($announcementlists as $announcementlist)
    <?php 
    $created_by=$announcementlist->created_by;
    $showdot="d-none";
    $showtime="d-none";
    $remainingTime="";
    $showtimecss="";
    if($created_by=="4"){
        $showdot="";
        $showtime="";
        if(isset($announcementlist->closing_date)){
            date_default_timezone_set('Asia/Dubai');
            $edStamp = strtotime(now());
            $todaydate = date("Y-m-d H:i:s", $edStamp);
            // echo $todaydate;
            // $todaydate = date('Y-m-d H:i:s');
            if($todaydate<=$announcementlist->closing_date){
                //echo $todaydate;
                
                // echo $announcementlist->closing_date;
                $today = new DateTime($todaydate);
                $closedate = new DateTime($announcementlist->closing_date);

                // The diff-methods returns a new DateInterval-object...
                $diff =  $today->diff($closedate);

                // Call the format method on the DateInterval-object
                $remainingTime= $diff->format('%ad %hh');
                //remainingtime = date_diff($today ,$closedate);
                //$remainingTime=$remainingtime->format('%ad');


                //                 date_default_timezone_set('UTC');

                // $datetime = new DateTime();
                // echo $datetime->format('Y-m-d H:i:s');
               


            }
            else{
                $showtime="";
                $showtimecss="visibility:hidden";
            }
        }
    }
 
        $submittedLabel="d-none";
        if($announcementlist->interested=="1"){
                $submittedLabel="";
         }
                
                



    // echo $announcementlist['announcement_views'];
   
    ?>
    
    @php
        $getUnreadCount = $announcementlist->announcement_views->where('user_id' , Auth::id())->where('announcement_id', $announcementlist->id)->count();        
        $checkUnread = "";         
    @endphp
    
    @if($getUnreadCount == 0)
        @php $checkUnread = "1"; @endphp
    @endif
                 
    <input type="hidden" name="" class='checkedAnnouncement' value="{{url('checkedAnnouncement')}}">
    <input class="csrf-token" type="hidden" value="{{ csrf_token() }}">    
    <div class="announcementListMainDiv "></div>


        <div class="announcementListMainDiv parent m-2 announcementlisting announcement_{{$announcementlist->id}}" onclick="checkedAnnouncement(this);" data-id="{{$announcementlist->id}}" 
data-unread="{{$checkUnread}}" data-user="{{$created_by}}" data-interested="{{$announcementlist->interested}}">
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
                       
                    
                    
                    <span class="ongoingdot mt-2 {{$showdot}}"></span>
                
                    
                        <div class="remainingDiv {{$showtime}}" style={{$showtimecss}}>
                            
                            <span class="remainingText justify-content-center">Remaining {{$remainingTime}}</span>
                        </div>


                        <div class="submitDiv {{$submittedLabel}} d-none">
                            <span class="submitText justify-content-center">Submitted</span>
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
        
        <!--no records found-->
        <div class="noRecords m-2 announcementList justify-content-center {{$showHideSection}}" style="min-height: 40vh;">No Records Found!</div>
        <!--no records found-->
        


  
        <div class="closeviewerlist d-none downstaticbtn col-12 m-auto">
         <button type="button" class="mt-4 buttonCss buttonCss button_text col-6 p-0 closeviewersBtn">Close</button>
        </div>

    </div>
    
    <!--advance filter div-->
    <section class="mb-5 pb-5 advancedFilterDiv d-none">
        <input type="hidden" class="announcementList" value="{{url('announcementList')}}">
        <h5 class="ml-3 filterCss">ADVANCED FILTER</h5>
        <div class="submissionDiv mt-3 mb-3 ml-2 mr-2 pb-3" style="min-height: 50vh;">
            <div class="row col-12 justify-content-between mb-3">
                <div class="col-6 col-lg-6 col-md-6 mt-3">
                    <?php 
                        $year_start  = 2000;
                        $year_end = date('Y');
                        echo '<select class="form-control filterPerYearDropdown" id="filterPerYear" name="filterPerYear">';
                        echo '<option value="" disabled selected>Filter Per Year</option>';
                        for ($i_year = $year_start; $i_year <= $year_end; $i_year++) {        
                            echo '<option value="'.$i_year.'">'.$i_year.'</option>';
                        }
                        echo '</select>';
                    ?>
                </div>

                <div class="col-6 col-lg-6 col-md-6 pr-0 pb-3 mt-3">
                    <select class="form-control filterPerMonthDropdown" id="filterPerMonth" name="filterPerMonth">
                        <option value="" disabled selected>Filter Per Month</option>
                        <option value="1">Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
            </div>
            
            <div class="col-12 justify-content-between mb-3">
                <input style="font-size: 18px;" type="text" class="inputTextClass form-control keywordInput" name="keywords" placeholder="Keywords" />
            </div>
        </div>
        
        <div class="submittedbtnidv col-7 m-auto mb-5 ">
            <button onclick="applyFilter();" type="button" class="mt-4 buttonCss buttonCss button_text col-12 p-2">Apply Filter</button>
        </div>
    </section>
    <!--advance filter div-->

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
