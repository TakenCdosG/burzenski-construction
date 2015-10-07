$(document).ready(function(){
    settings();
    jshowoff();
    bgOrder();
    searchField();
    custom_page();
    login_custom();
    newsletter();
    //jQuery('.menu li').eq(1).find('a').html('QuickBooks <span style="font-size: 11px;"><sup>&reg;</sup></span>');
    jQuery('.page-node-516 h1.basic_page').html('QuickBooks<sup>&reg;</sup> Services');
});//end document ready 


function jshowoff(){
    $('#slidingHomeFirstContent').jshowoff({
        effect: 'fade',
        controls: false,
        hoverPause: false,
        speed : 6000
    }); 
    
    //-> slidingHomeSecondContent
    $('#slidingHomeSecondContent').jshowoff({
        effect: 'fade',
        controls: false,
        hoverPause: false,
        speed : 6000
    }); 
    
    //-> slidingHomeThirdContent
    $('#slidingHomeThirdContent').jshowoff({
        effect: 'fade',
        controls: false,
        hoverPause: false,
        speed : 6000
    }); 
    
    //-> slidingHomeQuarterContent
    $('#slidingHomeQuarterContent').jshowoff({
        effect: 'fade',
        controls: false,
        hoverPause: false,
        speed : 6000
    });
    
    //-> slidingHomeFifthContent
    $('#slidingHomeFifthContent').jshowoff({
        effect: 'fade',
        controls: false,
        hoverPause: false,
        speed : 6000
    });
}
                    

// Set various settings
function settings(){
    if(jQuery('#menu-left-internal').length>0){
        $('#block-system-main').css({
            'padding': '0px 24px'
        });
        $('#block-system-main').removeClass('sdf_x').addClass('sdf');
    }else{
		$('#block-system-main').removeClass('sdf').addClass('sdf_x');	
	}
}


// This function set the order for the home background image
function bgOrder(){
    // Only create the cookie if the user is on the publication listing page
    if($('img#home-bg-img').length>0){
        // Image
        var img = $('img#home-bg-img');
        // Get the number of images
        var cookieNum = img.attr('data-num');
        // Check if the cookie is created
        if($.cookie('bg_home') == null){
            // Create the cookie
            $.cookie('bg_home', '0', {
                path: '/'
            });
            // Make the post to get the url of the background image
            jQuery.ajax({
                type: 'POST',
                url: '/admin/bg-home',
                data: {
                    num: 0
                },
                success: function(data){
                    // Set the home background image
                    img.attr('src', data);
                }
            });
        }else{
            // Get the next number
            var num = parseInt($.cookie('bg_home'))+1;
            // Set the value to the cookie to 0 if num if bigger than 5
            if(num>cookieNum) $.cookie('bg_home', '0', {
                path: '/'
            });
            else $.cookie('bg_home', num, {
                path: '/'
            });
            // Make the post to get the url of the background image 
            jQuery.ajax({
                type: 'POST',
                url: '/admin/bg-home',
                data: {
                    num: $.cookie('bg_home')
                },
                success: function(data){
                    // Set the home background image
                    img.attr('src', data);
                }
            });
        }
    }
}

function  contact_us(){ 
    if ($('#contactflag').size()) {
        var t=setTimeout(function(){
            var map="";
            map=initialize();
            $("#p_get_direction").click(function(event) {
                event.preventDefault();
            });
        },180)
 
    }
}


function searchField(){
    if ($('#mce-EMAIL').size()) {
        $('#mce-EMAIL').val("Newsletter Signup");
	
        $('#mce-EMAIL').focus(function(){
            $('#mce-EMAIL').val("");
        });

        $('#mce-EMAIL').blur(function(){                
            if(jQuery.trim($(this).val()) == ''){
                $('#mce-EMAIL').val("Newsletter Signup");                
            }
        });
    }
			
}


function login_custom(){
    if ($('#trUname').size()) {
        $('#trUname').val("Username");
	
        $('#trUname').focus(function(){
            $('#trUname').val("");
        });

        $('#trUname').blur(function(){                
            if(jQuery.trim($(this).val()) == ''){
                $('#trUname').val("Username");                
            }
        });
    }
	
    if ($('#edit-pass-asterisks').size()) {
        $('#edit-pass-asterisks').val("Password");
        $("#edit-pass-asterisks").attr("val",'');	   
	
        $('#edit-pass-asterisks').focus(function(){
            $('#edit-pass-asterisks').val("");
            $("#edit-pass-asterisks").attr("val",'');
        });

        $('#edit-pass-asterisks').blur(function(){                
            if(jQuery.trim($(this).val()) == ''){
                $('#edit-pass-asterisks').val("Password");
                $("#edit-pass-asterisks").attr("val",'');                
            }
        });
    }

    $("#edit-pass-asterisks").keypress(function(event) {
        var valuekey = event.charCode;
        ako = String.fromCharCode(event.which);
        buffer=$("#edit-pass-asterisks").attr("val")+ako;
        input=$("#edit-pass-asterisks").val()+ako;
        $("#edit-pass-asterisks").attr("val",buffer); 
        $("#trPwd").val(buffer);   
        asterisks = buffer.replace(/./g,"*");
        console.log("Buffer " + buffer + " asterisks " + asterisks);	 
        $("#edit-pass-asterisks").val(asterisks);
    });
	
	
    $('#edit-pass-asterisks').keyup(function() {

	
		
        if (event.keyCode == 8){
            length = $("#edit-pass-asterisks").val().length;
            pass = $("#edit-pass-asterisks").attr("val").substring(0,length);
            $("#edit-pass-asterisks").attr("val",pass);
            $("#trPwd").val(pass);
        }else{
            delay(function(){
                buffer = $("#trPwd").val();    
                asterisks = buffer.replace(/./g,"*");
                $("#edit-pass-asterisks").val(asterisks);
            }, 1 );
        }
    });


    var delay = (function(){ 
        var timer = 0;
        return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        };
    })();
		
 
}

function custom_page(){ 
    if (($('#home-tabs-right #widget_internal_right_container').size() || $('#home-tabs #home-center #block-system-main .internal').size() )  && $("#home-tabs-left").size()) {
	
        if(jQuery.browser.version != '7.0') 
        {
            $('#home-tabs #home-center #block-system-main .internal').width("731px");
        }
        
    }
	
    else{ 
        $('#home-tabs #home-center #block-system-main .internal').width("920px");
    }
}


function newsletter(){
    $('#mc-embedded-subscribe').click(function() {
        $('#mc-embedded-subscribe-form').submit();
    });
}
