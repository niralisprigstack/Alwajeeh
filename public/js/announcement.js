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


        //map location call
        google.maps.event.addDomListener(window, 'load', initialize);
  
        function initialize() {
            var input = document.getElementById('locationsearch');
            var autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function () {
                var selectedLocation=$('.Locationinput').val();
                $('.ifAddedloaction').text(selectedLocation); 
                $('.post_location').val(selectedLocation);      
                var place = autocomplete.getPlace();
            
            });
        }  
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