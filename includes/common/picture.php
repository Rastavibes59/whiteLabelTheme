<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'             => '',
        'arbitrary_data'    => array(
            'title'         => 'default title',
            'picture'       => 'https://placekitten.com/700/800',
            'rounded'       => 'rounded',
        ),
    )
);
?>


<?php
// Récupération de l'ID de l'image
$image_id = $args['arbitrary_data']['picture']['ID'];

// Génération des paramètres pour wp_get_attachment_image_srcset()
$srcset_desktop = wp_get_attachment_image_srcset( $image_id, 'large' );
$srcset_mobile = wp_get_attachment_image_srcset( $image_id, 'medium' );

// Génération des paramètres pour wp_calculate_image_sizes()

$sizes = '(min-width: 1024px) 80vw, (min-width: 600px) 100vw';

// Génération de l'HTML pour l'image
echo '<img src="' . esc_url( wp_get_attachment_image_url( $image_id, 'medium' ) ) . '" srcset="' .  esc_attr( $srcset_desktop.' '.$srcset_mobile) . '" sizes="' . esc_attr( $sizes ) . '" title="' . esc_html($args['arbitrary_data']['picture']['title']) . '" class="'. esc_html($args['class']) .'" width="500" height="400" loading="lazy">';
?>


