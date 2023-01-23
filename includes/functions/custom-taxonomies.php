<?php 

//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires
 
add_action( 'init', 'create_topics_nonhierarchical_taxonomy', 0 );
 
function create_topics_nonhierarchical_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'Type de produit', 'taxonomy general name' ),
    'singular_name' => _x( 'Type de produit', 'taxonomy singular name' ),
    'search_items' =>  __( 'Chercher dans les Types de produit' ),
    'popular_items' => __( 'Types de produit populaires' ),
    'all_items' => __( 'Tous les Types de produit' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Éditer le Type de produit' ), 
    'update_item' => __( 'Mettre à jour le Type de produit' ),
    'add_new_item' => __( 'Nouveau Type de produit' ),
    'new_item_name' => __( 'Nouveau nom de Type de produit' ),
    'separate_items_with_commas' => __( 'séparer les types par des virgules' ),
    'add_or_remove_items' => __( 'Ajouter ou supprimer un Type de produit' ),
    'choose_from_most_used' => __( 'Choisir parmis les Types de produit les plus utilisés' ),
    'menu_name' => __( 'Types de produit' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('product-types','books',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'protuit' ),
  ));
}
?>