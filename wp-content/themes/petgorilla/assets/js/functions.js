var $ = jQuery.noConflict();
$(document).ready(function(){
	
	var winHt = parseInt($(window).height()),
		winWt = parseInt($(window).width());
	
	var siteload,
		slide_timer,
		slide_count,
		timer_count = 0,
		first_slider_load = true,
		site = $('#site'),
		site_slider_contain = $('#site-slider-contain'),
		site_slider_wrap = $('#site-slider-wrap'),
		site_content_contain = $('#site-content-contain'),
		site_content = $('#site-content');
		
	var interval = setInterval(function() {
		
	    if(document.readyState === 'complete') {
		    
	        clearInterval(interval);
	        pageInit();
	    }    
	}, 100);
	
	var pageInit = function(){
		
		var slides = site_slider_wrap.find('.site-slide-single');
		
		if(slides.length > 0){
			
			siteload = setTimeout(function(){
				
				slide_count = parseInt(slides.length-1);
				
				slides.each(function(i){
					
					$(this).css({
						width: winWt,
						height: winHt
					});
					
				});
			
				site_slider_wrap
					.appendTo(site_slider_contain)
					.delay(700)
					.fadeIn(700, function(){
						
						if(winWt > 768 && site_slider_wrap.length > 0) 
							start_sliders();
						
					});
			
				clearTimeout(siteload);
				
			}, 1000);	
		}
	};
	
	function start_sliders(){
		
		var move_slider_forward = function(callback){
			
			site_slider_wrap.animate({
				
				left:'-='+winWt
				
			}, 700, function(){
				
				if(typeof callback == 'function'){
					callback();
				}
				
			});
		}
		
		var move_slider_back = function(callback){
			
			site_slider_wrap.animate({
				
				left:'0px'
				
			}, 700, function(){
				
				if(typeof callback == 'function'){
					callback();
				}
				
			});
		}
		
		var slide_title_in = function(obja, callback){
			
			var title = obja.find('.slider-title');
		
			title.animate({
				
				opacity:1,
				top:'50%'
				
			}, 400, function(){
				
				if(typeof callback == 'function'){
					callback();
				}
			});
			
		}
		
		var slide_title_out = function(objb, callback){
			
			var title = objb.find('.slider-title');
						
			
			title.animate({
				
				opacity:0
				
			}, 600, function(){
				
				title.css({
				
					top: '80%'
					
				});
				
				if(typeof callback == 'function'){
					
					callback();
				}
				
			});
		}
		
		var prev_slide = site_slider_wrap.find('section:eq(0)'),
			next_slide = site_slider_wrap.find('section:eq(1)');
						
		slide_title_in(prev_slide);
		
		var slide_timer = setInterval(function(){
			
			slide_title_out(prev_slide, function(){
				
				if(slide_count > timer_count){
				
					move_slider_forward(function(){
						
						slide_title_in(next_slide, function(){
							
							timer_count++;
							
							prev_slide = site_slider_wrap.find('section:eq('+timer_count+')');
							next_slide = site_slider_wrap.find('section:eq('+(timer_count === slide_count ? 0 : timer_count+1)+')');
														
						});
					});
					
				}else{
					
					move_slider_back(function(){
						
						slide_title_in(next_slide, function(){
							
							prev_slide = site_slider_wrap.find('section:eq(0)');

							timer_count = 0;
							next_slide = site_slider_wrap.find('section:eq(1)');
							
						});
					});
				}
			});

			// Marks slider as already in process.  
			first_slider_load = false;
			
		}, 6000);

	}
	
});