jQuery(document).ready(function(){
	
	jQuery('.pictures_description_container').hide();
	
	jQuery('.picture_source').mouseover(function(){
		
		var cur_el = jQuery(this);
		
		// if (!jQuery(this).siblings('.pictures_description_container').is(':animated')) {
		
			cur_el.siblings('.pictures_description_container').slideDown();
		
		// }
		
		/*cur_el.siblings('.pictures_flare').animate({'left':'125px','opacity':'1'},200,'linear',function(){
		
			cur_el.siblings('.pictures_flare').animate({'left':'300px','opacity':'0'},200,'linear',function(){
				
				cur_el.siblings('.pictures_flare').css('left','-50px');
				
			});
		
		});*/
		
	});
	
	jQuery('.picture_source').mouseout(function(){		
		
		jQuery(this).siblings('.pictures_description_container').slideUp();
		
	});
	
});