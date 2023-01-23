<?php

/* CHANGE LOGO ON SPECIFIC PAGE */


function change_logo_on_ml($html) {

    if(is_page('mentions-legales')){
       $html = preg_replace('/<img(.*?)\/>/', '<img src="' . get_template_directory_uri() . '/assets/public/images/svg/logo_black.svg" class="custom-logo mt-10" alt="" itemprop="logo" />', $html);
    }
 
    return $html;
 }
 
 add_filter('get_custom_logo','change_logo_on_ml');

?>