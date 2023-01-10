
@if(isset($headtext) || isset($subheadtext))
<header class="fixed-header" style="position: inherit;">

    <div class="staticBlackBg top-zero">
        <a class="d-none" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <img class="img-fluid" style="width: auto;height: 85px;float: right;" src="{{ asset('assests/images/register_logo.png') }}" alt="">
        <div class="commonheadertext">
            <span class="announcementText">{{$headtext}}</span>
            <span class="createAnnouncementText col-12 p-0">{{$subheadtext}}</span>
        </div>
        
        <!--detail div-->
        <div class="fluid-container pl-3 pr-4">

        <div class="" style="">
            <div class="announcementDiv pt-3 pb-3">
                <div class="row">
                    <div class="col-6 pr-0">
                    <?php
                        $carbon_date = \Carbon\Carbon::parse($announcementdetail->created_at);
                        $carbon_date = $carbon_date->addHours(4);
                        $date =  $carbon_date->format('M d');
                        $year =  $carbon_date->format('y');                    
                    ?>
                        <span class="announcementList">{{ $date}} <br>{{$year}}</span>
                    </div>
                    <?php
 $created_by=$announcementdetail->created_by;
 //$showdot="d-none";
 $showtime="d-none";
 $remainingTime="";
 $showtimecss="";


                    $showdot="";
                   
                      if(isset($announcementdetail->closing_date)){
                        date_default_timezone_set('Asia/Dubai');
                        $edStamp = strtotime(now());
                        $todaydate = date("Y-m-d H:i:s", $edStamp);
                        // echo $todaydate;
                        // $todaydate = date('Y-m-d H:i:s');
                        if($todaydate<=$announcementdetail->closing_date){
                            //echo $todaydate;
                            
                            // echo $announcementlist->closing_date;
                            $showtime="";
                            $today = new DateTime($todaydate);
                            $closedate = new DateTime($announcementdetail->closing_date);
            
                            // The diff-methods returns a new DateInterval-object...
                            $diff =  $today->diff($closedate);
            
                            // Call the format method on the DateInterval-object
                            $remainingTime= $diff->format('%ad %hh');
                            //remainingtime = date_diff($today ,$closedate);
                            //$remainingTime=$remainingtime->format('%ad');
            
            
                            //                 date_default_timezone_set('UTC');
            
                            // $datetime = new DateTime();
                            // echo $datetime->format('Y-m-d H:i:s');
                           
            
            
                        }
                        else{
                            $showtime="";
                            $showtimecss="visibility:hidden";
                        }
                    }
                    ?>
                    <div class="col-6  pl-0 pr-0">                                          
                    <div class="remainingDiv {{$showtime}}" style="{{$showtimecss}}">
                            
                            <span class="remainingText justify-content-center">Remaining {{$remainingTime}}</span>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-12 pl-0 pr-0 pb-3">                   
                    <span class="announcementDesc">{{$announcementdetail->title}}</span>                                       
                </div>               
            </div>            
        </div>
    <!--detail div-->

    </div>
    
</header>
@endif