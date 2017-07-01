<?php
	
	$id 	= get_the_ID();
	$taxs 	= get_the_terms($id, 'digital_portfolio');
		
	if(count($taxs) === 1){
		
		$proj_id = (!empty($taxs[0]->term_id) ? $taxs[0]->term_id : '');
	

		$sql_arr = array( 
			'post_type' => 'digital_project',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'digital_portfolio',
					'field' => 'term_id',
					'terms' => $proj_id,
					'operator' => 'IN',
				)
			)
		);
		
		$sql = new WP_Query($sql_arr);
	
		$slides = $sql->get_posts();
	}
	
	?>
	<div class="director-video-thumbs-wrap">

	    <ul id="digital-video-thumbs" class="director-video-thumbs">
		    <?php
			
			if(!empty($slides)){
				$i = 1;
				foreach($slides as $slide){
					
					$lft_content 	= get_post_meta( $slide->ID, "_project_left_content", true);
					$rt_content 	= get_post_meta( $slide->ID, "_project_right_content", true);
					$subtitle 	= get_post_meta( $slide->ID, "_project_subtitle", true);
					$vidlink 	= get_post_meta( $slide->ID, "_project_video_link", true);
					
					$slide_title = get_the_title( $slide->ID );
					$img_url = get_the_post_thumbnail_url($slide->ID, 'full');
				    ?>
						<li id="<?php echo $slide->ID ?>" class="col-xs-12 <?php echo ($i === 1 ? 'active' : ($i === 2 ? 'next' : '') ) ?>" data-link="<?php echo $vidlink ?>">
							
							<figure style="background-image:url(<?php echo $img_url ?>)">
								<span id="title" class="screen-reader-text"><?php echo $slide_title ?></span>
								<span id="left-box" class="screen-reader-text"><?php echo htmlspecialchars_decode($lft_content) ?></span>
								<span id="vid-link" class="screen-reader-text"><?php echo $vidlink ?></span>
							</figure>						
						</li>
						<?php
						
						$lft_content = NULL;
						$rt_content = NULL;
						$subtitle = NULL;
						$vidlink = NULL;
						$i++;
				}
			}
				?>
			    
	    </ul>
	
	</div>