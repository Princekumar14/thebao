

$(document).on("ready",function(){

    "use strict";

    [].slice.call(document.querySelectorAll('select.cs-select')).forEach(function (el) {
        new SelectFx(el);
    });

    $('.selectpicker').selectpicker;

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

    // $('.equal-height').matchHeight({
    //     property: 'max-height'
    // });

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






// document.addEventListener('keydown', function(event) {
//     console.log('Pressed key:', event.key);
//   });


var chosen;
$('#autocompleteJS').on('input', function() {
    chosen = "";
  });
$('#autocompleteJS').on('keydown',function(e){ // 38-up, 40-down
    function blank(){
        document.getElementById("result-box-js").innerHTML = "";
    }
    
    
    if (e.key == 'ArrowDown') { 
        if(chosen === "") {
            chosen = 0;
        } else if((chosen+1) < $('.li-js').length) {
            chosen++; 
        }else{
            chosen = 0;
        }
        $('.li-js').removeClass('active');
        $('.li-js:eq('+chosen+')').addClass('active');
        var result = $('.li-js:eq('+chosen+')').text();
        $('#autocompleteJS').val(result);  
        return false;
    } 
    if (e.key == 'ArrowUp') { 
        if(chosen === "") {
            chosen = 0;
        } else if(chosen > 0) {
            chosen--;            
        }else{
            chosen = 0;
        }
        $('.li-js').removeClass('active');
        $('.li-js:eq('+chosen+')').addClass('active');
        var result = $('.li-js:eq('+chosen+')').text();
        $('#autocompleteJS').val(result);  
        return false;
    }
    if (e.key == 'Enter') {
        e.preventDefault();
        var searched_terms = $('#autocompleteJS').val();
        jsAutocomplete(searched_terms);
        setTimeout(blank, 10);
        
    }

});


function jsAutocomplete(x) {

    
    var searched_term = x;
    var loader = `<div class="d-flex justify-content-center"><div class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
  </div></div>`;
  document.getElementById("all_vid").innerHTML = loader;

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("all_vid").innerHTML = "";
            var response = JSON.parse(this.responseText);
            // console.log(this.responseText, "hi", (JSON.parse(this.responseText)).length);

            document.getElementById("result-box-js").innerHTML = "";
            // document.getElementById("all_vid").innerHTML = "";
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
                     
                           <a class="btn btn-primary btn-sm" href="manage_videos.php?type=edit&id=`+id+`&vid=`+video_order+`" >Edit</a>
                              
                           <a href="?type=delete&id=` + id + `" class="btn btn-danger btn-sm">Delete</a>
                           </div>
                        </div>
                     </div>
                     </div>`;


                }
                $('#autocompleteJS').on('keydown',function(e){ 
                    if (e.key == 'Enter') {
                        e.preventDefault();
                        str='';
                        
                    }
                });
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
                     
                              <a class="btn btn-primary btn-sm" href="manage_videos.php?type=edit&id=`+id+`&vid=`+video_order+`" >Edit</a>
                              
                              <a href="?type=delete&id=` + id + `" class="btn btn-danger btn-sm">Delete</a>
                           </div>
                        </div>
                     </div>
                     </div>`;


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


// const imageInput = document.getElementById('thumb_image');
// const previewImage = document.getElementById('previewImage');
// const previewImageBox = document.getElementById('previewImageBox');
// function previewSelectedImage() {
//     previewImageBox.style.display = "block";
//     const file = imageInput.files[0];
//     if (file) {
//         const reader = new FileReader();
//         reader.readAsDataURL(file);
//         reader.onload = function(e) {
//             previewImage.src = e.target.result;
//         }
//     }
// }
// imageInput.addEventListener('change', previewSelectedImage);


// const close = document.getElementById('close');

// function removeImage() {
//     $('#thumb_image').val(''); 
//     previewImage.src = "";
//     previewImageBox.style.display = "none";
    
// }

// close.addEventListener('click', removeImage);



var str = ``;
function save_job(){
    var job_title = $("#job_title_input").val();
    var skills = $("#skills_input").val();
    var salary = $('#salary').val();

    $.ajax({
        url: 'save_job.php',
        type: 'post',
        data: '&job_title=' + job_title + '&skills=' + skills + '&salary=' + salary ,
        success: function (result) {
            // console.log(result, "prince bhai")
            if(result){

                $('#form_finish').removeClass("d-none");
            //     str= `<div class="form-card">
            //     <div class="row">
            //         <div class="col-7">
            //             <h2 class="fs-title">Finish:</h2>
            //         </div>
            //     </div> <br><br>
            //     <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
            //     <div class="row justify-content-center">
            //         <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
            //     </div> <br><br>
            //     <div class="row justify-content-center">
            //         <div class="col-7 text-center">
            //             <h5 class="purple-text text-center">New Job Added</h5>
            //         </div>
            //     </div>
            // </div>`;

            }
        

        }
    });
    // $('#fileupload').html(str);




}



