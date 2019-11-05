<?php
/*
Template Name: Sidebar

This is a copy of the standard "page" template, but exists to allow some
deviations to standard pages

*/

get_header();

/**
 * get all the settings needed for the the template layout
 *
 * returns:
 * $template
 * $main_width
 * $hide_content
 * $sidebar_position
 *
 */
extract(benjamin_template_settings());
if(!$hide_content):
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
                <?php
                while (have_posts()) : the_post();

                    get_template_part('template-parts/singles/content', 'page');

                endwhile; // End of the loop.
                ?>
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
