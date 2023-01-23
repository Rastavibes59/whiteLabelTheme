<?php

/*
Template Name: Archive
Template Post Type: page
*/

get_header(); 

$categories = get_categories( );
?>

<!-- SECTION JUMBOTRON -->

<?php if (get_field('background_image')) :

    get_template_part(
        'includes/common/jumbotron',
        '',
        array(
            'class'             => '',
            'arbitrary_data'    => array(
                'size'          => 'standard',
                'picture'       => get_field('background_image'),
                'title'         => get_the_title(),
            ),
        )
    );
endif; ?>


    <!-- SECTION BREADCRUMBS -->


    <?php

    if(get_field('background_image')) {
        $isJumbo = true;
    } else {
        $isJumbo = false;
    }
    
    get_template_part('includes/common/breadcrumbs', '',
        array(
            'class'             => '',
            'arbitrary_data'    => array(
                'isJumbo'          => $isJumbo,
            ),
        )
    ); 
    ?>

<!-- SECTION BLOG  -->

<?php 
    $page_title= get_the_title();
    $category = get_category( get_query_var( 'cat' ) );
    $cat_id = $category->cat_ID;

    $args = array(
        'post_type'         => 'post',
        'cat'               => $cat_id,
        'orderby'           => get_the_date(),
        'order'             => 'ASC',
        'posts_per_page'    => 12,

        );

    $query = new WP_Query( $args );   
      
?>
<section class="bg-transparent pt-100 pb-100 md-pb-50">
    <div class="container grid cols-12 md-cols-1 gap-15">
        <h2 class="colspan-12 md-colspan-1"><?php single_cat_title();?></h2>
        <ul class="colspan-9 md-colspan-1 grid md-cols-1 cols-3 gap-15 archive">
            <?php if($query->have_posts() ) : 
                while($query->have_posts() ) : 
                    
                    $query->the_post();                    
                        get_template_part(
                            'includes/common/article',
                            'item',
                            array(
                                'class'             => 'blog',
                                'arbitrary_data'    => array(
                                    'title'         => get_the_title(),
                                    'thumbnail'     => get_the_post_thumbnail_url(),
                                    'date'          => get_the_date('d/m/Y'),
                                    'link'          => get_permalink(),
                                ),
                            )
                        );

            
                endwhile;
            else : ?>
                <p class="size-big colspan-4 md-colspan-1 text-center">AUCUN ARTICLE POUR L'INSTANT</p>
            <?php endif;?>
        </ul> 
        <aside class="colspan-3 lg-colspan-1  flex column">
            <div class="flex column justify-flex-start align-flex-start p-20 blogAside">
                <h3 class="xs-mt-40 mb-20">Informations :</h3>

                <div class="flex column justify-flex-start align-center mt-30">
                    <?php if( !empty($categories)) : ?>
                        <div class="flex column justify-flex-start align-center mt-30">
                            <p class="size-regular fw-700 mb-00">Catégories : </p>
                            <ul class="tagList flex row justify-flex-start align-center gap-15">
                            <?php foreach($categories as $category) : ?>
                                <li class="tagList-item p-5"><a href="<?php echo get_home_url(); ?>/category/<?php echo $category->slug; ?>" class="montserrat fw-700"><?php echo $category->name; ?></a></li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </aside>
    </div>
</section>


<?php get_footer(); ?>