<?php

/* LOAD SCRIPTS ASYNCHRONOUSLY */

// add #asyncload at the end :: wp_enqueue_script('dcsnt', '/js/jquery.social.media.tabs.1.7.1.min.js#asyncload' )


function add_async_forscript($url)
{
    if (strpos($url, '#asyncload')===false)
        return $url;
    else if (is_admin())
        return str_replace('#asyncload', '', $url);
    else
        return str_replace('#asyncload', '', $url)."' async='async"; 
}
add_filter('clean_url', 'add_async_forscript', 11, 1);

?>