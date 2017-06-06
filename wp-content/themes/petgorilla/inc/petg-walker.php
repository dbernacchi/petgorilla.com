<?php
// Collection of Menu Walkers

class PetG_Header_Menu_Walker extends Walker_Nav_Menu{
	
	static $x = 1;
	
	function start_lvl( &$output, $depth = 0, $args = array()){
		
		$indent = str_repeat("\t", $depth);
		$submenu = ($depth >= 0 ? 'submenu' : 'topmenu');
		$output .= ($depth > 0 ? "" : "\n$indent<span class=\"dropdown-drawer\">\n");
		$output .= "\n$indent<ul class=\"$submenu\">\n";
		//$output .= ($depth > 0 ? "" : "\n$indent</span>\n");
		
	}
	
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0){ // <li> <a> <span>
		
/*
		if($depth != 2){
			self::$x = 1;
		}
*/
		
		$indent = ($depth ? str_repeat("\t", $depth) : '');
		
		// Add extra parameters (data-arr)
		$li_attr = ''; 
		$class_names = $value = '';
		
		$classes = (empty($item->classes) ? array() : (array) $item->classes);
		
		$classes[] = ($item->current || $item->current_item_ancestor ? 'active' : '');
		
		switch($depth){
			case 0 :
				$classes[] = 'topmenu-item clearfix';
				break;
			case 1 :
				$classes[] = 'submenu-item';
				break;
		}

		
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args ) );
		$class_names = ' class="'.esc_attr($class_names). '"';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
		$id = (strlen($id) ? ' id="' .esc_attr($id). '"' : '');
		
		$output .= $indent.'<li' .$id.$value.$class_names.$li_attr.'>';
		
		
		
		$attributes = (!empty($item->attr_title) ? ' title="'.esc_attr($item->attr_title).'"' : '');
		$attributes .= (!empty($item->target) ? ' target="'.esc_attr($item->target).'"' : '');
		$attributes .= (!empty($item->xfn) ? ' rel="'.esc_attr($item->xfn).'"' : '');
		$attributes .= (!empty($item->url) ? ' href="'.esc_attr($item->url).'"' : '');
		
		switch($depth){
			case 0 :
				$attributes .= ' class="topmenu-link clearfix"';
				break;
			case 1 :
				$attributes .= ' class="submenu-link"';
				break;
		}
		
			
		//$attributes .= (!$depth ? 'class="toggle-trigger"' : '');
		$attributes .= (!$depth && !empty($args->walker->has_children) ? ' data-app-toggle="open_generic_dropdown"' : '');
		
		$item_output = $args->before;
		$item_output .= '<a'.$attributes.'>';
		$item_output .= $args->link_before. apply_filters('the_title', $item->title, $item->ID).$item->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;
		

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
		
	}

	function end_lvl( &$output, $depth = 0, $args = array()){ // <ul>
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent</ul>\n";
		$output .= ($depth > 0 ? "" : "\n$indent</span>\n");
		
	}
}