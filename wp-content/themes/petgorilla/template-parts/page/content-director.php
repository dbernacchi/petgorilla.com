<?php
	
	$id 	= get_the_ID();
	$taxs 	= get_the_terms($id, 'slider');
	
	$id 	= get_the_id();
	$imgID 	= get_post_thumbnail_id( $id );
	$img 	= wp_get_attachment_url( $imgID );
	$spec 	= get_the_terms( $id, 'speciality');
	
	$vimID 	= get_post_meta($id, "_vimeo_id", true);
	
	?>
	<div class="directors">
		<div class="director-wrap">
	
	        <div id="director-video-wrap" class="director-video-wrap col-xs-12 col-md-6"></div>
	
	        <div class="director-bio col-xs-12 col-md-6" style="background-image: url(<?php echo $img ?>);">
		        	
	            <h1><?php esc_attr(the_title()); ?></h1>
	
	            <ul class="director-tags">
		            
		            <?php
			        if(!empty($spec)){ 
			            foreach($spec as $k => $v){
				            echo '<li>'.$v->name.'</li>';
			            }
			        }
			        ?>
	
	            </ul>
	        </div>
		</div>
	</div>
	<script>
		var _albumID = <?php echo $vimID ?>; 
		var _src = "<?php echo get_template_directory_uri() ?>/ajax/videos.php";
	</script>
	<?php
		
	wp_enqueue_script('petg-js-directors', get_template_directory_uri() . '/assets/js/directors.js', array( 'jquery' ), '20170531', true ); // Main Functions