jQuery(document).ready(function ($) {
        $status = $(".status");
         var options = {
        autoPlay: true,
        autoPlayDelay: 4000,
        pauseOnHover: false,
        hidePreloaderDelay: 500,
        nextButton: true,
        prevButton: true,
        pauseButton: true,
        preloader: true,
        hidePreloaderUsingCSS: false,                   
        animateStartingFrameIn: true,    
        navigationSkipThreshold: 750,
        preventDelayWhenReversingAnimations: true,
        customKeyEvents: {
            80: "pause"
        }
    };

    var sequence = $("#sequence").sequence(options).data("sequence");

    sequence.afterNextFrameAnimatesIn = function() {
        if(sequence.settings.autoPlay && !sequence.hardPaused && !sequence.isPaused) {
            $status.addClass("active").css("opacity", 1);
        }
        $(".prev, .next").css("cursor", "pointer").animate({"opacity": 1}, 500);
    };
    sequence.beforeCurrentFrameAnimatesOut = function() {
        if(sequence.settings.autoPlay && !sequence.hardPaused) {
            $status.css({"opacity": 0}, 500).removeClass("active");
        }
        $(".prev, .next").css("cursor", "auto").animate({"opacity": .7}, 500);
    };
    sequence.paused = function() {
        $status.css({"opacity": 0}).removeClass("active").addClass("paused");
    };
    sequence.unpaused = function() {
        if(!sequence.hardPaused) {
            $status.removeClass("paused").addClass("active").css("opacity", 1)
        }               
    };

    $(window).stellar();

    var links = $('.navigation').find('li');
    slide = $('.slide');
    button = $('.button');
    mywindow = $(window);
    htmlbody = $('html,body');


    slide.waypoint(function (event, direction) {

        dataslide = $(this).attr('data-slide');

        if (direction === 'down') {
            $('.navigation li[data-slide="' + dataslide + '"]').addClass('active').prev().removeClass('active');
        }
        else {
            $('.navigation li[data-slide="' + dataslide + '"]').addClass('active').next().removeClass('active');
        }

    });
 
    mywindow.scroll(function () {
        if (mywindow.scrollTop() == 0) {
            $('.navigation li[data-slide="1"]').addClass('active');
            $('.navigation li[data-slide="2"]').removeClass('active');
        }
    });

    function goToByScroll(dataslide) {
        htmlbody.animate({
            scrollTop: $('.slide[data-slide="' + dataslide + '"]').offset().top
        }, 2000, 'easeInOutQuint');
    }



    links.click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');
        goToByScroll(dataslide);
    });

    button.click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');
        goToByScroll(dataslide);

    });


});