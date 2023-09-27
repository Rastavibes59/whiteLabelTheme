<?php 
add_filter( 'nav_menu_link_attributes', 'wpse121123_contact_menu_atts', 10, 3 );
function wpse121123_contact_menu_atts( $atts, $item, $args )
{
   $atts['data-title'] = $item->post_title;
   return $atts;
}
?>