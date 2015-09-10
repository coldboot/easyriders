jQuery.noConflict();

jQuery(document).ready(function(){
	// activates lightbox page, if using a dark color scheme use another theme parameter
	my_lightbox("a[rel^='prettyPhoto']");
});
		
function my_lightbox($elements) {
	jQuery($elements).prettyPhoto({
		"theme": 'light_rounded' /* change theme by defining here. Other choices: light_rounded / dark_rounded / light_square / dark_square */																
	});
	
	jQuery($elements).each(function() {	
		var $image = jQuery(this).contents("img");
		$newclass = 'lightbox_video';
		
		if(jQuery(this).attr('href').match(/(jpg|gif|jpeg|png|tif)/)) $newclass = 'lightbox_image';
		
		if ($image.length > 0) {	
			if(jQuery.browser.msie &&  jQuery.browser.version < 7) jQuery(this).addClass('ie6_lightbox');
			
			var $bg = jQuery("<span class='"+$newclass+" ie6fix'></span>").appendTo(jQuery(this));
			
			jQuery(this).bind('mouseenter', function(){
				$height = $image.height();
				$width = $image.width();
				$pos =  $image.position();		
				$bg.css({height:$height, width:$width, top:$pos.top, left:$pos.left});
			});
		}
	});
	
	jQuery($elements).hover(function(){
		jQuery(this).children("img").stop().animate({opacity:0.5},400);
	},function(){
		jQuery(this).children("img").stop().animate({opacity:1},400);
	});
}