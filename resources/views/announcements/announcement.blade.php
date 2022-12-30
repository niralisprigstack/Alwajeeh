@extends('layouts.app')
<?php $v = "8.5" ?>
<title>Create Announcement</title>
@section('content')
@section('css')
<style>
    .announcementContainer {
        margin-top: 160px;
    }
</style>
<link href="{{ asset('css/loader.css') }}" rel="stylesheet">
<link href="{{ asset('css/announcement.css?v='.$v) }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/location.css?v='.$v) }}">

@endsection

<?php

$usertype = Auth::user()->user_type;
if ($usertype == "4") {
    $required = "required";
    $otherrequired = "required";
    $showdiv = "";
} else {
    $required = "required";
    $otherrequired = "";
    $showdiv = "d-none";
}


$title = "";
$description = "";
$project_value = "";
$location = "";
$closingdate = "";
$announcementid = "";
$pagename = 'Create Announcement';
$id = "";
$showThis="d-none";
if (isset($announcement)) {
    $title = $announcement->title;
    $description = $announcement->description;
    $project_value = $announcement->project_value;
    $location = $announcement->announcement_location;
    // $closingdate = $announcement->closing_date;
    $announcementid = $announcement->id;
    $pagename = 'Edit Announcement';
    $showThis="";

   
        $date = $announcement->closing_date;
        $closingdate = date('d/m/Y', strtotime($date));
        $id="/" . $announcementid;
}

?>


@include('layouts.header', ['headtext' => 'ANNOUNCEMENTS','subheadtext'=> $pagename])
<div class="fluid-container announcementContainer" style="padding-bottom: 45px;">

    <!--<div>-->
    <div class="announcementSection mt-3 mb-3 ml-2 mr-3">
        <div class="announcementDiv mb-4 mt-4 pb-4">
            <form action="{{url('createannouncement')}}{{$id}}" id="createAnnouncementForm" method="POST"  onsubmit="return createannouncement(this);" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="status" class='statuscheck' value="">
                <input type="hidden" name="removedImageIds" class="removedImageIds" value=''>
                <input type="hidden" name="addedimageArr" class="addedimageArr" value=''>


                <div class="col-12 justify-content-between mb-3 pl-0 pr-0 pt-3">
                    <span class="inputSpanText">Title</span>
                </div>
                <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                    <input type="text" class="inputTextClass form-control" name="annTitle" value="{{$title}}" {{$required}} />
                </div>

                <div class="col-12 justify-content-between mb-3 pl-0 pr-0 pt-3">
                    <span class="inputSpanText">Details</span>
                </div>
                <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                    <textarea class="w-100 inputTextAreaClass form-control" name="annDetail" value="{{$description}}" {{$required}}>{{$description}}</textarea>
                </div>

                <!-- <div class="row col-12 justify-content-between mb-3">
                    <span class="inputSpanText" style="font-weight: 600;">


                        <img class="c-pointer global-font-color mr-2" src="{{ asset('assests/images/announcement/uploadMediaIcon.svg') }}" alt="" style="">
                        <label for="announcementmedia" class="m-auto uploadMediaLabel">Upload Media</label>
                    </span>
                 
                    <input onchange="checkSelectedFile(this);" class="inputfile c-pointer d-none" type="file" id="announcementmedia" style="" name="announcementmedia[]" accept="image/png, image/gif, image/jpeg, image/svg, image/jpg,video/mp4 ,video/mpeg2 ,video/mpeg ,video/mpeg4" multiple>
                </div> -->







                <!-- img -->
                <input type="hidden" class="checktype" val="1">
                

                <div class="upload_marketplace_image mb-3 mb-md-0 inputSpanText" style="font-weight: 600;">
                        <img class="c-pointer global-font-color mr-2" src="{{asset('assests/images/announcement/uploadMediaIcon.svg')}}" alt="" style="">
                        <label for="marketplace_image" class="uploadMediaLabel mt-auto mb-auto">Upload Image</label>

                    </div>
                
                    <!-- <div class="upload_marketplace_image mb-3 mb-md-0">
                        <img src="{{asset('assests/images/announcement/uploadMediaIcon.svg')}}" class='mr-1 c-pointer iconorImage imgset' alt="upload" srcset="">
                        <label for="marketplace_image" class="c-pointer font-weight-bold paraFont text-underline">Add Images (optional)</label>
                    </div> -->

                    <input type="hidden" class="getVidFileSize" value="">
                    <input type="hidden" class="getImgFileSize" value="">
                    <!-- <div class="inputDiv">
                    <input type="file" accept="image/*"  name="marketplace_image1" class="form-control  marketplace_image_input d-none" data-count='1' data-type="1" /> 
                    </div> -->


                    <div class="row parentImg">
                        <div class="col-md-3 col-4 pt-3 pb-3 d-none defaultImageDiv">
                            <i onclick="removeMarketPlaceImage(this);" class="fa fa-times removeMarketPlaceImage c-pointer pr-3 p-md-0 cancelclick" aria-hidden="true" value="1"></i>
                            <img src="" alt="" class="img-fluid img1">
                            <!-- <video controls class="img-fluid"  autoplay playsinsline loop muted>
                            <source src="">
                        </video> -->
                        </div>
                        @if(isset($announcement->announcementfiles) && !empty($announcement->announcementfiles))
                        @foreach($announcement->announcementfiles as $announcementfiles)
                        <?php
                        $ext =$ext = pathinfo($announcementfiles->media_location, PATHINFO_EXTENSION);
                        if ($ext == "jpeg" || $ext == "jpg" || $ext == "svg" || $ext == "png" || $ext == "gif" ) { ?>
                            <div class="col-md-3 col-4 pt-3 pb-3  ImageDiv MediaSouqPreview">
                                <i onclick="removeMarketPlaceImage(this);" class="fa fa-times removedImageId removeMarketPlaceImage c-pointer pr-3 p-md-0 cancelclick" data-id="{{$announcementfiles->id}}" aria-hidden="true" value="1"></i>
                                <img src="{{Storage::disk('s3')->url($announcementfiles->media_location)}}" alt="" class="img-fluid img1 announcementImageVid">
                            </div>
                        <?php } ?>
                        @endforeach
                        @endif

                    </div>
                    <!-- end img -->



                    <!-- vdo -->


                    <div class="upload_marketplace_video mb-3 mb-md-0 inputSpanText" style="font-weight: 600;">
                        <img class="c-pointer global-font-color mr-2" src="{{asset('assests/images/announcement/uploadMediaIcon.svg')}}" alt="" style="">
                        <label for="marketplace_image" class="uploadMediaLabel mt-auto mb-auto">Upload Video</label>

                    </div>
                
                    <!-- <div class="upload_marketplace_video mb-3 mb-md-0 mt-3">
                        <img src="{{asset('assests/icons/uplod_banner.svg')}}" class='mr-1 c-pointer iconorImage imgset' alt="upload" srcset="">
                        <label for="marketplace_image" class="c-pointer font-weight-bold paraFont text-underline">Add Videos(optional)</label>
                    </div> -->

                    <input type="hidden" class="getVidFileSize" value="">
                    <!-- <div class="inputDiv">
 <input type="file" accept="image/*"  name="marketplace_image1" class="form-control  marketplace_image_input d-none" data-count='1' data-type="1" /> 
