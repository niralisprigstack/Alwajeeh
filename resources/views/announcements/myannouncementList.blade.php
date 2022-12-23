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
    padding-top: 120px !important;
}
.announcementListPageSection{
    /*max-height: 85%;*/
    overflow: auto;
    padding-top: 115px !important;
    padding-bottom: 60px;
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
   
    <div class="fluid-container announcementListPageSection">


    @foreach($announcementlists as $announcementlist)
    
    
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


        <div class="announcementListMainDiv parent m-2 announcementlisting announcement_{{$announcementlist->id}}"  data-id="{{$announcementlist->id}}" 
data-unread="{{$checkUnread}}" data-user="" data-interested="{{$announcementlist->interested}}">
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
                       
                    
                    
                    <span class="ongoingdot mt-2 d-none"></span>
                
                    
                        <div class="" style=>
                           <a href="{{url('createannouncement')}}/{{$announcementlist->id}}">
                           <i class="far fa-edit mr-1" style="font-size: 18px;color: white;"></i>
                           </a> 
                       
                        </div>


                       

                   
                </div>

                <div class="col-12 mt-1 pl-0 pr-0">                   
                    <span class="announcementDesc anntitle">{{$announcementlist->title}}</span>                                       
                </div>


                

              
            </div>            
        </div>



       
     
    <!-- </a> -->
    

        @endforeach


  
       

    </div>




<!-- <div class="" id="nav-upcoming" role="tabpanel"> -->
 <!-- 'announcementFilterpages.familyAnnouncement' , ['announcementlists' => $announcementlists ] -->
    <!-- </div> -->


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
