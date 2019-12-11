<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

//Clean Posts JSON Output
function get_all_posts( $data, $post, $context ) {
  return [
    'id'        => $data->data['id'],
    'date'      => $data->data['date'],
    'modified'  => $data->data['modified'],
    'title'     => $data->data['title']['rendered'],
    'content'   => preg_replace('/\[\/?et_pb.*?\]/', '', strip_tags( html_entity_decode( $data->data['content']['rendered'] ) ) ),
    'excerpt'   => preg_replace('/\[\/?et_pb.*?\]/', '', strip_tags( html_entity_decode( $data->data['excerpt']['rendered'] ) ) ),
    'link'      => $data->data['link'],
  ];
}
add_filter( 'rest_prepare_post', 'get_all_posts', 10, 3 );

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

//Build Alexa Flash Brief Feed
function build_alexa_feed( $post_id ) {

  $category = get_the_category( $post_id );
  $categories_included = "flash-brief";
  $revision = wp_is_post_revision( $post_id );

  foreach( $category as $cat ) {

    if ( $cat ) {
      
      if ( $cat->slug == $categories_included ) {

        if( is_singular( $post_id ) || $revision = 1 ) {

          $feed = file_get_contents( 'https://www.carbonbasedcreative.com/wp-json/wp/v2/posts?categories=50' );
          $json = json_decode($feed, true);

          $response = array();
          $posts = array();
          $flash_brief_content = $json ;

          foreach ( $flash_brief_content as $flash_brief_content_item ) {

                $posts[] = array( 'uid' => $flash_brief_content_item['date'],
                                  'updateDate' => $flash_brief_content_item['modified'] . '.0Z', 
                                  'titleText' => $flash_brief_content_item['title'],
                                  'mainText' => $flash_brief_content_item['content'],
                                  'redirectionUrl' => $flash_brief_content_item['link']
                                );

              }

              $fp = fopen( '/home/carbonba/public_html/wp-content/themes/carbonbased-new/flash-brief/carbon-flash-brief.json', 'w' );
              fwrite($fp, json_encode( $posts, JSON_UNESCAPED_UNICODE ));
              fclose($fp);
        }
    
      }

    }

  }

}
add_action( 'save_post', 'build_alexa_feed' );