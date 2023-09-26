<?php

/* CUSTOM POST TYPE : ARTISTES */

function programmation_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Programmation',
            'singular_name' => 'Artiste',
        ),
        'hierarchical' => false,
        'menu_icon' => 'dashicons-album',
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'thumbnail', 'custom-fields', 'category'),
        'show_in_nav_menus' => true,

    );

    register_post_type('programmation', $args);
}
add_action('init', 'programmation_post_type');

//  CATEGORIES

function programmation_cat() {
    register_taxonomy_for_object_type('category','programmation');
}
add_action('init', 'programmation_cat');


/* CUSTOM POST TYPE : BILLETERIE */

function billetterie_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Billetterie',
            'singular_name' => 'Pass',
        ),
        'hierarchical' => false,
        'menu_icon' => 'dashicons-tickets',
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'thumbnail', 'custom-fields'),
        'show_in_nav_menus' => true,

    );

    register_post_type('billetterie', $args);
}
add_action('init', 'billetterie_post_type');

/* CUSTOM POST TYPE : RECRUTEMENT */

function jobs_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Recrutement',
            'singular_name' => 'Job',
        ),
        'hierarchical' => false,
        'menu_icon' => 'dashicons-businesswoman',
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'thumbnail', 'custom-fields', 'category'),
        'show_in_nav_menus' => true,

    );

    register_post_type('recrutement', $args);
}
add_action('init', 'jobs_post_type');

//  CATEGORIES

function job_cat() {
    register_taxonomy_for_object_type('category','recrutement');
}
add_action('init', 'job_cat');


/* CUSTOM POST TYPE : Réseaux sociaux */

function reseau_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Réseaux sociaux',
            'singular_name' => 'Réseau',
        ),
        'hierarchical' => false,
        'menu_icon' => 'dashicons-share',
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'custom-fields'),
        'show_in_nav_menus' => true,

    );

    register_post_type('reseau', $args);
}
add_action('init', 'reseau_post_type');



/* CUSTOM POST TYPE : PARTENAIRES */

function partenaires_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Partenaires',
            'singular_name' => 'Partenaire',
        ),
        'hierarchical' => false,
        'menu_icon' => 'dashicons-shop',
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'thumbnail', 'custom-fields'),
        'show_in_nav_menus' => true,

    );

    register_post_type('partenaires', $args);
}
add_action('init', 'partenaires_post_type');

/* CUSTOM POST TYPE : MODALS */

function modals_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Pop Ins',
            'singular_name' => 'Pop In',
        ),
        'hierarchical' => false,
        'menu_icon' => 'dashicons-format-status',
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'custom-fields'),
        'show_in_nav_menus' => true,

    );

    register_post_type('modals', $args);
}
add_action('init', 'modals_post_type');
