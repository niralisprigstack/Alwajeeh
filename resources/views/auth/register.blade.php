@extends('layouts.appauth')
<?php   $v = "11.5" ?>
<title>SignUp</title>
@section('content')

<input type="hidden" class='entryPassurl' value="{{url('entry-password')}}">
<div class="fluid-container auth_bg_color m-auto register_cont " style='height:100vh'>
    <div class="register-logo">
        <img class="img-fluid auth_headerimg" style="" src="{{ asset('assests/images/auth_header.svg') }}" alt="">
        <!-- <img class="img-fluid" style="" src="{{ asset('assests/images/full_logo2.svg') }}" alt=""> -->
        <!-- <img class="img-fluid successfulpage_img" style="position:absolute;" src="{{ asset('assests/images/successfull_img.svg') }}" alt=""> -->

        <!-- <img class="img-fluid register-logo " style="float: right;" src="{{ asset('assests/images/register_logo.svg') }}" alt=""> -->
        <div class="col-lg-10  d-lg-none col-10 mobileView m-auto createaccdiv" style="">
            <p class="newacc_text smbalglobal-color">Create a new account</p>
        </div>





        <div class="col-lg-10 col-10  centerBoth mobilestepdiv   flex-column m-auto">


            <!-- step 0 -->
            <div class="step-0 step  respstep0">
                <p style='font-weight: normal;' class='smbalpasslabel welcomeTitle'>Request One time Password from Admin to proceed</p>
                <input type="hidden" class='signupUrl' value="{{url('register')}}">
                <div class="form-group mt-40">

                    <input type="password" class="form-control auth-input  entrypassword shadow-none" name="password" required autofocus autocomplete="nope" placeholder="Password">
                    <p class='entryPassError text-danger'></p>
                    <button class='authButton button_text col-12 centerloader entryPassbtn mt-40'>
                        <span>Get me in</span>
                        <span class="loadingspinner  d-none loader ml-3 " role="status" aria-hidden="true"></span>
                    </button>

                </div>



            </div>
            <!-- step 0 ends -->



            <!-- step-1 -->
            <div class="step-1 d-none step  respstep1">
                <form id='saveUserName'>
                    @csrf
                    <input type="hidden" class="verifyEmailUrl" value="{{url('verify-email')}}">
                    <input type="hidden" class="verifyuserNameUrl " value="{{url('verify-userName')}}">
                    <input type="hidden" class="saveUserNameUrl" value="{{url('saveEmailAndUserName')}}">
                    <div style="margin-bottom: 30px;">
                        <img class="img-fluid" style="position: absolute; top: -8px;" src="{{ asset('assests/images/step1.svg') }}" alt="">
                        <h3 class="smbalglobal-color font-weight-bold mt-2 stepnumber" style="margin: auto;">Login Details</h3>
                    </div>



                    <h4 class='auth-md-font  mb-4 mobileauthfont global-font-color'>Choose your username and email for login</h4>
                    <div class="form-group">

                        <div class="input-group ">
                            <input id="user_name" type="text" class="form-control auth-input  shadow-none mr-1" name="user_name" required placeholder="username">
                            <span class="requiredstar" >*</span>
                        </div>
                        <p class="error-username text-danger"></p>
                    </div>

                    <div class="form-group mb-5 ">

                        <div class="input-group">
                            <input id="email" type="email" class="form-control auth-input  shadow-none mr-1" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                            <span class="requiredstar" >*</span>
                        </div>
                        <p class="error-email text-danger"> </p>
                    </div>


                    <div class="form-group row">


                        <div class="col-md-12">
                        <div class="d-flex">
                            <input id="password" type="password" class="form-control auth-input  mr-1 mb-2 shadow-none " name="password" required autocomplete="new-password" placeholder="Password">
                            <span class="requiredstar" >*</span>
                        </div>
                            <div id="popover-password">
                                <span class='text-danger passwordError'></span>
                                <p style='margin-bottom: 5px;'><span id="result"></span></p>
                                <div class="progress">
                                    <div id="password-strength" class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="form-group row">


                        <div class="col-md-12">
                        <div class="d-flex">
                            <input id="password-confirm" type="password" class="form-control mr-1 auth-input shadow-none" name="password_confirmation" required autocomplete="new-password" placeholder="Re-type Password">
                            <span class="requiredstar" >*</span>
                        </div>
                            <!-- <p class="">  </p> -->
                            <span id="popover-cpassword" class="d-none text-danger "> Password and Confirm Password do not match.</span>

                        </div>
                    </div>

                    <button type='submit' class="authButton button_text col-12 mt-4 centerloader  auth-btn ">
                        <span>{{ __('Proceed') }}</span>
                        <span class="loadingspinner d-none loader ml-3 " role="status" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
            <!-- step 1 ends -->

            <!-- step 2 -->
            <div class="step-2 d-none step  respstep2 ">
                <form id="userRegisterForm">
                    @csrf
                    <input type="hidden" class="personalinfourl" value="{{url('personalInfo')}}">
                    <input type="hidden" class="form-control email shadow-none " name="email" value="">

                    <div style="margin-bottom: 30px;">
                        <img class="img-fluid" style="position: absolute; top: -8px;" src="{{ asset('assests/images/step2.svg') }}" alt="">
                        <h3 class="smbalglobal-color font-weight-bold mt-2 stepnumber" style="margin: auto;">Personal Info</h3>
                    </div>

                    <div class="form-group row mt-5">

                        <div class="col-md-12 d-flex">
                            <input id="first_name" type="text" class="form-control auth-input shadow-none mr-1" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="First Name">
                            <span class="requiredstar" >*</span>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12 d-flex">
                            <input id="middle_name" type="text" class="form-control auth-input shadow-none mr-1" name="middle_name" value="{{ old('middle_name') }}" required autocomplete="middle_name" placeholder="Middle Name">
                            <span class="requiredstar" >*</span>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12 d-flex">
                            <input id="last_name" type="text" class="form-control auth-input shadow-none mr-1" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Last Name">
                            <span class="requiredstar" >*</span>
                        </div>
                    </div>


                    <div class="form-group row mt-5">


                        <div class="col-md-12">
                            <div class="">
                                <div class="input-group-prepend authselect">
                                    <select class=" form-control auth-input shadow-none mr-1 " id="country_code" name="country_code" required>
                                        <option value="" disabled selected>Country</option>

                                        <option value='1'>UAE</option>
                                        <option value="2">India</option>
                                        <option value="3">USA</option>
                                        <option value="4">Canada</option>
                                        <option value="5">Pakistan</option>

                                    </select>
                                    <span class="requiredstar" >*</span>

                                </div>
                                
                            </div>
                        </div>

                    </div>


                    <div class="form-group row">


                        <div class="col-md-12">
                            <div class=" ">
                                <div class="input-group-prepend authselect ">
                                    <select class=" form-control auth-input shadow-none mr-1" id="nationality" name="nationality" required>
                                        <option value="" disabled selected>Nationality</option>

                                        <option value='Emirati'>Emirati</option>
                                        <option value='Indian'>Indian</option>
                                        <option value='American'>American</option>
                                        <option value='Canadian'>Canadian</option>
                                        <option value='Pakistani'>Pakistani</option>

                                    </select>
                                    <span class="requiredstar" >*</span>
                                </div>
                               
                            </div>
                        </div>
                    </div>


                    <div class="date align-items-center datetimepickerforfiles" id="">
                        <input type="text" class="form-control auth-input shadow-none" autocomplete="false" value="" id="birth_date" name="birth_date" style="" placeholder="Birth Date DD/MM/YY" >
                        <span class="input-group-addon  birthdatepicker">
                            <!-- <i class="far fa-calendar calendar" style="font-size: 20px;"></i> -->
                        </span>
                    </div>
                    <!-- <div class="form-group row">
                    <label for="user_number" class="col-md-12 col-form-label text-md-left global-font-color">{{ __('Phone Number') }}</label>

                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <select class=" form-control auth-input shadow-none" id="country_code" name="country_code">


                                    <option selected value='+971'>+971 - UAE</option>
                                    <option value="+91">+91 - INDIA</option>
                                    <option value="+92">+92 - PAKISTAN</option>
                                    <option value="+1">+1 - USA/CANADA</option>
                                </select>

                            </div>
                            <input id="user_number" type="number" class="form-control auth-input shadow-none " name="user_number" value="{{ old('phone_number') }}" required>
                        </div>

                        <span class='validPhoneNum text-danger'></span>
                    </div>

                </div> -->


                    <!-- <div class="form-group row">
                    <label for="password" class="col-md-12 col-form-label text-md-left global-font-color">{{ __('Password') }}</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control auth-input  mb-2 shadow-none " name="password" required autocomplete="new-password">
                        <div id="popover-password">
                            <span class='text-danger passwordError'></span>
                            <p style='margin-bottom: 5px;'><span id="result"></span></p>
                            <div class="progress">
                                <div id="password-strength" class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-12 col-form-label  text-md-left global-font-color">{{ __('Confirm Password') }}</label>

                    <div class="col-md-12">
                        <input id="password-confirm" type="password" class="form-control  auth-input shadow-none" name="password_confirmation" required autocomplete="new-password">
                        
                        <span id="popover-cpassword" class="d-none text-danger "> Password and Confirm Password do not match.</span>

                    </div>
                </div> -->


                    <div class="col-md-12 row justify-content-end p-0 m-0 mt-4 mb-4">

                        <button class=" centerloader nextbackbtn pr-0">Next
                        <img class="img-fluid" style="width: 40px;" src="{{ asset('assests/images/rightarrow.svg') }}" alt="">
                        <!-- <span class="loadingspinner d-none registerLoader ml-3 " role="status" aria-hidden="true"></span> -->
                        </button>
                    </div>


                   

                </form>
            </div>
            <!-- step2 ends -->



            <!-- step 3 -->
            <div class="step-3 d-none  step  respstep3">
                <div style="margin-bottom: 30px;">
                    <img class="img-fluid" style="position: absolute; top: -8px;" src="{{ asset('assests/images/step3.svg') }}" alt="">
                    <h3 class="smbalglobal-color font-weight-bold mt-2 stepnumber" style="margin: auto;">Contact Info</h3>
                </div>

                <form id='savePhonenumber'>
                    @csrf
                    <input type="hidden" class="registerUserurl" value="{{url('registerPhone')}}">
                    <input type="hidden" id="phone_number" name="phone_number" value="">
                    <input type="hidden" id="wp_number" name="wp_user_number" value="">
                    <input type="hidden" class="phone_number_code" name="phone_number_code" value="">
                    <input type="hidden" class="wpphone_number_code" name="wpphone_number_code" value="">

                    <input type="hidden" class="fullphonenumber" name="fullphonenumber" value="">
                    <input type="hidden" class="fullwpphonenumber" name="fullwpphonenumber" value="">



                    <div class="form-group row mt-5">
                        <div class="col-4 pr-0">
                            <input id="number_code" type="text" class="form-control auth-input shadow-none " name="phone_number_code" value="" required placeholder="Code">
                        </div>

                        <div class="col-8 d-flex">
                            <input id="user_number" type="number" class="form-control auth-input shadow-none mr-1 " name="user_number" value="{{ old('phone_number') }}" required placeholder="Mobile">
                            <span class="requiredstar" >*</span>
                        </div>
                        <span class='validPhoneNum text-danger col-12'></span>
                    </div>

                    <div class="form-group row ">
                        <div class="col-4 pr-0">
                            <input id="wp_number_code" type="text" class="form-control auth-input shadow-none " name="wpuser_number" value=""  placeholder="Code">
                        </div>

                        <div class="col-8">
                            <input id="wp_user_number" type="number" class="form-control auth-input shadow-none " name="wp_user_number" value="{{ old('whatsapp_number') }}"  placeholder="Whatsapp">
                        </div>
                        <span class='validwpPhoneNum text-danger col-12'></span>
                    </div>


                    <div class="col-md-12 row justify-content-between p-0 m-0 mt-5 mb-4">
                        <div class="col-6 row justify-content-start  p-0 m-0">
                            <button class="centerloader nextbackbtn pl-0 goTostep2">
                                <img class="img-fluid " style="width: 40px;" src="{{ asset('assests/images/leftarrow.svg') }}" alt="">
                                Back
                            </button>
                        </div>
                        <div class="col-6 row justify-content-end  p-0 m-0">
                            <button onclick="otpdefaultfocus();" class=" userDetailsNext  pr-0 centerloader nextbackbtn ">
                                Next
                                <img class="img-fluid" style="width: 40px;" src="{{ asset('assests/images/rightarrow.svg') }}" alt="">
                            </button>

                        </div>
                    </div>
                </form>
            </div>
            <!-- step 3 ends -->


            <!-- step 4 -->
            <div class="step-4 d-none step respstep4 ">
                <div style="margin-bottom: 30px;">
                    <img class="img-fluid" style="position: absolute; top: -8px;" src="{{ asset('assests/images/step4.svg') }}" alt="">
                    <h3 class="smbalglobal-color font-weight-bold mt-2 stepnumber" style="margin: auto;">Mobile No. Verification</h3>
                </div>

                <form id="verifyOtpForm">
                    @csrf
                    <input type="hidden" name="phone_number" class="fullphone_numberForOtp">
                    <!-- <input type="hidden" class="phone_number_code" name="phone_number_code" value=""> -->

                    <input type="hidden" class="verifyOtpUrl" value="{{url('verifyOtp')}}">
                    <input type="hidden" id="verification_code" class="verification_code" type="number" name="verification_code">


                    <h4 class='auth-md-font  mb-4 mobileauthfont global-font-color'> Please enter the OTP password received on your mobile</h4>
                    <div class="form-group  text-center">

                        <!-- otp inputs -->
                        <div class="otp-wrapper otp-event">
                            <div class="otp-container">
                                <input type="tel" id="otp-number-input-1 onfocu" class="otp-number-input auth-otp-input onfocus" maxlength="1" autocomplete="off">
                                <input type="tel" id="otp-number-input-2" class="otp-number-input auth-otp-input" maxlength="1" autocomplete="off">
                                <input type="tel" id="otp-number-input-3" class="otp-number-input auth-otp-input" maxlength="1" autocomplete="off">
                                <input type="tel" id="otp-number-input-4" class="otp-number-input auth-otp-input" maxlength="1" autocomplete="off">
                                <input type="tel" id="otp-number-input-5" class="otp-number-input auth-otp-input" maxlength="1" autocomplete="off">
                                <input type="tel" id="otp-number-input-6" class="otp-number-input auth-otp-input" maxlength="1" autocomplete="off">
                            </div>
                            <p class="otpMessage  text-center"></p>

                            <button id="confirm" type="submit" class="otp-submit verifyOtp font-weight-bold mt-4 centerloader authButton button_text col-12" disabled>
                                <span> Verify</span>
                                <span class="loadingspinner d-none  otpLoader ml-3" role="status" aria-hidden="true"></span>
                            </button>

                        </div>

                    </div>
                    <input type="hidden" id='resendOtpurl' value="{{url('resendOtp')}}">
                    <p id='resendOtp' class='text-center mt-4 c-light-black global-font-color' style='    font-size: 20px;'>Resending in <span id="timer"></span> </p>
                    <!-- <p class='text-center mt-4 c-light-black global-font-color' style='    font-size: 16px;'>Entered wrong number ? <span class='text-center loginback c-pointer f-s-17 f-w-600 global-font-color'> Go Back </p> -->

                    <div class="col-md-12 row justify-content-between p-0 m-0 mt-5 mb-4">
                        <div class="col-6 row justify-content-start  p-0 m-0">
                            <button class="centerloader nextbackbtn pl-0 goTostep3">
                                <img class="img-fluid " style="width: 40px;" src="{{ asset('assests/images/leftarrow.svg') }}" alt="">
                                Back
                            </button>
                        </div>
                        <div class="col-6 row justify-content-end  p-0 m-0">
                            <button id="confirm2" type="submit" class="    otp-submit verifyOtp mt-0 mr-0 pr-0 centerloader nextbackbtn  ">
                                Next
                                <img class="img-fluid" style="width: 40px;" src="{{ asset('assests/images/rightarrow.svg') }}" alt="">
                            </button>

                        </div>
                    </div>

                </form>
            </div>
            <!-- step 4 ends -->


            <!-- step 5 -->
            <div class="step-5  d-none step  respstep5">

                <div style="margin-bottom: 30px;">
                    <img class="img-fluid" style="position: absolute; top: -18px;" src="{{ asset('assests/images/step5.svg') }}" alt="">
                    <h3 class="smbalglobal-color font-weight-bold mt-2 stepnumber" style="margin: auto;">Mobile No. Verification</h3>
                    </h3>
                </div>

                <div class="sucessfull-msg justify-content-center" style="height: 40vh;">
                    Verification<br> 
                    Successfull
                </div>

                <div class="col-md-12 row justify-content-between p-0 m-0 mt-5 mb-4">
                    <div class="col-6 row justify-content-start  p-0 m-0">
                        <button class="centerloader nextbackbtn pl-0 goTostep4">
                            <img class="img-fluid " style="width: 40px;" src="{{ asset('assests/images/leftarrow.svg') }}" alt="">
                            Back
                        </button>
                    </div>
                    <div class="col-6 row justify-content-end  p-0 m-0 ">
                        <button class="  pr-0 centerloader nextbackbtn goTostep6">
                            Next
                            <img class="img-fluid" style="width: 40px;" src="{{ asset('assests/images/rightarrow.svg') }}" alt="">
                        </button>

                    </div>
                </div>

            </div>
            <!-- step 5 ends -->



            <!-- unsuccessful verification -->

            <div class="step-8  d-none step  respstep8">

                <div style="margin-bottom: 30px;">
                    <img class="img-fluid" style="position: absolute; top: -18px;" src="{{ asset('assests/images/step5.svg') }}" alt="">
                    <h3 class="smbalglobal-color font-weight-bold mt-2 stepnumber" style="margin: auto;">Mobile No. Verification</h3>
                    </h3>
                </div>

                <div class="sucessfull-msg mt-5 justify-content-center " style="">
                    <!--height: 40vh;-->
                    Verification<br>
                    Unsuccesfull
                </div>
                
                <div class="" style="margin-bottom: 150px;">
                    <button class="otp-submit goTostep2  font-weight-bold mt-4 centerloader authButton button_text col-12">
                        <span>Verify Later</span>                    
                    </button>
                </div>                

                <div class="col-md-12 row justify-content-between p-0 m-0 mt-5 mb-4">
                    <div class="col-6 row justify-content-start  p-0 m-0">
                        <button class="centerloader nextbackbtn pl-0 goTostep2">
                            <img class="img-fluid " style="width: 40px;" src="{{ asset('assests/images/leftarrow.svg') }}" alt="">
                            Back
                        </button>
                    </div>
                    <div class="col-6 row justify-content-end  p-0 m-0 ">
                      

                    </div>
                </div>

            </div>

            <!-- ends -->

            <!-- step 6 -->
            <div class="step-6 d-none step  respstep6">
                <div style="margin-bottom: 35px;">
                    <img class="img-fluid" style="position: absolute; top: -8px;" src="{{ asset('assests/images/step6.svg') }}" alt="">
                    <h3 class="smbalglobal-color font-weight-bold mt-2 stepnumber" style="margin: auto;">Business info</h3>
                </div>
                <form id='buisnessDet'>
                    @csrf
                    <input type="hidden" name="phone_number" class="phone_numberForOtp">
                    <input type="hidden" name="wpphone_number" class="wpphone_number">

                    <input type="hidden" class="phone_number_code" name="phone_number_code" value="">
                    <input type="hidden" class="wpphone_number_code" name="wpphone_number_code" value="">

                    <input type="hidden" class="buisnessdetailurl" value="{{url('buisnessDetails')}}">
                    <input type="hidden" class="dashboardUrl" value="{{url('home')}}">
                    <input type="hidden" class="newsfeedUrl" value="{{url('newsfeed')}}">
                    <!-- <input type="hidden" id="verification_code" type="number" name="verification_code" class="verification_code" > -->
                    <input type="hidden" id="first_name_save" name="first_name">
                    <input type="hidden" id="middle_name_save" name="middle_name">
                    <input type="hidden" id="last_name_save" name="last_name">
                    <input type="hidden" id="password_save" name="password">
                    <input type="hidden" id="email_save" name="email">
                    <input type="hidden" id="user_name_save" name="user_name">
                    <input type="hidden" name="countryCode" class="countryCodesave">
                    <input type="hidden" name="birth_date" class="birth_date">
                    <input type="hidden" name="nationality" class="nationality">

                    



                    <div class="form-group row  ">

                        <div class="col-md-12">
                            <input id="company_name" type="text" class="form-control auth-input shadow-none " name="company" value="{{ old('company') }}"  autocomplete="company_name" placeholder="Company Name">
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <input id="role" type="text" class="form-control auth-input shadow-none " name="role" value="{{ old('designation') }}"  autocomplete="role" placeholder="Role">
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">
                            <input id="city" type="text" class="form-control auth-input shadow-none " name="city" value="{{ old('city') }}"  autocomplete="city" placeholder="City">
                        </div>
                    </div>

                    <div class="form-group row ">


                        <div class="col-md-12">
                            <div class="">
                                <div class="input-group-prepend authselect">
                                    <select class=" form-control auth-input shadow-none" id="bcountry_code" name="business_country_code" >
                                        <option value="" disabled selected>Country</option>

                                        <option value='1'>UAE</option>
                                        <option value="2">India</option>
                                        <option value="3">USA</option>
                                        <option value="4">Canada</option>
                                        <option value="5">Pakistan</option>

                                    </select>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group row mt-5">
                        <div class="col-4 pr-0">
                            <input id="business_number_code" type="text" class="form-control auth-input shadow-none " name="business_number_code" value=""  placeholder="Code">
                        </div>

                        <div class="col-8">
                            <input id="business_user_number" type="number" class="form-control auth-input shadow-none " name="business_user_number" value="{{ old('business_number') }}"  placeholder="Mobile">
                        </div>
                        <span class='validPhoneNum text-danger col-12'></span>
                    </div>


                    <button type='submit' class="authButton button_text col-12 mt-4 centerloader  ">
                        <span>{{ __('Submit') }}</span>
                        <span class="loadingspinner finalloader d-none loader ml-3 " role="status" aria-hidden="true"></span>
                    </button>

                    <div class="col-md-12 row justify-content-between p-0 m-0 mt-5 mb-4">
                        <div class="col-6 row justify-content-start  p-0 m-0">
                            <button class="centerloader nextbackbtn pl-0 goTostep5">
                                <img class="img-fluid " style="width: 40px;" src="{{ asset('assests/images/leftarrow.svg') }}" alt="">
                                Back
                            </button>
                        </div>
                        <div class="col-6 row justify-content-end  p-0 m-0">
                            <!-- <button type='submit' class="   pr-0 centerloader nextbackbtn ">
                                Next
                                <img class="img-fluid" style="width: 40px;" src="{{ asset('assests/images/rightarrow.svg') }}" alt="">
                            </button> -->

                        </div>
                    </div>


                </form>
            </div>
            <!-- step 6 ends -->

            <div class="step-7 d-none text-center step respstep7" style="">
                <input type="hidden" class="dashboardurl" value="{{url('home')}}">
                <h2 class='newacc_text smbalglobal-color justify-content-center' style="">Account<br>Created !</h2>
                <p class='lastpagetext mt-5 mb-4 p-0 mb-0 justify-content-center'> Welcome to Alwajeeh</p>
                <!-- <p class='lastpagetext justify-content-center p-0'>Alwajeeh</p> -->
               


                <img class="img-fluid full_logo mb-4" style="" src="{{ asset('assests/images/register_logo.svg') }}" alt="">

                <button class='authButton button_text col-12 mt-3 redirectToDashboard mb-3'>
                    Lets Start
                    <span class="loadingspinner gotohomeloader d-none loader ml-3 " role="status" aria-hidden="true"></span>
                </button>


            </div>

            <!-- <div class="auth-pagination mb-4  ">
            <button class='bg-btn auth-step-btn step-1-btn auth_pagelink_btn'>1</button>
            <div class='auth-border  ml-1 mr-1'></div>
            <button class='step-2-btn auth-step-btn auth_pagelink_btn'>2</button>
            <div class='auth-border ml-1 mr-1'></div>
            <button class='step-3-btn auth-step-btn auth_pagelink_btn'>3</button>
            <div class='auth-border ml-1 mr-1'></div>
            <button class='step-4-btn auth-step-btn auth_pagelink_btn'>4</button>
            <div class='auth-border auth-step-btn ml-1 mr-1'></div>
            <button class='step-5-btn auth_pagelink_btn'>5</button>
        </div> -->
        </div>
        <!-- <img class="img-fluid full_logo" style="position: absolute;top: 100%;" src="{{ asset('assests/images/full_logo.svg') }}" alt=""> -->
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    var mytexarea = document.getElementById("onfocu");
    window.onload = function() {

        mytexarea.focus();

    }

    $(document).ready(function() {


        $('.datetimepickerforfiles').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
    });
</script>
@endsection