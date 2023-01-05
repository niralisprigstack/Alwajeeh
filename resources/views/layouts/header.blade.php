
@if(isset($headtext) || isset($subheadtext))
<header class="fixed-header">

<div class="staticBlackBg top-zero">
<a class="d-none" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
        <img class="img-fluid" style="width: 100px;height: 85px;float: right;" src="{{ asset('assests/images/register_logo.png') }}" alt="">
        <div class="commonheadertext">
        <span class="announcementText">{{$headtext}}</span>
        <span class="createAnnouncementText col-12 p-0">{{$subheadtext}}</span>
        </div>
        
    </div>
    </header>
    @endif