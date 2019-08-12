<?php


/**
 * The Amendment functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Benjamin
 */

if (version_compare($GLOBALS['wp_version'], '4.6', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
    return;
}

// Define some constants.
define('BENJAMIN_FULL_WIDTH', 'desktop:grid-col-12');
define('BENJAMIN_FULL_WIDTH_MEDIUM_UP', 'usa-width-full-medium-up');
define('BENJAMIN_FULL_WIDTH_LARGE_UP', 'usa-width-full-large-up');

// wide sidebar.
define('BENJAMIN_TWO_THIRDS', 'desktop:grid-col-8');
define('BENJAMIN_ONE_THIRD', 'desktop:grid-col-4');

// narrow sidebar.
define('BENJAMIN_ONE_FOURTH', 'desktop:grid-col-3');
define('BENJAMIN_THREE_FOURTHS', 'desktop:grid-col-9');
define('BENJAMIN_ONE_HALF', 'desktop:grid-col-6');


// misc.
define('BENJAMIN_DEFAULT_TEMPLATE', 'default');
define('BENJAMIN_FRONTEND_ASSETS_DIR', get_template_directory_uri() . '/assets/frontend/');

if(!defined('BENJAMIN_POST_FORMATS')) {
    define('BENJAMIN_POST_FORMATS', json_encode(
        array('audio', 'image', 'gallery', 'link', 'quote', 'status', 'video')
    ));
}

require_once get_template_directory() . '/post-types/news-updates.php';
require_once get_template_directory() . '/post-types/forms-documents.php';
require_once get_template_directory() . '/inc/_inc.php';

// We don't need posts currently
function remove_menus() {
	remove_menu_page( 'edit.php' );                   //Posts
}
add_action( 'admin_menu', 'remove_menus' );

add_action( 'widgets_init', 'footer_left' );
function footer_left() {
  $args = array(
    'name'          => 'Footer Nav Left',
    'id'            => 'footer-left',
    'description'   => 'The first column of nav items in the footer',
    'class'         => '',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '' 
  );

  register_sidebar( $args );
}

add_action( 'widgets_init', 'footer_right' );
function footer_right() {
  $args = array(
    'name'          => 'Footer Nav Right',
    'id'            => 'footer-right',
    'description'   => 'The second column of nav items in the footer',
    'class'         => '',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '' 
  );

  register_sidebar( $args );
}

// Don't need to have primary taxonomy in Yoast
add_filter( 'wpseo_primary_term_taxonomies', '__return_empty_array' );