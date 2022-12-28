@extends('layouts.app')
<?php $v = "7.5" ?>
<title>All Contacts</title>
@section('content')
@section('css')
<link href="{{ asset('css/loader.css') }}" rel="stylesheet">
<link href="{{ asset('css/contact.css?v='.$v) }}" rel="stylesheet">
@endsection
@include('layouts.header', ['headtext' => 'All Contacts','subheadtext'=> ''])
<div class="fluid-container contact_container " style="">
<input type="hidden" class="getchar" value="">
    <div class="contactSectionDiv mt-3 mb-3 ml-2 mr-2">
        <div class="d-flex w-100 col-12 p-0 m-0">
            <div class="col-10 pl-0 pr-2">
                <div class="contactDiv pt-3 pb-3">
                    @foreach($allcontacts as $allcontact)

                    <div class="row pl-2 pb-2">
                    <?php
                            $firstalphabet = mb_substr($allcontact->first_name, 0, 1);
                            $falphabet=strtoupper($firstalphabet);
                            ?>
                        <span class="allusertext userslist" data-attr="{{$falphabet}}"> 
                            {{$allcontact->first_name}} {{$allcontact->last_name}}
                        </span>
                    </div>



                    @endforeach
                    
                    
                    
                </div>
            </div>
            <div class="col-2 p-0">
                <div class="alphabetdiv pt-2 pb-2">
               <?php $a=range("A","Z");
                foreach($a as $alphabet){?>
                <div class="allusertext scrollToList">{{$alphabet}}</div>
                <?php } ?>
     
                </div>
            </div>
        </div>


    </div>







</div>


@endsection


@section('script')
<!-- <script src="{{asset('/js/profile.js?v='.$v) }}" defer></script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".scrollToList").click(function() {
            var clickedletter=$(this).html();
            

            $('.userslist').each(function (){

                var searchletter=$(this).attr('data-attr');
                if(clickedletter==searchletter){
                    $('html, body').animate({
                    'scrollTop' : $(this).position().top
                    });                    
                    return false;                    
                }                
     });
  
    //         var getchar=$(this).text();
    
    // $('html,body').animate({
    //     scrollTop: $("#"+getchar).offset().top},
    //     'slow');
});
    });
</script>
@endsection