<?php 

function font_correct_filetypes( $data, $file, $filename, $mimes, $real_mime ) {

    if ( ! empty( $data['ext'] ) && ! empty( $data['type'] ) ) {
    return $data;
    }
    
    $wp_file_type = wp_check_filetype( $filename, $mimes );
    
    // Check for the file type you want to enable, e.g. 'svg'.
    if ( 'ttf' === $wp_file_type['ext'] ) {
    $data['ext'] = 'ttf';
    $data['type'] = 'font/ttf';
    }
    
    if ( 'otf' === $wp_file_type['ext'] ) {
    $data['ext'] = 'otf';
    $data['type'] = 'font/otf';
    }
    
    return $data;
}

add_filter( 'wp_check_filetype_and_ext', 'font_correct_filetypes', 10, 5 );

add_filter('upload_mimes', 'add_custom_upload_mimes');
function add_custom_upload_mimes($existing_mimes) {
    $existing_mimes['ttf'] = 'font/ttf';
    return $existing_mimes;
}

?>