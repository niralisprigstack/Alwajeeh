@foreach($announcementlists->where('created_by','=','3') as $announcementlist)
    <input type="hidden" name="" class='checkedAnnouncement' value="{{url('checkedAnnouncement')}}">
    <input class="csrf-token" type="hidden" value="{{ csrf_token() }}">
    <!-- <a href="{{url('announcementDetail/'. $announcementlist->id)}}" target="_blank" class='' > -->
        <div class="announcementListMainDiv parent m-2 announcementlisting announcement_{{$announcementlist->id}}" onclick="checkedAnnouncement(this);" data-id="{{$announcementlist->id}}">
            <div class="announcementDiv pt-2 pb-2">
                <div class="row">
                    <div class="col-3 pr-0">
                    <?php
                    $carbon_date = \Carbon\Carbon::parse($announcementlist->created_at);
                    $carbon_date = $carbon_date->addHours(4);
                    $date =  $carbon_date->format('M d');
                    $year =  $carbon_date->format('y');
                    // $object->created_at->format('d')
                    ?>
                     
                     
                        <span class="announcementList d-block"><span class="createdDate">{{$date}}</span> <br/> <span class="createdyr">{{$year}}</span></span>
                       
                    </div>
                    <div class="col-1 mt-2">
                    <span class="ongoingdot"></span>
                    </div>
                    <div class="col-8">
                        <div class="remainingDiv">
                            <span class="remainingText justify-content-center">Remaining 3d 23h</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-1 pl-0 pr-0">                   
                    <span class="announcementDesc anntitle">{{$announcementlist->title}}</span>                                       
                </div>


                 <!-- user list -->
                    <div class="userlist detailScrollableDiv mt-4  d-none mb-3">

                    </div>

                    <div class="nouserlist detailScrollableDiv mt-4  d-none">
                        <span class="announcementDesc">No Viewers.</span>
                    </div>
                <!-- end -->

                <div class="viewersbtndiv">
                <div class="col-12 d-flex justify-content-end pl-0 pr-0  " > 
                <input type="hidden" name="" class='announcementViewers' value="{{url('checkAnnouncementViewers')}}">
                <input class="csrf-token" type="hidden" value="{{ csrf_token() }}">                  
                    <span class="viewersSpan viewersClick">Viewers</span>                                         
                </div>
            </div>
            </div>            
        </div>



       
     
    <!-- </a> -->
        @endforeach