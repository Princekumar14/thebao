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
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            // console.log(this.responseText, "hi", (JSON.parse(this.responseText)).length);
            document.getElementById("result-box-js").innerHTML = "";
            document.getElementById("all_vid").innerHTML = "";
            document.getElementById("result-box-js").style.display = "none";

            if (response.length > 0) {
                document.getElementById("all_vid").classList.remove("justify-content-center");
                document.getElementById("result-box-js").style.display = "block";

                var str = "";
                var st = ``;
                for (var i = 0; i < response.length; i++) {
                    // console.log(typeof(response[i]['thumb_image']), "hi")
                    // console.log((response[i]['thumb_image']).indexOf("ttps://"), "hi")

                    if ((response[i]['thumb_image']).indexOf("https://") == 0) {
                        var image_path = response[i]['thumb_image'];
                    } else {
                        var image_path = "http://localhost/thebao/media/thumbnail_images/" + response[i]['thumb_image'];

                    }
                    if ((response[i]['description']).length > 30) {
                        var desc = (response[i]['description']).substr(0, 30) + "...";
                    } else {
                        var desc = response[i]['description'];
                    }
                    var id = response[i]['id'];
                    var title = response[i]['title'];
                    var description = desc;
                    var thumb_image = image_path;
                    var video_id = response[i]['video_id'];
                    var video_url = response[i]['video_url'];
                    var video_order = response[i]['video_order'];

                    str += "<a target='_blank' href=" + response[i]['video_url'] + "><li class='list-group-item li-js'>" + response[i]['title'] + "</li></a>";
                    st += `<div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
                     <div class="card">
                        <a href=`+ video_url + ` target="_blank"><img style="height: 273px; object-fit: contain; object-position: center;" src=` + thumb_image + ` alt="" class="card-img-top"></a>
                        <div class="card-body m-2" style="height:260px">
                           <div class="video-id-box1 d-inline">
                              <h5 class="card-title video-id-title ">Video id : `+ video_id + `<a href=` + video_url + ` class="card-text video-id-text" target="_blank"></a> </h5>
                           </div>
                           <div class="video-order-box">
                              <h5 class="card-title video-order-title ">Video Order : `+ video_order + `<span class="card-text video-order-text "></span> </h5>
                           </div>
                           <div class="video-title-box">
                              <h5 class="card-title video-title ">Title : `+ title + `<span class="card-text video-title-text "></span> </h5>
                           </div>
                           <div class="video-description-box">
                              <h5 class="card-title video-description-title ">Description : `+ description + `<span class="card-text video-description-text "></span> </h5>
                           </div>
                           <div class="btns" style="position: absolute;bottom: 1rem;">
                     
                              <a href=`+ `manage_videos.php?type=edit&id=` + id + `&vid=` + video_order + `class="btn btn-primary btn-sm">Edit</a>
                              <a href=`+ `?type=delete&id=` + id + `class="btn btn-danger btn-sm">Delete</a>
                           </div>
                        </div>
                     </div>
                     </div>`;


                }
                document.getElementById("result-box-js").innerHTML = str;
                document.getElementById("all_vid").innerHTML = st;
                if (searched_term == '') {
                    
                    document.getElementById("result-box-js").innerHTML = "";
                    document.getElementById("result-box-js").style.display = "none";
                }
            }else{
                document.getElementById("all_vid").innerHTML = "<h3>Empty !</h3>";
                document.getElementById("all_vid").classList.add("justify-content-center");

            }


        }

    }
    xhttp.open("POST", "search_data.php", true);
    xhttp.send(JSON.stringify({ data: searched_term }));

}










function jqAutocomplete() {
    var searched_term = $("#autocompleteJQ").val();
    $("#result-box-jq").html('');
    $("#result-box-jq").css("display", "none");
    $("#all_vid").html('');

    // console.log("hi2", x);
    $.ajax({
        url: 'search_data.php',
        type: 'post',
        data: '&search=' + searched_term,
        success: function (result) {
            // console.log(JSON.parse(result).length)
            var response = JSON.parse(result);

            if (response.length > 0) {
                $("#all_vid").removeClass("justify-content-center");
                $("#result-box-jq").css("display", "block");

                var str = "";
                var st = ``;
                for (var i = 0; i < response.length; i++) {
                    if ((response[i]['thumb_image']).indexOf("https://") == 0) {
                        var image_path = response[i]['thumb_image'];
                    } else {
                        var image_path = "http://localhost/thebao/media/thumbnail_images/" + response[i]['thumb_image'];

                    }
                    if ((response[i]['description']).length > 30) {
                        var desc = (response[i]['description']).substr(0, 30) + "...";
                    } else {
                        var desc = response[i]['description'];
                    }
                    var id = response[i]['id'];
                    var title = response[i]['title'];
                    var description = desc;
                    var thumb_image = image_path;
                    var video_id = response[i]['video_id'];
                    var video_url = response[i]['video_url'];
                    var video_order = response[i]['video_order'];

                    str += "<a target='_blank' href=" + response[i]['video_url'] + "><li class='list-group-item li-js'>" + response[i]['title'] + "</li></a>";
                    st += `<div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
                     <div class="card">
                        <a href=`+ video_url + ` target="_blank"><img style="height: 273px; object-fit: contain; object-position: center;" src=` + thumb_image + ` alt="" class="card-img-top"></a>
                        <div class="card-body m-2" style="height:260px">
                           <div class="video-id-box1 d-inline">
                              <h5 class="card-title video-id-title ">Video id : `+ video_id + `<a href=` + video_url + ` class="card-text video-id-text" target="_blank"></a> </h5>
                           </div>
                           <div class="video-order-box">
                              <h5 class="card-title video-order-title ">Video Order : `+ video_order + `<span class="card-text video-order-text "></span> </h5>
                           </div>
                           <div class="video-title-box">
                              <h5 class="card-title video-title ">Title : `+ title + `<span class="card-text video-title-text "></span> </h5>
                           </div>
                           <div class="video-description-box">
                              <h5 class="card-title video-description-title ">Description : `+ description + `<span class="card-text video-description-text "></span> </h5>
                           </div>
                           <div class="btns" style="position: absolute;bottom: 1rem;">
                     
                              <a href=`+ `manage_videos.php?type=edit&id=` + id + `&vid=` + video_order+`class="btn btn-primary btn-sm">Edit</a>
                              <a href=`+ `?type=delete&id=` + id + `class="btn btn-danger btn-sm">Delete</a>
                           </div>
                        </div>
                     </div>
                     </div>`;
                    str += "<a target='_blank' href=" + response[i]['video_url'] + "><li class='list-group-item li-js'>" + response[i]['title'] + "</li></a>";


                }
                $("#result-box-jq").html(str);
                $("#all_vid").html(st);
                if (searched_term == '') {
                    
                    $("#result-box-jq").html('');
                    $("#result-box-jq").css("display", "none");
                }
            }else{
                $("#all_vid").html("<h3>Empty !</h3>");
                $("#all_vid").addClass("justify-content-center");

            }




            // var response=JSON.parse(result);
            // var str = "";
            // for(var i = 0; i< response.length; i++){
            //     str += "<a target='_blank' href="+response[i][1]+"><li class='list-group-item li-js'>"+response[i][0]+"</li></a>";


            // }
            // document.getElementById("result-box-js").innerHTML = str;


        }
    });

}