<?php
/*
Template Name: Basic: Page

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
    $has_image = has_post_thumbnail();
?>
<section id="primary">
    <?php if ($has_image) { ?>
        <div class="ct-hero">
            <div class="ct-hero-title">
                <div class="grid-container width-full usa-prose">
                    <h1 class="margin-0 margin-bottom-1 font-heading-3xl maxw-tablet"><?php the_title() ?></h1>
                </div>
            </div>
            <div class="ct-hero-image">
                <div class="ct-hero-overlay"></div>
                <div class="ct-hero-image" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>);"></div>
            </div>
        </div>
    <?php } ?>
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
            <div class="usa-prose <?php echo esc_attr($main_width); ?>">
                <?php if(!$has_image): ?>
                    <div class="margin-top-neg-05">
                        <h1><?php the_title() ?></h1>
                    </div>
                <?php endif; ?>
                <?php
                while (have_posts()) : the_post();

                    get_template_part(
                        'template-parts/singles/content', 
                        'page',
                        array(
                            'has_image' => $has_image,
                        )
                    );

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
