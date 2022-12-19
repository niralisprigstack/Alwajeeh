@extends('layouts.app')
<?php  $v = "5.5" ?>
<title>Create Announcement</title>
@section('content')
@section('css')
<link href="{{ asset('css/loader.css') }}" rel="stylesheet">
<link href="{{ asset('css/announcement.css?v='.$v) }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/location.css?v='.$v) }}">
@endsection

<?php

$usertype=Auth::user()->user_type;
if($usertype=="4"){
    $required="required";
    $otherrequired="required";
    $showdiv="";
}else{
    $required="required";
    $otherrequired="";
    $showdiv="d-none";
}


?>





<div class="announcementbody">
@include('layouts.header', ['headtext' => 'ANNOUNCEMENTS','subheadtext'=> 'Create Announcement'])
<div class="fluid-container announcementContainer" style="padding-bottom: 45px;">
    
    <!--<div>-->
        <div class="announcementSection mt-3 mb-3 ml-2 mr-3">
            <div class="announcementDiv mb-4 mt-4">
            <form action="{{url('createannouncement')}}" id="createAnnouncementForm" method="POST" onsubmit="return createannouncement()" enctype="multipart/form-data">
             @csrf

             <input type="hidden" name="status" class='statuscheck' value="">

             
             <div class="col-12 justify-content-between mb-3 pl-0 pr-0 pt-3">
                    <span class="inputSpanText">Title</span>                  
                </div>
                <div class="col-12 justify-content-between mb-3 pl-0 pr-0 pt-3">
                    <input type="text" class="inputTextClass form-control" name="annTitle" value="" {{$required}}/>
                </div>
                
                <div class="col-12 justify-content-between mb-3 pl-0 pr-0 pt-3">
                    <span class="inputSpanText">Details</span>                  
                </div>
                <div class="col-12 justify-content-between mb-3 pl-0 pr-0 pt-3">
                    <textarea class="w-100 inputTextAreaClass form-control" name="annDetail" {{$required}}></textarea>
                </div>
                
                 <div class="row col-12 justify-content-between mb-3">                     
                     <span class="inputSpanText" style="font-weight: 600;">
                     <img class="c-pointer global-font-color mr-2" src="{{ asset('assests/images/announcement/uploadMediaIcon.svg') }}" alt="" style="">
                      <label for="announcementmedia" class="m-auto">Upload Media</label>
                    </span>    
                    <!-- <input type="file" name="file[]" multiple /> -->
                    <input class="inputfile c-pointer d-none" type="file" id="announcementmedia" style="" name="announcementmedia[]" accept="image/png, image/gif, image/jpeg, image/svg, image/jpg,video/mp4"  multiple>                               
                </div>
                
                 <div class="col-12 justify-content-between mb-3 pl-0 pr-0 {{$showdiv}}">
                    <span class="inputSpanText">Project Value</span>                  
                </div>
                <div class="col-12 justify-content-between mb-3 pl-0 pr-0 {{$showdiv}}">
                    <input type="text" class="inputTextClass form-control" name="projectVal" value="" {{$otherrequired}} />
                </div>
                
                 <div class="col-12 justify-content-between mb-3 pl-0 pr-0 {{$showdiv}}">
                    <span class="inputSpanText">Location</span>                
                </div>
                <div class="col-12 justify-content-between mb-3 pl-0 pr-0 {{$showdiv}}">

                <!-- <input type="text" name="autocomplete" id="autocomplete" class="form-control postLocationinput pac-target-input" placeholder="Find a location..." autocomplete="off"> -->
                    <input type="text" id="locationsearch"  class="inputTextClass form-control Locationinput" name="location" value=""  placeholder="" {{$otherrequired}} />
                </div>

                 <div class="col-12 justify-content-between mb-3 pl-0 pr-0  {{$showdiv}}">
                    <span class="inputSpanText">Closing Date</span>                  
                </div>

                <!-- <div class="date align-items-center datetimepickerforfiles" id="">
                        <input type="text" class="form-control auth-input shadow-none" autocomplete="false" value="" id="birth_date" name="birth_date" style="" placeholder="Birth Date DD/MM/YY" required>
                        <span class="input-group-addon  birthdatepicker">
                           
                        </span>
                    </div> -->

                <div class="col-12 justify-content-between mb-3 pl-0 pr-0 date datetimepickerforannouncement {{$showdiv}}">
                    <input type="text" class="inputTextClass form-control" name="closingDate" value="" {{$otherrequired}}/>
                    <span class="input-group-addon  birthdatepicker">
                            <!-- <i class="far fa-calendar calendar" style="font-size: 20px;"></i> -->
                        </span>
                </div>
                
                <div class="row col-12 justify-content-between mb-3 pl-0 pr-0 mr-0 ml-0">
                    <div class="col-6 col-lg-6 col-md-6 pl-0">
                        <button type="submit" class="mt-4 buttonCss button_text col-12 p-0 btnstatus btnpublish" value="2">Publish</button>
                    </div>

                    <div class="col-6 col-lg-6 col-md-6 pl-0 pr-0 pb-3">
                        <button type="submit" class="mt-4 buttonCss button_text col-12 p-0 btnstatus btndraft" value="1">Save Draft</button>
                    </div>
                </div>
                
               
                
                <div class="col-12 justify-content-between mb-3 pl-0 pr-0 pb-3 d-none">
                    <button type="submit" class="mt-4 buttonCss deleteBtnCss button_text col-12 p-0 btnstatus btndelete" value="3">Delete</button>
                </div>
            </div>
</form>

        </div>
    <!--</div>-->
    

    <!--<img class="img-fluid profile_footerimg" style="" src="{{ asset('assests/images/profile/profile_footer.svg') }}" alt="">-->
</div>

</div>


@endsection


@section('script')
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAjWotF6wKKrsQHC18xo0E-W77YpoOY8b8&libraries=places" ></script>
<script src="{{asset('/js/announcement.js?v='.$v) }}" ></script>
<script type="text/javascript">
    $(document).ready(function() {
      

        $('.datetimepickerforannouncement').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });


    });
</script>



@endsection
