@extends('layouts.app')
<?php $v = "11.5" ?>
<title>Media Archive</title>
@section('content')
@section('css')
<!-- <link href="https://fonts.cdnfonts.com/css/el-messiri" rel="stylesheet"> -->
<link href="{{ asset('css/foundation.css?v='.$v) }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    html,
body {
    font-family: 'Montserrat';
    font-style: normal; 
    /* margin-top: 70px; */
    background-image: url(/assests/images/foundation/mediaarchivebg.jpg);


    width: -webkit-fill-available;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    /* height: 100%; */
    max-width: 100%;
    background-position: center;
    background-repeat: no-repeat;
}
</style>
@endsection

@include('layouts.header', ['headtext' => 'THE FOUNDATION','subheadtext'=> ''])    
<div class="fluid-container foundationContainer">

<div class="aboutfounPageSection m-2 mb-3 ">
    

<div class="wrapper">
  <div class="mediaarchiveslider">
      <div class="archive-slides">
            <div class="founPageSection m-2 mb-3 ">
            <img class="img-fluid " style="width: 100%;height: auto" src="{{ asset('assests/images/foundation/familymedia.png') }}" alt="">
            <div class="belowstaticcardbgtext">
            Family Media 
            </div>
            </div>


            <div class="staticarchivebtn">
                <button type="button" class="mt-4 buttonCss button_text p-3 " >Explore</button>
            </div>
      </div>
      <div class="archive-slides">
            <div class="founPageSection m-2 mb-3 ">
            <img class="img-fluid " style="width: 100%;height: auto" src="{{ asset('assests/images/foundation/businessmedia.png') }}" alt="">
            <div class="belowstaticcardbgtext">
           Business Media 
            </div>
            </div>
            <div class="staticarchivebtn">
                <button type="button" class="mt-4 buttonCss button_text  p-3 " >Explore</button>
            </div>
      </div>
      <div class="archive-slides">
            <div class="founPageSection m-2 mb-3 ">
            <img class="img-fluid " style="width: 100%;height: auto" src="{{ asset('assests/images/foundation/letters.png') }}" alt="">
            <div class="belowstaticcardbgtext">
           Letters
            </div>
            </div>
            <div class="staticarchivebtn">
                <button type="button" class="mt-4 buttonCss button_text  p-3 " >Explore</button>
            </div>
      </div>
    </div>
</div>


    </div>
    

</div>
@include('layouts.foundationFooterFilter')
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js" integrity="sha512-WNZwVebQjhSxEzwbettGuQgWxbpYdoLf7mH+25A7sfQbbxKeS5SQ9QBf97zOY4nOlwtksgDA/czSTmfj4DUEiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.mediaarchiveslider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 300,
        infinite: true,
        autoplaySpeed: 5000,
        autoplay: false,
        responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        }
      }
    ]
      });

        });


  
    </script>



    @endsection