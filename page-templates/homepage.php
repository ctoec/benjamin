<?php
/*
Template Name: Homepage

This is a copy of the standard "page" template, but exists to allow some
deviations to standard pages

*/

get_header();
?>
<section id="primary" class="grid-container">
    <?php
    	while ( have_posts() ) : the_post();
            get_template_part('template-parts/singles/content-home', 'page');
    	endwhile; // End of the loop.
    ?>
</section>
<?php

get_footer();
