$(function (){
    
  
    $('#user_name').on('keypress', function(e) {
      if (e.keyCode  == 32){
          return false;
      }
  });
  
  $('.resetpassloader').on('click', function (){
      $('.resetploader').removeClass('d-none');
  });
  
  $(".userDetailsNext").click(function(){
      $(".onfocus").focus();
    }); 
  // var mytexarea=document.getElementById("onfocu");
  
  
  $('.goTostep2').on('click' , function (e){
    e.preventDefault();
    goTostep2(this);
  });
  
  $('.goTostep4').on('click' , function (e){
    e.preventDefault();
    goTostep4(this);
  });

  $('.goTostep3').on('click' , function (e){
    e.preventDefault();
    goTostep3(this);
  });

  $('.goTostep5').on('click' , function (e){
    e.preventDefault();
    goTostep5(this);
  });

  $('.goTostep6').on('click' , function (e){
    e.preventDefault();
    goTostep6(this);
  });


  if(!$('.step-7').hasClass('d-none')){
    // $('.auth_headerimg').addClass('d-none');
    // $('.successfulpage_img').removeClass('d-none');
    $('.createaccdiv').addClass('d-none');
    // $('.mobilestepdiv').css('height','100vh');
  }

  $('.auth-step-btn').on('click', function (){
      let num = $(this).text();
      num = parseInt(num);
      let num1 = num + 1 ;
      let class1= ".step-" + num + "-btn";
     let currentPosition; 
  
     $('.auth-step-btn').each(function (){
        if($(this).hasClass('bg-btn')){
      currentPosition =  $(this).text();
      currentPosition = parseInt(currentPosition);
        }
     });
  
     if(currentPosition > num){
   // let class2= ".step-" + num1  + "-btn";
   if(num==3){
      $('.auth-pagination').css('position','initial');
  }
  else{
      $('.auth-pagination').removeAttr('style')
  }
      
  
      $('.auth-step-btn').each(function (){
          $(this).removeClass('bg-btn');
      })
       $(class1).addClass('bg-btn');
      //  $(class2).removeClass('d-none');
  
     
       let step = '.step-' + num;
    $('.step').each(function (){
        $(this).addClass('d-none');
    })
  
       $(step).removeClass('d-none')
     }
   
     
  
     
  
  })
  
  // $('.loginback').on('click' , function (){
  //     $('.step-4').addClass('d-none');
  //     $('.step-3').removeClass('d-none');
  //             $('.step-4-btn').removeClass('bg-btn');
  //             $('.step-3-btn').addClass('bg-btn');
  // })
  
  $('.loginback').on('click' , function (){
    $('.step-3-btn').trigger('click');
  })
  
  $('#saveUserName').on('submit', function (e){
  e.preventDefault();
      saveUserName(this);
  })
  $('.nextStepBtn').on('click', function (){
  $('.step-1').addClass('d-none');
  $('.step-2').removeClass('d-none');
  });
  
    $('#userRegisterForm').on('submit' , function (e){
      e.preventDefault();
      personalInfo(this);
    });
  

    $('#savePhonenumber').on('submit' , function (e){
        e.preventDefault();
        registerUser(this);
      });


    $('.loginUserbtn').on('click' , function (){
      $('.signinloader').removeClass('d-none');
    });
    $('.redirectToDashboard').on('click' , function (){
        $('.gotohomeloader').removeClass('d-none');
        let url = $('.dashboardurl').val();
        window.location.href = url;
    })
  
    $('#password').on('keyup change',function() {
      var password = $('#password').val();
      if (checkStrength(password) == false) {
         
      }
  });
  $('.entryPassbtn').on('click', function (){
      verifyEntryPass(this);
  })
  
  $('#password-confirm').on('keyup' , function() {
      if ($('#password').val() !== $('#password-confirm').val()) {
          $('#popover-cpassword').removeClass('d-none');     
      } else {
          $('#popover-cpassword').addClass('d-none');
      }
  });
   
  
  
    $('#verifyOtpForm').on('submit', function (e){
      e.preventDefault();
      let otp = otpCodeTemp;
      $('#verification_code').val(otp);
        verifyOtp(this);
    });


    $('#buisnessDet').on('submit', function (e){
        e.preventDefault();
        verifyAlldetails(this);
      });
  
    $('#resendOtp').on('click', function (){
      resendOtp(this);
    });
  
    $('.otp-event').each(function(){
      var $input = $(this).find('.otp-number-input');
      var $submit = $(this).find('.otp-submit');
      $input.keydown(function(ev) {
         otp_val = $(this).val();
         if (ev.keyCode == 37) {
             $(this).prev().focus();
             ev.preventDefault();
         } else if (ev.keyCode == 39) {
             $(this).next().focus();
             ev.preventDefault();
         } else if (otp_val.length == 1 && ev.keyCode != 8 && ev.keyCode != 46) {
             otp_next_number = $(this).next();
             if (otp_next_number.length == 1 && otp_next_number.val().length == 0) {
                 otp_next_number.focus();
             }
         } else if (otp_val.length == 0 && ev.keyCode == 8) {
             $(this).prev().val("");
             $(this).prev().focus();
         } else if (otp_val.length == 1 && ev.keyCode == 8) {
             $(this).val("");
         } else if (otp_val.length == 0 && ev.keyCode == 46) {
             next_input = $(this).next();
             next_input.val("");
             while (next_input.next().length > 0) {
                 next_input.val(next_input.next().val());
                 next_input = next_input.next();
                 if (next_input.next().length == 0) {
                     next_input.val("");
                     break;
                 }
             }
         }
         
     }).focus(function() {
         $(this).select();
         var otp_val = $(this).prev().val();
         if (otp_val === "") {
             $(this).prev().focus(); 
         }else if($(this).next().val()){
              $(this).next().focus();  
         }
     }).keyup(function(ev) {
        otpCodeTemp = "";
         $input.each(function(i) {
             if ($(this).val().length != 0) {
                 $(this).addClass('otp-filled-active');
             } else {
                 $(this).removeClass('otp-filled-active');
             }
             otpCodeTemp += $(this).val();
         });
         if ($(this).val().length == 1 && ev.keyCode != 37 && ev.keyCode != 39) {
             $(this).next().focus();
             ev.preventDefault(); 
         }
         $input.each(function(i) {
          if($(this).val() != ''){
              console.log(otpCodeTemp);
             $submit.prop('disabled', false); 
          }else{
             $submit.prop('disabled', true);
           }
         });
          
     });
     $input.on("paste", function(e) { 
         window.handlePasteOTP(e);
     });
     });
  })
  
  window.onload = function () {
      $("#onfocu").focus();
  };
  
   function otpdefaultfocus() {
      $('.onfocus').focus();
    } 
    $('#onfocus').focus();
  
  // check email and username is valid or not 
  function saveUserName(element){
      let loader = $(element).find('.loader');
      loader.removeClass('d-none');
      let url = $('.saveUserNameUrl').val();
      let email = $('#email').val();
  
      $('.error-email').text('');
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if (!regex.test(email)) {
          $('.error-email').text('Please enter a valid email address.');
          loader.addClass('d-none');
          return false;
      }
  

      $('.passwordError').text('')
      //   if(isValid === false){
      // $('.validPhoneNum').text('please enter valid phone number');
      //      return;
      //   }
      
        let password = $('#password').val();
        let confirm_password = $('#password-confirm').val()
        if(password != confirm_password ){
            loader.addClass('d-none');
          $('#popover-cpassword').removeClass('d-none');
          return false;
        }
        else{
          $('#popover-cpassword').addClass('d-none');
        }
          
      if(password.length < 8 ){
        loader.addClass('d-none');
          $('.passwordError').text('Passwords must be at least 8 characters long.');
          return false;
      }


      $.ajax({
          url: url,
          method: "post",
          data: new FormData(element),
          dataType: 'JSON',
          contentType: false,
          cache: false,
          processData: false,
          success: function (response) {
              $('.error-username').text('');
              $('.error-email').text('');
         if(response.userName === true || response.email === true ){
          if(response.userName === true){
              $('.error-username').text('Username is already taken.');
              loader.addClass('d-none');
                 }
              if ( response.email === true){
           $('.error-email').text('Email address already exists in the system.');
           loader.addClass('d-none');
                 }
         }
              else {
                  $('.step-1').addClass('d-none');
                  $('.step-2').removeClass('d-none');
                  $('.step-1-btn').removeClass('bg-btn');
                  $('.step-2-btn').addClass('bg-btn');
                  $('.auth-pagination').css('position','initial');
                  $('.register_cont').removeClass('full_logo2');
              }
              loader.addClass('d-none');
             
           
          },
          error: function (err) {
              console.log(err);
              loader.addClass('d-none');
            //   alert('Something went wrong please try again');
          }
      });
  
  }
  
  function verifyOtp(element){
   

    var user_number = $('#phone_number').val();
    var phone_number_code = $('#number_code').val();
   
    var phone_number1= phone_number_code + user_number;



    var str_pos = phone_number1.indexOf("+");
    if (str_pos > -1) {
       
        var phone_number = phone_number1;
    } else {

        // var str=phone_number;
        // alert(number + ":" + text);
        var phone_number= "+" + phone_number1;
        console.log(phone_number);
        // let text2 = "+";
        // let phone_number=text2.concat(phone_number, "");
    }
    $('.fullphone_numberForOtp').val(phone_number);
    let url = $('.verifyOtpUrl').val();
   
    

    $('.otpMessage').text('');
let verification_code = $('#verification_code').val();
verification_code = $.trim(verification_code);

if(verification_code.length != 6 ){
    $('.otpMessage').removeClass('text-success');
    $('.otpMessage').addClass('text-danger');
    $('.otpMessage').text('Please enter valid otp');
    return;
}
$('.otpLoader').removeClass('d-none');
    $.ajax({
        url: url,
        method: "post",
        data: new FormData(element),
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            
            if(response.message === 'valid'){
            $('.step-4').addClass('d-none');
            $('.step-5').removeClass('d-none');
            $('.register_cont').removeClass('full_logo2');
            $('.step-4-btn').removeClass('bg-btn');
            $('.step-5-btn').addClass('bg-btn');
            $('.register_cont').addClass('full_logo2');

            }
            else{
                $('.otpMessage').removeClass('text-success');
                $('.otpMessage').addClass('text-danger');
                $('.otpMessage').text('Please enter valid OTP');
                $('.step-4').addClass('d-none');
                $('.step-8').removeClass('d-none');
                $('.register_cont').removeClass('full_logo2');
            }
            $('.otpLoader').addClass('d-none');
           
         
        },
        error: function (err) {
            console.log(err);
            $('.step-4').addClass('d-none');
            $('.step-8').removeClass('d-none');
            $('.otpLoader').addClass('d-none');
            // alert('Something went wrong please try again');
        }
    });
}

  // verify phone_number otp 
  
  function verifyAlldetails(element){
  
      let phone_number = $('#phone_number').val();  
      $('.phone_numberForOtp').val(phone_number);

      var wpphone_number = $('#wp_number').val();
      $('.wpphone_number').val(wpphone_number);

      let url = $('.buisnessdetailurl').val();
      let dashbord = $('.dashboardUrl').val();
  
      let first_name = $('#first_name').val()
      let last_name = $('#last_name').val()
      let middle_name = $('#middle_name').val()
      let password = $('#password').val()
      let email = $('#email').val();
      let user_name = $('#user_name').val();
      let birth_date=$('#birth_date').val();
      let nationality=$('#nationality').val();

      let country_code = $('#country_code').val();
      
  
  
      $('#first_name_save').val(first_name);
      $('#last_name_save').val(last_name);
      $('#middle_name_save').val(middle_name);
      $('#password_save').val(password);
      $('#email_save').val(email);
      $('#user_name_save').val(user_name);
      $('.countryCodesave').val(country_code);
      $('.birth_date').val(birth_date);
      $('.nationality').val(nationality);

      $('.otpMessage').text('');
//   let verification_code = $('.verification_code').val();
//   verification_code = $.trim(verification_code);
  
  console.log(element);
  $('.finalloader').removeClass('d-none');
      $.ajax({
          url: url,
          method: "post",
          data: new FormData(element),
          dataType: 'JSON',
          contentType: false,
          cache: false,
          processData: false,
          success: function (response) {
              
              if(response.message === 'valid'){
              $('.step-6').addClass('d-none');
              $('.step-7').removeClass('d-none');
            //   $('.auth_headerimg').addClass('d-none');
            //   $('.successfulpage_img').removeClass('d-none');
              $('.createaccdiv').addClass('d-none');
            //   $('.mobilestepdiv').css('height','100vh');

                $('.register_cont').addClass('full_logo2');
  
              }
              else{
                $('.register_cont').removeClass('full_logo2');
                  $('.otpMessage').removeClass('text-success');
                  $('.otpMessage').addClass('text-danger');
                  $('.otpMessage').text('Please enter valid OTP');
      
              }
              $('.finalloader').addClass('d-none');
             
           
          },
          error: function (err) {
              console.log(err);
            //   console.log(err);
              $('.otpLoader').addClass('d-none');
              alert('Something went wrong please try again');
          }
      });
  }
  
  // get the data from the user , send otp and send otp to user mobile number  
  
  function  registerUser(element){
  
     let number = $('#user_number').val();
     let country_code = $('#number_code').val();
     
    $('#phone_number').val(number);
    $('.phone_number_code').val(country_code);


     number = $.trim(number);
     country_code = $.trim(country_code);
     var str_pos = country_code.indexOf("+");
     if (str_pos > -1) {       
         var fullnumber = country_code + "-" + number;
     } else {
         var fullnumber= "+"  + country_code + "-" + number;
        //  console.log(fullnumber);
     }
    //  fullnumber = "+" + country_code + "-" + number;
     $('.fullphonenumber').val(fullnumber);

    let wpnumber = $('#wp_user_number').val();
    let wpcountry_code = $('#wp_number_code').val();
    
   $('#wp_number').val(wpnumber);
   $('.wpphone_number_code').val(wpcountry_code);

    wpnumber = $.trim(wpnumber);
    wpcountry_code = $.trim(wpcountry_code);
    var str_pos1 = wpcountry_code.indexOf("+");
     if (str_pos1 > -1) {       
         var fullwpnumber = wpcountry_code + "-" + wpnumber;
     } else {
         var fullwpnumber= "+"  + wpcountry_code + "-" + wpnumber;
         console.log(fullwpnumber);
     }
    // fullwpnumber = wpcountry_code + wpnumber;
    $('.fullwpphonenumber').val(fullwpnumber);
  //   let isValid =  /^(?:\+971|00971|0)?(?:50|51|52|55|56|2|3|4|6|7|9)\d{7}$/.test(number);
  
 
      $('.registerLoader').removeClass('d-none');
 
    //   let hashNumber = number.replace(/.(?=.{4})/g, 'x');
    //   $('.hashPhone_number').text(hashNumber);
      let url = $('.registerUserurl').val();
      console.log(element)
      $.ajax({
          url: url,
          method: "post",
          data: new FormData(element),
          dataType: 'JSON',
          contentType: false,
          cache: false,
          processData: false,
          success: function (response) {
            console.log(response);
              $('.validPhoneNum').text('');
              if(response.message == 'phoneExist'){
                  $('.validPhoneNum').text('Phone number already exists in the system.');
              }
              if(response.message == 'wpphoneExist'){
                $('.validwpPhoneNum').text('Phone number already exists in the system.');
            }
              else if (response.message == '60200'){
                  $('.validPhoneNum').text('Please enter a valid phone number.');
              }
              else if (response.message == '60203'){
                  $('.validPhoneNum').text('Max send attempts reached .');
              }
  
             else if (response.message == "okay"){
                  $('.validPhoneNum').text('');
              $('.step-3').addClass('d-none');
              $('.step-4').removeClass('d-none');
              $('.onfocus').focus();
              $('.step-3-btn').removeClass('bg-btn');
              $('.step-4-btn').addClass('bg-btn');
              $('.auth-pagination').removeAttr('style');
              $('.register_cont').removeClass('full_logo2');
              }
              else{
                //   alert('Something went wrong please try again');
                  return;
              }
              $('.registerLoader').addClass('d-none');
  
              document.getElementById('timer').innerHTML = 03 + ":" + 00;
              startTimer();  
          },
          error: function (err) {
              console.log(err);
              $('.registerLoader').addClass('d-none');
          }
      });
  }
  


 // get the personal info
  
 function  personalInfo(element){
  
    //  $('#userRegisterForm').find('.email').val(email);
     let url = $('.personalinfourl').val();
     console.log(element)
     $.ajax({
         url: url,
         method: "post",
         data: new FormData(element),
         dataType: 'JSON',
         contentType: false,
         cache: false,
         processData: false,
         success: function (response) {
           
 
           if (response.message == "okay"){
                 $('.validPhoneNum').text('');
             $('.step-2').addClass('d-none');
             $('.step-3').removeClass('d-none');
             $('.step-2-btn').removeClass('bg-btn');
             $('.step-3-btn').addClass('bg-btn');
             $('.auth-pagination').removeAttr('style');
             $('.register_cont').removeClass('full_logo2');
             }
             else{
                 alert('Something went wrong please try again');
                 return;
             }
             $('.registerLoader').addClass('d-none');
 
           
         },
         error: function (err) {
             console.log(err);
             $('.registerLoader').addClass('d-none');
         }
     });
 }
 

  function startTimer() {    
      var presentTime = document.getElementById('timer').innerHTML;
      var timeArray = presentTime.split(/[:]+/);
      var m = timeArray[0];
      var s = checkSecond((timeArray[1] - 1));
      if(s==59){m=m-1}
      if(m<0){
          $('#resendOtp').removeClass('pe-none');
          $('#resendOtp').addClass('c-pointer');
          $('#resendOtp').text('Resend Now');
      }
      
      document.getElementById('timer').innerHTML = m + ":" + s;
      setTimeout(startTimer, 1000);
      
    }
    function checkSecond(sec) {
      if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
      if (sec < 0) {sec = "59"};
      return sec;
    }
  
  function resendOtp(){
  
     
      $('#resendOtp').html('Resending in  <span id="timer"></span>');
      $('#resendOtp').addClass('pe-none');
      $('#resendOtp').removeClass('c-pointer');
  
      document.getElementById('timer').innerHTML = 03 + ":" + 00;
      startTimer();  
  
      let CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

      var user_number = $('#phone_number').val();
      var phone_number_code = $('#number_code').val();
     
      var phone_number1= phone_number_code + user_number;
  
  
  
      var str_pos = phone_number1.indexOf("+");
      if (str_pos > -1) {
         
          var phone_number = phone_number1;
      } else {
  
          // var str=phone_number;
          // alert(number + ":" + text);
          var phone_number= "+" + phone_number1;
  console.log(phone_number);
          // let text2 = "+";
          // let phone_number=text2.concat(phone_number, "");
      }
   

    // let phone_number = $('#phone_number').val();
    let url = $('#resendOtpurl').val();
    $('.otpMessage').text('');
      $.ajax({
          url:url,
          method:'POST',
          data:{_token:CSRF_TOKEN ,phone_number:phone_number},
          success:function(response){
  if(response == "success"){
    $('.otpMessage').addClass('text-success');
    $('.otpMessage').removeClass('text-danger');
    $('.otpMessage').text('OTP sent successfully');
  }
  else{
      alert('Something went wrong Please try again.');
  }
          },
          error:function(error){
  alert('Something went wrong Please try again.');
          }
      })
  
  }
  
  
  function handlePasteOTP(e) {
      var clipboardData = e.clipboardData || window.clipboardData ||     e.originalEvent.clipboardData;
      var pastedData = clipboardData.getData('Text');
      var arrayOfText = pastedData.toString().split('');
      /* for number only */
      if (isNaN(parseInt(pastedData, 10))) {
          e.preventDefault();
          return;
      }
      for (var i = 0; i < arrayOfText.length; i++) { 
          if (i >= 0) {
              document.getElementById('otp-number-input-' + (i + 1)).value = arrayOfText[i];
          } else {
              return;
          }
      }
      e.preventDefault();
  }
  
   // check Password strength
      function checkStrength(password) {
          let strength = 0;
          //If password contains both lower and uppercase characters
          if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
              strength += 1;
         
          } 
          //If it has numbers and characters
          if (password.match(/([0-9])/)) {
              strength += 1;
          
          } 
          //If it has one special character
          if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
              strength += 1;
         
          } 
          //If password is greater than 7
          if (password.length > 7) {
              strength += 1;
            
          } 
      
         
          // If value is less than 2
          if (strength < 2) {
              $('#result').removeClass();
              $('#password-strength').removeClass('progress-bar-warning');
              $('#password-strength').removeClass('progress-bar-success');
              $('#password-strength').addClass('progress-bar-danger');
              $('#result').addClass('text-danger').text('Weak');
              $('#password-strength').css('width','20%') ;
          }
  
          
          else if (strength == 2 || strength == 3 ) {
              $('#result').removeClass();
              $('#password-strength').removeClass('progress-bar-success');
              $('#password-strength').removeClass('progress-bar-danger');
              $('#password-strength').addClass('progress-bar-warning');
              $('#result').addClass('text-warningC').text('Normal')
              $('#password-strength').css('width','60%');
          } else if (strength == 4) {
              $('#result').removeClass();
              $('#password-strength').removeClass('progress-bar-warning');
              $('#password-strength').removeClass('progress-bar-danger');
              $('#password-strength').addClass('progress-bar-success');
              $('#password-strength').css('width','100%') ;
              $('#result').addClass('text-success').text('Strong');
          }
      }
  
  
  // check entry passwod
  
  function  verifyEntryPass(element){
      let loader = $(element).find('.loader');
      $('.entryPassError').text('');
      
      let signupUrl = $('.signupUrl').val();
      let url = $('.entryPassurl').val();
      let entry_pass =$('.entrypassword').val();
      let CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
     
      if(entry_pass == ''){
     $('.entryPassError').text('This field is required');
     return;
      }
      loader.removeClass('d-none');
  $.ajax({
      url: url,
      method: 'POST', 
      data: {_token : CSRF_TOKEN, entry_password:entry_pass},
      success:function (response){
           if (response === 'success'){
              $('.step-0').addClass('d-none');
            //   $('.step-1').addClass('d-none');
              $('.step-1').removeClass('d-none');
              $('.step-1-btn').removeClass('bg-btn');
              $('.step-2-btn').addClass('bg-btn');
              $('.register_cont').removeClass('full_logo2');

              var pageWidth = $(window).width(); 
      
              if( pageWidth< 992){
                  if($('.step-1').hasClass('d-none')){
                      console.log('1');
                      $('.mobileauth_img').removeClass('d-none');
                      $('.deskauth_img').addClass('d-none');
                      $('.mobileView').addClass('d-none');
                  }else{
                      console.log('2');
                      $('.deskauth_img').removeClass('d-none');
                      $('.mobileView').removeClass('d-none');
                      $('.mobileauth_img').addClass('d-none');
                  }
              }
              
          }
          else if (response == '0') {
              $('.entryPassError').text('Please enter valid entry password');
          }
          loader.addClass('d-none');
      },
      error:function(error){
        console.log(error);
          loader.addClass('d-none');
     alert('Something went wrong Please try again.');
  
      }
  })   
  };
  
  function goTostep2(element){
    $('.step-3').addClass('d-none');
    $('.step-4').addClass('d-none');
    $('.step-8').addClass('d-none');
    $('.step-2').removeClass('d-none');
    $('.register_cont').removeClass('full_logo2');
  }
function goTostep3(element){
    $('.step-4').addClass('d-none');
    $('.step-3').removeClass('d-none');
    $('.register_cont').removeClass('full_logo2');
  }
  function goTostep4(element){
    $('.step-5').addClass('d-none');
    $('.step-4').removeClass('d-none');
    $('.register_cont').removeClass('full_logo2');
  }
  function goTostep5(element){
    $('.step-6').addClass('d-none');
    $('.step-5').removeClass('d-none');
    $('.register_cont').addClass('full_logo2');
  }
  function goTostep6(element){
    $('.step-5').addClass('d-none');
    $('.step-6').removeClass('d-none');
    $('.register_cont').removeClass('full_logo2');
  }