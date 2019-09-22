<?php
/*
Template Name: Template Page 1

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
$template = 'calendar-sidebar';
if(!$hide_content):
?>
<section id="primary">
    <div class="grid-container margin-top-4">
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<div class="breadcrumbs">','</div>' );
            }
        ?>
    </div>
    <div class="grid-container margin-top-4">
        <div class="grid-row grid-gap">
            <?php
            if($sidebar_position == 'left'):
                benjamin_get_sidebar($template, $sidebar_position, $sidebar_size);
            endif;
            ?>
            <div class="<?php echo esc_attr($main_width); ?> margin-bottom-8">
                <h1 class="margin-0 margin-bottom-1 font-heading-3xl line-height-mono-1"><?php the_title(); ?></h1>
                <div class="usa-prose">
                    <?php
                    while (have_posts()) : the_post();

                        get_template_part('template-parts/singles/content', 'calendar');

                    endwhile; // End of the loop.
                    ?>
                </div>
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
