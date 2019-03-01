/////////// ON READY JQUERY
$(document).ready(function () {

    var windowHeight = window.innerHeight;
    $("#sidebar-nav nav").css({
        "height": windowHeight + "px"
    });

    //// MENU HEIGHT
    $(window).resize(function () {
        var windowHeight = window.innerHeight;
        $("#sidebar-nav nav").css({
            "height": windowHeight + "px"
        });
    });
    //// ADD HEIGHT ON ANDROID DEVICES
    var ua = navigator.userAgent.toLowerCase();
    var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
    if (isAndroid) {
        // $("#sidebar-nav nav").css({"height":windowHeight+60+"px"});
    }


    //// SMOOTH SCROLLING ON FAQ
    $('.faq-list a').click(function () {
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 700);
        return false;
    });

    //// SLIDING MENU
    var isVisible = $("#myDiv").is(":visible");
    var isHidden = $("#myDiv").is(":hidden");
    var sidebarWidth = $("#sidebar-nav").width();

    $("#nav-icon1").click(function () {


        $(this).toggleClass('open');
        $("#sidebar-nav").css({
            "left": "0%"
        });
        $(".menu-override").toggle();

        if ($(".menu-override").is(':visible')) {
            $("#main-content").addClass("col-lg-10 col-lg-offset-2 col-md-9 col-md-offset-3 col-sm-12 col-sm-offset-4 col-xs-12 col-xs-offset-8");
            $("body").css({
                "overflow": "hidden"
            });
            $("notifications").css({
                "left": "-" + sidebarWidth + "px"
            });
        } else {
            $("#sidebar-nav").css({
                "left": "-" + sidebarWidth + "px"
            });
            $("#main-content").removeClass("col-sm-offset-4 col-xs-offset-8");
            $("body").css({
                "overflow": "auto"
            });
        }

        /*if($("#sidebar-nav").is(':visible')) {
            $("#main-content").addClass("col-lg-10 col-lg-offset-2 col-md-9 col-md-offset-3 col-sm-12 col-sm-offset-4 col-xs-12 col-xs-offset-8");
            $(".menu-override").toggle();
            $("body").css({"overflow":"hidden"});
        }
        else{
        	$("#main-content").removeClass("col-sm-offset-4 col-xs-offset-8");
        	$(".menu-override").toggle();
        	$("#sidebar-nav").css({"left":"-33.33333%"});
        	$("body").css({"overflow":"auto"});
        }*/
    });


});