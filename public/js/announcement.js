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

    $('.closeviewersBtn').click(function() {
        closeViewers(this);
    });



    var detailheight = window.innerHeight;

var totalheight=detailheight-180-112-80;
$(".detailScrollableDiv").css("max-height",totalheight+"px");
    // $('.nav-text').click(function() {
    //     $(this).css('color', '#AA8840');
    //     $(this).parent().find('.navSvg path').css('stroke' , '#AA8840');
        
    // });
    
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


function showAnnouncementInterest(element){   
$('.loading').removeClass('d-none');
let entity_id = $(element).data('id');
var CSRF_TOKEN = $('.csrf-token').val();
let url= $('.addInterestclass').val();
// let entity_id=$(element).val();
$.ajax({
    url: url,
    type: "post",
    data: {_token: CSRF_TOKEN, entity_id: entity_id},
    success: function (response) {
       console.log(response);
       $(".detailpagecontainer").addClass("d-none");
       $(".announcementListMainDiv").addClass("d-none");
       $(".interest_submitteddiv").removeClass("d-none");
       
       $('.loading').addClass('d-none');
    //    window.location.href="../announcementDetail/"+ entity_id;
        // location.reload();
    },error: function (err) {
        $('.loading').addClass('d-none');
        console.log(err);
    }
});
}


function checkViewers(element){
$('.loading').removeClass('d-none');
let parent = findParent(element);
let entity_id = $(parent).data('id');
var date=$(parent).find(".createdDate").text();
var year=$(parent).find(".createdyr").text();
var title=$(parent).find(".remainingText").text();
var remainingtime=$(parent).find(".anntitle").text()
var CSRF_TOKEN = $('.csrf-token').val();
let url= $('.announcementViewers').val();

// let entity_id=$(element).val();
$.ajax({
    url: url,
    type: "post",
    data: {_token: CSRF_TOKEN, entity_id: entity_id,date:date,year:year,title:title,remainingtime:remainingtime},
    success: function (response) {
        $(".announcementlisting").addClass("d-none");
        $('.loading').addClass('d-none');
       console.log(response);
       $(element).closest('.announcement_'+entity_id).removeClass("d-none");

    //    $(".viewersDiv").removeClass("d-none");
    //    $(".announcementlisting").addClass("d-none");
      
      
      
       if(response != ''){
        $(element).closest('.announcement_'+entity_id).find(".userlist").removeClass("d-none");
        $(element).closest('.announcement_'+entity_id).find(".userlist").empty();
        $(element).closest('.announcement_'+entity_id).find(".userlist").append(response);          
    }else{
        $(element).closest('.announcement_'+entity_id).find(".nouserlist").removeClass("d-none");
        
    }
    $(".closeviewerlist").removeClass("d-none");
     $(element).closest('.announcement_'+entity_id).find(".viewersbtndiv").addClass("d-none");
     $(".footerfiltersection").addClass("d-none");
        // location.reload();
    },error: function (err) {
        $('.loading').addClass('d-none');
        console.log(err);
    }
});
}


function closeViewers(element){
$(".announcementlisting").removeClass("d-none");
$(".viewersbtndiv").removeClass("d-none");
$(".closeviewerlist").addClass("d-none");
$(".userlist").addClass("d-none");
$(".nouserlist").addClass("d-none");
$(".footerfiltersection").removeClass("d-none");
var activesel=$(".active").data('click');
// showFilteredresult(this);
$('.announcementListMainDiv').each(function (){
    var selectedVal=$(this).data('user'); 
    if(activesel == "3"){
        if(activesel==selectedVal){
            $(this).removeClass("d-none");      
        }else{
            $(this).addClass("d-none");      
        }
               
    } 
   else if(activesel == "4"){
        if(activesel==selectedVal){
            $(this).removeClass("d-none");      
        }else{
            $(this).addClass("d-none");      
        }
               
    } else{
        $(this).removeClass("d-none"); 
    }
});
}


