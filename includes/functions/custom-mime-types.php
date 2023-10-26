<?php 
add_filter('upload_mimes', 'add_custom_upload_mimes');
    function add_custom_upload_mimes($existing_mimes) {
        $existing_mimes['ttf'] = 'application/x-font-ttf';
        return $existing_mimes;
}

?>