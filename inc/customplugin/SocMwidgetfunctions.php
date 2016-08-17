<?php 

 /* 
        Plugin Name: Social Media Widget
        Author: Aneet Hundal  
        Author URI : *
        Version : 1.0
    */ 

// Adds custom plugin to the site. 
require get_stylesheet_directory() . '/inc/customplugin/SocMwidget.php';

add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'ah_product',
    array(
      'labels' => array(
        'name' => __( 'Products' ),
        'singular_name' => __( 'Product' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}
