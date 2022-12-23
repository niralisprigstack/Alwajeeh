@extends('layouts.app')
<?php $v = "5.5" ?>
<title>Announcement Detail</title>
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
  margin-top:112px;
}
  </style>
<link href="{{ asset('css/announcement.css?v='.$v) }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

    @include('layouts.header', ['headtext' => '','subheadtext'=> 'ANNOUNCEMENTS'])
    <div class="fluid-container detailpagecontainer">

        <div class="announcementListMainDiv" style="border-radius: 0px;backdrop-filter: blur(5px);background: rgba(0, 0, 0, 0.6);    box-shadow: 0px 5px 10px rgb(0 0 0 / 50%);">
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
                        
                    </div>
                    </div>
                </div>

                <div class="col-12 pl-0 pr-0 pb-3">                   
                    <span class="announcementDesc">{{$announcementdetail->title}}</span>                                       
                </div>               
            </div>            
        </div>

        <div class="announcementListMainDiv fullSectionHeight mt-2 mb-2 ml-2 mr-2">
            <div class="announcementDiv detailDiv pt-1 pb-3">
                <div class="closeBtn text-right d-none">
                    <a onclick="backToDetailSection();"><img class="img-fluid m-auto" style="" src="{{ asset('assests/images/announcement/closeBtn.svg') }}" alt="" /></a>
                </div>
                
                <div class="detailScrollableDiv">
                    <div class="col-12 mt-2 pl-0 pr-0 pt-2 descriptionSec">                   
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
                                    <video style="height: 100px;" class="w-100 {{$showHide}}">
                                        <source src="{{Storage::disk('s3')->url($announcementVideo->media_location)}}" type="video/mp4">
                                        <source src="{{Storage::disk('s3')->url($announcementVideo->media_location)}}" type="video/ogg">                                
                                    </video>
                                </a>
                                @php $cnt++; @endphp
                            @endforeach
                            <span>Videos</span>
                        </div>
                        @endif                        
                    </div>    
                    
                   
                    
                    <input type="hidden" name="" class='CommentUrl' value="{{url('announcementcomment')}}">
                    <input type="hidden" name="" class='currentannounceId' value='{{$announcementdetail->id}}'>
                    <input type="hidden" name="" class='userName' value='{{Auth::user()->first_name}} {{Auth::user()->last_name}} '>
                    @include('layouts.announcementComment', ['announcementdetail' => $announcementdetail ])
                   
                    </div>
                   

                    <div class="comment-container inputparent mt-4">
   <div class="row">
     <div class="col-md-10">
     <div class="form-group">
     <textarea style="height: auto !important;" placeholder="Comments" class="w-100 inputTextAreaClass form-control blogCommentInput" name="annDetail"></textarea>
    <p class='commenterror text-danger'></p>
  </div>
     </div>
     <div class="col-md-12">
     <button style="height: 40px;float:left" type="button"  data-check='parent'  onclick='addComment(this)'class="buttonCss buttonCss button_text col-5 p-0">Post</button>
     </div>
   </div>
    </div>

               
            </div>
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
      
          
    });
</script>
@endsection