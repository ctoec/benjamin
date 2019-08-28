<?php
/*
Template Name: Search Results

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
extract( benjamin_template_settings() );

if( !$hide_content ):
?>
<section id="breadcrumbs" class="grid-container margin-top-4">
    <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<div class="breadcrumbs">','</div>' );
        }
    ?>
</section>
<section id="primary" class="grid-container margin-top-3 margin-bottom-4">
    <script async src="https://cse.google.com/cse.js?cx=016363712229386134106:tlizitetjji"></script>
    <div class="gcse-searchresults-only"></div>
</section>
<?php
endif;


get_footer();
