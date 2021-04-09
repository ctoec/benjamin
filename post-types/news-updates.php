<?php

/**
 * Registers the 'news' post type.
 */
// Register Custom Post Type
function news_init() {

	$labels = array(
		'name'                  => _x( 'News', 'Post Type General Name', 'news' ),
		'singular_name'         => _x( 'News', 'Post Type Singular Name', 'news' ),
		'menu_name'             => __( 'News', 'news' ),
		'name_admin_bar'        => __( 'News', 'news' ),
		'archives'              => __( 'News Archive', 'news' ),
		'attributes'            => __( 'News Attribute', 'news' ),
		'parent_item_colon'     => __( 'News', 'news' ),
		'all_items'             => __( 'All', 'news' ),
		'add_new_item'          => __( 'Add News', 'news' ),
		'add_new'               => __( 'Add News', 'news' ),
		'new_item'              => __( 'Add News', 'news' ),
		'edit_item'             => __( 'Edit News', 'news' ),
		'update_item'           => __( 'Update News', 'news' ),
		'view_item'             => __( 'View News', 'news' ),
		'view_items'            => __( 'View News', 'news' ),
		'search_items'          => __( 'Search News', 'news' ),
		'not_found'             => __( 'Not found', 'news' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'news' ),
		'featured_image'        => __( 'Featured Image', 'news' ),
		'set_featured_image'    => __( 'Set featured image', 'news' ),
		'remove_featured_image' => __( 'Remove featured image', 'news' ),
		'use_featured_image'    => __( 'Use as featured image', 'news' ),
		'insert_into_item'      => __( 'Insert into item', 'news' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'news' ),
		'items_list'            => __( 'News list', 'news' ),
		'items_list_navigation' => __( 'News list navigation', 'news' ),
		'filter_items_list'     => __( 'Filter news list', 'news' ),
	);
	$args = array(
		'label'                 => __( 'News', 'news' ),
		'description'           => __( 'Used to generate news and updates.', 'news' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'show_in_rest'          => true,
		'rest_base'             => 'news',
	);

	register_post_type( 'news', $args );

}
add_action( 'init', 'news_init', 0 );

// Forms need to be marked as a form or document
register_taxonomy("news-category", 
	array(
		"news"
	), 
	array(
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_in_rest'               => true,
		'show_tagcloud'              => false,
		"label" 					 => "Categories", 
		"singular_label" 			 => "Category",
	)
);

// This doesn't need featured
function remove_meta_boxes_news() {
	remove_meta_box('wpseo_meta', 'news', 'normal');
}
add_action('add_meta_boxes', 'remove_meta_boxes_news', 100);
add_action( 'widgets_init', 'news_sidebar' );

function news_sidebar() {
  $args = array(
    'name'          => 'News Sidebar',
    'id'            => 'news-sidebar',
    'description'   => 'The News Sidebar is shown on the left hand side of news & updates pages in this theme',
    'class'         => '',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>' 
  );

  register_sidebar( $args );
}

add_action( 'widgets_init', 'news_widget' );
function news_widget() {
  $args = array(
    'name'          => 'News Widgets',
    'id'            => 'news-widget',
    'description'   => 'The block is shown under the news in the news section',
    'class'         => '',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>' 
  );

  register_sidebar( $args );
}

function custom_type_archive_display($query) {
    if (is_post_type_archive('news')) {
         $query->set('posts_per_page', 5);
         $query->set('orderby', 'date' );
         $query->set('order', 'DESC' );
        return;
    }     
}
add_action('pre_get_posts', 'custom_type_archive_display');

// A callback function to add a custom field to our "presenters" taxonomy  
function news_category_taxonomy_add_fields($tag) {
?>  
 
<tr class="form-field">  
	 <th scope="row" valign="top">  
			 <label for="cm_id"><?php _e('Campaign Monitor ID'); ?></label>  
	 </th>  
	 <td>  
			 <input type="text" name="term_meta[cm_id]" id="term_meta[cm_id]" size="25" style="width:60%;" value=""><br />  
			 <span class="description"><?php _e("The category's ID in Campaign Monitor"); ?></span>
			 <br />
			 <br />
	 </td>  
</tr>  
 
<?php  
}  

// A callback function to add a custom field to our "presenters" taxonomy  
function news_category_taxonomy_edit_fields($tag) {
	// Check for existing taxonomy meta for the term you're editing  
	$t_id = $tag->term_id; // Get the ID of the term you're editing  
	$term_meta = get_option( "taxonomy_term_$t_id" ); // Do the check
?>  
 
<tr class="form-field">  
	 <th scope="row" valign="top">  
			 <label for="cm_id"><?php _e('Campaign Monitor ID'); ?></label>  
	 </th>  
	 <td>  
			 <input type="text" name="term_meta[cm_id]" id="term_meta[cm_id]" size="25" style="width:60%;" value="<?php echo $term_meta['cm_id'] ? $term_meta['cm_id'] : ''; ?>"><br />  
			 <span class="description"><?php _e("The category's ID in Campaign Monitor"); ?></span>
			 <br />
			 <br />
	 </td>  
</tr>  
 
<?php  
}  

// A callback function to save our extra taxonomy field(s)  
function save_news_category_custom_fields( $term_id ) { 
	if ( isset( $_POST['term_meta'] ) ) {  
			$t_id = $term_id;  
			$term_meta = get_option( "taxonomy_term_$t_id" );  
			$cat_keys = array_keys( $_POST['term_meta'] );  
					foreach ( $cat_keys as $key ){  
					if ( isset( $_POST['term_meta'][$key] ) ){  
							$term_meta[$key] = $_POST['term_meta'][$key];  
					}  
			}  
			//save the option array  
			update_option( "taxonomy_term_$t_id", $term_meta );  
	}  
}  

// Add the fields to the taxonomy, using our callback function
add_action( 'news-category_add_form_fields', 'news_category_taxonomy_add_fields', 10, 2 );
add_action( 'news-category_edit_form_fields', 'news_category_taxonomy_edit_fields', 10, 2 );
add_action( 'edited_news-category', 'save_news_category_custom_fields');
add_action ('created_news-category', 'save_news_category_custom_fields');
// Remove Gutenberg for news
function news_disable_gutenberg($status, $post_type) {
	if ($post_type === 'news') {
		return false;
	}

	return $status;
}

add_filter( 'gutenberg_can_edit_post_type', 'news_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'news_disable_gutenberg', 10, 2 );
