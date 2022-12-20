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
<div class="announcementbody">
    @include('layouts.header', ['headtext' => '','subheadtext'=> 'ANNOUNCEMENTS'])
    @include('layouts.announcementFilter')
    <div class="fluid-container announcementListPageSection">



    <div class="{{$defaultSelectd}}" id="nav-upcoming" role="tabpanel">
    @include('announcementFilterpages.familyAnnouncement' , ['announcementlists' => $announcementlists ])
    </div>


  
        <div class="closeviewerlist d-none downstaticbtn col-12 m-auto">
         <button type="button" class="mt-4 buttonCss buttonCss button_text col-6 p-0 closeviewersBtn">Close</button>
        </div>

    </div>

</div>
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
