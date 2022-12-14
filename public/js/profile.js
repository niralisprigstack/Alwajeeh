$(document).ready(function() {
    
    // var detailheight = window.innerHeight;
    // var headerimgh=$('.profile_headerimg').height();
    // console.log(detailheight);
    // console.log(headerimgh);
    // var halfheaderimg=headerimgh/2;
    // var profilepaddtop=halfheaderimg+35;
    // var totalheight=detailheight-headerimgh-30;
    // console.log(totalheight);
    // $('.detailwholesection').css("height",totalheight+"px");
    // $('.detailwholesection').css("top",headerimgh+"px");
    // $('.profile-section').css("padding-top",profilepaddtop+"px");

});
$(function (){
    $('#user_profile').on('change', function() {
        if (this.files.length > 0) {
            for (let i = 0; i <= this.files.length - 1; i++) {
                let fsize = this.files.item(i).size;
                let file = Math.round((fsize / 1024));
                if (file >= 5000) {
                    alert(
                        "File too Big, please select a file less than 5mb");
                    $('#user_profile').val('');
                    $(".showpreview").attr("src","");
                    // $("img").src("");
                }

            }
        }

        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'png':
            case 'jpeg':
            case 'svg':
            case 'gif':
            case 'jpg':
            
                break;
                this.value = '';
                $(".showpreview").attr("src","");
            default:
                this.value = '';
                $(".showpreview").attr("src","");
                alert('Not suitable file for upload');

                return;

                break;
        }

    });
   

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
    $('.savecontactLoader').removeClass('d-none');
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
    $(".detailwholesection").css("z-index","0");
    $(".detailwholesection").addClass("d-none");
    $('.detailwholesection').removeClass('h-60');
    $('.profilewholesec').addClass('h-45');
    $('.profilewholesec').addClass('topSet');

    $('.profilewholesec').addClass('pb-5');

    // var detailheight = window.innerHeight;
    // var headerimgh=$('.profile_headerimg').height();
    // var totalheight=detailheight-headerimgh-30;
    // console.log(totalheight);
    // $('.edit-profile-div').css("height",totalheight+"px");

    // var headerimgheighht=$('.profile_headerimg').height();
    // var editsectiontop=headerimgheighht-120;
    // $('.edit-profile-div').css("top",editsectiontop+"px");
});
$('.discardbtn').on('click', function (){
    // $('.edit-profile-div').removeClass('d-none');
    $('.edit-profile-div').addClass('d-none');
    $('.editpersonaldet').addClass('d-none');
    $('.editcontactset').addClass('d-none');
    $('.editprofdet').addClass('d-none');
    $('.edit-div').addClass('d-none');
    $(".detailwholesection").css("z-index","1");
   

    
    // var headerimgh=$('.profile_headerimg').height();
    $('.detailwholesection').removeClass('h-45');
    $('.detailwholesection').addClass('h-60');
    $('.profilewholesec').removeClass('h-60');
    $('.detailwholesection').removeClass('topSet');
    $('.profilewholesec').removeClass('topSet');

    $('.detailwholesection').removeClass('pb-5');
    $('.profilewholesec').removeClass('pb-5');
 

    $('.profile-div').removeClass('d-none');
    $('.personaldet').removeClass('d-none');
    $('.contactdet').removeClass('d-none');
    $('.profdet').removeClass('d-none');
    $(".detailwholesection").removeClass("d-none");
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
            $(".Setprofile img").removeClass("d-none");
            $('.showpreview').attr('src', e.target.result);
        }       
        reader.readAsDataURL(input.files[0]);
    }
}


function removeProfile(element){
    var url = $('.removeSelectedphoto').val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
    var getImg=$("#user_profile").val(); 
   
    if(getImg==""){
        var getImg=$("#profile_img").attr("src");   
        $("#user_profile").val("");
        $(".profildef1").addClass("d-none");
        $(".profildef").removeClass("d-none");
    }
    $.ajax({
        url: url,
        type: "POST",
        data: {_token: CSRF_TOKEN,getImg:getImg},
        success: function (response) {
                $(".Setprofile img").addClass("d-none");
                $("#user_profile").val("");
                $(".profildef1").addClass("d-none");
                $(".profildef").removeClass("d-none");
                $(".img-profile-card").addClass("d-none");
                $(".profile-card").removeClass("d-none");
            
        }, error: function (err) {
            console.log(err);            
            
        }
    });
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
        $(".detailwholesection").css("z-index","0");

        $('.detailwholesection').removeClass('h-60');
        $('.detailwholesection').addClass('h-45');
        $('.detailwholesection').addClass('topSet');


        $('.detailwholesection').addClass('pb-5');
        // var headerimgheighht=$('.profile_headerimg').height();
        // var editsectiontop=headerimgheighht-110;
        // $('.detailwholesection').css("top",editsectiontop+"px");
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
    $(".detailwholesection").css("z-index","0");

    $('.detailwholesection').removeClass('h-60');
    $('.detailwholesection').addClass('h-45');
    $('.detailwholesection').addClass('topSet');

    $('.detailwholesection').addClass('pb-5');

    // var headerimgheighht=$('.profile_headerimg').height();
    //     var editsectiontop=headerimgheighht-110;
    //     $('.detailwholesection').css("top",editsectiontop+"px");
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
    $(".detailwholesection").css("z-index","0");

    $('.detailwholesection').removeClass('h-60');
    $('.detailwholesection').addClass('h-45');
    $('.detailwholesection').addClass('topSet');

    $('.detailwholesection').addClass('pb-5');
    // var headerimgheighht=$('.profile_headerimg').height();
    //     var editsectiontop=headerimgheighht-110;
    //     $('.detailwholesection').css("top",editsectiontop+"px");
    } else {
        $(".profdet ").removeClass("d-none");
        $('.editprofdet').addClass('d-none');
    }
}

$('.editpicClick').click(function () {
    $('.updatepropic').removeClass("d-none");
});