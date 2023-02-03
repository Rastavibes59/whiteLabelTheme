<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'             => '',
        'arbitrary_data'    => array(
            'slider'         => 'slider',
        ),
    )
);

$post_objects = $args['arbitrary_data']['slider'];

if ($post_objects) :


?>


    <div class="sliderContainer">
        <ul class="slider ">
            <?php
            foreach ($post_objects as $post) :

                setup_postdata($post);

            ?>
                <li class="sliderItem flex column justify-center align-center">

                    <?php
                    // Récupération de l'ID de l'image
                    $image_id = $post['ID'];

                    // Génération des paramètres pour wp_get_attachment_image_srcset()
                    $srcset_desktop = wp_get_attachment_image_srcset($image_id, 'large');
                    $srcset_mobile = wp_get_attachment_image_srcset($image_id, 'medium');

                    // Génération des paramètres pour wp_calculate_image_sizes()

                    $sizes = '(min-width: 1024px) 80vw, (min-width: 600px) 100vw';

                    ?>

                    <img srcset="<?php echo esc_attr($srcset_desktop . ' ' . $srcset_mobile); ?>" sizes="<?php echo esc_attr($sizes); ?>" src="<?php echo esc_url($post['sizes']['medium']); ?>" alt="<?php echo esc_html($post['title']); ?>" title="<?php echo esc_html($post['title']); ?>" class="<?php echo esc_html($args['class']); ?>" width="500px" height="400px" loading="lazy">


                </li>
            <?php endforeach;
            wp_reset_postdata()
            ?>
        </ul>

        <div class="sliderNav flex row justify-space-between align-center">
            <a href="javascript:void(0)" class="sliderPrev flex column justify-center align-center bg-secondary">
                <img src="<?php echo get_template_directory_uri() ?>/assets/public/images/svg/scrollTop.svg' " alt="Retour en haut de la page" width="20" height="20" class="p-5">
            </a>
            <a href="javascript:void(0)" class="sliderNext flex column justify-center align-center bg-secondary">
                <img src="<?php echo get_template_directory_uri() ?>/assets/public/images/svg/scrollTop.svg' " alt="Retour en haut de la page" width="20" height="20" class="p-5">
            </a>
        </div>

    </div>
<?php

endif; ?>