$(document).ready(function(){
    //slider ============================
    $('.js-slider').slick({
        infinite: true,
        arrows : false,
        speed: 800,
        fade: true,
        cssEase: 'linear',
        autoplay : true
    });

    //Tabs - Tabs Content ===============
    $('.c-tabs li').click(function(){
        var item = $(this);
        var showContent = item.data('content');
        var activeColor = item.data('color');

        item.addClass('active');
        item.css({
           'background-color' : activeColor,
           'border-top-color' : activeColor
        });

        $(".c-tabs li").not(item).removeClass("active");
        $(".c-tabs li").not(item).css("background-color","");

        $('#'+showContent).fadeIn();
        $('.c-listpost').not('#'+showContent).hide();
    });

});