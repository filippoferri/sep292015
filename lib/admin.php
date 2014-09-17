<?php

// Custom WordPress Footer
function remove_footer_admin () {
    echo '&copy; 2014 - Filobus66';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// remove WordPress version
function demo_footer_version ($default) {
    return '';
}
add_filter ('update_footer', 'demo_footer_version', 999);

//Remove the 28px Push Down from the Admin Bar
add_action('get_header', 'my_filter_head');

  function my_filter_head() {
    remove_action('wp_head', '_admin_bar_bump_cb');
  }


//Unwanted dashboard widgets
function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
        remove_action( 'welcome_panel', 'wp_welcome_panel' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );

// Custom WordPress Admin Color Scheme
function admin_css() {
    wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/admin-style.css' );
}
add_action('admin_print_styles', 'admin_css' );


//Remove Logo from admin bar
function annointed_admin_bar_remove() {
   global $wp_admin_bar;

   /* Remove their stuff */
   $wp_admin_bar->remove_menu('wp-logo');
}

//Remove HELP TAB
add_filter( 'contextual_help', 'mytheme_remove_help_tabs', 999, 3 );
function mytheme_remove_help_tabs($old_help, $screen_id, $screen){
    $screen->remove_help_tabs();
    return $old_help;
}
//Remove SCREEN OPTIONS
add_filter('screen_options_show_screen', '__return_false');

add_action('wp_before_admin_bar_render', 'annointed_admin_bar_remove', 0);

//customizer
/**
 * The configuration options for the Shoestrap Customizer
 */
function ff_customizer_config() {

	$args = array(

		// Change the logo image. (URL)
		// If omitted, the default theme info will be displayed.
		// A good size for the logo is 250x50.
		//'logo_image'   => get_template_directory_uri() . '/admin/assets/img/logo.png',

		// The color of active menu items, help bullets etc.
		'color_active' => '#1abc9c',

		// Color used for secondary elements and desable/inactive controls
		'color_light'  => '#8cddcd',

		// Color used for button-set controls and other elements
		'color_select' => '#34495e',

		// Color used on slider controls and image selects
		'color_accent' => '#FF5740',

		// The generic background color.
		// You should choose a dark color here as we're using white for the text color.
		'color_back'   => '#222',

		// If Kirki is embedded in your theme, then you can use this line to specify its location.
		// This will be used to properly enqueue the necessary stylesheets and scripts.
		// If you are using kirki as a plugin then please delete this line.
		'url_path'     => get_template_directory_uri() . '/admin/',

		// If you want to take advantage of the backround control's 'output',
		// then you'll have to specify the ID of your stylesheet here.
		// The "ID" of your stylesheet is its "handle" on the wp_enqueue_style() function.
		// http://codex.wordpress.org/Function_Reference/wp_enqueue_style
		'stylesheet_id' => 'customizr',

	);

	return $args;

}
add_filter( 'kirki/config', 'ff_customizer_config' );

// Meta Box
// Re-define meta box path and URL
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/admin/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( STYLESHEETPATH . '/admin/meta-box' ) );
// Include the meta box script
require_once RWMB_DIR . 'meta-box.php';
// Include the meta box definition (the file where you define meta boxes, see `demo/demo.php`)
include get_template_directory() .  '/admin/meta-box/config-meta-boxes.php';

//Remove Menu
function remove_menus(){
  global $submenu, $userdata;
  get_currentuserinfo();
  if ( $userdata->ID != 1 ) {
    //remove_menu_page( 'index.php' );                  //Dashboard
    //remove_menu_page( 'edit.php' );                   //Posts
    //remove_menu_page( 'upload.php' );                 //Media
    //remove_menu_page( 'edit.php?post_type=page' );    //Pages
    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'themes.php' );                 //Appearance
    remove_menu_page( 'plugins.php' );                //Plugins
    //remove_menu_page( 'users.php' );                  //Users
    remove_menu_page( 'tools.php' );                  //Tools
    remove_menu_page( 'options-general.php' );        //Settings
    remove_menu_page( 'edit.php?post_type=nectar_slider' );    //Pages
  }
}
add_action( 'admin_menu', 'remove_menus' );

