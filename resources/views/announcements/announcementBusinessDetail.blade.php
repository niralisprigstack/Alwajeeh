@extends('layouts.app')
<?php $v = "5.5" ?>
<title>Announcement Business Detail</title>
@section('content')
@section('css')
<link href="{{ asset('css/announcement.css?v='.$v) }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

    @include('layouts.header', ['headtext' => '','subheadtext'=> 'ANNOUNCEMENTS'])
    <div class="fluid-container">

        <div class="announcementListMainDiv mt-3 mb-2 ml-2 mr-2">
            <div class="announcementDiv pt-3 pb-3">
                <div class="row">
                    <div class="col-5 pr-0">
                    <?php
                        $carbon_date = \Carbon\Carbon::parse($announcementdetail->created_at);
                        $carbon_date = $carbon_date->addHours(4);
                        $date =  $carbon_date->format('M d');
                        $year =  $carbon_date->format('y');                    
                    ?>
                        <span class="announcementList">{{ $date}} <br /> {{$year}}</span>
                    </div>
                    <div class="col-7 row pl-0 pr-0">                                          
                        @if(count($announcementImages) > 0 && count($announcementVideos) > 0)
                            <a onclick="showMediaSlider(this);" data-show="photos"><span class="mediaSpan photoSec ml-3 d-none">Photos</span></a>                        
                            <a onclick="showMediaSlider(this);" data-show="videos"><span class="mediaSpan videoSec ml-3 d-none" style="color: #B7B7B7;">Videos</span></a>
                        @endif
                    </div>
                    </div>
                </div>

                <div class="col-12 pl-0 pr-0 pb-3">                   
                    <span class="announcementDesc">{{$announcementdetail->title}}</span>                                       
                </div>               
            </div>            
        </div>

        <div class="announcementListMainDiv mt-2 mb-2 ml-2 mr-2">
            <div class="announcementDiv detailDiv pt-1 pb-3">
                <div class="closeBtn text-right d-none">
                    <a onclick="backToDetailSection();"><img class="img-fluid m-auto" style="" src="{{ asset('assests/images/announcement/closeBtn.svg') }}" alt="" /></a>
                </div>
                
                <div class="detailScrollableDiv">
                    <div class="col-12 pl-0 pr-0 descriptionSec">                   
                        <span class="announcementList">Introduction</span>                                      
                    </div>
                    
                    <div class="col-12 mt-2 pl-0 pr-0 descriptionSec">                   
                        <span class="announcementDesc">{{$announcementdetail->description}}</span>                                       
                    </div>

                    <div class="row mt-3 announcementMediaDiv">
                        @if(count($announcementImages) > 0)
                        <div class="col-6 col-lg-6">
                            <a onclick="showMediaSlider(this);" data-show="photos"><img class="img-fluid m-auto announcementPhoto" src="{{Storage::disk('s3')->url($announcementImages[0]->media_location)}}" alt="" /></a>
                            <span>Photos</span>
                        </div>
                        @endif
                        
                        @if(count($announcementVideos) > 0)
                        <div class="col-6 col-lg-6">
                            <a onclick="showMediaSlider(this);" data-show="videos">
                                <video class="announcementVideo">
                                    <source src="{{Storage::disk('s3')->url($announcementVideos[0]->media_location)}}" type="video/mp4">
                                    <source src="{{Storage::disk('s3')->url($announcementVideos[0]->media_location)}}" type="video/ogg">                                
                                </video>
                            </a>
                            <span>Videos</span>
                        </div>
                        @endif                        
                    </div>
                    
                    <!--image slider div-->
                    <div class="col-12 mt-3 pl-0 pr-0 imageSliderDiv d-none">
                        <div id="imageCarouselSlider" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @php $cnt = 0; @endphp
                                @foreach($announcementImages as $announcementImage)
                                    @if($cnt == 0)
                                        <div class="carousel-item active">
                                            <a href="{{Storage::disk('s3')->url($announcementImage->media_location)}}"
                                                data-fancybox="images">
                                                <img class="d-block w-100 sliderImg" src="{{Storage::disk('s3')->url($announcementImage->media_location)}}" />
                                            </a>
                                        </div>
                                        @php $cnt++; @endphp
                                    @else
                                        <div class="carousel-item">
                                            <a href="{{Storage::disk('s3')->url($announcementImage->media_location)}}"
                                                data-fancybox="images">
                                                <img class="d-block w-100 sliderImg" src="{{Storage::disk('s3')->url($announcementImage->media_location)}}" />
                                            </a>
                                        </div>
                                        @php $cnt++; @endphp
                                    @endif                                    
                                @endforeach                                
                            </div>
                            
                            <div class="row mt-2">
                                <div class="col-4 col-lg-4">
                                    <a href="#imageCarouselSlider" role="button" data-slide="prev">
                                        <span class="sliderBtn">Back</span>                                
                                    </a>
                                </div>
                                
                                <div class="col-4 col-lg-4">
                                    <a href="#">
                                        <span class="sliderBtn">Expand</span>                                
                                    </a>
                                </div>
                                
                                <div class="col-4 col-lg-4">
                                    <a class="float-right" href="#imageCarouselSlider" role="button" data-slide="next">
                                        <span class="sliderBtn">Next</span>                                
                                    </a>
                                </div>                                
                            </div>                           
                        </div>
                    </div>
                    <!--image slider div-->
                    
                    <!--video slider div-->
                    <div class="col-12 mt-3 pl-0 pr-0 videoSliderDiv d-none">
                        <div id="videoCarouselSlider" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @php $cnt = 0; @endphp
                                @foreach($announcementVideos as $announcementVideo)
                                    @if($cnt == 0)
                                        <div class="carousel-item active">
                                            <a href="{{Storage::disk('s3')->url($announcementVideo->media_location)}}"
                                                data-fancybox="videos">
                                                <video class="sliderVideo w-100">
                                                    <source src="{{Storage::disk('s3')->url($announcementVideo->media_location)}}" type="video/mp4">
                                                    <source src="{{Storage::disk('s3')->url($announcementVideo->media_location)}}" type="video/ogg">                                
                                                </video>
                                            </a>
                                        </div>
                                        @php $cnt++; @endphp
                                    @else
                                        <div class="carousel-item">
                                            <a href="{{Storage::disk('s3')->url($announcementVideo->media_location)}}"
                                                data-fancybox="videos">
                                                <video class="sliderVideo w-100">
                                                    <source src="{{Storage::disk('s3')->url($announcementVideo->media_location)}}" type="video/mp4">
                                                    <source src="{{Storage::disk('s3')->url($announcementVideo->media_location)}}" type="video/ogg">                                
                                                </video>
                                            </a>
                                        </div>
                                        @php $cnt++; @endphp
                                    @endif                                    
                                @endforeach                                
                            </div>
                            
                            <div class="row mt-2">
                                <div class="col-4 col-lg-4">
                                    <a href="#videoCarouselSlider" role="button" data-slide="prev">
                                        <span class="sliderBtn">Back</span>                                
                                    </a>
                                </div>
                                
                                <div class="col-4 col-lg-4">
                                    <a href="#">
                                        <span class="sliderBtn">Expand</span>                                
                                    </a>
                                </div>
                                
                                <div class="col-4 col-lg-4">
                                    <a class="float-right" href="#videoCarouselSlider" role="button" data-slide="next">
                                        <span class="sliderBtn">Next</span>                                
                                    </a>
                                </div>                                
                            </div>                           
                        </div>
                    </div>
                    <!--video slider div-->                                       
                    
                    <div class="col-12 mt-3 pl-0 pr-0">                   
                        <span class="announcementList">Project Data</span>                                      
                    </div>
                    
                    <div class="col-12 mt-1 pl-0 pr-0">                   
                        <span class="announcementDesc">{{$announcementdetail->project_value}}</span>             
                    </div>
                    
                    <div class="col-12 mt-3 pl-0 pr-0">                   
                        <span class="announcementList">Project Location</span>                                      
                    </div>
                    
                    <div class="col-12 mt-1 pl-0 pr-0">                   
                        <span class="announcementDesc">{{$announcementdetail->announcement_location}}</span> 
                        <?php  $location = str_replace(", ","+",$announcementdetail->announcement_location); ?>
                         <iframe width="100%" height="300" class="mb-4 mb-lg-0" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?q={{$location}}&key=AIzaSyDuE8EjBUwioEucWmYupCzboXrSry8F2aw
                        &q={{$location}}">
                    </iframe> 


                    </div>
                </div>

                <div class="row">
                <input type="hidden" name="" class='addInterestclass' value="{{url('addInterest')}}">
                <input class="csrf-token" type="hidden" value="{{ csrf_token() }}">
                    <div class="col-6 col-lg-6">
                        <button type="button" class="mt-4 buttonCss buttonCss button_text col-12 p-0">Submit your interest</button>
                    </div>
                    <div class="col-6 col-lg-6">
                        <button type="button" class="mt-4 buttonCss buttonCss button_text col-12 p-0">Need more details</button>
                    </div>
                </div>
               
            </div>
        </div>
        
        <div class="submissionDiv mt-3 mb-3 ml-2 mr-2 d-none">
            <h4 class="p-3">Your Interest in the Project has been succesfully Submitted <br /><br />
                We will contact you soon for more details
            </h4>
        </div>

    </div>


@endsection
@section('script')

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyAjWotF6wKKrsQHC18xo0E-W77YpoOY8b8&libraries=places" ></script>
<script src="{{asset('/js/announcement.js?v='.$v) }}" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js" integrity="sha512-j7/1CJweOskkQiS5RD9W8zhEG9D9vpgByNGxPIqkO5KrXrwyDAroM9aQ9w8J7oRqwxGyz429hPVk/zR6IOMtSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.carousel'). carousel({ interval: false, });
      
        //map location call
        google.maps.event.addDomListener(window, 'load', initialize);
  
        function initialize() {
            var input = document.getElementById('locationsearch');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function () {
                var selectedLocation=$('.Locationinput').val();
                $('.ifAddedloaction').text(selectedLocation); 
                $('.post_location').val(selectedLocation);      
                var place = autocomplete.getPlace();      
            });
        }      
    });
</script>
@endsection