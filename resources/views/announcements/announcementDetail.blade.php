@extends('layouts.app')
<?php $v = "5.5" ?>
<title>Announcement Detail</title>
@section('content')
@section('css')
<link href="{{ asset('css/announcement.css?v='.$v) }}" rel="stylesheet">
@endsection

    @include('layouts.header', ['headtext' => '','subheadtext'=> 'ANNOUNCEMENTS'])
    <div class="fluid-container">

        <div class="announcementListMainDiv mt-3 mb-2 ml-2 mr-2">
            <div class="announcementDiv pt-3 pb-3">
                <div class="row">
                    <div class="col-4">
                    <?php
                    $carbon_date = \Carbon\Carbon::parse($announcementdetail->created_at);
                    $carbon_date = $carbon_date->addHours(4);
                    $date =  $carbon_date->format('M d');
                    $year =  $carbon_date->format('y');
                    // $object->created_at->format('d')
                    ?>
                        <span class="announcementList">{{ $date}} <br /> {{$year}}</span>
                    </div>
                    <div class="col-8">
                        <div class="remainingDiv">
                            <span class="remainingText justify-content-center">Remaining 3d 23h</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-2 pl-0 pr-0">                   
                    <span class="announcementDesc">{{$announcementdetail->title}}</span>                                       
                </div>               
            </div>            
        </div>

        <div class="announcementListMainDiv mt-2 mb-2 ml-2 mr-2">
            <div class="announcementDiv detailDiv pt-1 pb-3">
                <div class="closeBtn text-right">
                    <img class="img-fluid m-auto" style="" src="{{ asset('assests/images/announcement/closeBtn.svg') }}" alt="" />
                </div>
                
                <div class="detailScrollableDiv">
                    <div class="col-12 pl-0 pr-0">                   
                        <span class="announcementList">Introduction</span>                                      
                    </div>

                    <div class="col-12 mt-2 pl-0 pr-0">                   
                        <span class="announcementDesc">{{$announcementdetail->description}}</span>                                       
                    </div>

                    <div class="col-12 mt-3 pl-0 pr-0">                   
                        <img class="img-fluid m-auto" style="" src="{{ asset('assests/images/announcement/sampleImage.svg') }}" alt="" />
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
                        <span class="announcementDesc">{{$announcementdetail->announcement_location}}</span> 
                        <?php  $location = str_replace(", ","+",$announcementdetail->announcement_location); ?>
                         <iframe width="100%" height="300" class="mb-4 mb-lg-0" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?q={{$location}}&key=AIzaSyDuE8EjBUwioEucWmYupCzboXrSry8F2aw
                        &q={{$location}}">
                    </iframe> 


                    </div>
                </div>

                <div class="row">
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
<script type="text/javascript">
    $(document).ready(function() {
      
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