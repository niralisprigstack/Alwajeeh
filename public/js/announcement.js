$(document).ready(function() {
        $('form .btnpublish').click(function() {
            $('form .statuscheck').val(2);
        });

        $('form .btndraft').click(function() {
            $('form .statuscheck').val(1);
        });

        $('form .btndelete').click(function() {
            $('form .statuscheck').val(3);
        });


        
});

function createannouncement() {

    $('.loading').removeClass('d-none');

    var annoucementstatus=$(".statuscheck").val();
    $(".statuscheck").val(annoucementstatus);

    // var checkimages=$('.addedimageArr').val();
    // $('.s_decriptionError').text();
    // let body = $('#marketPlaceBody').summernote('code')
    // body = body.replace('"', "'");
    // body = '<!DOCTYPE html><html><head></head><body>' + body + '</body></html>';
    // $('.marketPlacehtml').val(body);
  
    // let description = $('.short_description').val();
    // let value = description.length;
    // if (description.length > 40) {
    //   $('.s_decriptionError').text('Text is too long.')
  
    //   var $container = $("html,body");
    //   var $scrollTo = $('.productTitleDiv');
    //   $container.animate({ scrollTop: $scrollTo.offset().top - $container.offset().top + $container.scrollTop(), scrollLeft: 50 }, 300);
    //   $('.short_description').focus();
    //   return false;
    // }

  
  
    
  }


  function checkedAnnouncement(element){   
    // let parent = findParent(this);
    let entity_id = $(element).data('id');
    var CSRF_TOKEN = $('.csrf-token').val();
    let url= $('.checkedAnnouncement').val();
    // let entity_id=$(element).val();
    $.ajax({
        url: url,
        type: "post",
        data: {_token: CSRF_TOKEN, entity_id: entity_id},
        success: function (response) {
           console.log(response);
           window.location.href="../announcementDetail/"+ entity_id;
            // location.reload();
        },error: function (err) {
            console.log(err);
        }
    });
  }
  
function showMediaSlider(element){
    var checkMediaShow = $(element).attr("data-show");
    $('.detailScrollableDiv').scrollTop(0);
    $(".mediaSpan").removeClass("d-none");
    $(".descriptionSec").addClass("d-none");
    $(".announcementMediaDiv").addClass("d-none");
    if(checkMediaShow === "photos"){
        $(".photoSec").css("color" , "#A4894B");
        $(".videoSec").css("color" , "#B7B7B7");
        $(".imageSliderDiv").removeClass("d-none");
        $(".videoSliderDiv").addClass("d-none");
    } else {
        $(".photoSec").css("color" , "#B7B7B7");
        $(".videoSec").css("color" , "#A4894B");
        $(".imageSliderDiv").addClass("d-none");
        $(".videoSliderDiv").removeClass("d-none");
    }
}