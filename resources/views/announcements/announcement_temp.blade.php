@extends('layouts.app')
<?php  $v = "8.5" ?>
<title>Create Announcement</title>
@section('content')
@section('css')
<link href="{{ asset('css/loader.css') }}" rel="stylesheet">
<link href="{{ asset('css/announcement.css?v='.$v) }}" rel="stylesheet">
@endsection
@include('layouts.header', ['headtext' => 'ANNOUNCEMENTS','subheadtext'=> 'Create Announcement'])
<div class="fluid-container announcementContainer">
    
    <!--<div>-->
        <div class="announcementSection mt-3 mb-3 ml-2 mr-3">
            <div class="announcementDiv mb-4 mt-4">
                <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                    <span class="inputSpanText">Title</span>                  
                </div>
                <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                    <input type="text" class="inputTextClass form-control" name="annTitle" value="" />
                </div>
                
                 <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                    <span class="inputSpanText">Details</span>                  
                </div>
                <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                    <textarea class="w-100 inputTextAreaClass form-control" name="annDetail"></textarea>
                </div>
                
                 <div class="row col-12 justify-content-between mb-3">                     
                     <span class="inputSpanText" style="font-weight: 600;"><img class="c-pointer global-font-color mr-2" src="{{ asset('assests/images/announcement/uploadMediaIcon.svg') }}" alt="" style=""> Upload Media</span>                  
                </div>
                
                 <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                    <span class="inputSpanText">Project Value</span>                  
                </div>
                <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                    <input type="text" class="inputTextClass form-control" name="projectVal" value="" />
                </div>
                
                 <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                    <span class="inputSpanText">Location</span>                
                </div>
                <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                    <input type="text" class="inputTextClass form-control" name="location" value="" />
                </div>
                
                 <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                    <span class="inputSpanText">Closing Date</span>                  
                </div>
                <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                    <input type="text" class="inputTextClass form-control" name="closingDate" value="" />
                </div>
                
                <div class="row col-12 justify-content-between mb-3 pl-0 pr-0 mr-0 ml-0">
                    <div class="col-6 col-lg-6 col-md-6 pl-0">
                        <button type="submit" class="mt-4 buttonCss button_text col-12 p-0" value="publish">Publish</button>
                    </div>

                    <div class="col-6 col-lg-6 col-md-6 pl-0 pr-0">
                        <button type="button" class="mt-4 buttonCss button_text col-12 p-0" value="saveDraft">Save Draft</button>
                    </div>
                </div>
                
                <div class="col-12 justify-content-between mb-3 pl-0 pr-0">
                    <button type="button" class="mt-4 buttonCss deleteBtnCss button_text col-12 p-0" value="">Delete</button>
                </div>
            </div>

        </div>
    <!--</div>-->
    

    <!--<img class="img-fluid profile_footerimg" style="" src="{{ asset('assests/images/profile/profile_footer.svg') }}" alt="">-->
</div>
<div style="height: 100px;">
    <div style="background: red; height: 200px; display: flex;">
        
    </div>
</div>

@endsection


@section('script')
<script type="text/javascript">
    $(document).ready(function() {
      
    });
</script>



@endsection