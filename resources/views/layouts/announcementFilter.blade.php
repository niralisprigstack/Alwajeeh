
<div class="col-12 m-auto filtersection" style="">

@php
 $defaultSelectd = ( (app('request')->input('seating-types') != 3) &&  (app('request')->input('seating-types') != 6) ) ;
 $defaultSelectd = $defaultSelectd ? 'active show' : ''; 
 $selectDeicated = app('request')->input('seating-types') == 3 ? 'active show' : '' ;
 $selectMeetingRoom = app('request')->input('seating-types') == 6 ? 'active show' : '';
@endphp
<div class="filterblackbg col-12 justify-content-center mb-1 filtersectiondiv">
        <!-- <img class="img-fluid" style="width: 100px;height: 104.39px;float: right;" src="{{ asset('assests/images/register_logo.svg') }}" alt=""> -->
        <div class="d-flex justify-content-between align-items-center w-100 ">
  
        <span class="parent">
            <a style="display: grid;" class="mt-2 mb-2 filtered" onclick="showFilteredresult(this);" data-click="2">
                <img class="img-fluid m-auto nav-img" style="" src="{{ asset('assests/images/announcement/unreadmsg.svg') }}" alt="">
                <span class="fonthead filtertext navText m-auto nav-text">Unread</span> </i>
            </a>
            </span>

            <!-- <a style="display: grid;" class="mt-2 mb-2 active show"  id="nav-upcming-tab" aria-selected="{{$defaultSelectd ? 'true' : 'false'}}"> -->
            <span class="parent">
            <a style="display: grid;" class="mt-2 mb-2 filtered active" onclick="showFilteredresult(this);" data-click="1">   
                <img class="img-fluid m-auto nav-img show " style="" src="{{ asset('assests/images/announcement/emails.svg') }}" alt="">
                <span class="fonthead filtertext navText m-auto nav-text showtext">All</span> </i>
            </a>
            </span>
           


            <span class="parent">
            <a style="display: grid;" class="mt-2 mb-2 filtered" onclick="showFilteredresult(this);" data-click="4">
                <img class="img-fluid m-auto nav-img" style="" src="{{ asset('assests/images/announcement/business.svg') }}" alt="">
                <span class="fonthead filtertext navText m-auto nav-text">Business</span> </i>
            </a>
            </span>

            <span class="parent">
            <a style="display: grid;" class="mt-2 mb-2 filtered" onclick="showFilteredresult(this);" data-click="3">
                <img class="img-fluid m-auto nav-img" style="" src="{{ asset('assests/images/announcement/family.svg') }}" alt="">
                <span class="fonthead filtertext navText m-auto nav-text">Family</span> </i>
            </a>
            </span>

            <span class="parent">
            <a style="display: grid;" class="mt-2 mb-2 ml-3 filtered"  href="{{url('announcement')}}">
                <img class="img-fluid m-auto nav-img" style="" src="{{ asset('assests/images/announcement/createnew.svg') }}" alt="">
                <span class="fonthead filtertext navText m-auto nav-text">Create New</span> </i>
            </a>
            </span>

        </div>
        
    </div>




    <span class="businessprofiletext mt-4 d-none">My Business Profile</span>


    </div>
    
  