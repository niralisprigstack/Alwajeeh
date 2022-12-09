$(function (){

      

    var detailheight = window.innerHeight;
    var headerimgh=$('.profile_headerimg').height();
    console.log(detailheight);
    console.log(headerimgh);
    var totalheight=detailheight-headerimgh-20;
    console.log(totalheight);
    $('.detailwholesection').css("height",totalheight+"px");
    $('.detailwholesection').css("top",headerimgh+"px")
    //   $('#user_profile').change(function(){
    //     const file = this.files[0];
    //     console.log(file);
    //     if (file){
    //       let reader = new FileReader();
    //       reader.onload = function(event){
    //         console.log(event.target.result);
    //         $('.showpreview').attr('src', event.target.result);
    //       }
    //       reader.readAsDataURL(file);
    //     }
    //   });
});

// function checkProfileimgsize(element){
//     var file = $(element)[0].files[0];
//     image.onload = function() {
//             if(this.width< 200 && this.height < 275){

//             }else{
//                 alert("Maximum image dimension allowed is : 200x200 pixels.");
//             }

// }
$("#user_profile").change(function() {
    filename = this.files[0].name;
    console.log(filename);
  });

$('.savepersonaldet').on('click', function (){
    $('.personaldetloader').removeClass('d-none');
});

$('.savecontact').on('click', function (){
    $('.savecontactloader').removeClass('d-none');
});
$('.saveprofbtn').on('click', function (){
    $('.profbtnLoader').removeClass('d-none');
});
$('.profile-click').on('click', function (){
    $('.edit-profile-div').removeClass('d-none');
    $('.profile-div').addClass('d-none');
    $('.personaldet').addClass('d-none');
    $('.contactdet').addClass('d-none');
    $('.profdet').addClass('d-none');
    $('.edit-div').removeClass('d-none');
});
$('.discardbtn').on('click', function (){
    // $('.edit-profile-div').removeClass('d-none');
    $('.edit-profile-div').addClass('d-none');
    $('.editpersonaldet').addClass('d-none');
    $('.editcontactset').addClass('d-none');
    $('.editprofdet').addClass('d-none');
    $('.edit-div').addClass('d-none');

    $('.profile-div').removeClass('d-none');
    $('.personaldet').removeClass('d-none');
    $('.contactdet').removeClass('d-none');
    $('.profdet').removeClass('d-none');
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();       
        reader.onload = function (e) {
           
            $('.profildef').addClass('d-none');
            $('.setprofiledef').removeClass('d-none');
            $('.showpreview').removeClass('d-none');
            // $('.setprofiledef').addClass('showpreview');
            // $(".removesel-img").click(function(){
            //     $(this).parent(".pip").remove();
            //   });
            $('.showpreview').attr('src', e.target.result);
        }       
        reader.readAsDataURL(input.files[0]);
    }
}
function checkUniqueUsernameEmail(element) {
    $('.checkloader').removeClass("d-none");
    
    // setTimeout(function () {
        
    // }, 1);
    var url = $('.checkuniquename').val();
    var email = $('#email').val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
    var user_name = $('.checkusername').val();
    var user_number=$('#user_number').val();
    var wp_user_number=$('#wp_user_number').val();
    var phone_number_code=$('#number_code').val();
    var wpphone_number_code=$('#wp_number_code').val();
    var id=$(".userid").val();
    var validatedata = true;
    
     $.ajax({
        url: url,
        type: "POST",
        dataType: 'JSON',
        async:false,
        data: {_token: CSRF_TOKEN,email:email,id:id,user_number:user_number,wp_user_number:wp_user_number,phone_number_code:phone_number_code,wpphone_number_code:wpphone_number_code},
        success: function (response) {
            $('.error-username').text('');
            $('.error-email').text('');
            if (response.phonexist === true || response.email === true || response.wpphonexist==true) {
                if (response.phonexist === true) {
                    $('.validPhoneNum').text('Phone number already exists in the system.'); 
                    validatedata = false;  
                }
                if (response.email === true) {
                    $('.error-email').text('Email address already exists in the system.');
                    validatedata = false;    
                }
                if (response.wpphonexist === true) {
                    $('.validwpPhoneNum').text('Whatsapp Phone number already exists in the system.'); 
                    validatedata = false;  
                }
            }
        }, error: function (err) {
            console.log(err);            
            validatedata = false;
        }
    }).then(
        function fulfillHandler(data) {
            if(!validatedata){
                $('.checkloader').addClass("d-none");
            }            
          return validatedata;
        },
        function rejectHandler(jqXHR, textStatus, errorThrown) {
            if(!validatedata){
                $('.checkloader').addClass("d-none");
            }
            return validatedata;
        }
      ).catch(function errorHandler(error) {
        if(!validatedata){
            $('.checkloader').addClass("d-none");
        }
        return validatedata;
      });
      return validatedata;


}

function editpersonalDetail() {
    if ($('.editpersonaldet').hasClass('d-none')) {
        $('.editpersonaldet').removeClass('d-none');
        $('.profile-div').addClass('d-none');
        $('.personaldet').addClass('d-none');
        $('.contactdet').addClass('d-none');
        $('.profdet').addClass('d-none');
        $('.edit-div').removeClass('d-none');
    } else {
        $(".personaldet ").removeClass("d-none");
        $('.editpersonaldet').addClass('d-none');
    }
}





function editcontactDetail(){
    if ($('.editcontactset').hasClass('d-none')) {
        $('.editcontactset').removeClass('d-none');
        $('.profile-div').addClass('d-none');
    $('.personaldet').addClass('d-none');
    $('.contactdet').addClass('d-none');
    $('.profdet').addClass('d-none');
    $('.edit-div').removeClass('d-none');
    } else {
        $(".selectedManager ").removeClass("d-none");
        $('.contactdet').addClass('d-none');
    }
}
function editprofDetail() {
    if ($('.editprofdet').hasClass('d-none')) {
        $('.editprofdet').removeClass('d-none');
        $('.profile-div').addClass('d-none');
    $('.personaldet').addClass('d-none');
    $('.contactdet').addClass('d-none');
    $('.profdet').addClass('d-none');
    $('.edit-div').removeClass('d-none');
    } else {
        $(".profdet ").removeClass("d-none");
        $('.editprofdet').addClass('d-none');
    }
}

$('.editpicClick').click(function () {
    $('.updatepropic').removeClass("d-none");
});









     

