var productImageArr = [];
var productImageCount = 1;
$(document).ready(function () {
    $('form .btnpublish').click(function () {
        $('form .statuscheck').val(2);
    });

    $('form .btndraft').click(function () {
        $('form .statuscheck').val(1);
    });

    $('form .btndelete').click(function () {
        $('form .statuscheck').val(3);
    });
    $('form .btnmembersubmit').click(function () {
        $('form .statuscheck').val(4);
    });

    $('.closeviewersBtn').click(function () {
        closeViewers(this);
    });    
    


    //approve reject dropdown
    $(".approverejecticondiv").on('click', function (e){
        e.stopImmediatePropagation();
        stopPropo(this);
    });
    $('html').click(function() {
        $('.approveRejectDropdown').css('display','none');
        //  Hide the dropdown
    });
    $('.approveRejectDropdown').click(function(event){
        event.stopPropagation(); // prevents executing the above event
    });
    $('.approverejecticondiv ').click(function(event){
        event.stopPropagation();
        });
    $('.acceptOrRejectAnnouncement').on('click', function (e){
        e.stopImmediatePropagation();
        publishUnPublishAnnouncement(this);
      });
    //   end approve reject dropdown


    //height set for scrollable div in business detail & listing page
    var detailheight = window.innerHeight;
    var totalheight = detailheight - 126 - 190 - 135 - 38;    
    
    if ($(".detailScrollableFamilyDiv").length > 0) {        
        totalheight = totalheight - 81 +30;
    }
    
    $(".detailScrollableDiv").css("max-height", totalheight + "px");
    $(".detailScrollableDiv").css("overflow-y", "scroll");
    $(".detailScrollableDiv").css("overflow-x", "hidden");

    // height set for scrollable div in family detail
//    var totalheight = detailheight - 126 - 190 - 120 - 81;
//    $(".detailScrollableFamilyDiv").css("max-height", totalheight + "px");
//    $(".detailScrollableFamilyDiv").css("overflow-y", "scroll");
//    $(".detailScrollableFamilyDiv").css("overflow-x", "hidden");

    //full section max-height set in listing page - all sections except advanced filter
    var fullCardMaxHeight = detailheight - 216 - 120;
    if ($(".resetFilterDiv").length > 0) {
        fullCardMaxHeight = fullCardMaxHeight - 50;
    }
    $(".listDiv").css("max-height", fullCardMaxHeight + "px");
    $(".listDiv").css("overflow-y", "scroll");
    $(".listDiv").css("overflow-x", "hidden");
    
    //full section min-height set in business detail, family detail & listing page - advanced filter  
    var fullCardMinHeight = detailheight - 216 - 115;
    $(".fullSectionHeight").css("min-height", fullCardMinHeight + "px");    





    $(".upload_marketplace_image").on('click', function () {
        $('.marketplace_image_input').attr('accept', 'image/png, image/gif, image/jpeg, image/svg, image/jpg');
        $('.marketplace_image_input').first().trigger('click');
        $('.marketplace_image_input').attr('data-type', '1');
    });
    $(".upload_marketplace_video").on('click', function () {
        $('.marketplace_image_input').attr('accept', 'video/mp4 ,video/mpeg2 ,video/mpeg ,video/mpeg4');
        $('.marketplace_image_input').first().trigger('click');
        $('.marketplace_image_input').attr('data-type', '2');
    });



    // var status = $('#status');


//     $('#createAnnouncementForm').ajaxForm({
//         // xhr: function () {
//         //         var xhr = new window.XMLHttpRequest();
//         //         xhr.upload.addEventListener("progress",
//         //             uploadProgressHandler,
//         //             false
//         //         );

//         //         return xhr;
//         //     },

//             contentType: false,
//             cache: false,
//             processData: false,
//       beforeSend: function() {
//           console.log('before');        
//             // status.empty();
           
//             var annoucementstatus = $(".statuscheck").val();
//             $(".statuscheck").val(annoucementstatus);
        
//         if(annoucementstatus=="3"){
//             var confirmDelete = confirm("Are you sure you want to delete this announcement?");
//             if (!confirmDelete) {
//               $('.loading').addClass('d-none');
//               return false;
//             } else {
//               $('.loading').removeClass('d-none');
//             }
//         }else{
//             $('.loading').removeClass('d-none');
//         }
           
         

                                                        
//         },     
//         success: function (response) {
          

//    // true
//     console.log('succ');
//           console.log('succ');  
//     console.log('succ');

//   console.log(response);
//   setTimeout(function () {   
//     // document.getElementById("createAnnouncementForm").submit(); 
//     window.location.href="../announcementList";
//     $('.loading').addClass('d-none');
//     }, 500);
 
//             // bar.width('0%');
//             // percent.html('0%');
           
//         //   window.livewire.emit('post-created');
          

//     $('.loading').addClass('d-none');
    

       
      
        
//         },
//         complete: function(xhr) {
          
//           // setTimeout(function() {    $('#memberStatusPopup').modal('hide');
//           //     $('.imgcontainer').addClass('d-none');
//           // $('.progressBar').addClass('d-none');
//           // $('.videocontainer').removeClass('d-none');
//           // },500);
//           // $(this).find('.spinner').addClass('d-none');
//             // status.html(xhr.responseText);
//             // alert('Uploaded Successfully');
//             // $('.loading').addClass('d-none');
//         },
//         error: function (err) {
//             console.log(err);
//           alert('Something went Wrong Please try again or reload the page.')
//           $(this).find('.spinner').addClass('d-none');
//         }

  
//     });




$(document).on("change", ".marketplace_image_input", function () {
    let attachment_type = $('.marketplace_image_input').attr("data-type");
    let file = this.files[0];


    //img
    if (attachment_type == "1") {
        var fileType = file["type"];
        var validImageTypes = ["image/gif", "image/jpeg", "image/png", "image/svg"];

        var allowedExtension = ['png', 'jpg', 'jpeg', 'svg','gif'];
        var fileExtension = $('.marketplace_image_input').val();
        let extension = fileExtension.split('.').pop().toLowerCase();
        var isValidFile = false;
        for (var index in allowedExtension) {

            if (extension === allowedExtension[index]) {
                isValidFile = true;
                break;
            }
        }
        if (!isValidFile) {
            alert('Allowed Extensions are : *.' + allowedExtension.join(', *.'));
            return;
        }

        $(".getImgFileSize").val(file.size);

        var imgFileSize = $(".getImgFileSize").val();
        if ($(".getImgFileSize").val() > 5242880) {
            //128 MB to Bytes
            alert("Image file size must be less than 5MB");
            return;
            clearInterval(auto_refresh);
        }
  
    }

   
   
    //end img
    //video 
    else if (attachment_type == "2") {
        var allowedExtension = ['mp4', 'mpeg4', 'mpeg2', 'mpeg'];
        var fileExtension = $('.marketplace_image_input').val();
        let extension = fileExtension.split('.').pop().toLowerCase();
        var isValidFile = false;
        for (var index in allowedExtension) {

            if (extension === allowedExtension[index]) {
                isValidFile = true;
                break;
            }
        }
        if (!isValidFile) {
            alert('Allowed Extensions are : *.' + allowedExtension.join(', *.'));
            return;
        }

        $(".getVidFileSize").val(file.size);

        var vidFileSize = $(".getVidFileSize").val();
        if ($(".getVidFileSize").val() > 104857600) {
            //128 MB to Bytes
            alert("Video file size must be less than 100MB");
            return;
            clearInterval(auto_refresh);
        }
    }
    //end video allowance
    else {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'pdf':
            case 'pptx':
            case 'ppt':
            case 'doc':
            case 'docx':
            case 'xls':
            case 'xlsx':
            case 'txt':
            case 'csv':
                break;
                this.value = '';
            default:
                alert('Not suitable file for upload');
                return;
                this.value = '';
                break;
        }
    }






    var imageCount = 0;
    $('.ImageDiv').each(function () {
        imageCount++;
    })
    var videoCount = 0;
    $('.vidDiv').each(function () {
        videoCount++;
    })
    var docCount = 0;
    $('.docDiv').each(function () {
        docCount++;
    })

    if (imageCount >= 5 && attachment_type == "1") {
        $(this).val('');
        alert('You can upload maximum 5 images per announcement.');
        return;
    }
    else if (videoCount >= 5 && attachment_type == "2") {
        $(this).val('');
        alert('You can upload maximum 5 videos per announcement.');
        return;
    }


    else if (docCount >= 8 && attachment_type == "3") {
        $(this).val('');
        alert('You can upload maximum 10 document per product.');
        return;
    }
    else {

    }

    if (attachment_type == "1") {
        var imageDivClone = $('.defaultImageDiv').clone();
        console.log("img");
        $(imageDivClone).find('.img1').attr('src', window.URL.createObjectURL(this.files[0]));
        $(imageDivClone).find('.vdo1').addClass('d-none');
    } else if (attachment_type == "2") {
        var imageDivClone = $('.defaultvidDiv').clone();
        console.log("vdo");
        $(imageDivClone).find('.vdo1').attr('src', window.URL.createObjectURL(this.files[0]));
        $(imageDivClone).find('.img1').addClass('d-none');
    } else if (attachment_type == "3") {
        var docFile = file.name;
        var docFilename = docFile.split('.')[0];
        var imageDivClone = $('.defaultdocDiv').clone();
        var hostname = window.location.origin;
        var extension = docFile.split('.').pop().toLowerCase();
        if (extension == "pdf") {
            $(imageDivClone).find('.doc1').attr('src', hostname + ('/assests/icons/pdf.svg'));
        }
        else if (extension == "pptx") {
            $(imageDivClone).find('.doc1').attr('src', hostname + ('/assests/icons/powerpoint.svg'));
        }
        else if (extension == "doc" || extension == "docx") {
            $(imageDivClone).find('.doc1').attr('src', hostname + ('/assests/icons/docfile.svg'));
        }
        else if (extension == "xls" || extension == "xlsx") {
            $(imageDivClone).find('.doc1').attr('src', hostname + ('/assests/icons/excel.svg'));
        }
        else if (extension == "png" || extension == "jpg" || extension == "jpeg" || extension == "gif" || extension == "svg") {
            $(imageDivClone).find('.doc1').attr('src', hostname + ('/assests/icons/image.svg'));
        }
        else {
            $(imageDivClone).find('.doc1').attr('src', hostname + ('/assests/icons/file-regular.svg'));
        }
        // $(imageDivClone).find('.doc1').attr('src', hostname+('/assests/icons/file-regular.svg'));
        $(imageDivClone).find('.docSelText').text(docFilename);
        $(imageDivClone).find('.docSelText').addClass('setdocstext');
        $(imageDivClone).find('.docSelText').removeClass('docSelText');

        // $(imageDivClone).find('.vdo1').addClass('d-none');
    } else { }


    $(imageDivClone).removeAttr('id');
    //    $(imageDivClone).find('input').attr('value',  this.files[0]);
    // let inputDiv = $(this).clone();
    productImageCount++;
    $('.marketplace_image_input').removeClass('marketplace_image_input');

    $('.inputDiv').append('<input type="file" accept="image/*"  name="marketplace_image' + productImageCount + '" class="form-control  marketplace_image_input d-none"  data-count= ' + productImageCount + '  />')
    $(imageDivClone).find('.removeMarketPlaceImage').attr('data-count', (productImageCount - 1))


    productImageArr.push((productImageCount - 1));
    $('.addedimageArr').val(productImageArr.join());
    //$(this).val('');

    if (attachment_type == "1") {
        $(imageDivClone).removeClass('defaultImageDiv d-none');
        $(imageDivClone).addClass('ImageDiv MediaSouqPreview');
        $('.parentImg').append(imageDivClone);
    } else if (attachment_type == "2") {
        $(imageDivClone).removeClass('defaultvidDiv d-none');
        $(imageDivClone).addClass('vidDiv MediaSouqPreview');
        $('.parentvid').append(imageDivClone);
    } else if (attachment_type == "3") {
        $(imageDivClone).removeClass('defaultdocDiv d-none');
        $(imageDivClone).addClass('docDiv');
        $('.parentdoc').append(imageDivClone);
    }
    else { }     
    
});



//$(".removeMarketPlaceImage").on('click', function () {
//    
//    
//  });
});

