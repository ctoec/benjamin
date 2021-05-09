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

$has_filter = $_GET['_sf_s'] || $_GET['_sf_s'] || $_GET['_sft_news-category'] || $_GET['post_date'];

if (!$hide_content) :
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
            <div class="<?php echo esc_attr($main_width); ?>">
                <div class="usa-prose">
                    <h1>News</h1>
                </div>
                <p class="margin-bottom-3">Stay up to date on OEC’s work. Get the latest news on our programs, regulations, events, and more.</p>
                <div class="display-flex margin-bottom-3 flex-align-center">
                    <button id="filter-trigger" class="usa-button">
                        Filter News
                    </button>
                    
                    <div class="margin-left-auto display-flex flex-align-center">
                        <div><strong><?php echo $wp_query->found_posts ?></strong> results</div>
                        <?php if ($has_filter) : ?>
                            <div class="margin-left-1">
                                <a href="/news">Remove filters</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div id="filter-content" class="search-box margin-top-neg-3 margin-bottom-3">
                    <?php echo do_shortcode('[searchandfilter id="4896"]'); ?>
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
                                get_template_part('template-parts/feed/news', get_post_format(), array( 
                                    'hide_categories' => false
                                ));
                            endwhile;

                        else :
                            get_template_part('template-parts/feed/news', 'none');
                        endif;
                    ?>
                    <div class="grid-row">
                        <?php bm_numeric_pagination(); ?>
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

<script>
    var resizeTimer;
    
    jQuery(window).on('resize', function(e) {
    
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function() {
        var field = jQuery(document.activeElement);
        if (field.is('.hasDatepicker')) {
            field.datepicker('hide').datepicker('show');
        }            
      }, 50);
    });
    
    var datePickers = jQuery('.sf-datepicker');
    var validateRange = function() {
        if (jQuery(datePickers[0]).val() !== '' && jQuery(datePickers[1]).val() !== '') {
            var fromDate = new Date(jQuery(datePickers[0]).val());
            var toDate = new Date(jQuery(datePickers[1]).val());
            
            console.log(fromDate, toDate);
            
            // Clear any errors
            jQuery(datePickers[1]).parent('label').find('.form-error').remove();
            
            if (fromDate.getDay() && toDate.getDay() && fromDate < toDate) {
                console.log('Valid date range');
                jQuery('input[name=_sf_submit]').prop( "disabled", false );
            } else {
                jQuery(datePickers[1]).parent('label').append('<div class="form-error">Please enter a valid date range</div>');
                jQuery('input[name=_sf_submit]').prop( "disabled", true );
            }
        }
    }
    
    jQuery('.sf-datepicker').blur(function() {
        var dateString = jQuery(this).val();
        
        if (dateString !== '') {
            var datesArray = dateString.split('/');
            
            if (datesArray[0] && datesArray[0].length === 1) {
                dateString = '0' + dateString;
                datesArray = dateString.split('/');
                jQuery(this).val(dateString);
            }
            
            if (datesArray[1] && datesArray[1].length === 1) {
                if (datesArray[0] && datesArray[1] && datesArray[2]) {
                    dateString = datesArray[0] + '/0' + datesArray[1] + '/' + datesArray[2];
                    jQuery(this).val(dateString);   
                }
            }
            
            var dateDate = new Date(dateString);
            
            // Clear any errors
            jQuery(this).parent('label').find('.form-error').remove();
            jQuery('input[name=_sf_submit]').prop( "disabled", false );
            
            // Add errors
            if (!(dateDate && dateDate.getDay())) {
                jQuery(this).parent('label').append('<div class="form-error">Please enter date in MM/DD/YYYY format</div>');
                jQuery('input[name=_sf_submit]').prop( "disabled", true );
                return;
            }
        }
        
        setTimeout(validateRange, 100);
    });
</script>

<?php
endif;
get_footer();
