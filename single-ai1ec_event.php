<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Benjamin
 */

get_header();

/**
 * Get all the settings needed for the the template layout
 *
 * Returns:
 * $template
 * $main_width
 * $hide_content
 * $sidebar_position
 */

extract(benjamin_template_settings());


if (! $hide_content) :
?>
<section id="primary">
    <div class="grid-container margin-top-6">
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<div class="breadcrumbs">','</div>' );
            }
        ?>
    </div>
    <div class="grid-container margin-top-6 margin-bottom-8">
        <h1 class="margin-0 margin-bottom-1 font-heading-3xl line-height-mono-1"><?php the_title(); ?></h1>
        <div class="grid-row grid-gap usa-prose">
            <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/singles/event');
                endwhile; // End of the loop.
            ?>
        </div>
    </div>
</section>
<?php
endif;

get_footer();