function showFilteredresult(element){
$(".filtered").removeClass("active");
$('.nav-img').removeClass("show");
$('.nav-text').removeClass("showtext");

var data_click=$(element).data('click');
$(element).addClass("active");
$(element).closest(".parent").find('.nav-img').addClass("show");
$(element).closest(".parent").find('.nav-text').addClass("showtext");

$('.announcementListMainDiv').each(function (){
    var selectedVal=$(this).data('user'); 
    if(data_click == "3"){
        if(data_click==selectedVal){
            $(this).removeClass("d-none");      
        }else{
            $(this).addClass("d-none");      
        }
               
    } 
   else if(data_click == "4"){
        if(data_click==selectedVal){
            $(this).removeClass("d-none");      
        }else{
            $(this).addClass("d-none");      
        }
               
    } else if(data_click == "2"){
        var checkUnread = $(this).data('unread');
        if(checkUnread == "1"){
            $(this).removeClass("d-none");
        } else {
            $(this).addClass("d-none");
        }
        
    } else{
        $(this).removeClass("d-none"); 
    }
});
}

function showfooterfilterresult(element){
if($(element).data("attr")=="sortFilter"){
    $(".filtered").removeClass("active");
    $('.nav-img').removeClass("show");
    $('.nav-text').removeClass("showtext");
    $(".footerfiltersortdiv").toggleClass("d-none");

    $(element).addClass("active");
    $(element).closest(".parent").find('.nav-img').addClass("show");
    $(element).closest(".parent").find('.nav-text').addClass("showtext");
}else if($(element).data("attr")=="businessFilter"){
    $(".filtered").removeClass("active");
    $('.nav-img').removeClass("show");
    $('.nav-text').removeClass("showtext");

    $(element).addClass("active");     
    $(element).closest(".parent").find('.nav-img').addClass("show");
    $(element).closest(".parent").find('.nav-text').addClass("showtext");

     var data_click=$(element).data("click");
    $('.announcementListMainDiv').each(function (){
        var entity_id = $(this).data('id');
        var selectedVal=$(this).data('interested'); 
        if(data_click == "1"){
            if(data_click==selectedVal){
                $(this).removeClass("d-none"); 
                // $('.announcement_'+entity_id).closest(".announcementDiv").find(".submitDiv").removeClass("d-none");
                // $('.announcement_'+entity_id).closest(".announcementDiv").find(".remainingDiv").addClass("d-none");
                $(".submitDiv").removeClass("d-none"); 
                $(".remainingDiv").addClass("d-none"); 
                $(".ongoingdot").addClass("d-none"); 
                 
                // $(this).closest(".announcementDiv").find(".remainingDiv").addClass("d-none");    
              
                $(".filtersectiondiv").addClass("d-none");   
                $(".businessprofiletext").removeClass("d-none"); 
            }else{
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
}


}

function showMediaSlider(element){
var checkMediaShow = $(element).attr("data-show");
$('.detailScrollableDiv').scrollTop(0);
$(".closeBtn").removeClass("d-none");
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

function backToDetailSection(){  
$(".closeBtn").addClass("d-none");
$(".mediaSpan").addClass("d-none");
$(".descriptionSec").removeClass("d-none");
$(".announcementMediaDiv").removeClass("d-none");
$(".imageSliderDiv").addClass("d-none");
$(".videoSliderDiv").addClass("d-none");
}
function backTowholeDetailSection(){
$(".interest_submitteddiv").addClass("d-none");
$(".detailpagecontainer").removeClass("d-none");
$(".announcementListMainDiv").removeClass("d-none");
$(".submitInterestDiv").addClass("d-none");
}

function checkSelectedFile(element){    
var fileCount = $(element)[0].files.length;
$(".uploadMediaLabel").text(fileCount + " file(s) selected");
}


function ascdesclick(element){
var click=$(element).data("attr");
if(click=="asc"){
    $(".desdiv").removeAttr("disabled");
    $(".desdiv").css("pointer-events","initial");
}
var table = $('.announcementListPageSection');
var rows = table.find('.announcementListMainDiv');


$('.announcementListMainDiv:first').before(rows.get().reverse());
// var click=$(element).data("attr");
if(click=="asc"){
    $(element).attr("disabled","disabled");
    $(element).css("pointer-events","none");

    $(".desdiv").removeAttr("disabled");
    $(".desdiv").css("pointer-events","initial");
   
}else if(click=="desc"){
    $(element).attr("disabled","disabled");
    $(element).css("pointer-events","none");

    $(".ascdiv").removeAttr("disabled");
    $(".ascdiv").css("pointer-events","initial");
}else{
    // $(element).removeAttr("disabled");
    // $(element).css("pointer-events","initial");
}
}


