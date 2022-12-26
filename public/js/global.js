$(document).ready(function() {


     //current webpage indication
     $("[href]").each(function() {
        if (this.href == window.location.href) {
            $(this).find('.nav-img').addClass("active");
            $(this).find('.nav-img').addClass("show");
            $(this).find('.nav-img').addClass("d-none");
            $(this).find('.activeImg').removeClass("d-none");
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