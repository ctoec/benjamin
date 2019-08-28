<?php

/**
 * Registers the `forms_documents` post type.
 */
function forms_documents_init() {
	register_post_type( 'forms-documents', array(
		'labels'                => array(
			'name'                  => __( 'PDFs', 'benjamin' ),
			'singular_name'         => __( 'PDF', 'benjamin' ),
			'all_items'             => __( 'All', 'benjamin' ),
			'archives'              => __( 'PDF Archives', 'benjamin' ),
			'attributes'            => __( 'PDF Attributes', 'benjamin' ),
			'insert_into_item'      => __( 'Insert into PDFs', 'benjamin' ),
			'uploaded_to_this_item' => __( 'Uploaded to this PDFs', 'benjamin' ),
			'featured_image'        => _x( 'Featured Image', 'forms-documents', 'benjamin' ),
			'set_featured_image'    => _x( 'Set featured image', 'forms-documents', 'benjamin' ),
			'remove_featured_image' => _x( 'Remove featured image', 'forms-documents', 'benjamin' ),
			'use_featured_image'    => _x( 'Use as featured image', 'forms-documents', 'benjamin' ),
			'filter_items_list'     => __( 'Filter Forms list', 'benjamin' ),
			'items_list_navigation' => __( 'Forms list navigation', 'benjamin' ),
			'items_list'            => __( 'Forms list', 'benjamin' ),
			'new_item'              => __( 'New PDF', 'benjamin' ),
			'add_new'               => __( 'Add New PDF', 'benjamin' ),
			'add_new_item'          => __( 'Add New PDF', 'benjamin' ),
			'edit_item'             => __( 'Edit PDF', 'benjamin' ),
			'view_item'             => __( 'View PDF', 'benjamin' ),
			'view_items'            => __( 'View PDFs', 'benjamin' ),
			'search_items'          => __( 'Search PDFs', 'benjamin' ),
			'not_found'             => __( 'No PDFs found', 'benjamin' ),
			'not_found_in_trash'    => __( 'No PDFs found in trash', 'benjamin' ),
			'parent_item_colon'     => __( 'Parent PDFs:', 'benjamin' ),
			'menu_name'             => __( 'PDFs', 'benjamin' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'revisions' ),
		'has_archive'           => false,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-paperclip',
		'show_in_rest'          => true,
		'rest_base'             => 'forms-documents',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'forms_documents_init' );

/**
 * Sets the post updated messages for the `forms_documents` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `forms_documents` post type.
 */
function forms_documents_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['forms-documents'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Updated. <a target="_blank" href="%s">View Forms</a>', 'benjamin' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'benjamin' ),
		3  => __( 'Custom field deleted.', 'benjamin' ),
		4  => __( 'Updated.', 'benjamin' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Restored to revision from %s', 'benjamin' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Published. <a href="%s">View Forms</a>', 'benjamin' ), esc_url( $permalink ) ),
		7  => __( 'Saved.', 'benjamin' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Submitted. <a target="_blank" href="%s">Preview Forms</a>', 'benjamin' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview</a>', 'benjamin' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Draft updated. <a target="_blank" href="%s">Preview</a>', 'benjamin' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'forms_documents_updated_messages' );

// Forms should be able to live in a category
register_taxonomy("pdf-categories", 
	array(
		"forms-documents"
	), 
	array(
		"hierarchical" 		=> false, 
		"label" 			=> "Categories", 
		"singular_label" 	=> "Category", 
		"rewrite" 			=> true,
		"show_in_rest"      => true,
	)
);

// Forms need to be marked as a form or document
register_taxonomy("pdf-types", 
	array(
		"forms-documents"
	), 
	array(
		"hierarchical" 		=> false, 
		"label" 			=> "Type", 
		"singular_label" 	=> "Type", 
		"rewrite" 			=> true,
		"show_ui" 			=> false,
	)
);

// Adds URL to content type
function pdf_subtitle( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'pdf_subtitle',
		'title' => esc_html__( 'Subtitle (optional)', 'en' ),
		'post_types' => array( 'forms-documents' ),
		'context' => 'after_title',
		'priority' => 'high',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'pdf_subtitle',
				'type' => 'text',
				'name' => null,
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'pdf_subtitle' );

// Adding this field requires the Meta Boxes plugin
function pdf_type( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'pdf_type',
		'title' => esc_html__( 'Type', 'en' ),
		'post_types' => array( 'forms-documents' ),
		'context' => 'after_title',
		'priority' => 'high',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'type',
				'name' => null,
				'type' => 'select',
				'desc' => esc_html__( 'What type of PDF is this?', 'en' ),
				'placeholder' => esc_html__( 'Select a type', 'en' ),
				'options' => array(
					'form' => 'Form',
					'document' => 'Document',
				),
			),
		),
		'validation' => array(
			'rules'  => array(
				'pdf_type' => array(
					'required'  => true,
				),
			),
		)
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'pdf_type' );

// Adds URL to content type
function pdf_url( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'pdf_url',
		'title' => esc_html__( 'URL', 'en' ),
		'post_types' => array( 'forms-documents' ),
		'context' => 'after_title',
		'priority' => 'low',
		'autosave' => 'false',
		'fields' => array(
			array(
				'id' => $prefix . 'pdf_url',
				'type' => 'url',
				'name' => esc_html__( 'URL', 'en' ),
				'desc' => esc_html__( 'Enter URL if PDF is hosted elsewhere', 'en' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'pdf_url' );

// Adds a file field to the box
function pdf_file( $meta_boxes ) {
	$prefix = '';

	$meta_boxes[] = array(
		'id' => 'pdf_file',
		'title' => esc_html__( 'File', 'en' ),
		'post_types' => array('forms-documents' ),
		'context' => 'after_title',
		'priority' => 'high',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'pdf_file',
				'type' => 'file_upload',
				'name' => esc_html__( 'File', 'en' ),
				'desc' => esc_html__( 'Upload PDFs that hosted on this site', 'en' ),
				'force_delete' => true,
				'max_file_uploads' => 1,
				'mime_type' => 'application/pdf',
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'pdf_file' );


// This doesn't need SEO help
function remove_meta_boxes_pdfs() {
	remove_meta_box('wpseo_meta', 'forms-documents', 'normal');
	remove_meta_box('featured_post', 'forms-documents', 'normal');
}
add_action('add_meta_boxes', 'remove_meta_boxes_pdfs', 100);

add_filter( 'manage_forms-documents_posts_columns', 'forms_posts_columns' );
function forms_posts_columns( $columns ) {
  $columns['pdf-categories'] = __( 'Category' );
  return $columns;
}

add_action( 'manage_forms-documents_posts_custom_column', 'forms_category_column', 10, 2);
function forms_category_column( $column, $post_id ) {
  // Image column
  if ( 'pdf-categories' === $column ) {
		$terms = wp_get_post_terms( $post_id, 'pdf-categories' );
		
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
add_action( 'template_redirect', 'forms_documents_redirect_post' );

function forms_documents_redirect_post() {
  $queried_post_type = get_query_var('post_type');
  if ( is_single() && 'forms-documents' ==  $queried_post_type ) {
		$id = get_the_ID();
			$meta = get_post_meta($id);
			
		if (array_key_exists('pdf_file', $meta)) {
			$link = wp_get_attachment_url($meta['pdf_file'][0]);
		} else {
			$link = $meta['pdf_url'][0];
		}

		wp_redirect( $link );
		exit;
	}
}