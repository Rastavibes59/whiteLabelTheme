<?php 

//  TYPES DE PARTENAIRES

function create_partenaires_taxonomies() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
      'name'              => _x( 'Types', 'taxonomy general name', 'partenaire' ),
      'singular_name'     => _x( 'Type', 'taxonomy singular name', 'partenaire' ),
      'search_items'      => __( 'Cherchercher dans les Types', 'partenaire' ),
      'all_items'         => __( 'Tous les Types', 'partenaire' ),
      'parent_item'       => __( 'Parent Type', 'partenaire' ),
      'parent_item_colon' => __( 'Parent Type:', 'partenaire' ),
      'edit_item'         => __( 'Editer le Type', 'partenaire' ),
      'update_item'       => __( 'Mettre à jour le Type', 'partenaire' ),
      'add_new_item'      => __( 'Ajouter un nouveau Type', 'partenaire' ),
      'new_item_name'     => __( 'Nouveau nom de Type', 'partenaire' ),
      'menu_name'         => __( 'Type', 'partenaire' ),
  );

  $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'type' ),
  );

  register_taxonomy( 'type', array( 'partenaires' ), $args );
};
add_action( 'init', 'create_partenaires_taxonomies', 0 );
?>