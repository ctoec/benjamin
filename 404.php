<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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

/**
 * the 404 settings
 *
 * returns:
 * $content
 * $pid
 * $header_page
 *
 */
extract(benjamin_get_404_settings());

if (!$hide_content):
?>

<section id="primary" class="grid-container">
    <?php
    if ($sidebar_position == 'left') :
        benjamin_get_sidebar($template, $sidebar_position, $sidebar_size);
    endif;
    ?>

  <div class="desktop:grid-col-6 margin-x-auto usa-prose <?php echo esc_attr($main_width); ?>">
        <div class="margin-top-9 text-center">
            <div class="margin-bottom-4">
                <svg style="width: 60px; height: 60px;" aria-hidden="true" focusable="false" data-prefix="far" data-icon="tools" class="svg-inline--fa fa-tools fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M224 96.1v48.8l29.7 29.7c-6.8-34.8 3.5-70.3 28.5-95.3 20.3-20.3 47.2-31.2 75-31.2h1.2L301 105.3l15.1 90.6 90.6 15.1 57.3-57.3c.3 28.3-10.6 55.5-31.2 76.1-9.3 9.3-20.2 16.4-31.8 21.6 1.8 1.6 3.9 2.9 5.6 4.6l30.7 30.7c10.5-6.3 20.5-13.9 29.4-22.9 38.1-38.1 53.7-94.3 40.7-146.6C504.4 105 495 95.4 483 92c-12.2-3.4-25.2.1-34 9l-58.7 58.6-32.4-5.4-5.4-32.4 58.6-58.6c8.9-8.9 12.3-21.9 8.9-34-3.3-12.1-13-21.5-25.2-24.5-53.2-13.2-107.9 2-146.6 40.6C238 55.5 229.7 67 222.9 79.2l1.1.8v16.1zM106 454c-12.8 12.8-35.3 12.8-48.1 0-6.4-6.4-10-15-10-24 0-9.1 3.5-17.6 10-24l134.4-134.4-33.9-33.9L24 372C8.5 387.5 0 408.1 0 430s8.5 42.5 24 58 36.1 24 58 24 42.5-8.5 58-24l100.9-100.9c-9.7-15.8-15.2-33.8-15.7-52.1L106 454zm395.1-58.3L384 278.6c-23.1-23.1-57.6-27.6-85.4-13.9L192 158.1V96L64 0 0 64l96 128h62.1l106.6 106.6c-13.6 27.8-9.2 62.3 13.9 85.4l117.1 117.1c14.6 14.6 38.2 14.6 52.7 0l52.7-52.7c14.5-14.6 14.5-38.2 0-52.7z"></path></svg>
            </div>
            <h1 class="margin-0 margin-bottom-1 font-heading-l line-height-mono-1">Sorry, the page you were looking for could not be found</h1>
            <p class="margin-0 margin-bottom-4">Maybe try one of the links below or search for something else?</p>
            <form class="margin-bottom-4 margin-x-auto usa-search usa-search--big">
                <div class="usa-search--cse display-flex flex-align-center">
                    <script async src="https://cse.google.com/cse.js?cx=016363712229386134106:tlizitetjji"></script>
                    <div class="gcse-searchbox-only" data-resultsUrl="/results"></div>
                </div>
            </form>
        </div>
        <div class="margin-bottom-9">
            <?php
                if ($content == 'page' && $pid) :
                    $page = get_page($pid);
                    $content = apply_filters('the_content', $page->post_content);
                    echo $content; // WPCS: xss ok.
                else :
                    the_widget('Benjamin_Widget_Pages', array('title'=> __('Pages', 'benjamin')));
                endif;
            ?>
        </div>
  </div>

<?php
if ($sidebar_position == 'right') :
    benjamin_get_sidebar($template, $sidebar_position, $sidebar_size);
endif;
?>
</section>

<?php
endif;
get_footer();
