$.noConflict();
jQuery(document).ready(function ($) {
    "use strict";
    [].slice.call(document.querySelectorAll('select.cs-select')).forEach(function (el) {
        new SelectFx(el);
    });
    jQuery('.selectpicker').selectpicker;
    $('.search-trigger').on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').addClass('open');
    });
    $('.search-close').on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
        $('.search-trigger').parent('.header-left').removeClass('open');
    });
    $('.equal-height').matchHeight({
        property: 'max-height'
    });
    $('.count').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 3000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    $('#menuToggle').on('click', function (event) {
        var windowWidth = $(window).width();
        if (windowWidth < 1010) {
            $('body').removeClass('open');
            if (windowWidth < 760) {
                $('#left-panel').slideToggle();
            } else {
                $('#left-panel').toggleClass('open-menu');
            }
        } else {
            $('body').toggleClass('open');
            $('#left-panel').removeClass('open-menu');
        }
    });
    $(".menu-item-has-children.dropdown").each(function () {
        $(this).on('click', function () {
            var $temp_text = $(this).children('.dropdown-toggle').html();
            $(this).children('.sub-menu').prepend('<li class="subtitle">' + $temp_text + '</li>');
        });
    });
    $(window).on("load resize", function (event) {
        var windowWidth = $(window).width();
        if (windowWidth < 1010) {
            $('body').addClass('small-device');
        } else {
            $('body').removeClass('small-device');
        }
    });
});











function jsAutocomplete() {
    var searched_term = $("#autocompleteJS").val();
    console.log("hi1", searched_term);
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        // document.getElementById("demo").innerHTML = this.responseText;
        console.log(this.responseText,"i am prince")
    }
    xhttp.open("POST", "search_data.php", true);
    xhttp.send(JSON.stringify({data:searched_term}));

}










function jqAutocomplete() {
    var x = $("#autocompleteJQ").val();
    console.log("hi2", x);
    // $.ajax({
    //     url: 'search_data.php',
    //     type: 'post',
    //     dataType: 'json',

    //     data: {
    //         search :
    //     },
    //     success: function(result) {
    //         var response=JSON.parse(result);

    //         if(!response.error)
    //         {     
    //             if(response.message=='wrong'){

    //                  $('.login_msg p').html('Please enter valid login details.');

    //              }
    //             if(response.message=="valid")
    //             {
    //                 window.location.href='index.php';
    //                 // response.message

    //             }

    //         }
    //     }
    // }); 

}