// var  image_count=0;
// function checkSelectedFile(element){    
// var fileCount = $(element)[0].files.length;
// $(".uploadMediaLabel").text(fileCount + " file(s) selected");


// $(".image_preview").empty();
// var total_file=document.getElementById("announcementmedia").files.length;
//     for(var i=0;i<total_file;i++) {
//         var featuredImage = '';
//         var hiddenClass = '';
//         var hiddenDiv = "hidden";
//         if(i === 0 && $("#image_preview").find("div").length === 0){
//             featuredImage = 'featuredImage';
//             hiddenClass = ' hidden';
//             hiddenDiv = "";
//             $(".updfeatureImageSet").val('newImg');
//         }

//         $('#image_preview').append("<div class='col-4 proImg mb-3'><div class='positioner"+hiddenClass+"'><div class='icon'><i dbid='0' data-image-number='"+image_count+"' class='fa fa-times clickable cancelclick' onclick='deleteProductImage(this);' aria-hidden='true'></i></div></div><a onclick='setFeaturedImage(this);' data-id='"+i+"'><img class='productImage "+featuredImage+"' src='"+URL.createObjectURL(event.target.files[i])+"'></a></div>");
//         image_count++;
//     }
//     if($('#image_preview').find("div").length === 0){
//         document.getElementById("filename").value = "";
//     }


