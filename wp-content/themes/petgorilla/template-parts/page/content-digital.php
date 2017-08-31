<?php

	$id 	= get_the_ID();



	$imgID 	= get_post_thumbnail_id( $id );
	$img 	= wp_get_attachment_url( $imgID );
	$spec 	= get_the_terms( $id, 'speciality');


	?>
	<div class="directors">
		<div class="director-wrap clearfix">

			<div id="digital-right" class="digital-right col-xs-12 col-md-6" style="background-image: url(<?php //echo $img ?>);">
		    	<h1 style="display:none;"></h1>
	             <div id="digital-right-drop" class="digital-right-drop"></div>
	        </div>

	        <div class="digital-left col-xs-12 col-md-6">
		        <div class="digital-inner">

			        <h1><?php esc_attr(the_title()); ?></h1>

		            <ul id="director-tags" class="director-tags">

			            <?php
				        if(!empty($spec)){
				            foreach($spec as $k => $v){
					            echo '<li>'.$v->name.'</li>';
				            }
				        }
				        ?>

		            </ul>
			        <div id="digital-left-drop" class="digital-left-drop"></div>
		        </div>
	        </div>


		</div>
	</div>

	<?php

	wp_enqueue_script('petg-js-digital', get_template_directory_uri() . '/assets/js/vimeo.js', array( 'jquery' ), '20170531', true ); // Main Functions
