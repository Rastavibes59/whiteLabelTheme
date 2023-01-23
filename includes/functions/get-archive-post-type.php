<?php 

/**
 * Get the current archive post type name (e.g: post, page, product).
 *
 * @return String|Boolean  The archive post type name or false if not in an archive page.
 */
function get_archive_post_type() {
    return is_archive() ? get_queried_object()->name : false;
}

?>