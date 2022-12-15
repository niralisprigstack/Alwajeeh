
@if(isset($headtext) || isset($subheadtext))
<div class="staticBlackBg top-zero">
        <img class="img-fluid" style="width: 100px;height: 104.39px;float: right;" src="{{ asset('assests/images/register_logo.svg') }}" alt="">
        <div class="commonheadertext">
        <span class="announcementText pb-2">{{$headtext}}</span>
        <span class="createAnnouncementText col-12 pt-2 p-0">{{$subheadtext}}</span>
        </div>
        
    </div>
    @endif