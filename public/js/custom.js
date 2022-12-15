$('.navText').mouseover(function(){
    $(this).css('color', '#AA8840');
    $(this).parent().find('.navSvg path').css('stroke' , '#AA8840');
    
});
$('.navText').mouseout(function(){
    $(this).css('color', '#FFF');
    $(this).parent().find('.navSvg path').css('stroke', '#FFF');
});
    $('.navSvg').mouseover(function(){
    $(this ).find('path').css('stroke' , '#AA8840');
    $(this).parent().find('.navText').css('color', '#AA8840');
});
    $('.navSvg').mouseout(function(){
        $(this ).find('path').css('stroke', '#FFF');
        $(this).parent().find('.navText').css('color', '#FFF');
  
});