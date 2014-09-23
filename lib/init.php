<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/roots-translations
  load_theme_textdomain('roots', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'roots')
  ));

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  add_image_size( 'amz-cover', 300, 400 );
  add_image_size( 'intro-cover', 400, 600 );
  add_image_size( 'homepage-thumb', 400, 350, true );
  add_image_size( 'archive-thumb', 500, 300, true );

  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', array('caption'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'roots_setup');

/**
 * Register sidebars
 */
function roots_widgets_init() {
  register_sidebar(array(
    'name'          => __('Primary', 'roots'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));

  register_sidebar(array(
    'name'          => __('Footer', 'roots'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="col-lg-3 widget %1$s %2$s" data-animated="fadeIn">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));
}
add_action('widgets_init', 'roots_widgets_init');

//404 patch
function custom_paged_404_fix( ) {
	global $wp_query;

	if ( is_404() || !is_paged() || 0 != count( $wp_query->posts ) )
		return;

	$wp_query->set_404();
	status_header( 404 );
	nocache_headers();
}
add_action( 'wp', 'custom_paged_404_fix' );

//function my_post_queries( $query ) {
//  // do not alter the query on wp-admin pages and only alter it if it's the main query
//  if (!is_admin() && $query->is_main_query()){
//
//    // alter the query for the home and category pages
//
//    if(is_category()){
//      $query->set('posts_per_page', -1);
//    }
//
//  }
//}
//add_action( 'pre_get_posts', 'my_post_queries' );
#-----------------------------------------------------------------#
# Create admin authors section
#-----------------------------------------------------------------#
function authors_register() {

     $authors_labels = array(
        'name' => __( 'Autori', 'taxonomy general name', 'roots'),
        'singular_name' => __( 'Autore', 'roots'),
        'search_items' =>  __( 'Cerca autore', 'roots'),
        'all_items' => __( 'Tutti gli autori', 'roots'),
        'parent_item' => __( 'Autore principale', 'roots'),
        'edit_item' => __( 'Edita Autore', 'roots'),
        'update_item' => __( 'Aggiorna Autore', 'roots'),
        'add_new_item' => __( 'Aggiungi nuovo autore', 'roots')
     );


     $args = array(
            'labels' => $authors_labels,
            'singular_label' => __('Autore', 'roots'),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'hierarchical' => false,
            'menu_position' => 6,
            'menu_icon' => 'dashicons-edit',
            'supports' => array('title', 'editor', 'thumbnail')
       );

    register_post_type( 'authors' , $args );
}
add_action('init', 'authors_register');

#-----------------------------------------------------------------#
# Create amazon amazon section
#-----------------------------------------------------------------#
function amazon_register() {

	 $amazon_labels = array(
	 	'name' => __( 'Amazon', 'taxonomy general name', 'roots'),
		'singular_name' => __( 'Libri', 'roots'),
		'search_items' =>  __( 'Cerca libri', 'roots'),
		'all_items' => __( 'Tutti i libri', 'roots'),
		'parent_item' => __( 'Libro principale', 'roots'),
		'edit_item' => __( 'Edita libro', 'roots'),
		'update_item' => __( 'Aggiorna libro', 'roots'),
		'add_new_item' => __( 'Aggiungi nuovo libro', 'roots')
	 );


	 $args = array(
			'labels' => $amazon_labels,
			'singular_label' => __('Amazon', 'roots'),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'hierarchical' => false,
			'menu_position' => 6,
			'menu_icon' => 'dashicons-book-alt',
			'supports' => array('title')
       );

    register_post_type( 'amazon' , $args );
}
add_action('init', 'amazon_register');
