<?php
	
	$id 	= get_the_ID();
	
	$imgID 	= get_post_thumbnail_id( $id );
	$img 	= wp_get_attachment_url( $imgID );
	
	?>
	<div class="slide-static" id="slide-static" style="background-image:url(<?php echo $img ?>);">
		
	</div>
