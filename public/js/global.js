$(document).ready(function() {    
     //current webpage indication     
     $("[href]").each(function() {         
        if (this.href == window.location.href.split('?')[0]) {
            $(this).find('.nav-img').addClass("active");
            $(this).find('.nav-img').addClass("show");
            $(this).find('.nav-img').addClass("d-none");
            $(this).find('.activeImg').removeClass("d-none");
        } else if ((window.location.href.split('?')[0]).indexOf("announcement") !== -1){            
            $('.navSvg').find('.nav-img').addClass("d-none");
            $('.navSvg').find('.activeImg').removeClass("d-none");
        }
    });

});

function findParent(element) {
    var parentElement = $(element).parent();
    if ($(parentElement).hasClass("parent"))
        return parentElement;
    else {
        for (var i = 0; i < 24; i++) {
            parentElement = $(parentElement).parent();
            if ($(parentElement).hasClass("parent"))
                return parentElement;
        }
    }
}

function showCustomLoader() {
    $('.loading').removeClass('d-none');
}