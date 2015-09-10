// JavaScript Document
//facebox
jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loading_image : 'loading.gif',
        close_image   : 'closelabel.gif'
      });
});

//messages
$(document).ready(function () {
$("#ajax_error").css("display","none");
var $div = $('#support_message, #vote_check');
var height = $div.height();
$div.hide().css({ height : 0 });

        if ($div.is(':visible')) {
            $div.animate({ height: 0 }, { duration: 1500, complete: function () {
                $div.hide();
            } });
        } else {
            $div.show().animate({ height : height }, { duration: 1500 });
        }
        
        return false;
});


//show & hide rev settings

var url = "list.php";
$(document).ready(function () {
$("#rev_set_line").click(function(){
if ($("#hide_sett").is(':visible')) {
$.cookie("proxyshop_revsett_hide", "1", { expires: 31 });
$("#hide_sett").hide();
$("#collapse_img").html('<div style="float:right;"><img src="images/show.gif"></div>');
} else {
$.cookie("proxyshop_revsett_hide", "0", { expires: 31 });
$("#hide_sett").show();
$("#collapse_img").html('<div style="float:right;"><img src="images/hide.gif"></div>');
}
return false;
});
});

$(document).ready(function () {
$("#rev_set_line input").click(function() {
this.select();
});
});

/*
$(document).ready(function () {
$("#search_tab").click(function(){
if ($("#search_hide").is(':visible')) {
$.cookie("proxyshop_search_hide", "0", { expires: 31 });
$("#search_hide").slideUp();
$("#collapse_search").html('<img src="images/show.png">');
$(location).attr('href',url);
} else {
$.cookie("proxyshop_search_hide", "1", { expires: 31 });
$("#search_hide").slideDown();
$("#collapse_search").html('<img src="images/hide.png">');
}
});
});

$(document).ready(function () {
$("#history_tab").click(function(){
$("#search_tab").show();
if ($("#history_hide").is(':visible')) {
$("#whole_hide").slideDown();
$.cookie("proxyshop_history_hide", "0", { expires: 31 });
$("#history_hide").slideUp();
$("#collapse_history").html('<img src="images/show.png">');  
$(location).attr('href',url);
} else {
$.cookie("proxyshop_history_hide", "1", { expires: 31 });
$("#history_hide").slideDown();
$("#whole_hide, #search_tab, #search_hide").hide();
$("#collapse_history").html('<img src="images/hide.png">');
}
});
});
*/

//socks list
$(document).ready(function () {
var list = "list.php";
var search = "list.php?search";
var history = "list.php?history";

$("#list_click").click(function(){
$(location).attr('href',list);
});
$("#search_click").click(function(){
$(location).attr('href',search);
});
$("#history_click").click(function(){
$(location).attr('href',history);
});

//repair IE shit.
$("input[name=sub_tabs]").bind($.browser.msie? 'propertychange': 'change', function(e) {
e.preventDefault();
//$("input[name=sub_tabs]").change(function () {
if ($(this).val() ==1) {
$(location).attr('href',list);
}

if ($(this).val() ==2) {
$(location).attr('href',search);
}

if ($(this).val() ==3) {
$(location).attr('href',history);
}

});
});

//rev list
$(document).ready(function () {
var list_c = "list_c.php";
var search_c = "list_c.php?search";
var history_c = "list_c.php?history";

$("#list_click_c").click(function(){
$(location).attr('href',list_c);
});
$("#search_click_c").click(function(){
$(location).attr('href',search_c);
});
$("#history_click_c").click(function(){
$(location).attr('href',history_c);
});

//repair IE shit.
$("input[name=sub_tabs_c]").bind($.browser.msie? 'propertychange': 'change', function(e) {
e.preventDefault();
//$("input[name=sub_tabs_c]").change(function () {
if ($(this).val() ==1) {
$(location).attr('href',list_c);
}

if ($(this).val() ==2) {
$(location).attr('href',search_c);
}

if ($(this).val() ==3) {
$(location).attr('href',history_c);
}

});
});
//history
$(document).ready(function () {
$("a[href=#revh_button]").click(function(event) {
$(".active_rev").hide();
	event.preventDefault();
	var id = this.rel.replace('revh_', "");
	
	$.ajax({ url: 'list_c.php?put='+id,
    success: function(data) {
    $("#revh"+id).addClass("active_rev");
	$("#revh"+id).show();
    },
    error: function(data) {
    alert("Looks like we can\'t handle your request at the moment please try again later!");
    }
   });
});
});




;(function($){

	$.fn.mask = function(label){
		
		this.unmask();
		
		if(this.css("position") == "static") {
			this.addClass("masked-relative");
		}
		
		this.addClass("masked");
		
		var maskDiv = $('<div class="loadmask"></div>');
		
		//auto height fix for IE
		if(navigator.userAgent.toLowerCase().indexOf("msie") > -1){
			maskDiv.height(this.height() + parseInt(this.css("padding-top")) + parseInt(this.css("padding-bottom")));
			maskDiv.width(this.width() + parseInt(this.css("padding-left")) + parseInt(this.css("padding-right")));
		}
		
		//fix for z-index bug with selects in IE6
		if(navigator.userAgent.toLowerCase().indexOf("msie 6") > -1){
			this.find("select").addClass("masked-hidden");
		}
		
		this.append(maskDiv);
		
		if(typeof label == "string") {
			var maskMsgDiv = $('<div class="loadmask-msg" style="display:none;"></div>');
			maskMsgDiv.append('<div>' + label + '</div>');
			this.append(maskMsgDiv);
			
			//calculate center position
			maskMsgDiv.css("top", Math.round(this.height() / 2 - (maskMsgDiv.height() - parseInt(maskMsgDiv.css("padding-top")) - parseInt(maskMsgDiv.css("padding-bottom"))) / 2)+"px");
			maskMsgDiv.css("left", Math.round(this.width() / 2 - (maskMsgDiv.width() - parseInt(maskMsgDiv.css("padding-left")) - parseInt(maskMsgDiv.css("padding-right"))) / 2)+"px");
			
			maskMsgDiv.show();
		}
		
	};

	$.fn.unmask = function(label){
		this.find(".loadmask-msg,.loadmask").remove();
		this.removeClass("masked");
		this.removeClass("masked-relative");
		this.find("select").removeClass("masked-hidden");
	};
 
})(jQuery);

//jquery cooking engine.
jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') {
        options = options || {};
        if (value === null) {
            value = '';
            options = $.extend({}, options);
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString();
        }
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { 
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};