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
$template = 'news-sidebar';
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
    <div class="grid-container margin-top-6">
        <div class="grid-row grid-gap">
            <?php
            if($sidebar_position == 'left'):
                benjamin_get_sidebar($template, $sidebar_position, $sidebar_size);
            endif;
            ?>
            <div class="usa-prose <?php echo esc_attr($main_width); ?>">
                <h1 class="text-ct-blue font-sans-xl text-normal margin-top-10"><?php the_title(); ?></h1>
                <?php
                    while (have_posts()) :
                        the_post();
            
                        get_template_part('template-parts/singles/content');
            
                    endwhile; // End of the loop.
                ?>
                <?php get_template_part('template-parts/forms/news', 'none'); ?>
            </div>
            <?php
            if($sidebar_position == 'right'):
                benjamin_get_sidebar($template, $sidebar_position, $sidebar_size);
            endif;
            ?>
        </div>
    </div>
</section>

<?php
endif;
get_footer();
