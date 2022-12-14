<!doctype html>
<?php $v = "11.5" ?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">

    <title>Al Wajeeh</title>
    <!-- <link rel="icon" type="image/x-icon" href="http://localhost/SMBAL_8/public/assests/img/AWLogo.svg"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- <link href="https://fonts.cdnfonts.com/css/el-messiri" rel="stylesheet"> -->
    <link href="//db.onlinewebfonts.com/c/412e3116dc337076dcca9bf117952b24?family=El+Messiri" rel="stylesheet" type="text/css"/>

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="{{ asset('css/app.css?v='.$v) }}" rel="stylesheet"> -->
    <link href="{{ asset('css/custom.css?v='.$v) }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/style.css?v='.$v) }}" rel="stylesheet"> -->
    <link href="{{ asset('css/global.css?v='.$v) }}" rel="stylesheet">
    <link href="{{ asset('css/loader.css') }}" rel="stylesheet">




    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,700;1,900&display=swap" rel="stylesheet">
    @yield('css')




    <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <!-- <script src="https://js.pusher.com/7.0.3/pusher.min.js"></script> -->
    <!-- <script src="{{ asset('js/auth.js?v='.$v) }}" defer></script> -->
    <!-- <script src="{{ asset('js/custom.js?v='.$v) }}" defer></script> -->

    <script src="{{asset('/js/global.js?v='.$v)}}" type="text/javascript"></script>
    @yield('script')

    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- laravelPWA -->

</head>

<body style="">
    <div class="loading d-none"></div>
    
    @yield('content')

    




    <!-- common footer -->
    <footer class="site-footer bottomsmbalheader fixed-footer" id="footer">
        <nav class="mobileview-mainheader navbar navbar-expand-md navbar-light shadow-sm headercol pl-2" style="height: 60px;display:flex">
            <div class=" col-md-12 ">
                <div class="row">
                    <input type="hidden" class="homeurl" value="{{url('home')}}">
                    <div class="fluid-container d-flex justify-content-between align-items-center w-100 ml-2 mr-2">



                        <a class="headfont pageurl " href="{{url('home')}}">                            
                            <img class="img-fluid m-auto nav-img" style="" src="{{ asset('assests/images/homeIcon.png') }}" alt="">
                            <img class="img-fluid m-auto activeImg d-none" style="" src="{{ asset('assests/images/homeIconActive.png') }}" alt="">
                        </a>



                        <a class="headfont pageurl " href="{{url('dashboard')}}" class="navSvg" >
                            <img class="img-fluid m-auto nav-img" style="" src="{{ asset('assests/images/dashboardIcon.png') }}" alt="">
                            <img class="img-fluid m-auto activeImg d-none" style="" src="{{ asset('assests/images/dashboardIconActive.png') }}" alt="">
                        </a>

                        <a class="headfont pageurl " class="navSvg" >
                            <img class="img-fluid m-auto nav-img" style="" src="{{ asset('assests/images/mobileIcon.png') }}" alt="">
                        </a>

                        <a class="headfont pageurl " class="navSvg" >
                            <img class="img-fluid m-auto nav-img" style="" src="{{ asset('assests/images/msgIcon.png') }}" alt="">
                            <!--<img class="img-fluid m-auto activeImg nav-img d-none" style="" src="{{ asset('assests/images/msgIcon.svg') }}" alt="">-->
                        </a>

                        <a class="headfont pageurl navSvg" href="{{url('announcementList')}}">
                            <img class="img-fluid m-auto nav-img" style="" src="{{ asset('assests/images/bell-Icon.png') }}" alt="">
                            <img class="img-fluid m-auto activeImg d-none" style="" src="{{ asset('assests/images/bell-IconActive.png') }}" alt="">
                           
                          @if($unreadcount>0)
                            <span class="rednotifydot"></span>      
                          @endif                   
                        </a>

                    </div>
                </div>

            </div>
        </nav>
    </footer>

    <!-- end footer -->


    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>



</body>

</html>
