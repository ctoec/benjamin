<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Benjamin
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
$template = 'news-sidebar';

$terms = get_terms('news-category');

if (!$hide_content) :
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
            <div class="<?php echo esc_attr($main_width); ?>">
                <h1 class="font-sans-xl text-normal margin-top-0">News</h1>
                <p>Stay up to date on OEC’s work. Get the latest news on our programs, regulations, events, and more.</p>
                <hr class="margin-bottom-2 padding-bottom-2 border-top-0 border-left-0 border-bottom border-base-lighter" />
                <div id="filter-trigger" class="text-right margin-bottom-1">
                    Filter results
                </div>
                <div id="filter-content" class="search-box margin-bottom-3">
                    <?php echo do_shortcode('[searchandfilter id="4896"]'); ?>
                </div>
                <div class="margin-bottom-3">
                    <strong><?php echo $wp_query->found_posts ?></strong> news results
                </div>
                <div class="usa-prose">
                    <?php
                        
                        if (have_posts()) :
                            /* Start the Loop */
                            while (have_posts()) :
                                the_post();

                            /*
                            * Include the Post-Format-specific template for the content.
                            * If you want to override this in a child theme, then include a file
                            * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                            */
                                get_template_part('template-parts/feed/news', get_post_format());
                            endwhile;

                        else :
                            get_template_part('template-parts/feed/news', 'none');
                        endif;
                    ?>
                    <div class="grid-row">
                        <div class="flex-fill">
                            <?php next_posts_link( 'View More' ); ?>
                        </div>
                        <div class="flex-fill text-right">
                            <?php previous_posts_link( 'View Newer' ); ?>
                        </div>
                    </div>
                </div>
                <div class="margin-top-8">
                    <?php dynamic_sidebar( 'news-widget' ); ?> 
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
