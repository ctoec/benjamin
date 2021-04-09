<?php

/**
 * Saves the featured post setting to the DB
 * 
 * @param int $post_id The post ID.
 * @param post $post The post object.
 * @param bool $update Whether this is an existing post being updated or not.
 */
function benjamin_save_featured_post($post_id, $post) {


    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    if($post->post_type == 'revision')
        return $post_id;


    // if the post has been stickies, remove that flag and apply our flag
    if( $post->post_type == 'post' && isset( $_POST['sticky'] ) ) {
        unset( $_POST['sticky'] );
        update_option('featured-post--'.$post->post_type, $post_id);
    } elseif( isset($_POST['featured-post--'.$post->post_type]) ) {
        update_option('featured-post--'.$post->post_type, $post_id);

    } elseif( !isset($_POST['featured-post--'.$post->post_type])
        && $post_id == get_option('featured-post--'.$post->post_type, true)
    ) {
        delete_option('featured-post--'.$post->post_type);
    }

}

add_action("save_post", "benjamin_save_featured_post", 10, 3);
