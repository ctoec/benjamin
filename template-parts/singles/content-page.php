<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Benjamin
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    <div class="margin-top-neg-05">
        <h1 class="margin-0 margin-bottom-1 font-heading-3xl line-height-mono-1"><?php the_title() ?></h1>
        <div class="text-base-light text-bold font-sans-xs text-uppercase">Last updated <?php the_modified_date('F j, Y'); ?></div>
    </div>
    <?php the_content(); ?>
    <?php if (get_edit_post_link()) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                    /* translators: %s: Name of current post */
                    esc_html__('Edit %s', 'benjamin'),
                    the_title('<span class="screen-reader-text">"', '"</span>', false)
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article>
