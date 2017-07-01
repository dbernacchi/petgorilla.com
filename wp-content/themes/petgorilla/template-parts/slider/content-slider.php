<?php
	
	$id = get_the_ID();
	$taxs = get_the_terms($id, 'slider');
	
	if(count($taxs) === 1){
		
		$slider_id = $taxs[0]->term_id;
	}

	$sql_arr = array( 
		'post_type' => 'slide',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'slider',
				'field' => 'term_id',
				'terms' => $slider_id,
				'operator' => 'IN',
			)
		)
	);
	
	$sql = new WP_Query($sql_arr);

	$slides = $sql->get_posts();
	
	?>

	<div id="site-slider-wrap" class="site-slider-wrap">
		
	<?php
	$i = 1;
	foreach($slides as $slide){
		
		$slide_title = get_the_title( $slide->ID );
		$slide_subtitle = get_post_meta( $slide->ID, '_slide_subtitle', true );
		$slide_type = get_post_meta( $slide->ID, '_slide_type', true );
		$slide_link = get_post_meta( $slide->ID, '_slide_link', true );
		$img_url = get_the_post_thumbnail_url($slide->ID, 'full');
		
		?>
		<section id="<?php echo $slide->ID ?>" class="site-slide-single <?php echo ($i === 1 ? 'active' : ($i === 2 ? 'next' : '') ) ?>">
			
			<div class="slider-title">
				<h1><?php echo $slide_title ?></h1>
				<h2><?php echo $slide_subtitle ?></h2>
				<a class="pop-video" href="<?php echo $slide_link ?>" rel="<?php echo $slide_type ?>" data-id="<?php echo $slide->ID ?>" data-type="<?php echo $slide_type ?>">VIEW</a>
			</div>
			<span class="slide-overlay"></span>
			<div class="slide-background" style="background-image:url(<?php echo $img_url ?>);">
<!-- 					<img src="<?php echo $img_url ?>"> -->
			</div>
			
		</section>
		<?php
		
		$slide_subtitle = NULL;
		$slide_type = NULL;
		$slide_link = NULL;
		$img_url = NULL;
		$i++;
	}
	?>
	</div>