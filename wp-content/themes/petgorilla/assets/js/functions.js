var $ = jQuery.noConflict();
$(document).ready(function(){
	
	var winHt = parseInt($(window).height()),
		winWt = parseInt($(window).width());
	
	var siteload,
		slide_timer,
		slide_timer_paused = false,
		slide_count,
		timer_count = 0,
		site = $('#site'),
		site_slider_contain = $('#site-slider-contain'),
		site_slider_wrap = $('#site-slider-wrap'),
		site_content_contain = $('#site-content-contain'),
		site_content = $('#site-content');
		
	var mobile_toggle = $('#mobile-nav'),
		site_header = $('#site-header');
		
	var interval = setInterval(function() {
		
	    if(document.readyState === 'complete') {
		    
	        clearInterval(interval);
	        pageInit();
	    }    
	}, 100);
	
	var pageInit = function(){
		
		var slides = site_slider_wrap.find('.site-slide-single');
		
		if(slides.length > 0){
			
			set_hover_pause();
			
			siteload = setTimeout(function(){
				
				slide_count = parseInt(slides.length-1);
				
				if(winWt > 768 && site_slider_wrap.length > 0){
					
					slides.each(function(i){
					
						$(this).css({
							width: winWt,
							height: winHt
						});
						
					});
				
				}
			
				site_slider_wrap
					.appendTo(site_slider_contain)
					.delay(700)
					.fadeIn(700, function(){
						
						if(winWt > 768 && site_slider_wrap.length > 0) 
							start_sliders();
							$('a.pop-video').pop_video();						
					});
			
				clearTimeout(siteload);
				
			}, 1000);	
		}
	};
	
	mobile_toggle.on('click focus', function(){
		site_header.toggleClass('open-mobile');
		
		if(mobile_toggle.hasClass('fa-bars')){
			mobile_toggle.removeClass('fa-bars');
			mobile_toggle.addClass('fa-times');
		}else{
			mobile_toggle.removeClass('fa-times');
			mobile_toggle.addClass('fa-bars');
		}
	});
	

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
		
		run_slide_interval();
		
		function run_slide_interval(){
			
			slide_timer = setInterval(function(){
				
				if(!slide_timer_paused){
				
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
				}
				
			}, 6000);
		}

	}
	
	function set_hover_pause(obj){
		
		var xlft = parseFloat(winWt*.3),
			xrt = parseFloat(winWt*.7),
			ytop = parseFloat(winHt*.35)
			ybot = parseFloat(winHt*.65);
			
		$(window).mousemove(function(event){
			
			if(event.pageX > xlft && event.pageX < xrt && event.pageY > ytop && event.pageY < ybot){
				slide_timer_paused = true;
			}else{
				slide_timer_paused = false;
			}
		});
	}
	
	var handleTemplate = function(name){
		var template = $(name);
		return template.html();
	};
	
	$.fn.pop_video = function(){
		
		return $(this).on('click', function(event){
			
			event.preventDefault();
			
			var template = handleTemplate('#template-modal-video'),
				template = $(template);
				
			var template_body = template.find('#modal-body');
			
			var lnk = $(this),
				href = lnk.attr('href')
				id = lnk.data('id'),
				type = lnk.data('type');
				
			var query = "player-" + id + "-" + Math.round(1E3 * Math.random()),
				player_lnk = (type === 'vimeo' ? href+'&api=1&player_id=' + query : href);
			
			var vid_frame = document.createElement("iframe"),
				attrs = {
					id : query,
					src : href+'&api=1&player_id=' + query,
					width : 640,
					height : 360,
					frameborder : 0,
					allowfullscreen : "allowfullscreen"
				}, attr;
				
			for (attr in attrs) {
				vid_frame.setAttribute(attr, attrs[attr]);
			}
			
			template_body.append(vid_frame);
					
			$('body').append(template);
			
			template.on('show.bs.modal', function (e) {
				slide_timer_paused = true;
			});
			
			template.on('hidden.bs.modal', function (e) {
				slide_timer_paused = false;
				template.remove();
			});
			
			template.modal({
				backdrop: 'static',
				keyboard: true,
				show: true
			});
			
		});
	}
	
	
});



