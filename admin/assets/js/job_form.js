$(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    
    setProgressBar(current);
    
    $(".next").on('click', function(){
        // var inpTag = ((($(this).prev()).children()).last());
        var inpTag = ($(this).prev()).children('input');
        var inpTagPlaceholder = inpTag.attr('placeholder');
        var inpVal = inpTag.val();
        
        if( inpVal != ''){
            inpTag.next().remove();
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            
            //Adding Active Class
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            
            //showing next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
    
            // making fielset appear animation
            opacity = 1 - now;
            
            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
            },
            duration: 500
            });
            setProgressBar(++current);

        }else{
            inpTag.next().remove(); 
            str= `<small class="text-danger error">Please enter `+inpTagPlaceholder+`.</small>`;
            inpTag.after(str)
               
        }

    });
    
    $(".previous").click(function(){
    
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        
        //Removing active class
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        
        //show the previous fieldset
        previous_fs.show();
        
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;
        
        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        previous_fs.css({'opacity': opacity});
        },
        duration: 500
        });
        setProgressBar(--current);
    });
    
    function setProgressBar(curStep){
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
        .css("width",percent+"%")
    }
    
    $(".submit").click(function(){
        return false;
    })
    
});