<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Benjamin
 */
    $cats = get_the_terms($id, 'news-category');

    foreach ( $cats as $cat ) {
    $categories[] = $cat->name;
    }

    $date = get_the_date();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
    <div>
        <div class="font-sans-md text-bold"><?php echo implode(", ", $categories); ?></div>
        <div class="font-sans-md"><?php the_date('m/d/Y'); ?></div>
    </div>

    <?php if (get_post_format()) : ?>
    <div class="post-content entry-content col-md-12">
        
        <?php
        if(class_exists('BenjaminPostFormat')) {
            benjamin_post_format_markup( $post, get_post_format() );
        }
        ?>

    </div>
    <?php endif; ?>

    <div class="entry-content">
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
    </div><!-- .entry-content -->
</article><!-- #post-## -->
