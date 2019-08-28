<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Benjamin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'feed-item' ); ?>>
    <header class="feed-header">
        <h3><?php echo benjamin_get_feed_entry_title(); ?></h3>
        <div class="entry-updated">Published on <?php the_date() ?></div>
    </header>
</article><!-- #post-## -->
