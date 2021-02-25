<?php

/**
 * Registers the `icons` post type.
 */
function icons_init() {
	register_post_type( 'icons', array(
		'labels'                => array(
			'name'                  => __( 'Icons', 'benjamin' ),
			'singular_name'         => __( 'Icon', 'benjamin' ),
			'all_items'             => __( 'All', 'benjamin' ),
			'archives'              => __( 'Icons Archives', 'benjamin' ),
			'attributes'            => __( 'Icons Attributes', 'benjamin' ),
			'insert_into_item'      => __( 'Insert into Icons', 'benjamin' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Icons', 'benjamin' ),
			'featured_image'        => _x( 'Featured Image', 'icons', 'benjamin' ),
			'set_featured_image'    => _x( 'Set featured image', 'icons', 'benjamin' ),
			'remove_featured_image' => _x( 'Remove featured image', 'icons', 'benjamin' ),
			'use_featured_image'    => _x( 'Use as featured image', 'icons', 'benjamin' ),
			'filter_items_list'     => __( 'Filter Icon list', 'benjamin' ),
			'items_list_navigation' => __( 'Icon list navigation', 'benjamin' ),
			'items_list'            => __( 'Icon list', 'benjamin' ),
			'new_item'              => __( 'New Icon', 'benjamin' ),
			'add_new'               => __( 'Add New Icon', 'benjamin' ),
			'add_new_item'          => __( 'Add New Icon', 'benjamin' ),
			'edit_item'             => __( 'Edit Icon', 'benjamin' ),
			'view_item'             => __( 'View Icon', 'benjamin' ),
			'view_items'            => __( 'View Icons', 'benjamin' ),
			'search_items'          => __( 'Search Icons', 'benjamin' ),
			'not_found'             => __( 'No Icons found', 'benjamin' ),
			'not_found_in_trash'    => __( 'No Icons found in trash', 'benjamin' ),
			'parent_item_colon'     => __( 'Parent Icons:', 'benjamin' ),
			'menu_name'             => __( 'Icons', 'benjamin' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'revisions' ),
		'has_archive'           => false,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-images-alt2',
		'show_in_rest'          => true,
		'rest_base'             => 'icons',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'icons_init' );

/**
 * Sets the post updated messages for the `forms_documents` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `forms_documents` post type.
 */
function icons_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['icons'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Updated. <a target="_blank" href="%s">View Icon</a>', 'benjamin' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'benjamin' ),
		3  => __( 'Custom field deleted.', 'benjamin' ),
		4  => __( 'Updated.', 'benjamin' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Restored to revision from %s', 'benjamin' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Published. <a href="%s">View Icon</a>', 'benjamin' ), esc_url( $permalink ) ),
		7  => __( 'Saved.', 'benjamin' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Submitted. <a target="_blank" href="%s">Preview Icon</a>', 'benjamin' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview</a>', 'benjamin' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Draft updated. <a target="_blank" href="%s">Preview</a>', 'benjamin' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'icons_updated_messages' );

// Icon should be able to live in a category
register_taxonomy("icon-categories", 
	array(
		"icons"
	), 
	array(
		"hierarchical" 		=> false, 
		"label" 			=> "Icon Categories", 
		"singular_label" 	=> "Icon Category", 
		"rewrite" 			=> true,
		"show_in_rest"      => true,
	)
);

// Adds a file field to the box
function icon_file( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'icon_file',
		'title' => esc_html__( 'File', 'en' ),
		'post_types' => array('icons' ),
		'context' => 'after_title',
		'priority' => 'high',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'icon_file',
				'type' => 'file_upload',
				'name' => esc_html__( 'File', 'en' ),
				'desc' => esc_html__( 'Upload Icons', 'en' ),
				'force_delete' => true,
				'max_file_uploads' => 1,
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'icon_file' );


// This doesn't need SEO help
function remove_meta_boxes_icons() {
	remove_meta_box('wpseo_meta', 'icons', 'normal');
	remove_meta_box('featured_post', 'icons', 'normal');
}
add_action('add_meta_boxes', 'remove_meta_boxes_icons', 100);

add_filter( 'manage_icons_posts_columns', 'icons_columns' );
function icons_columns( $columns ) {
  $columns['icon-categories'] = __( 'Category' );
  return $columns;
}

add_action( 'manage_icons_posts_custom_column', 'icons_category_column', 10, 2);
function icons_category_column( $column, $post_id ) {
  // Image column
  if ( 'icon-categories' === $column ) {
		$terms = wp_get_post_terms( $post_id, 'icon-categories' );
		
		if ($terms) {
			$out = array();
			foreach ($terms as $term) {
				$out[] = $term->name;
			}
			echo join( ', ', $out );
		}
	}
}
  
// Single posts should never be shown
add_action( 'template_redirect', 'icons_redirect_post' );

function icons_redirect_post() {
  $queried_post_type = get_query_var('post_type');
  if ( is_single() && 'icons' ==  $queried_post_type ) {
		$id = get_the_ID();
			$meta = get_post_meta($id);
			
		if (array_key_exists('icon_file', $meta)) {
			$link = wp_get_attachment_url($meta['icon_file'][0]);
		} else {
			$link = $meta['icon_url'][0];
		}

		wp_redirect( $link );
		exit;
	}
}