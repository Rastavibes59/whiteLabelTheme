<?php
// parallax home section.

// Set defaults.
$args = wp_parse_args(
    $args,
    array(
        'id'                => 'parallax_jumbo',
        'class'             => 'jumbotron home wave pt-100 md-pt-50 flex column justify-center align-center',
        'arbitrary_data'    => array(
            'background'    => get_template_directory_uri() . '/assets/public/images/background.webp',
            'depth'         => 0.2,
            'text'          => '<p>HELLO WORLD !</p>',
            'logo'          => get_template_directory_uri() . '/assets/public/images/logo-leaves.webp',
            'mobile_placeholder' => get_template_directory_uri() . '/assets/public/images/background.webp',
        ),
    )
);
?>
<section id="<?php echo $args['id']; ?>" class="<?php echo $args['class']; ?>" style="background-image:url(<?php echo $args['arbitrary_data']['background']; ?>)">
    <div class="container grid cols-2 md-cols-1" data-depth="<?php echo $args['arbitrary_data']['depth']; ?>">
        <?php if(isset($args['arbitrary_data']['logo'])) : ?>
            <img src="<?php echo $args['arbitrary_data']['logo']; ?>" alt="Festival Jardin Électronique" width="500" height="500">
        <?php endif; ?>
        <div class="flex column justify-center align-center jumbotronLineup mt-30 md-mt-15 pl-15 pr-15 <?php if(!isset($args['arbitrary_data']['logo'])) : ?> colspan-2 md-colspan-1 <?php endif; ?>">
            <?php echo $args['arbitrary_data']['text']; ?>
        </div>
    </div>   
</section>