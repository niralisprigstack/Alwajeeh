
@if(isset($headtext) || isset($subheadtext))
<header class="fixed-header">
<div class="staticBlackBg top-zero">
        <img class="img-fluid" style="width: 100px;height: 104.39px;float: right;" src="{{ asset('assests/images/register_logo.svg') }}" alt="">
        <div class="commonheadertext">
        <span class="announcementText">{{$headtext}}</span>
        <span class="createAnnouncementText col-12 p-0">{{$subheadtext}}</span>
        </div>
        
    </div>
    </header>
    @endif