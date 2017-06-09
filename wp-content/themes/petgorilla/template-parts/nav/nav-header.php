<?php 
	$args = array(
		'menu_class' => 'header-nav-menu clearfix',
		'theme_location' => 'primary',
		'container' => 'div',
		'container_class' => 'header-nav-wrap',
		'container_id' => 'header-nav-wrap',
		'walker' => new PetG_Header_Menu_Walker()
	);
	
	wp_nav_menu($args); 
	$arg = NULL;
?>