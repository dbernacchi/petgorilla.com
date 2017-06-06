<?php
	
	$id 	= get_the_ID();
	$taxs 	= get_the_terms($id, 'slider');
	
	$imgID 	= get_post_thumbnail_id( $id );
	$img 	= wp_get_attachment_url( $imgID );
	$spec 	= get_the_terms( $id, 'speciality');
	
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
	<?php
		
	