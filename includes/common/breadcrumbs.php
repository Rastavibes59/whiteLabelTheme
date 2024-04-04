<?php
// Example foo.php template.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'class'          => '',
        'arbitrary_data' => array(
            'isJumbo'          => true,
        ),
    )
);

$bottomFooterContent = get_theme_mod('bottom_footer_content', 'Réalisation : <a href="https://www.ateliers-art-strong.fr" target="_blank" title="Ateliers Art-Strong">Ateliers Art-Strong</a>');

?>



<section class="breadcrumbs pt-30 pb-30 bg-tertiary fc-white mt-30">
    <div class="container flex row md-column justify-space-between align-center">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div class="expend">', '</div>');
        }
        ?>
        <div class="extend flex row md-column md-gap-20 justify-space-between align-center md-align-flex-start md-mt-20">
            <a href="<?php echo site_url('//mentions-legales/'); ?>" class="size-contactInfos  text-center size-formInfos fw-regular expend mr-30 md-mr-00"><?php //pll_e('Mentions légales'); ?>Mentions légales</a>
            <p id="bottomFooterSection" class="size-contactInfos  text-center mb-00 size-formInfos expend"><?php echo $bottomFooterContent; ?></p>
        </div>

    </div>
</section>

