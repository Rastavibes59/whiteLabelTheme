<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => 'jumbotron pt-100 md-pt-50 ',
        'arbitrary_data' => array(
            'slider' => get_template_directory_uri() . '/assets/public/images/background.webp',
        ),
    )
);

$sliders = $args['arbitrary_data']['slider'];

?>

<section class="<?php echo esc_html($args['class']); ?> bg-primary">
    <div class="socialBox bg-primary colspan-1"></div>
    <div class="slider jumbotron colspan-11 flex row justify-flex-start align-flex-start">
        <?php foreach ($sliders as $slider) : ?>
            <div class="sliderItem w-100 m-0">
                <?php 
                
                $media=$slider['slider_media'];


                if ( $media['type'] == 'image' && count($media) > 0 ) : ?>
                <img srcset="<?php echo esc_html($media['sizes']['large']); ?> 500w,
                    <?php echo esc_html($media['url']); ?> 1920w"
                    sizes="(max-width: 480px) 100vw, 
                            (max-width: 1024px) 50vw, 
                            33vw"
                    src="<?php echo esc_html($media['url']); ?>" alt="<?php echo esc_html($media['title']); ?>" 
                    title="<?php echo esc_html($media['title']); ?>" 
                    class="light"
                    width="500px"
                    height="400px">
                <?php elseif ( $media['type'] == 'video' && count($media) > 0 ) : ?>
                    <video id="background-video" loop muted poster="">
                        <source src="<?php echo $media['url'] ?>" type="video/mp4">
                    </video>
                <?php endif; ?>
                <div class="sliderItem-content flex column justify-flex-start align-flex-end">
                    <?php if ( strlen($slider['slider_title']) > 0) : ?>
                        <h2 class="upperCase w-100 text-right size-h2"><?php echo esc_html($slider['slider_title']); ?></h2>
                    <?php endif;
                    if ( strlen($slider['slider_text']) > 0) : ?>
                        <p class=" mt-30 text-right"><?php echo esc_html($slider['slider_text']); ?></p>
                    <?php endif; 
                    if ($slider['add_link'] == 'true') : ?>
                        <a href="<?php echo esc_html($slider['button_link']); ?>" class="btn <?php echo esc_html($slider['button_color']); ?> rounded p-10 upperCase mt-30"><?php echo esc_html($slider['button_title']); ?></a>
                    <?php endif; ?>
                    </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="sliderNav bg-primary  flex column justify-space-evenly align-center">
        <?php if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        };?>
        <div class="sliderNav-count "> 
            <span class="sliderNav-current fc-secondary size-h1 fw-800">1</span><span class="sliderNav-total fw-300 ml-15 md-ml-00 mb-5 fc-fifth-lighter size-big"> / </span>
        </div>
        <div class="sliderNav-buttons flex row justify-flex-end md-justify-space-between align-center gap-30">
            <a href="javascript:void(0)" class="sliderNav-prev upperCase flex row justify-center align-center" data-text="Prec"> <i class="icon-arrow-left mr-15"></i><span class="hidden-lg"> Prec</span></a>
            <a href="javascript:void(0)" class="sliderNav-next upperCase flex row justify-center align-center" data-text="Suiv"><span class="hidden-lg">Suiv </span><i class="icon-arrow-right ml-15"></i></a>
        </div>
    </div>

</section>

<?php if ($args['arbitrary_data']['mask'] == true) : ?>
    <style>
            .sliderItem::before {
                background-color: <?php echo $args['arbitrary_data']['mask_color']; ?> !important;
                content: "";
                position: absolute;
                width: 100%;
                height: 100%;
                top: 0%;
                left: 0;
                z-index: 1;
            }

    </style>
<?php endif; ?>




