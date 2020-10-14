$(window).scroll(function(){
        if (  $(window).scrollTop() + $(window).height() == $(document).height()   ){
            $(".divRouge").addClass("divSlide");
        };
    });