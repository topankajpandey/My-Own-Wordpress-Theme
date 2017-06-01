$(document).ready(function () {
    $('.bxslider').bxSlider({

    });
    /*  Sticky Header */
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('header').addClass("sticky");
        } else {
            $('header').removeClass("sticky");
        }
    });
    /*  Sticky Header */
    $('.scroll').slimScroll({
        height: '380px'
    });
    $('.scroll-1').slimScroll({
        height: '380px'
    });

    $(".main-content-section #toc_container").remove();
    $(".main-content-section .fb-comments").remove();

    $('.cocinas .expend').on('click', function (e) {
        e.preventDefault();
        $(this).closest('.cocinas').find('.smaller').toggleClass('smaller bigger');
        $(this).remove();
    });

    $('.dyson .expend').on('click', function (e) {
        e.preventDefault();
        $(this).closest('.dyson').find('.fuller').toggleClass('fuller autos');
        $(this).remove();
    });

});

$(document).ready(function () {
    $('a[href*="#"]:not([href="#"])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                $(".fixed-btn").click();
                return false;
            }
        }
    });

    $('#navTrigger').click(function () {
        if ($(".nav-outer").hasClass('active')) {

            $(".nav-outer").animate({"right": "-252px"}, "fast").removeClass('active');
            $(".container").animate({"right": "0px"}, "fast").removeClass('active');
            $("body").removeClass("hidden-scroll");

        } else {
            $(".nav-outer").animate({"right": "0px"}, "fast").addClass('active');
            $(".container").animate({"right": "250px"}, "fast").addClass('active');
            $("body").addClass("hidden-scroll");

        }
    });

});

function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}








