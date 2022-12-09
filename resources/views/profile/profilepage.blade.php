@extends('layouts.app')
<?php $v = "1.0.22" ?>
<title>My Profile</title>
@section('content')
@section('css')
<link href="{{ asset('css/loader.css') }}" rel="stylesheet">
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
@endsection
<div class="fluid-container profile_container " style="">
    <!-- <div class="static-black-bg">

    </div> -->
    <img class="img-fluid profile_headerimg" style="" src="{{ asset('assests/images/profile/profile_header.svg') }}" alt="">

    <div class="profile-section pl-4 pr-4">
        
        <!--profile pic sec  -->
        <div class="profilewholesec">
        <div class="profile-div">



            <?php
            $awsUrl = env('AWS_URL');
            $imgUrl =  Auth::user()->profile_pic;

            if (!empty($imgUrl)) { ?>
                <span class="img-profile-card card profile-click mb-3" style="float: right;margin-right: 30px;"><img class="text-center img-profile-card" id="" alt="{{Auth::user()->first_name}}" src="{{Storage::disk('s3')->url($imgUrl)}}" data-holder-rendered="true">

                </span>

            <?php } else { ?>
                <span class="profile-card card profile-click mb-3" style="float: right;margin-right: 30px;">Profile<br>
                    Pic
                </span>

            <?php } ?>
        </div>



        <div class="edit-profile-div d-none">
            <span class="profile-head-text col-12 mb-25">My Profile Photo</span>
            <form class="" id="profilepicedit" action="{{url('editProfilePic')}}" method="post" enctype="multipart/form-data">
                @csrf
                <span class="show-profile ">
                    <?php
                    $awsUrl = env('AWS_URL');
                    $imgUrl =  Auth::user()->profile_pic;

                    if (!empty($imgUrl)) { ?>
                        <div class="Setprofile "><img class=" text-center setprofImg showpreview" id="profile_img" alt="{{Auth::user()->first_name}}" src="{{Storage::disk('s3')->url($imgUrl)}}" data-holder-rendered="true">

                        </div>

                    <?php } else { ?>

                        <div class="Setprofile  profildef">

                        </div>
                        <div class="d-none setprofiledef profildef1">
                            <img class="text-center boxpreview showpreview setprofiledef d-none" id="" alt="{{Auth::user()->first_name}}" src="" data-holder-rendered="true">
                        </div>

                    <?php } ?>


                </span>

                <label for="user_profile" class="profile-head-text select-image col-12 mb-25 mt-20">Replace Photo</label>
                <input class="inputfile c-pointer d-none" type="file" id="user_profile" style="" name="profilepic" accept="image/png, image/gif, image/jpeg" onchange="readURL(this);">
                <span class="profile-head-text col-12 mb-25 removesel-img">Remove Photo</span>
                <button type="submit" class="updatepropic  profile-head-text col-12 font-weight-bold smbalglobal-color  bg-white border-0 clickable mb-25" value="updatepropic" style="outline: none;">Upload Photo
                    <!-- <i class="fa fa-spinner fa-spin d-none savepicloader profileLoader"></i> -->
                </button>

                <div class="col-12 col-lg-12 col-md-12">
                    <button type="button" class="discardbtn authButton button_text col-12 p-0">Back to profile
                    </button>
                </div>
            </form>
        </div>
    </div>
        <!-- end profile pic -->





        <div class="detailwholesection ">
        <div class="edit-div d-none">
            <span class="edit-text">Edit Profile</span>
        </div>
            <!-- personal info -->
            <div class="personaldet mb-5 padd-right-30">
                <div class="row col-12 pr-0 justify-content-between mb-3">
                    <span class="profile-head-text">Personal Info</span>
                    <img class="profilecardhead c-pointer global-font-color" src="{{asset('assests/images/profile/editpen.svg')}}" onclick="editpersonalDetail();" alt="" style="">
                </div>
                <div>
                    <span class="mobileauthtext ">{{Auth::user()->first_name}}</span>
                    <span class="mobileauthtext ">{{Auth::user()->middle_name}}</span>
                    <span class="mobileauthtext ">{{Auth::user()->last_name}}</span>

                    <span class="mobileauthtext mt-3">{{Auth::user()->countries->name}}</span>
                    <span class="mobileauthtext ">{{Auth::user()->nationality}}</span>
                    <?php
                    // $bdate="DD/MM/YY";
                    if (!Auth::user()->birth_date) {
                        $bdate = "DD/MM/YY";
                    } else {
                        $birthdate = Auth::user()->birth_date;
                        $bdate = date('d/m/Y', strtotime($birthdate));
                    }

                    ?>
                    <span class="mobileauthtext ">{{$bdate}}</span>
                </div>
            </div>



            <div class="d-none editpersonaldet ">
                <form class="" id="saveperdetail" action="{{url('personaldetails')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control email shadow-none " name="email" value="">

                    <div style="margin-bottom: 30px;">
                       
                        <h3 class="smbalglobal-color font-weight-bold mt-2 stepnumber" style="margin: auto;">Personal Info</h3>
                    </div>

                    <div class="form-group row mt-5">

                        <div class="col-md-12">
                            <input id="first_name" type="text" class="form-control auth-input shadow-none " name="first_name" value="{{Auth::user()->first_name}}" required autocomplete="first_name" placeholder="First Name">
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <input id="middle_name" type="text" class="form-control auth-input shadow-none " name="middle_name" value="{{Auth::user()->middle_name}}" autocomplete="middle_name" placeholder="Middle Name">
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <input id="last_name" type="text" class="form-control auth-input shadow-none " name="last_name" value="{{Auth::user()->last_name}}" required autocomplete="last_name" placeholder="Last Name">
                        </div>
                    </div>


                    <div class="form-group row mt-5">


                        <div class="col-md-12">
                            <div class="">
                                <div class="input-group-prepend authselect1">
                                    <select class=" form-control auth-input shadow-none" id="country_code" name="country_code" required>
                                        <?php $isSelected = "";
                                        foreach ($countries as $country) {
                                            if (Auth::user()->country_id == $country->id) {
                                                $isSelected = "selected";
                                            } else {
                                                $isSelected = "1";
                                            } ?>

                                            <option value='{{$country->id}}' {{$isSelected}}>{{$country->name}}</option>
                                        <?php } ?>

                                    </select>

                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class=" ">
                                <div class="input-group-prepend authselect2">
                                    <select class=" form-control auth-input shadow-none" id="nationality" name="nationality" required>
                                        <option value="{{Auth::user()->nationality}}" disabled selected>{{Auth::user()->nationality}}</option>

                                        <option value='Emirati'>Emirati</option>
                                        <option value='Indian'>Indian</option>
                                        <option value='American'>American</option>
                                        <option value='Canadian'>Canadian</option>
                                        <option value='Pakistani'>Pakistani</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    // $bdate="DD/MM/YY";
                    if (!Auth::user()->birth_date) {
                        $bdate = "DD/MM/YY";
                    } else {
                        $birthdate = Auth::user()->birth_date;
                        $bdate = date('d/m/Y', strtotime($birthdate));
                    }

                    ?>
                    <div class="date align-items-center datetimepickerforfiles" id="">
                        <input type="text" class="form-control auth-input shadow-none" autocomplete="false" value="{{$bdate}}" id="birth_date" name="birth_date" style="" placeholder="Birth Date DD/MM/YY" required>
                        <span class="input-group-addon  birthdatepicker">
                            <!-- <i class="far fa-calendar calendar" style="font-size: 20px;"></i> -->
                        </span>
                    </div>

                    <div class="  col-12 m-auto w-100 p-0 ">
                        <div class="row">

                            <div class="col-6 col-lg-6 col-md-6">
                                <button type="submit" class="mt-4 savepersonaldet authButton button_text col-12 p-0" value="personalDetail">Save
                                    <i class="fa fa-spinner fa-spin d-none ml-2 personaldetloader checkloader"></i>
                                </button>


                            </div>

                            <div class="col-6 col-lg-6 col-md-6">
                                <button type="button" class="mt-4 discardbtn authButton button_text col-12 p-0" value="">Discard
                                    <!-- <i class="fa fa-spinner fa-spin d-none profileLoader checkloader"></i>  -->
                                </button>

                            </div>

                        </div>
                    </div>

                    <!-- <div class="col-md-12 row justify-content-end p-0 m-0 mt-4 mb-4">

                    <button type="submit" class="savepersonaldet mt-4 saveprofbtn font-weight-bold smbalglobal-color titleFont pull-left theme-btn btn  button clickable" value="personalDetail">Save
              <i class="fa fa-spinner fa-spin d-none  profileLoader  personaldetloader"></i>
              </button>
                    </div>                -->
                </form>
            </div>
            <!-- end personal info -->



            <!-- contact detail -->
            <div class="contactdet mb-5 padd-right-30">
                <div class="row col-12 pr-0 justify-content-between mb-3">
                    <span class="profile-head-text">Contact Info</span>
                    <img class="profilecardhead c-pointer global-font-color" src="{{asset('assests/images/profile/editpen.svg')}}" onclick="editcontactDetail();" alt="" style="">
                </div>
                <div>
                    <span class="mobileauthtext ">{{Auth::user()->email}}</span>
                    <span class="mobileauthtext ">{{Auth::user()->phone_number}}</span>
                    <span class="mobileauthtext ">{{Auth::user()->whatsapp_number}}</span>
                </div>
            </div>



            <div class="editcontactset d-none">
                <div style="margin-bottom: 30px;">
                    <h3 class="smbalglobal-color font-weight-bold mt-2 stepnumber" style="margin: auto;">Contact Info</h3>
                </div>

                <form class="" id="savecontactdetail" action="{{url('contactdetails')}}" onsubmit="return checkUniqueUsernameEmail(this)" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="checkuniquename" value="{{url('checkuniqueness')}}">
                    <input type="hidden" class="userid" value="{{Auth::user()->id}}">
                    <div class="form-group mt-5 ">

                        <div class="input-group">
                            <input id="email" type="email" class="form-control auth-input  shadow-none " name="email" value="{{Auth::user()->email}}" required autocomplete="email" placeholder="Email">
                        </div>
                        <p class="error-email text-danger"> </p>
                    </div>

                    <div class="form-group row ">
                        <div class="col-4 pr-0">
                            <?php
                            $user_phone_no = Auth::user()->phone_number;
                            $usernumber = "";
                            $usernumbercode = "";
                            if (isset($user_phone_no)) {
                                if (str_contains($user_phone_no, '-')) {
                                    $usernumber = substr($user_phone_no, strpos($user_phone_no, "-") + 1);
                                    $phcode = substr($user_phone_no, 0, strrpos($user_phone_no, "-"));
                                    if (str_contains($phcode, '+')) {
                                        $usernumbercode = $phcode;
                                    } else {
                                        $usernumbercode = "+" . $phcode;
                                    }
                                } else {
                                    $usernumber =  $user_phone_no;
                                }
                            }

                            ?>
                            <input id="number_code" type="text" class="form-control auth-input shadow-none " name="phone_number_code" value="{{$usernumbercode}}" required placeholder="Code">
                        </div>

                        <div class="col-8">
                            <input id="user_number" type="number" class="form-control auth-input shadow-none " name="user_number" value="{{$usernumber}}" required placeholder="Mobile">
                        </div>
                        <span class='validPhoneNum text-danger col-12'></span>
                    </div>

                    <div class="form-group row ">
                        <div class="col-4 pr-0">
                            <?php
                            $whatsapp_phone_no = Auth::user()->whatsapp_number;
                            $wpnumber = "";
                            $wpnumbercode = "";
                            if (isset($whatsapp_phone_no)) {
                                if (str_contains($whatsapp_phone_no, '-')) {
                                    $wpnumber = substr($whatsapp_phone_no, strpos($whatsapp_phone_no, "-") + 1);
                                    $wpcode = substr($whatsapp_phone_no, 0, strrpos($whatsapp_phone_no, "-"));
                                    if (str_contains($wpcode, '+')) {
                                        $wpnumbercode = $wpcode;
                                    } else {
                                        $wpnumbercode = "+" . $wpcode;
                                    }
                                } else {
                                    $wpnumber =  $whatsapp_phone_no;
                                }
                            }

                            ?>
                            <input id="wp_number_code" type="text" class="form-control auth-input shadow-none " name="wpuser_number" value="{{$wpnumbercode}}" required placeholder="Code">
                        </div>

                        <div class="col-8">
                            <input id="wp_user_number" type="number" class="form-control auth-input shadow-none " name="wp_user_number" value="{{$wpnumber}}" required placeholder="Whatsapp">
                        </div>
                        <span class='validwpPhoneNum text-danger col-12'></span>
                    </div>


                    <!-- <div class="col-md-12 row justify-content-between p-0 m-0 mt-5 mb-4">
                        
                        <div class="col-6 row justify-content-end  p-0 m-0">
                        <button type="submit" class="mt-4 savecontact font-weight-bold smbalglobal-color titleFont pull-left theme-btn btn  button clickable" value="contactDetail">Save
              <i class="fa fa-spinner fa-spin d-none profileLoader checkloader"></i> 
              </button>

                        </div>
                    </div> -->

                    <div class="  col-12 m-auto w-100 p-0 ">
                        <div class="row">

                            <div class="col-6 col-lg-6 col-md-6">
                                <button type="submit" class="mt-4 savecontact authButton button_text col-12 p-0" value="contactDetail">Save
                                    <i class="fa fa-spinner fa-spin d-none ml-2 savecontactLoader checkloader"></i>
                                </button>


                            </div>

                            <div class="col-6 col-lg-6 col-md-6">
                                <button type="button" class="mt-4 discardbtn authButton button_text col-12 p-0" value="">Discard
                                    <!-- <i class="fa fa-spinner fa-spin d-none profileLoader checkloader"></i>  -->
                                </button>

                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <!-- end contact detail -->


            <!-- buisness detail -->
            <div class="profdet mb-5">
                <div class="row col-12 pr-0 justify-content-between mb-3">
                    <span class="profile-head-text">Buisness Info</span>
                    <img class="profilecardhead c-pointer global-font-color" src="{{asset('assests/images/profile/editpen.svg')}}" onclick="editprofDetail();" alt="" style="">
                </div>
                <div>
                    <span class="mobileauthtext ">{{Auth::user()->company}}</span>
                    <span class="mobileauthtext ">{{Auth::user()->designation}}</span>
                    <span class="mobileauthtext ">{{Auth::user()->city}}</span>

                    <span class="mobileauthtext mt-3">{{Auth::user()->buisness_countries->name}}</span>
                    <span class="mobileauthtext ">{{Auth::user()->business_number}}</span>
                </div>
            </div>



            <div class="editprofdet d-none">
                <div style="margin-bottom: 35px;">
                    <h3 class="smbalglobal-color font-weight-bold mt-2 stepnumber" style="margin: auto;">Business info</h3>
                </div>
                <form class="" id="saveprofdetail" action="{{url('professionaldetails')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row  mt-5">
                        <div class="col-md-12">
                            <input id="company_name" type="text" class="form-control auth-input shadow-none " name="company" value="{{Auth::user()->company}}" required autocomplete="company_name" placeholder="Company Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="role" type="text" class="form-control auth-input shadow-none " name="role" value="{{Auth::user()->designation}}" autocomplete="role" placeholder="Role">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input id="city" type="text" class="form-control auth-input shadow-none " name="city" value="{{Auth::user()->city}}" required autocomplete="city" placeholder="City">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <div class="col-md-12">
                            <div class="">
                                <div class="input-group-prepend authselect3">
                                    <select class=" form-control auth-input shadow-none" id="bcountry_code" name="business_country_code" required value="{{Auth::user()->buisness_country_id}}">
                                        <?php $isSelected = "";
                                        foreach ($countries as $country) {
                                            if (Auth::user()->buisness_country_id == $country->id) {
                                                $isSelected = "selected";
                                            } else {
                                                $isSelected = "1";
                                            } ?>

                                            <option value='{{$country->id}}' {{$isSelected}}>{{$country->name}}</option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group row mt-5">
                        <?php

                        $phone_no = Auth::user()->business_number;
                        if (str_contains($phone_no, '-')) {
                            $number = substr($phone_no, strpos($phone_no, "-") + 1);
                            $code = substr($phone_no, 0, strrpos($phone_no, "-"));
                            if (str_contains($code, '+')) {
                                $numbercode = $code;
                            } else {
                                $numbercode = "+" . $code;
                            }
                        } ?>
                        <div class="col-4 pr-0">
                            <input id="business_number_code" type="text" class="form-control auth-input shadow-none " name="business_number_code" value="{{$numbercode}}" required placeholder="Code">
                        </div>

                        <div class="col-8">
                            <input id="business_user_number" type="number" class="form-control auth-input shadow-none " name="business_user_number" value="{{$number}}" required placeholder="Mobile">
                        </div>
                        <span class='validPhoneNum text-danger col-12'></span>
                    </div>




                    <div class="  col-12 m-auto w-100 p-0 ">
                        <div class="row">

                            <div class="col-6 col-lg-6 col-md-6">
                                <button type="submit" class="mt-4 saveprofbtn authButton button_text col-12 p-0" value="professionalDetail">Save
                                    <i class="fa fa-spinner fa-spin d-none ml-2 profbtnLoader checkloader"></i>
                                </button>


                            </div>

                            <div class="col-6 col-lg-6 col-md-6">
                                <button type="button" class="mt-4 discardbtn authButton button_text col-12 p-0" value="">Discard
                                    <!-- <i class="fa fa-spinner fa-spin d-none profileLoader checkloader"></i>  -->
                                </button>

                            </div>

                        </div>
                    </div>

                </form>
            </div>
            <!-- end buisness detail -->
        </div>


    </div>


    <!-- <div class="static-bottom-bg"></div> -->
    <img class="img-fluid profile_footerimg" style="" src="{{ asset('assests/images/profile/profile_footer.svg') }}" alt="">
</div>


@endsection


@section('script')
<script src="{{asset('/js/profile.js?v='.$v) }}" defer></script>
<script type="text/javascript">
    $(document).ready(function() {


        $('.datetimepickerforfiles').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
    });
</script>
@endsection