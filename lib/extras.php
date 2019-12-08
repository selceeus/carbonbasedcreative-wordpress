<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

//Add Categories to pages
function add_taxonomies_cats_to_pages() {
  $labels = array(
		'name'              => _x( 'Work Category', 'Work Category', 'textdomain' ),
		'singular_name'     => _x( 'Work Category', 'Work Category', 'textdomain' ),
		'search_items'      => __( 'Search Work Category', 'textdomain' ),
		'all_items'         => __( 'All Work Category', 'textdomain' ),
		'parent_item'       => __( 'Parent Work Category', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Work Category:', 'textdomain' ),
		'edit_item'         => __( 'Edit Work Category', 'textdomain' ),
		'update_item'       => __( 'Update Work Category', 'textdomain' ),
		'add_new_item'      => __( 'Add New Work Category', 'textdomain' ),
		'new_item_name'     => __( 'New Genre Work Category', 'textdomain' ),
		'menu_name'         => __( 'Work Category', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
    'show_admin_column' => true,
    'show_in_rest'      => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'work_category' ),
  );
  
  register_taxonomy( 'work_category','page', $args );
  register_taxonomy_for_object_type( 'work_category', 'page' );

}
 add_action( 'init', 'add_taxonomies_cats_to_pages' );

//Dequeue Divi Builder on unused pages

function deregister_script() {
    $is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );
  
        if( !$is_page_builder_used ) {
            wp_dequeue_script('et-builder-modules-global-functions-script');
            wp_dequeue_script('google-maps-api');
            wp_dequeue_script('divi-fitvids');
            wp_dequeue_script('waypoints');
            wp_dequeue_script('magnific-popup');
              
            wp_dequeue_script('hashchange');
            wp_dequeue_script('salvattore');
            wp_dequeue_script('easypiechart');
              
            wp_dequeue_script('et-jquery-visible-viewport');
              
            wp_dequeue_script('magnific-popup');
            wp_dequeue_script('et-jquery-touch-mobile');
            wp_dequeue_script('et-builder-modules-script');
        }
}
//add_action( 'wp_print_scripts', 'deregister_script', 100 );
 
function deregister_styles() {
    $is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );
  
    if( !$is_page_builder_used ) {
        wp_dequeue_style('et-builder-modules-style');
    }
}
//add_action( 'wp_print_styles', 'deregister_styles', 100 );

//Dequeue Woocommerce on unused pages

function dequeue_woocommerce_styles_scripts() {
    if ( function_exists( 'is_woocommerce' ) ) {
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
            # Styles
			 wp_dequeue_style( 'woocommerce-general' );
            wp_dequeue_style( 'woocommerce-general-css' );
            wp_dequeue_style( 'woocommerce-layout' );
			wp_dequeue_style( 'woocommerce-layout-css' );
            wp_dequeue_style( 'woocommerce-smallscreen' );
            wp_dequeue_style( 'woocommerce_frontend_styles' );
            wp_dequeue_style( 'woocommerce_fancybox_styles' );
            wp_dequeue_style( 'woocommerce_chosen_styles' );
            wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
            # Scripts
            wp_dequeue_script( 'wc_price_slider' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-add-to-cart' );
            wp_dequeue_script( 'wc-cart-fragments' );
            wp_dequeue_script( 'wc-checkout' );
            wp_dequeue_script( 'wc-add-to-cart-variation' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-cart' );
            wp_dequeue_script( 'wc-chosen' );
            wp_dequeue_script( 'woocommerce' );
            wp_dequeue_script( 'prettyPhoto' );
            wp_dequeue_script( 'prettyPhoto-init' );
            wp_dequeue_script( 'jquery-blockui' );
            wp_dequeue_script( 'jquery-placeholder' );
            wp_dequeue_script( 'fancybox' );
            wp_dequeue_script( 'jqueryui' );
        }
    }
}

//add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_styles_scripts', 99 );

//ACF Option Pages

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Menu Options',
		'menu_title'	=> 'Menu Options',
		'parent_slug'	=> 'theme-options-settings',
	));
  acf_add_options_sub_page(array(
      'page_title'    => 'Portfolio Menu Options',
      'menu_title'    => 'Portfolio Menu Options',
      'parent_slug'   => 'theme-options-settings',
  ));
}
