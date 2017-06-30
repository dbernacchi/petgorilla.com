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
		site_content = $('#site-content'),
		slides = site_slider_wrap.find('.site-slide-single');
		
	var mobile_toggle = $('#mobile-nav'),
		desktop_toggle = $('#desktop-nav'),
		site_header = $('#site-header');
		
	var interval = setInterval(function() {
		
	    if(document.readyState === 'complete') {
		    
	        clearInterval(interval);
	        pageInit();
	    }    
	}, 100);
	
	var pageInit = function(){
				
		if(slides.length > 0){
			
			site_slider_wrap
				.appendTo(site_slider_contain);
			
			siteload = setTimeout(function(){
				
				slide_count = parseInt(slides.length-1);
				
				if(winWt > 768 && site_slider_wrap.length > 0){
					
					set_slide_sizes(slides);
				
				}
			
				site_slider_wrap
					.fadeIn(700, function(){
						
						set_hover_pause();
						
						if(winWt > 768 && site_slider_wrap.length > 0) 
							start_sliders();
							$('a.pop-video').pop_video();						
					});
			
				clearTimeout(siteload);
				
			}, 2000);	
			
		}
		bind_links_to_desktop_nav();
	};
	
	$(window).resize(function(){
		
		slide_timer_paused = false;
		
		clearInterval(slide_timer);
		
		var wait = setTimeout(function(){
			
			winHt = parseInt($(window).height()),
			winWt = parseInt($(window).width());
			
			if(slides.length > 0){
				set_slide_sizes(slides, true);
			}
			
			if(winWt >= 768){
				start_sliders();
			}
			
			clearTimeout(wait);
			
		}, 700);
		
		bind_links_to_desktop_nav();

	});
	

	
	function open_desktop_nav(link, event){
		
		var exist_lnk = $('li.menu-item.activate'), 
			exist_lnk_len = exist_lnk.length,
			is_close_icon = (typeof link === 'undefined' ? true : false),
			parent = (is_close_icon && exist_lnk_len > 0 ? exist_lnk : link.closest('li'));
			
			
			console.log(parent)
		if(parent.hasClass('menu-item-has-children')){
			
			if(typeof event != 'undefined'){
				event.preventDefault();
			}
			
			if(!is_close_icon && parent != exist_lnk){
				
				parent.toggleClass('activate');
				exist_lnk.toggleClass('activate');
				
				if(!site_header.hasClass('open-desktop')){
					site_header.toggleClass('open-desktop');
				}
				
			}else{
				
				site_header.toggleClass('open-desktop');
				parent.toggleClass('activate');
			}
			
		}else{
			
			 var href = link.attr('href'),
			 	 anchor = href.substring(href.indexOf("#")+1);
			
			site_header.toggleClass('open-desktop');
			parent.toggleClass('activate');

			if(anchor.length > 1 && parent.hasClass('active')){
				
				var tag = $('body').find('a[id="'+anchor+'"]'),
					scrollPos = tag.scrollTop();
				
				site_content_contain.scrollTo(0, scrollPos);
		
			}
			
		}

	}
	
	desktop_toggle.bind('click', function(event){
					
			open_desktop_nav();
			
		});
	
	function bind_links_to_desktop_nav(){
		
		var navlnks = $('a.topmenu-link, a.submenu-link');

		navlnks.off('click');
		
		navlnks.on('click', function(event){
			
			var $this = $(this);
	console.log(winWt)
			if(winWt >= 768){
				
				open_desktop_nav($this, event);
				
				
			}else{
				
/*
				if(anchor.length > 1 && parent.hasClass('active')){
				
					var tag = $('body').find('a[id="'+anchor+'"]'),
						scrollPos = tag.scrollTop();
					
					site_content_contain.scrollTo(0, scrollPos);
			
				}
*/
/*
				console.log('toggle');
				toggle_mobile_menu();
*/
				
			}
		});
	}
	
	mobile_toggle.on('click focus', function(){
		toggle_mobile_menu();
	});
		
	
	function toggle_mobile_menu(){

		site_header.toggleClass('open-mobile');
		
		if(mobile_toggle.hasClass('fa-bars')){
			mobile_toggle.removeClass('fa-bars');
			mobile_toggle.addClass('fa-times');
		}else{
			mobile_toggle.removeClass('fa-times');
			mobile_toggle.addClass('fa-bars');
		}
	}
	
	

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
	
	function reset_slider(){
		
		site_slider_wrap.animate({
			left: '0px'
		});
		
		slides.each(function(i){
			
			if(i === 0)
				$(this).addClass('active');
				
			if(i === 1)
				$(this).addClass('next');
				
			var slide_title = $(this).find('.slider-title');
			
			if(winWt <= 768){
				
				slide_title.attr('style','');	
							
			}else{
							
				slide_title.css({
					opacity: 0,
					top: '80%'
				});
				
			}
		});
	}
	
	function set_slide_sizes(slides, reset){
		
		var set_slides = function(callback){
			
			slides.each(function(i){
					
				$(this).css({
					width: winWt,
					height: winHt
				});
				
				if(slide_count >= i && typeof callback === 'function'){
					callback();
				}
				
			});
		}
		
		if(typeof reset === 'boolean' && reset){
	
			site_slider_contain.fadeOut(300, function(){
				
				set_slides(function(){
					
					site_slider_contain.fadeIn(300, function(){
						
						reset_slider();
						
					});
				});
			});
		}else{
			
			set_slides();
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
					style : 'embed-responsive-item',
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



