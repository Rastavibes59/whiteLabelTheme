<?php 

//fonction de la metabox
function archive_page( $post ) {
    $archive_page = get_post_meta( $post->ID, '_archive_page', true );
    ?>
    <select name="archive_page">
        <option value="">Aucune</option>
        <?php
            $post_types = get_post_types( array( 'show_ui' => true, '_builtin' => false ) );
            foreach( $post_types as $post_type )
                echo '<option value="' . esc_attr( $post_type ) . '" ' . selected( $post_type, $archive_page, false ) . '>' . esc_html( $post_type ) . '</option>'; 
        ?>
    </select>
    <p>Choisissez la cible de cette page</p>
    
    <?php
    wp_nonce_field( 'archive_page-save_' . $post->ID, 'archive_page-nonce') ;
}


?>