$(document).ready(function(){
	
	var thumb_wrap = $('#director-video-thumbs'),
		video_wrap = $('#director-video-wrap');
	
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