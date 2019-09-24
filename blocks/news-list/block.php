<?php

    $categories = array();

    // Get all of the categories
    if ( block_rows( 'categories' ) ) :
        while ( block_rows( 'categories' ) ) :
            block_row( 'categories' );

            $foo = block_sub_value( 'category' );
            if ( $foo ) {
                $categories[] = $foo['id'];
            }
        endwhile;
    endif;

    // Find all of the news items that match
    $args = array(
        'post_type' => 'news',
        'posts_per_page' => '5',
        'tax_query' => array(
            array(
                'taxonomy' => 'news-category',
                'field' => 'term_id',
                'terms' => $categories
            )
        ),
        'date_query' => array(
            array(
                'column' => 'post_date_gmt',
                'after'  => '365 days ago',
            )
        )
    );

    $query = new WP_Query( $args );

    if ($query->have_posts()) {
        echo "<h2>" . block_value('title') . "</h2>";

        /* Start the Loop */
        while ($query->have_posts()) :
            $query->the_post();

            /*
            * Include the Post-Format-specific template for the content.
            * If you want to override this in a child theme, then include a file
            * called content-___.php (where ___ is the Post Format name) and that will be used instead.
            */
            get_template_part('template-parts/feed/news', get_post_format());
        endwhile;
    }