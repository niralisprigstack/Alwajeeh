@extends('layouts.app')
<?php $v = "5.5" ?>
<title>Announcement Detail</title>
@section('content')
@section('css')
<link href="{{ asset('css/announcement.css?v='.$v) }}" rel="stylesheet">
@endsection
<div class="announcementbody">
    @include('layouts.header', ['headtext' => '','subheadtext'=> 'ANNOUNCEMENTS'])
    <div class="fluid-container">

        <div class="announcementListMainDiv mt-3 mb-2 ml-2 mr-2">
            <div class="announcementDiv pt-3 pb-3">
                <div class="row">
                    <div class="col-4">
                        <span class="announcementList">NOV 14 <br /> 22</span>
                    </div>
                    <div class="col-8">
                        <div class="remainingDiv">
                            <span class="remainingText justify-content-center">Remaining 3d 23h</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-2 pl-0 pr-0">                   
                    <span class="announcementDesc">Example of investement project to show interest</span>                                       
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
                        <span class="announcementDesc">A business opportunity, in the simplest terms, is a packaged business investment that allows the buyer to begin a business.</span>                                       
                    </div>

                    <div class="col-12 mt-3 pl-0 pr-0">                   
                        <img class="img-fluid m-auto" style="" src="{{ asset('assests/images/announcement/sampleImage.svg') }}" alt="" />
                    </div>
                    
                    <div class="col-12 mt-3 pl-0 pr-0">                   
                        <span class="announcementList">Project Data</span>                                      
                    </div>
                    
                    <div class="col-12 mt-1 pl-0 pr-0">                   
                        <span class="announcementDesc">Project Value 500m AED</span>             
                    </div>
                    
                    <div class="col-12 mt-3 pl-0 pr-0">                   
                        <span class="announcementList">Project Location</span>                                      
                    </div>
                    
                    <div class="col-12 mt-1 pl-0 pr-0">                   
                        <span class="announcementDesc">Project Address</span>             
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

</div>
@endsection
@section('script')
@endsection