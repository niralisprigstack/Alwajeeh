@extends('layouts.app')
<?php $v = "11.5" ?>
<title>Announcement Business Detail</title>
@section('content')
@section('css')
<style>
      .commonheadertext {
    padding-left: 10px !important;
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
.detailpagecontainer{
 /* margin-top:112px; */
 padding-top: 94px;
}
  </style>
<link href="{{ asset('css/announcement.css?v='.$v) }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

    @include('layouts.detailHeader', ['headtext' => '','subheadtext'=> 'ANNOUNCEMENTS', 'announcementdetail' => $announcementdetail])

    <?php 
                $showBtn="";
                $submittedLabel="d-none";
                if($announcementdetail->interested=="1"){
                    $showBtn="d-none";
                    $submittedLabel="";
                }
                
                ?>
    

    <div class="announcementListMainDiv mt-2 mb-2 ml-2 mr-2">
            <div class="announcementDiv detailDiv pt-1 pb-3">
                <div class="closeBtn text-right">
                    <a href="{{url('announcementList')}}"><img class="img-fluid m-auto" style="" src="{{ asset('assests/images/announcement/closeBtn.svg') }}" alt="" /></a>
                </div>
                
                <div class="detailScrollableDiv">
                    <div class="col-12 pl-0 pr-0 pt-2 descriptionSec">                   
                        <span class="announcementList">Introduction</span>                                      
                    </div>
                    
                    <div class="col-12 mt-2 pl-0 pr-0 descriptionSec">                   
                        <span class="announcementDesc">{{$announcementdetail->description}}</span>                                       
                    </div>

                    <div class="row mt-3 mb-3 announcementMediaDiv">
                        @if(count($announcementImages) > 0)
                        <div class="col-6 col-lg-6">
                            @php $cnt = 0; $showHide = ""; @endphp
                            @foreach($announcementImages as $announcementImage)
                                @if($cnt == 0)
                                    @php $showHide = ""; @endphp
                                @else
                                    @php $showHide = "d-none"; @endphp
                                @endif
                                <a data-fancybox="images" href="{{Storage::disk('s3')->url($announcementImage->media_location)}}" data-show="photos"><img class="img-fluid m-auto announcementPhoto {{$showHide}}" src="{{Storage::disk('s3')->url($announcementImages[0]->media_location)}}" alt="" /></a>
                                @php $cnt++; @endphp
                            @endforeach
                            <span>Photos</span>
                        </div>
                        @endif
                        
                        @if(count($announcementVideos) > 0)
                        <div class="col-6 col-lg-6">
                            @php $cnt = 0; $showHide = ""; @endphp
                            @foreach($announcementVideos as $announcementVideo)
                                @if($cnt == 0)
                                    @php $showHide = ""; @endphp
                                @else
                                    @php $showHide = "d-none"; @endphp
                                @endif
                                <a href="{{Storage::disk('s3')->url($announcementVideo->media_location)}}" data-fancybox="videos">
                                    <video  style="height: 100px;" class="w-100 {{$showHide}}" autoplay playsinsline loop muted>
                                        <source src="{{Storage::disk('s3')->url($announcementVideo->media_location)}}"  type="video/mp4">
                                        <source src="{{Storage::disk('s3')->url($announcementVideo->media_location)}}" type="video/ogg">                          
                                    </video>
                                    <a>
                               
                                @php $cnt++; @endphp
                            @endforeach
                            <span>Videos</span>
                        </div>
                        @endif                        
                    </div>                                                                              
                    
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
                        <?php if(isset($announcementdetail->announcement_location))  { ?>
                            <span class="announcementDesc">{{$announcementdetail->announcement_location}}</span> 
                        <?php  $location = str_replace(", ","+",$announcementdetail->announcement_location); ?>
                         <iframe width="100%" height="300" class="mb-4 mb-lg-0" style="border-radius: 10px;border: 0;" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?q={{$location}}&key=AIzaSyDuE8EjBUwioEucWmYupCzboXrSry8F2aw
                        &q={{$location}}">
                    </iframe> 
                      <?php  }    else{?>
                        <span class="announcementDesc">No Location added.</span> 
                    <?php  }      ?> 
                     


                    </div>
                </div>

                <div class="row mt-3">
                <input type="hidden" name="" class='addInterestclass' value="{{url('addInterest')}}">
                <input class="csrf-token" type="hidden" value="{{ csrf_token() }}">
                
                    <div class="col-6 col-lg-6 submitInterestDiv {{$showBtn}}">
                        <button type="button" class="mt-4 buttonCss buttonCss button_text col-12 p-0" onclick="showAnnouncementInterest(this);" data-id="{{$announcementdetail->id}}">Submit your <br /> interest</button>
                    </div>
                    <div class="col-6 col-lg-6">
                        <button type="button" class="mt-4 buttonCss buttonCss button_text col-12 p-0">Need more <br /> details</button>
                    </div>
                </div>
               
            </div>
        </div>
        

        <section class="interest_submitteddiv d-none mb-5 pb-5">
            <div class="submissionDiv mt-3 mb-3 ml-2 mr-2 ">
                <h4 class="p-4 ">Your Interest in <br>the Project has <br> been succesfully <br> Submitted <br /><br />
                    We will contact<br> you soon for<br> more details
                </h4>
            </div>
            <div class="submittedbtnidv col-7 m-auto mb-5 ">
            <button type="button" class="mt-4 buttonCss buttonCss button_text col-12 p-2 " onclick="backTowholeDetailSection(this);">Back to Announcements</button>
            </div>
        </section>
        

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
