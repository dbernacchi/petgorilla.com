$(document).ready(function(){
	
	var right_wrap = $('#digital-right'),
		left_wrap = $('#digital-left'),
		drop = $('#digital-left-drop'),
		rt_drop = $('#digital-right-drop'),
		video_wrap = $('#digital-video-thumbs'),
		videos = video_wrap.find('li'),
		first = videos.first();
		
	get_box_detail(first);
	
	videos.each(function(){
		
		$(this).on('click', function(){
			
			get_box_detail($(this));
			var lt_box_dropped = drop.find('span');
			
			if(lt_box_dropped.length > 0){
				
			}
		});
	});
	
	function get_box_detail(obj){
		
		var lt_box = obj.find('#left-box').clone(),
			rt_box = obj.find('#right-box').clone(),
			sub_title = obj.find('#sub-title').html(),
			vid_lnk = obj.find('#vid-link'),
			bg_url = first.find('figure').css('background-image');
		
		drop.fadeOut(600, function(){
			
			drop.html(lt_box);
			
			lt_box.removeClass('screen-reader-text');
			lt_box.attr('id','left-box-dropped');
			
			drop.fadeIn(600);
		});
			
		rt_drop.fadeOut(600, function(){
			
			rt_drop.html(rt_box);
			
			rt_box.removeClass('screen-reader-text');
			rt_box.attr('id','right-box-dropped');
			
			rt_drop.fadeIn(600);
		});
		
		right_wrap.fadeOut(600, function(){
			right_wrap.attr('style','background-image:'+bg_url);
			right_wrap.fadeIn(600);
		});
		
		
		
	}
/*
	$.get(window._src + "?album=" + window._albumID, function(arr){
		
		$(arr).each(function(i){
			
			var vid = $(this)[0],
				item = $('<li><figure style="background-image: url(' + vid.posters.medium.link + ')"><span class="screen-reader-text">' + vid.title + '</span></figure></li>');
				
			if(i === 0){
				
				var vid_frame = document.createElement("iframe"),
					query = "player-" + vid.id + "-" + Math.round(1E3 * Math.random()),
					attrs = {
						id : query,
						src : "//player.vimeo.com/video/" + img.id + "?api=1&amp;player_id=" + query,
						width : w,
						height : dialogHeight,
						frameborder : 0,
						allowfullscreen : "allowfullscreen"
					},
					attr;
					
				for (attr in attrs) {
					vid_frame.setAttribute(attr, attrs[attr]);
				}
				
				video_wrap.append(vid_frame);

			}
			
			$(item).appendTo(thumb_wrap);
		});
		
	}, 'json')
	.fail(function(){
		console.log('fail');
	});
*/
	
/*
	function set_thumbs(arr){
		
		if(arr.)
	}
*/
	
/*
	$.ajax({
		url: window._src + "?album=" + window._albumID,
		beforeSend: function( xhr ) {
			xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
		},
		complete: function(){
			
		}
	})
	.done(function( data ) {
		if ( console && console.log ) {
			console.log( "Sample of data:", data.slice( 0, 100 ) );
		}
	});
*/
	
});