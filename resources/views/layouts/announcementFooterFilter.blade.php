
<div class="col-12 m-auto footerfiltersection" style="">

    @if(Auth::user()->user_type == '4')@php $sectionCol = 'col-10'; $parentCol = 'col-4'; @endphp
    @else @php $sectionCol = 'col-8'; $parentCol = 'col-6'; @endphp
    @endif
    <div class="footerfilterblackbg {{$sectionCol}} justify-content-center">       
        <div class="d-flex w-100 row col-12 pl-0 pr-0 mr-0 ml-0">

            <span class="parent {{$parentCol}}">
                <a style="display: grid;" class="mt-2 mb-2 footerfiltered" onclick="showfooterfilterresult(this)" data-attr="sortFilter">
                    <img class="img-fluid m-auto footerFilterImg" style="" src="{{ asset('assests/images/announcement/sortby.png') }}" alt="">
                    <img class="img-fluid m-auto activeFooterFilterImg d-none" style="" src="{{ asset('assests/images/announcement/sortbyActive.png') }}" alt="">
                    <span class="fonthead filtertext navText m-auto footerFilterTxt">Sort by</span> </i>
                </a>
            </span>


            <span class="parent {{$parentCol}}">
                <a style="display: grid;" class="mt-2 mb-2 footerfiltered"  onclick="showfooterfilterresult(this)" data-attr="Filter">
                    <img class="img-fluid m-auto nav-img" style="" src="{{ asset('assests/images/announcement/filter.png') }}" alt="">
                    <span class="fonthead filtertext navText m-auto nav-text">Filter</span> </i>
                </a>
            </span>

            @if(Auth::user()->user_type == '4')
            <span class="parent col-4 pl-0 pr-0">
<!--                <a style="display: grid;" class="mt-2 mb-2 footerfiltered {{($hideSection == 'd-none') ? 'active' : ''}}" onclick="showfooterfilterresult(this)" data-attr="businessFilter" data-click="1">
                    <img class="img-fluid m-auto footerFilterImg {{$hideSection}}" style="" src="{{ asset('assests/images/announcement/businessprofile.png') }}" alt="">
                    <img class="img-fluid m-auto activeFooterFilterImg {{$showSection}}" style="" src="{{ asset('assests/images/announcement/businessprofileActive.png') }}" alt="">
                    <span class="fonthead filtertext navText m-auto footerFilterTxt {{($hideSection == 'd-none') ? 'showtext' : ''}}">Business Profile</span> </i>
                </a>-->
                <a style="display: grid;" class="mt-2 mb-2 footerfiltered">
                    <img class="img-fluid m-auto footerFilterImg" style="" src="{{ asset('assests/images/announcement/draft.png') }}" alt="">
                    <img class="img-fluid m-auto activeFooterFilterImg d-none" style="" src="{{ asset('assests/images/announcement/draftActive.png') }}" alt="">
                    <span class="fonthead filtertext navText m-auto footerFilterTxt">Drafts</span>
                </a>
            </span>
            @endif


        </div>

    </div>

    </div>



    





    
    
  