</div> -->


                    <div class="row parentvid">
                        <div class="col-md-3 col-4 pt-3 pb-3 d-none defaultvidDiv ">
                            <i onclick="removeMarketPlaceImage(this);" class="fa fa-times removeMarketPlaceImage c-pointer pr-3 p-md-0 cancelclick" aria-hidden="true" value="2"></i>
                            <!-- <img src=""   alt="" class="img-fluid vdo1"> -->
                            <video controls class="img-fluid vdo1" autoplay playsinsline loop muted>
                                <source src="">
                            </video>
                        </div>
                        @if(isset($announcement->announcementfiles) && !empty($announcement->announcementfiles))
                        @foreach($announcement->announcementfiles as $announcementfiles)
                        <?php $ext = pathinfo($announcementfiles->media_location, PATHINFO_EXTENSION);
                        if ($ext == "mp4" || $ext == "mpeg2" || $ext == "mpeg" || $ext == "mpeg4") { ?>
                            <div class="col-md-3 col-4 pt-3 pb-3  vidDiv MediaSouqPreview">
                                <i onclick="removeMarketPlaceImage(this);" class="fa fa-times removedImageId removeMarketPlaceImage c-pointer pr-3 p-md-0 cancelclick" data-id="{{$announcementfiles->id}}" aria-hidden="true" value="2"></i>
                                <video controls class="img-fluid vdo1 announcementImageVid" autoplay playsinsline loop muted>
                                    <source src="{{Storage::disk('s3')->url($announcementfiles->media_location)}}">
                                </video>
                            </div>
                        <?php } ?>
                        @endforeach
                        @endif

                    </div>
                    <!-- end vdo -->
                    <input type="hidden" name="marketplace_pic" class="marketplace_pic">
        <div class="inputDiv">
          <input type="file" accept="image/*" name="marketplace_image1" class="form-control  marketplace_image_input d-none" data-count='1' data-type="1" />
        </div>



                    <!-- preview div -->
                    <!-- <div id="image_preview" class="row mb-3">
                <?php
                if (isset($announcement->announcementfiles)) {
                    // echo $announcement->announcementfiles;
                ?>
                @foreach($announcement->announcementfiles as $announcementfiles)
                <?php
                    $ext = pathinfo($announcementfiles->media_location, PATHINFO_EXTENSION);
                ?>
                                <div class="col-4 proImg mb-3">
                                <div class="positioner ">
                                        <div class="icon">
                                            <i dbid="" class="fa fa-times clickable cancelclick" onclick="deleteProductImage(this);" aria-hidden="true"></i>
                                    </div>
                                </div>
                                        <a onclick="setFeaturedImage(this);" data-name="updID" data-img-id="">
                                        
                                   
                                        <?php if ($ext == "mp4" || $ext == "MP4" || $ext == "mpeg2" || $ext == "mpeg" || $ext == "mpeg4") { ?>
                                            <video class='productImage' data-poster="" controls>
                                            <source data-src="{{Storage::disk('s3')->url($announcementfiles->media_location)}}" src="{{Storage::disk('s3')->url($announcementfiles->media_location)}}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                                            </video>
                                       <?php  } else { ?>
                                        <img class='productImage' data-src="{{Storage::disk('s3')->url($announcementfiles->media_location)}}" src="{{Storage::disk('s3')->url($announcementfiles->media_location)}}"></a>

                                       <?php } ?>
                                        
                                  
                                    
                                </div>
                                @endforeach
                                        <?php } ?>
                            </div> -->
                    <!-- end -->

                    <div class="col-12 justify-content-between mb-3 pl-0 pr-0 {{$showdiv}}">
                        <span class="inputSpanText">Project Value</span>
                    </div>
                    <div class="col-12 justify-content-between mb-3 pl-0 pr-0 {{$showdiv}}">
                        <input type="text" class="inputTextClass form-control" name="projectVal" value="{{$project_value}}" {{$otherrequired}} />
                    </div>

                    <div class="col-12 justify-content-between mb-3 pl-0 pr-0 {{$showdiv}}">
                        <span class="inputSpanText">Location</span>
                    </div>
                    <div class="col-12 justify-content-between mb-3 pl-0 pr-0 {{$showdiv}}">

                        <!-- <input type="text" name="autocomplete" id="autocomplete" class="form-control postLocationinput pac-target-input" placeholder="Find a location..." autocomplete="off"> -->
                        <input type="text" id="locationsearch" class="inputTextClass form-control Locationinput" name="location" value="{{$location}}" placeholder="" {{$otherrequired}} />
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
                        <input type="text" class="inputTextClass form-control" name="closingDate" value="{{$closingdate}}" {{$otherrequired}} />
                        <span class="input-group-addon  birthdatepicker">
                            <!-- <i class="far fa-calendar calendar" style="font-size: 20px;"></i> -->
                        </span>
                    </div>

                    <div class="row col-12 justify-content-between mb-3 pl-0 pr-0 mr-0 ml-0">
                        <div class="col-6 col-lg-6 col-md-6 pl-0">
                            <button type="submit" class="mt-4 buttonCss button_text col-12 p-0 btnstatus btnpublish" value="2">Publish</button>
                        </div>

                        <div class="col-6 col-lg-6 col-md-6 pl-0 pr-0 ">
                            <button type="submit" class="mt-4 buttonCss button_text col-12 p-0 btnstatus btndraft" value="1">Save Draft</button>
                        </div>
                    </div>



                    <div class="col-12 justify-content-between mb-3 pl-0 pr-0 {{$showThis}}">
                        <button type="submit" class="mt-4 buttonCss deleteBtnCss button_text col-12 p-0 btnstatus btndelete" value="3">Delete</button>
                    </div>
                </div>
            </form>

        </div>
        <!--</div>-->


        <!--<img class="img-fluid profile_footerimg" style="" src="{{ asset('assests/images/profile/profile_footer.svg') }}" alt="">-->
    </div>




    @endsection


    @section('script')
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAjWotF6wKKrsQHC18xo0E-W77YpoOY8b8&libraries=places&callback=initAutocomplete"></script>
    <script src="{{asset('/js/announcement.js?v='.$v) }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //map location call
            google.maps.event.addDomListener(window, 'load', initialize);
            // google.maps.event.addDomListener(window, 'load', initAutocomplete);

            function initialize() {
                var input = document.getElementById('locationsearch');
                var autocomplete = new google.maps.places.Autocomplete(input);

                autocomplete.addListener('place_changed', function() {
                    var selectedLocation = $('.Locationinput').val();
                    $('.ifAddedloaction').text(selectedLocation);
                    $('.post_location').val(selectedLocation);
                    var place = autocomplete.getPlace();
                });
            }

            $('.datetimepickerforannouncement').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });

//             $('#createAnnouncementForm').on('submit', function (e) {
//     e.preventDefault();
//     saveData(this);
// });

            //onsubmit call
          

        });


  
    </script>



    @endsection