<?php 
add_filter( 'nav_menu_link_attributes', 'add_data_attribute_to_nav_items', 10, 10 );
function add_data_attribute_to_nav_items( $atts, $item, $args )
{
   $atts['data-title'] = $item->post_title;
   return $atts;
}
?>