@extends('layouts.app')
<?php $v = "11.5" ?>
<title>Media Archive</title>
@section('content')
@section('css')
<!-- <link href="https://fonts.cdnfonts.com/css/el-messiri" rel="stylesheet"> -->
<link href="{{ asset('css/foundation.css?v='.$v) }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    html,
    body {
        font-family: 'Montserrat';
        font-style: normal;
        /* margin-top: 70px; */
        background-image: linear-gradient(to bottom, rgb(30 10 10 / 50%), rgb(30 20 30 / 30%)), url(/assests/images/foundation/mediaarchivebg.jpg);


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

    .foundationContainer {
        padding-top: 130px;
        padding-bottom: 80px;
        /* height: 100%; */
    }
</style>
@endsection

@include('layouts.header', ['headtext' => 'THE FOUNDATION','subheadtext'=> ''])
<div class="fluid-container foundationContainer">

    <div class="mediaPageSection m-2 mb-3 pb-5">



        <div class="owl-carousel">
            <div class="carouselslider">
                <div class="Mediacard">
                    <div class="ArchiveimgDiv">
                        <img src="{{ asset('assests/images/foundation/familymedia.png') }}" class="img-fluid mediacardimgs" alt="" srcset="">
                        <div class="belowstaticcardbgtext">
                            Family Media
                        </div>


                    </div>
                    <div class="staticarchivebtn mt-4">
                        <button type="button" class="buttonCss button_text  p-3 explorebtn" style="position: absolute;bottom:0">Explore</button>
                    </div>

                </div>
            </div>
            <div class="carouselslider">
                <div class="Mediacard">
                    <div class="ArchiveimgDiv">
                        <img src="{{ asset('assests/images/foundation/businessmedia.png') }}" class="img-fluid mediacardimgs" alt="" srcset="">
                        <div class="belowstaticcardbgtext">
                            Business Media
                        </div>
                    </div>



                </div>
                <div class="staticarchivebtn ">
                    <button type="button" class="buttonCss button_text  p-3 explorebtn" style="position: absolute;bottom:0">Explore</button>
                </div>
            </div>
            <div class="carouselslider">
                <div class="Mediacard">
                    <div class="ArchiveimgDiv">
                        <img src="{{ asset('assests/images/foundation/letters.png') }}" class="img-fluid mediacardimgs" alt="" srcset="">
                        <div class="belowstaticcardbgtext">
                            Letters
                        </div>

                    </div>
                    <div class="staticarchivebtn mt-4">
                        <button type="button" class="buttonCss button_text  p-3 explorebtn" style="position: absolute;bottom:0">Explore</button>
                    </div>
                </div>

            </div>




        </div>



    </div>


    <div class="advancedfilterfoundiv d-none">
        <h5 class="ml-3 filterCss mt-4">ADVANCED FILTER</h5>

        <div class="createMediaArchiveSection m-2 mb-3">

            <!--advance filter div-->
            <section class="advancedFilterDiv">
                <div class="submissionDiv fullSectionHeight mt-3 mb-3 ml-2 mr-2 pt-5 pb-2">
                    <div class="row col-12 justify-content-between">
                        <div class="col-6 col-lg-6 col-md-6 mt-3 pr-0">
                            <?php
                            $year_start = 2000;
                            $year_end = date('Y');
                            echo '<select class="form-control filterPerYearDropdown" id="filterPerYear" name="filterPerYear">';
                            echo '<option value="" disabled selected>Filter Per Year</option>';
                            for ($i_year = $year_start; $i_year <= $year_end; $i_year++) {
                                echo '<option value="' . $i_year . '">' . $i_year . '</option>';
                            }
                            echo '</select>';
                            ?>
                        </div>

                        <div class="col-6 col-lg-6 col-md-6 pl-0 pr-0 pb-3 mt-3">
                            <select class="form-control filterPerMonthDropdown ml-3" id="filterPerMonth" name="filterPerMonth">
                                <option value="" disabled selected>Filter Per Month</option>
                                <option value="1">Jan</option>
                                <option value="2">Feb</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 justify-content-between mb-3">
                        <select class="form-control mediaCategory" id="selectMediaCategory" name="mediaCategory">
                            <option value="" disabled selected>By Category</option>
                            <option value="1">Family Media</option>
                            <option value="2">Business Media</option>
                            <option value="3">Letters</option>
                        </select>
                    </div>

                    <div class="col-12 justify-content-between mb-3">
                        <input style="font-size: 18px;" type="text" class="inputTextClass form-control keywordInput" name="keywords" placeholder="Keywords" />
                    </div>

                    <div class="col-12 justify-content-between mb-3">
                        <input style="font-size: 18px;" type="text" class="inputTextClass form-control keywordInput" name="searchName" placeholder="Search Name" />
                    </div>

                    <div class="col-12 justify-content-between mb-3">
                        <input style="font-size: 18px;" type="text" class="inputTextClass form-control keywordInput" name="location" placeholder="Location" />
                    </div>
                </div>

            </section>
            <!--advance filter div-->

        </div>

        <div class="submittedbtnidv col-7 m-auto mb-5 ">
            <button type="button" class="mt-3 buttonCss button_text col-12 p-2 applyFilter">Apply Filter</button>
        </div>

    </div>


</div>
@include('layouts.foundationFooterFilter')
@endsection

@section('script')
<script src="{{asset('/js/foundation.js?v='.$v) }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript">
    $(document).ready(function() {




        var owl = $('.owl-carousel'),
            owlOptions = {
                loop: true,
                margin: 0,

                responsive: {
                    0: {
                        items: 1
                    },


                }
            };

        if ($(window).width() < 992) {
            var owlActive = owl.owlCarousel(owlOptions);
        } else {
            owl.addClass('off');
        }

        $(window).resize(function() {
            if ($(window).width() < 992) {
                if ($('.owl-carousel').hasClass('off')) {
                    var owlActive = owl.owlCarousel(owlOptions);
                    owl.removeClass('off');
                }
            } else {
                if (!$('.owl-carousel').hasClass('off')) {
                    owl.addClass('off').trigger('destroy.owl.carousel');
                    owl.find('.owl-stage-outer').children(':eq(0)').unwrap();
                }
            }
        });



        //       var swiper = new Swiper(".swiper-container", {
        //   slidesPerView: 1.5,
        //   spaceBetween: 10,
        //   centeredSlides: true,
        //   freeMode: true,
        //   grabCursor: true,
        //   loop: true,
        //   pagination: {
        //     el: ".swiper-pagination",
        //     clickable: true
        //   },

        //   navigation: {
        //     nextEl: ".swiper-button-next",
        //     prevEl: ".swiper-button-prev"
        //   },
        //   breakpoints: {
        //     500: {
        //       slidesPerView: 1
        //     },
        //     700: {
        //       slidesPerView: 1.5
        //     }
        //   }
        // });



    });
</script>



@endsection