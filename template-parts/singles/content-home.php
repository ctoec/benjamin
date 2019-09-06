<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Benjamin
 */
?>
<?php
    the_content(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. */
                __('Continue reading %s <span class="meta-nav">&rarr;</span>', 'benjamin'),
                array('span' => array('class' => array()))
            ),
            the_title('<span class="screen-reader-text">"', '"</span>', false)
        )
    );
?>