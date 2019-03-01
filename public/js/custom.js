/////////// ON READY JQUERY
$(document).ready(function () {




    $("#usersRecepient").select2({
        tags: true
    })




    $('input[name="roles[]"]').change(function(){
        var value = $(this).val();
        //$('input[name="roles[]"]').prop('checked', false);
        //$('input[name="roles[]"]').prop('checked', false);
        if( value== 1 || value == 2 || value== 6){
            return false;
        }else if(value== 3 || value == 4 || value == 5){
            console.log('regional')
        }else if(value== 7 || value == 8 ){
            console.log('store');
        }else if(value== 9 || value == 10 ){
            console.log('plan');
        }


    })


    //////
    //edit users selects
    //////

    $('select#client').change(function(){
        if($(this).val() == 0){
            $('select#network').html('<option value="0">Επιλογή Δικτύου</option>');
            return false;
        }
        var url = basePath+'ajax/allnetworks/'+$(this).val();
        $.get( url, function( data ) {
            $('select#network').html('<option value="0">Επιλογή Δικτύου</option>');
            $.each(data,function(i,o){
                $('select#network').append($("<option></option>").attr("value",$(o)[0].name).text($(o)[0].name)); 
            });
        });
    })


    $('select#regions').change(function(){
        var url = basePath+'ajax/allsubregions/'+$(this).val();
        if($(this).val() == 0){
            $('select#subregions').html('<option value="0">Επιλογή</option>');
            $('select#municipalities').html('<option value="0">Επιλογή</option>');
            return false;
        }

        $.get( url, function( data ) {
            $('select#subregions').html('<option value="0">Επιλογή Περιφέρειακής Ενότητας</option>');
            $.each(data,function(i,o){
                $('select#subregions').append($("<option></option>").attr("value",$(o)[0].id).text($(o)[0].name)); 
            });
        });
    })


    $('select#subregions').change(function(){
        var url = basePath+'ajax/allmunicipalities/'+$(this).val();
        if($(this).val() == 0){
            $('select#municipalities').html('<option value="0">Επιλογή</option>');
            return false;
        }
        $.get( url, function( data ) {
            $('select#municipalities').html('<option value="0">Επιλογή Δήμου</option>');
            $.each(data,function(i,o){
                $('select#municipalities').append($("<option></option>").attr("value",$(o)[0].id).text($(o)[0].name)); 
            });
        });
    })

    //edit users end


    //// MENU HEIGHT
    var windowHeight = window.innerHeight;
    $("#sidebar-nav nav").css({
        "height": windowHeight + "px"
    });
    //// ON RESIZE
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
            $("#main-content").addClass("col-lg-10 col-lg-offset-2 col-md-9 col-md-offset-3 col-sm-12 col-sm-offset-4 col-xs-12 col-xs-offset-9");
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
            $("#main-content").removeClass("col-sm-offset-4 col-xs-offset-9");
            $("body").css({
                "overflow": "auto"
            });
        }

    });

    // HEADER COLLAPSE NAV
    $('#headnav li.noredirect').each(function(i,v){

        $(v).click(function(){
            $('.head-drawer-wrapper>.head-drawer').collapse('hide');
            $('.head-drawer-wrapper>.head-drawer:eq('+i+')').collapse('show');
        });

    });

    //// PUSH PAGE IF NOTIFICATIONS ARE VISIBLE
    var notificationHeight = $(".notifications").height();
    $("#sidebar-nav").css({"top":notificationHeight});
    $("#main-content").css({"margin-top":notificationHeight});

    $('.notifications').bind("DOMSubtreeModified",function(){
        notificationHeight = $(".notifications").height();
        $('#sidebar-nav').animate({"top":notificationHeight},300);
        //$('#sidebar-nav').css({"top":notificationHeight});
        $("#main-content").animate({"margin-top":notificationHeight},300);
    });

    //// DROP DOWN TO BUTTON TO ICON
    var windowWidth = window.innerWidth;    
    if (windowWidth<370){
        $('#dropdownMenu1').html('<i class="icon gicon-abp-reports-filters"></i>');
    }

    $(window).resize(function () {
        var windowWidth = window.innerWidth;
        if (windowWidth<370){
            $('#dropdownMenu1').html('<i class="icon gicon-abp-reports-filters"></i>');
            //            $('#dropdownMenu1').
        }   
    });


});