// }
function saveData(element){
    event.preventDefault();
    var form = $(element);
    var actionUrl = form.attr('action');
    $('.loading').removeClass('d-none');

    var annoucementstatus = $(".statuscheck").val();
    $(".statuscheck").val(annoucementstatus);
    $.ajax({
        type: "POST",
        url: actionUrl,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            console.log(data);
           
        //     return "sucess";
        //   alert(data); // show response from the php script.

         window.location.href="../announcementList";

       
        }, error: function (err) {
            console.log(err);
        }
       
    });
    $('.loading').addClass('d-none');
            }

function createannouncement(element) {
//    event.preventDefault();
//    setTimeout(function () {
//        $('#createAnnouncementForm').unbind('submit').submit();
//        $('.loading').addClass('d-none');
//    }, 8000);
       
    // $('.loading').removeClass('d-none');

    var annoucementstatus = $(".statuscheck").val();
    $(".statuscheck").val(annoucementstatus);

if(annoucementstatus=="3"){
    var confirmDelete = confirm("Are you sure you want to delete this announcement?");
    if (!confirmDelete) {
      $('.loading').addClass('d-none');
      return false;
    } else {
      $('.loading').removeClass('d-none');
    }
}else{
    $('.loading').removeClass('d-none');
}

// $.ajax({
//         url: $(element).attr("action"),       
//         cache: false,
//         contentType: false,
//         processData: false,
//         async:true,
//         data: new FormData($('#createAnnouncementForm')[0]),
//         type: 'post',
//         enctype: 'multipart/form-data',
//         success: function (response) {
//             //console.log("SUCCESS : ", response);
//             console.log(response);
//                 window.location.href="../announcementList";
//                 $('.loading').addClass('d-none');
           
            
//         },
//         error: function (e) {
//             console.log("ERROR : ", e);
//         }
//     });
   
//  setTimeout(function () {   
//    // document.getElementById("createAnnouncementForm").submit(); 
//    window.location.href="../announcementList";
//    $('.loading').addClass('d-none');
//    }, 8000);

// event.preventDefault();
//     var form =new FormData(element);
//     var actionUrl = $(element).attr('action');
   
//     $.ajax({
//         type: "POST",
//         url: actionUrl,
//         data: form, // serializes the form's elements.
//         cache: false,
//         contentType: false,
//         processData: false,
//         success: function(data)
//         {
//             console.log(data);
           
//         //     return "sucess";
//         //   alert(data); // show response from the php script.

         
// //   setTimeout(function () {
// //     window.location.href="../announcementList";
// //     $('.loading').addClass('d-none');
// //     }, 8000);
       
//         }, error: function (err) {
//             console.log(err);
//         }
       
    // });
   

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


function checkedAnnouncement(element) {
    // let parent = findParent(this);
    let entity_id = $(element).data('id');
    var CSRF_TOKEN = $('.csrf-token').val();
    let url = $('.checkedAnnouncement').val();
    // let entity_id=$(element).val();
    $.ajax({
        url: url,
        type: "post",
        data: { _token: CSRF_TOKEN, entity_id: entity_id },
        success: function (response) {
            console.log(response);
            window.location.href = "../announcementDetail/" + entity_id;
            // location.reload();
        }, error: function (err) {
            console.log(err);
        }
    });
}


function showAnnouncementInterest(element) {
    $('.loading').removeClass('d-none');
    let entity_id = $(element).data('id');
    var CSRF_TOKEN = $('.csrf-token').val();
    let url = $('.addInterestclass').val();
    // let entity_id=$(element).val();
    $.ajax({
        url: url,
        type: "post",
        data: { _token: CSRF_TOKEN, entity_id: entity_id },
        success: function (response) {
            console.log(response);
            $(".detailpagecontainer").addClass("d-none");
            $(".announcementListMainDiv").addClass("d-none");
            $(".interest_submitteddiv").removeClass("d-none");

            $('.loading').addClass('d-none');
            //    window.location.href="../announcementDetail/"+ entity_id;
            // location.reload();
        }, error: function (err) {
            $('.loading').addClass('d-none');
            console.log(err);
        }
    });
}


function checkViewers(element) {
    $('.loading').removeClass('d-none');
    let parent = findParent(element);
    let entity_id = $(parent).data('id');
    var date = $(parent).find(".createdDate").text();
    var year = $(parent).find(".createdyr").text();
    var title = $(parent).find(".remainingText").text();
    var remainingtime = $(parent).find(".anntitle").text()
    var CSRF_TOKEN = $('.csrf-token').val();
    let url = $('.announcementViewers').val();

    // let entity_id=$(element).val();
    $.ajax({
        url: url,
        type: "post",
        data: { _token: CSRF_TOKEN, entity_id: entity_id, date: date, year: year, title: title, remainingtime: remainingtime },
        success: function (response) {
            $(".announcementlisting").addClass("d-none");
            $('.loading').addClass('d-none');
            console.log(response);
            $(element).closest('.announcement_' + entity_id).removeClass("d-none");

            //    $(".viewersDiv").removeClass("d-none");
            //    $(".announcementlisting").addClass("d-none");



            if (response != '') {
                $(element).closest('.announcement_' + entity_id).find(".userlist").removeClass("d-none");
                $(element).closest('.announcement_' + entity_id).find(".userlist").empty();
                $(element).closest('.announcement_' + entity_id).find(".userlist").append(response);
            } else {
                $(element).closest('.announcement_' + entity_id).find(".nouserlist").removeClass("d-none");

            }
            $(".closeviewerlist").removeClass("d-none");
            $(element).closest('.announcement_' + entity_id).find(".viewersbtndiv").addClass("d-none");
            $(".footerfiltersection").addClass("d-none");
            // location.reload();
        }, error: function (err) {
            $('.loading').addClass('d-none');
            console.log(err);
        }
    });
}


function closeViewers(element) {
    $(".announcementlisting").removeClass("d-none");
    $(".viewersbtndiv").removeClass("d-none");
    $(".closeviewerlist").addClass("d-none");
    $(".userlist").addClass("d-none");
    $(".nouserlist").addClass("d-none");
    $(".footerfiltersection").removeClass("d-none");
    var activesel = $(".active").data('click');
    // showFilteredresult(this);
    $('.announcementListMainDiv').each(function () {
        var selectedVal = $(this).data('user');
        if (activesel == "3") {
            if (activesel == selectedVal) {
                $(this).removeClass("d-none");
            } else {
                $(this).addClass("d-none");
            }

        }
        else if (activesel == "4") {
            if (activesel == selectedVal) {
                $(this).removeClass("d-none");
            } else {
                $(this).addClass("d-none");
            }

        } else {
            $(this).removeClass("d-none");
        }
    });
}


function showFilteredresult(element) {
    $(".activeFooterFilterImg").addClass("d-none");
    $(".footerFilterImg").removeClass("d-none");
    $(".footerfiltersortdiv").addClass("d-none");
    $(".footerfiltered").removeClass("active");
    



     //
     var data_click = $(element).data('click');
     if(data_click=="3"){
        $(".businessfamilydiv").find(".parent").find(".filtered").removeClass("active");
        $(".businessfamilydiv").find(".parent").find(".nav-img").removeClass("show");
        $(".businessfamilydiv").find(".parent").find(".nav-text").removeClass("showtext");
        $(element).addClass("active");
        $(".businessfamilydiv").find(".parent").find(".filtered").removeClass("businessClicked");
        $(element).addClass("famClicked");
        $(element).closest(".parent").find('.nav-img').addClass("show");
        $(element).closest(".parent").find('.nav-text').addClass("showtext");
     }
     else if(data_click=="4"){
        $(".businessfamilydiv").find(".parent").find(".filtered").removeClass("active");
        $(".businessfamilydiv").find(".parent").find(".nav-img").removeClass("show");
        $(".businessfamilydiv").find(".parent").find(".nav-text").removeClass("showtext");
        $(element).addClass("active");
        $(".businessfamilydiv").find(".parent").find(".filtered").removeClass("famClicked");
        $(element).addClass("businessClicked");
        $(element).closest(".parent").find('.nav-img').addClass("show");
        $(element).closest(".parent").find('.nav-text').addClass("showtext");
     }else if(data_click=="2"){
        $(".unreadalldiv").find(".parent").find(".filtered").removeClass("active");
        $(".unreadalldiv").find(".parent").find(".nav-img").removeClass("show");
        $(".unreadalldiv").find(".parent").find(".nav-text").removeClass("showtext");
        $(".unreadalldiv").find(".parent").find('.activeImg').addClass("d-none");
        $(".unreadalldiv").find(".parent").find('.nav-img').removeClass("d-none");
        $(".unreadalldiv").find(".parent").find(".filtered").removeClass("allfiltClicked");
        $(element).addClass("active");
        $(element).addClass("unreadClicked");
        $(element).closest(".parent").find('.nav-img').addClass("show");
        $(element).closest(".parent").find('.nav-text').addClass("showtext");
     }else if(data_click=="1"){
        $(".unreadalldiv").find(".parent").find(".filtered").removeClass("active");
        $(".unreadalldiv").find(".parent").find(".nav-img").removeClass("show");
        $(".unreadalldiv").find(".parent").find(".nav-text").removeClass("showtext");
        $(".unreadalldiv").find(".parent").find('.activeImg').addClass("d-none");
        $(".unreadalldiv").find(".parent").find('.nav-img').removeClass("d-none");
        $(".unreadalldiv").find(".parent").find(".filtered").removeClass("unreadClicked");
        $(element).addClass("active");
        $(element).addClass("allfiltClicked");
        $(element).closest(".parent").find('.nav-img').addClass("show");
        $(element).closest(".parent").find('.nav-text').addClass("showtext");
     }
     // 


    // $(".filtered").removeClass("active");
    // $('.nav-img').removeClass("show");
    // $('.nav-img').removeClass("d-none");
    // $('.activeImg').addClass("d-none");
    // $('.nav-text').removeClass("showtext");    

   
   

    // $(element).addClass("active");
    // $(element).closest(".parent").find('.nav-img').addClass("show");
    // $(element).closest(".parent").find('.nav-text').addClass("showtext");
    
    // var checkActiveClass = $(element).closest(".parent");
    // if($(checkActiveClass).find("img").hasClass("activeImg")){
    //     $(element).closest(".parent").find('.nav-img').addClass("d-none");
    //     $(element).closest(".parent").find('.activeImg').removeClass("d-none");
    // }  
    
    
    

    var cnt = 0;
    closeViewers(this);
    $('.announcementListMainDiv').each(function () {
        var selectedVal = $(this).data('user');
        if (data_click == "3") {
            // if (data_click == selectedVal) {
            //     $(this).removeClass("d-none");
            //     cnt++;
            // } else {
            //     $(this).addClass("d-none");
            // }


            //newcode
            var checkUnread = $(this).data('unread');
            if($(".unreadalldiv").find(".parent").find(".filtered").hasClass("active")){
                if($(".unreadalldiv").find(".parent").find(".filtered").hasClass("unreadClicked")){          
                      //unread
                  var ImageActiveclick=$(".unreadalldiv").find(".parent").find(".unreadClicked").data("click");
                  if (data_click == selectedVal && checkUnread == "1") {
                      $(this).removeClass("d-none");
                      cnt++;
                  } else {
                      $(this).addClass("d-none");
                  }
                }else if($(".unreadalldiv").find(".parent").find(".filtered").hasClass("allfiltClicked")){
                  //all
                  var ImageActiveclick=$(".unreadalldiv").find(".parent").find(".allfiltClicked").data("click");
                  if (data_click == selectedVal ) {
                      $(this).removeClass("d-none");
                      cnt++;
                  } else {
                      $(this).addClass("d-none");
                  }
              }
                            
              }else{
                if (data_click == selectedVal) {
                    $(this).removeClass("d-none");
                    cnt++;
                } else {
                    $(this).addClass("d-none");
                }
              }              
            //endnewcode

        }
        else if (data_click == "4") {
            // if (data_click == selectedVal) {
            //     $(this).removeClass("d-none");
            //     cnt++;
            // } else {
            //     $(this).addClass("d-none");
            // }
            var checkUnread = $(this).data('unread');
            if($(".unreadalldiv").find(".parent").find(".filtered").hasClass("active")){
                if($(".unreadalldiv").find(".parent").find(".filtered").hasClass("unreadClicked")){          
                      //unread
                  var ImageActiveclick=$(".unreadalldiv").find(".parent").find(".unreadClicked").data("click");
                  if (data_click == selectedVal && checkUnread == "1") {
                      $(this).removeClass("d-none");
                      cnt++;
                  } else {
                      $(this).addClass("d-none");
                  }
                }else if($(".unreadalldiv").find(".parent").find(".filtered").hasClass("allfiltClicked")){
                  //all
                  var ImageActiveclick=$(".unreadalldiv").find(".parent").find(".allfiltClicked").data("click");
                  if (data_click == selectedVal ) {
                      $(this).removeClass("d-none");
                      cnt++;
                  } else {
                      $(this).addClass("d-none");
                  }
              }
                            
              }else{
                if (data_click == selectedVal) {
                    $(this).removeClass("d-none");
                    cnt++;
                } else {
                    $(this).addClass("d-none");
                }
              }
        } else if (data_click == "2") {
            var checkUnread = $(this).data('unread');
            // if (checkUnread == "1") {
            //     $(this).removeClass("d-none");
            //     cnt++;
            // } else {
            //     $(this).addClass("d-none");
            // }


            if($(".businessfamilydiv").find(".parent").find(".filtered").hasClass("active")){
                if($(".businessfamilydiv").find(".parent").find(".filtered").hasClass("famClicked")){          
                      //fam
                  var ImageActiveclick=$(".businessfamilydiv").find(".parent").find(".famClicked").data("click");
                  if (ImageActiveclick == selectedVal && checkUnread == "1") {
                      $(this).removeClass("d-none");
                      cnt++;
                  } else {
                      $(this).addClass("d-none");
                  }
                }else if($(".businessfamilydiv").find(".parent").find(".filtered").hasClass("businessClicked")){
                  //busi
                  var ImageActiveclick=$(".businessfamilydiv").find(".parent").find(".businessClicked").data("click");
                  if (ImageActiveclick == selectedVal && checkUnread == "1") {
                      $(this).removeClass("d-none");
                      cnt++;
                  } else {
                      $(this).addClass("d-none");
                  }
              }
                            
              }else{
                 if (checkUnread == "1") {
                $(this).removeClass("d-none");
                    cnt++;
                } else {
                    $(this).addClass("d-none");
                }
              }



        } else {

            //newcode
            // $('.businessfamilydiv span').each(function () {
            //     var ii=$(this).find(".active").data("click");
            // });

            if($(".businessfamilydiv").find(".parent").find(".filtered").hasClass("active")){
              if($(".businessfamilydiv").find(".parent").find(".filtered").hasClass("famClicked")){          
                    //fam
                var ImageActiveclick=$(".businessfamilydiv").find(".parent").find(".famClicked").data("click");
                if (ImageActiveclick == selectedVal) {
                    $(this).removeClass("d-none");
                    cnt++;
                } else {
                    $(this).addClass("d-none");
                }
              }else if($(".businessfamilydiv").find(".parent").find(".filtered").hasClass("businessClicked")){
                //busi
                var ImageActiveclick=$(".businessfamilydiv").find(".parent").find(".businessClicked").data("click");
                if (ImageActiveclick == selectedVal) {
                    $(this).removeClass("d-none");
                    cnt++;
                } else {
                    $(this).addClass("d-none");
                }
            }else{                
                $(this).addClass("d-none");
            }
                          
            }
            //newcodend


            // $(this).removeClass("d-none");
            //cnt++;
        }
    });    
    if (cnt == 0) {
        $(".noRecords").removeClass("d-none");
    } else {
        $(".noRecords").addClass("d-none");
    }
}

function showfooterfilterresult(element) {
    //$(".createAnnouncementText").text("");
    $('.activeFooterFilterImg').addClass("d-none");
    $('.footerFilterImg').removeClass("d-none");
    var checkActiveClass = $(element).closest(".parent");
    if ($(element).data("attr") == "sortFilter") {
        // $(".businessprofile").addClass("d-none");
        if($(".businessprofile").hasClass("d-none")){
            $(".announcementlistscrollbody").removeClass("ifbusinessdiv");
            // $(".resetFilterDiv").removeClass("d-none");
        }else{
            $(".announcementlistscrollbody").addClass("ifbusinessdiv");
            $(".resetFilterDiv").addClass("d-none");
            $(".viewersClick").css("visibility","hidden");
            $(".announcementlistscrollbody").removeClass("addpaddingforfilter");
        }
       
       
        //$(".filtered").removeClass("active");
        $(".footerfiltered").removeClass("active");
        $('.footerFilterImg').removeClass("show");
        //$('.nav-text').removeClass("showtext");
        $('.footerFilterTxt').removeClass("showtext");
        if($(".footerfiltersortdiv").hasClass("d-none")){
            $(".footerfiltersortdiv").removeClass("d-none");
        }else{
            $(".footerfiltersortdiv").addClass("d-none");
        }
        // $(".footerfiltersortdiv").toggleClass("d-none");

        $(element).addClass("active");
        $(element).closest(".parent").find('.nav-img').addClass("show");
        //$(element).closest(".parent").find('.nav-text').addClass("showtext");
        $(element).closest(".parent").find('.footerFilterTxt').addClass("showtext");        
                
        if ($(checkActiveClass).find("img").hasClass("activeFooterFilterImg")) {
            $(element).closest(".parent").find('.footerFilterImg').addClass("d-none");
            $(element).closest(".parent").find('.activeFooterFilterImg').removeClass("d-none");
        }   
    } else if ($(element).data("attr") == "businessFilter") {
        //$(".createAnnouncementText").text("My Business Profile");
        $(".footerfiltersortdiv").addClass("d-none");
        //$(".filtered").removeClass("active");
         $(".footerfiltered").removeClass("active");
        $('.nav-img').removeClass("show");
        //$('.nav-text').removeClass("showtext");

        $(element).addClass("active");
        $(element).closest(".parent").find('.nav-img').addClass("show");
        //$(element).closest(".parent").find('.nav-text').addClass("showtext");
        $(element).closest(".parent").find('.footerFilterTxt').addClass("showtext"); 
        
        if ($(checkActiveClass).find("img").hasClass("activeFooterFilterImg")) {
            $(element).closest(".parent").find('.footerFilterImg').addClass("d-none");
            $(element).closest(".parent").find('.activeFooterFilterImg').removeClass("d-none");
        }

        var data_click = $(element).data("click");
        $('.announcementListMainDiv').each(function () {
            var entity_id = $(this).data('id');
            var selectedVal = $(this).data('interested');
            if (data_click == "1") {
                if (data_click == selectedVal) {
                    $(this).removeClass("d-none");
                    // $('.announcement_'+entity_id).closest(".announcementDiv").find(".submitDiv").removeClass("d-none");
                    // $('.announcement_'+entity_id).closest(".announcementDiv").find(".remainingDiv").addClass("d-none");
                    $(".submitDiv").removeClass("d-none");
                    $(".remainingDiv").addClass("d-none");
                    $(".ongoingdot").addClass("d-none");

                    // $(this).closest(".announcementDiv").find(".remainingDiv").addClass("d-none");    

                    $(".filtersectiondiv").addClass("d-none");
                    $(".businessprofile").removeClass("d-none");
                    $(".businessprofiletext").removeClass("d-none");
                    $(".resetFilterDiv").addClass("d-none");
                    $(".announcementlistscrollbody").addClass("ifbusinessdiv");
                    $(".announcementlistscrollbody").removeClass("addpaddingforfilter");
                    $(".viewersClick").css("visibility","hidden");
                  
                } else {
                    $(this).addClass("d-none");
                    // $(this).closest(".announcementDiv").find(".submitDiv").addClass("d-none");  
                    // $(this).closest(".announcementDiv").find(".remainingDiv").removeClass("d-none");   
                    // $(".filtersectiondiv").removeClass("d-none");   
                    // $(".businessprofiletext").addClass("d-none"); 
                }

            }
                   
        
      else{
            $(this).removeClass("d-none"); 
        }
    });
    
}else if($(element).data("attr")=="Filter"){
    $(".footerfiltersortdiv").addClass("d-none");
    $(".businessprofile").addClass("d-none");
    $(".businessprofiletext").addClass("d-none");
    $(".resetFilterDiv").removeClass("d-none");
    $(".announcementlistscrollbody").removeClass("ifbusinessdiv");
    $(".resetFilterDiv").addClass("d-none");
    $(".announcementListPageSection").addClass("d-none");
    $(".filtersectiondiv").addClass("d-none");
    $(".footerfiltersection").addClass("d-none");
    $(".advancedFilterDiv").removeClass("d-none");
}


}

function showMediaSlider(element) {
    var checkMediaShow = $(element).attr("data-show");
    $('.detailScrollableDiv').scrollTop(0);
    $(".closeBtn").removeClass("d-none");
    $(".mediaSpan").removeClass("d-none");
    $(".descriptionSec").addClass("d-none");
    $(".announcementMediaDiv").addClass("d-none");
    if (checkMediaShow === "photos") {
        $(".photoSec").css("color", "#A4894B");
        $(".videoSec").css("color", "#B7B7B7");
        $(".imageSliderDiv").removeClass("d-none");
        $(".videoSliderDiv").addClass("d-none");
    } else {
        $(".photoSec").css("color", "#B7B7B7");
        $(".videoSec").css("color", "#A4894B");
        $(".imageSliderDiv").addClass("d-none");
        $(".videoSliderDiv").removeClass("d-none");
    }
}

function backToDetailSection() {
    $(".closeBtn").addClass("d-none");
    $(".mediaSpan").addClass("d-none");
    $(".descriptionSec").removeClass("d-none");
    $(".announcementMediaDiv").removeClass("d-none");
    $(".imageSliderDiv").addClass("d-none");
    $(".videoSliderDiv").addClass("d-none");
}
function backTowholeDetailSection() {
    $(".interest_submitteddiv").addClass("d-none");
    $(".detailpagecontainer").removeClass("d-none");
    $(".announcementListMainDiv").removeClass("d-none");
    $(".submitInterestDiv").addClass("d-none");
}





function ascdesclick(element) {
    var click = $(element).data("attr");
    if (click == "asc") {
        $(".desdiv").removeAttr("disabled");
        $(".desdiv").css("pointer-events", "initial");
    }
    var table = $('.announcementListPageSection');
    var rows = table.find('.announcementListMainDiv');


    $('.announcementListMainDiv:first').before(rows.get().reverse());
    // var click=$(element).data("attr");
    if (click == "asc") {
        $(element).attr("disabled", "disabled");
        $(element).css("pointer-events", "none");

        $(".desdiv").removeAttr("disabled");
        $(".desdiv").css("pointer-events", "initial");

    } else if (click == "desc") {
        $(element).attr("disabled", "disabled");
        $(element).css("pointer-events", "none");

        $(".ascdiv").removeAttr("disabled");
        $(".ascdiv").css("pointer-events", "initial");
    } else {
        // $(element).removeAttr("disabled");
        // $(element).css("pointer-events","initial");
    }
}

function applyFilter() {
    var announcementList = $(".announcementList").val();
    var getKeywords = $(".keywordInput").val();
    var getMonth = $('#filterPerMonth').val();
    var getYear = $('#filterPerYear').val();    

    if (getKeywords == '' && getMonth == null && getYear == null && $("#businessChk").prop('checked') == false && $("#familyChk").prop('checked') == false) {
        alert("Please add one filter");
        return true;
    }

    var url = announcementList + "?k=";
    if (getKeywords !== '') {
        url += getKeywords;
    }
    if (getMonth !== '' && getMonth !== null) {
        url += "&m=" + getMonth;
    }
    if (getYear !== '' && getYear !== null) {
        url += "&y=" + getYear;
    }
    if($("#businessChk").prop('checked') == true && $("#familyChk").prop('checked') == true){
        url += "&t=all";
    } else if ($("#businessChk").prop('checked') == true) {
        url += "&t=business";
    } else if ($("#familyChk").prop('checked') == true) {
        url += "&t=family";
    }
    window.location.href = url;
}


function addComment(element) {
    // user_id , blog_id , commentStr , 
    // first will check if comment is from parent or from child  
    let parent_or_child = $(element).attr('data-check');
    let parent_id = 0;
    if (parent_or_child == "child") {
        parent_id = $(element).closest('.commentbox').attr('data-id');
    }
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
    let url = $('.CommentUrl').val();
    let comment = $(element).closest('.inputparent').find('.blogCommentInput').val();
    if (comment == null || comment === undefined) {
        return;
    }
    if (comment.length > 250) {
        $(element).closest('.inputparent').find('.commenterror').text('Comment must be less than 250 character.');
        return;
    }

    else if (comment == "") {
        $(element).closest('.inputparent').find('.commenterror').text('This field is Required');
        return;
    }
    else {
        $(element).closest('.inputparent').find('.commenterror').text('');
    }

    let announcement_id = $('.currentannounceId').val();
    let user_name = $('.userName').val();
    $('.loading').removeClass('d-none');
    $.ajax({
        url: url,
        type: "POST",
        data: { _token: CSRF_TOKEN, comment: comment, announcement_id: announcement_id, parent_id: parent_id },
        success: function (response) {
            console.log(response);
            if (parent_id == 0) {
                let commentContainer = $('.commentContainer');
                let defaultComment = $('.defaultComment').clone();
                $(defaultComment).removeClass('d-none defaultComment');
                $(defaultComment).addClass('commentbox');
                $(defaultComment).attr('data-id', response.id);
                $(defaultComment).find('.published_date').text(response.date);
                $(defaultComment).find('.comment').text(response.comment);
                $(commentContainer).prepend(defaultComment);
                $(element).closest('.inputparent').find('.blogCommentInput').val('');

            }
            else {
                let defaultComment = $('.defaultChildComment').clone();
                $(defaultComment).removeClass('d-none defaultChildComment');
                $(defaultComment).attr('data-id', response.id);
                $(defaultComment).find('.published_date').text(response.date);
                $(defaultComment).find('.comment').text(response.comment);
                $($(element).closest('.childCommentDiv').find('.replyEditor')).after(defaultComment);
                $(element).closest('.replyEditor').addClass('d-none')
                $(element).closest('.replyEditor').find('.blogCommentInput').val('')

                //show all comments related to that comment 
                $(element).closest('.commentbox').find('.childCommentDiv').find('.card-body').each(function () {

                    if ($(this).hasClass('replyEditor')) {
                        return;
                    }
                    else {
                        $(this).removeClass('d-none');
                    }
                });


            }
            $('.loading').addClass('d-none');

            $(element).closest('.commentbox').find('.showreplies').removeClass('d-none')
            $(element).closest('.commentbox').find('.showHide').text('Hide')



        }, error: function (err) {
            $('.loading').addClass('d-none');
            console.log(err);
            alert('Something went wrong.')
        }
    });



}

function openReplyEditor(element) {
    $(element).closest('.commentbox').find('.replyEditor').toggleClass('d-none');
}


function removeReplyEditor(element) {
    $(element).closest('.commentbox').find('.replyEditor').addClass('d-none');
}

function togglecomment(element) {
    if ($(element).find('.showHide').text() == "Show")
        $(element).find('.showHide').text("Hide")
    else
        $(element).find('.showHide').text("Show");


    $(element).closest('.commentbox').find('.childCommentDiv').find('.card-body').each(function () {

        if ($(this).hasClass('replyEditor')) {
            return;
        }
        else {
            $(this).toggleClass('d-none');
        }
    });
}

function removeMarketPlaceImage(element){
    if ($(element).hasClass('removedImageId')) {
        var confirmDelete = confirm("Are you sure you want to remove this file?");
        if (!confirmDelete) {
          return false;
        } 
      let id = $(element).data('id')
      $('.removedImageIds').val($('.removedImageIds').val() + id + ',')
    }
    else {
        var confirmDelete = confirm("Are you sure you want to remove this file?");
        if (!confirmDelete) {
          return false;
        } 
      let currentCount = $(element).data('count');
//      $('.inputDiv').find('input').each(function () {
//        let count = $(element).data('count');
//        count = parseInt(count);
//        if (count == currentCount) {
//          //$(element).remove();
//        }
//
//      })
      currentCount = parseInt(currentCount);
      const index = productImageArr.indexOf(currentCount);
      if (index > -1) {
        productImageArr.splice(index, 1);
        $('.addedimageArr').val(productImageArr.join());
      }
    }
    var checkremovetype=$(element).attr('value');
    if(checkremovetype==1){
      $(element).closest('.ImageDiv').remove();
      $(element).remove();
    }else if(checkremovetype==2){
      $(element).closest('.vidDiv').remove();
      $(element).remove();
    }else{
      $(element).closest('.docDiv').remove();
      $(element).remove();
    }
}

//image preview
function multipleimageUpload(input, deg) {

}


function stopPropo(element) {
    // $('.respeditdropdown').click();
    var parent = findParent(element);
    $(parent).find('.ellipsisbtn').css('display', 'block');


}

function publishUnPublishAnnouncement(element){
    var parent = findParent(element);
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
    let url = $('.publishUnpublishAnnUrl').val();
    let status = $(element).data('check');
    let announcement_id=$(element).data('id');
 
      $('.loading').removeClass('d-none');
      $.ajax({
          url: url,
          type: "POST",
          data: {_token: CSRF_TOKEN, status:status,announcement_id:announcement_id},
          success: function (response) {
            console.log(response);
            $('.loading').addClass('d-none');
            $('.ellipsisbtn').css('display', 'none');
        //    $(element).closest('.blogDiv').addClass('d-none');
        //     $(parent).find('.closed').click();
          },error: function (err) {
            $('.loading').addClass('d-none');
            $('.ellipsisbtn').css('display', 'none');
              console.log(err);
              alert('Something went wrong.')
          }
      });
    
    
  }