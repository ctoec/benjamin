<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Benjamin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'margin-bottom-6' ); ?>>
    
    <header class="margin-top-6">
        <h3 class="margin-top-0 margin-bottom-0 font-heading-xl line-height-mono-1"><?php the_title(); ?></h3>
    </header><!-- .entry-header -->

    <?php
        if(class_exists('BenjaminPostFormat')) {
            benjamin_post_format_markup( $post, get_post_format() );
        }
        ?>
        <?php

        the_content( sprintf(
            wp_kses(
                /* translators: %s: Name of current post. */
                __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'benjamin' ),
                array( 'span' => array( 'class' => array() ) )
            ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
            )
        );

    ?>
</article><!-- #post-## -->
