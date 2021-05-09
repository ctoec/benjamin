<?php
    $title = block_value( 'title' );
    $description = block_value( 'description' );

    $args = array(
        'post_type' => 'news',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 3
    );
    $query = new WP_Query( $args );
?>

<div class="b padding-y-8">
    <div class="grid-container width-full">
        <div class="margin-bottom-6">
            <h2 class="text-oec-purple font-sans-xl text-normal margin-top-0 margin-bottom-1 line-height-sans-2 text-bold"><?php echo $title ?></h2>
            <?php if ($description) { ?>
                <div class="text-normal margin-top-0 line-height-sans-2"><?php echo $description ?></div>
            <?php } ?>
        </div>
        <div class="grid-row">
            <div class="bg-white overflow-hidden width-full">
                <div class="width-full">
                    <?php
                        if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                get_template_part('template-parts/feed/news', get_post_format(), array( 
                                  'hide_categories' => true
                                ));
                            }
                            wp_reset_postdata();
                        }
                    ?>
                </div>
                <div class="usa-prose">
                    <a href="/news" class="grid-row flex-align-center width-full">
                        <span class="padding-right-2">
                            <svg xmlns='http://www.w3.org/2000/svg' class='ionicon' viewBox='0 0 512 512' style="width: 36px; height: 36px"><title>Megaphone</title><path d='M407.94 52.22S321.3 160 240 160H80a16 16 0 00-16 16v96a16 16 0 0016 16h160c81.3 0 167.94 108.23 167.94 108.23 6.06 8 24.06 2.52 24.06-9.83V62c0-12.31-17-18.82-24.06-9.78zM64 256s-16-6-16-32 16-32 16-32M448 246s16-4.33 16-22-16-22-16-22M256 160v128M112 160v128' fill='none' stroke='#54278f' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/><path d='M144 288v168a8 8 0 008 8h53a16 16 0 0015.29-20.73C211.91 416.39 192 386.08 192 336h16a16 16 0 0016-16v-16a16 16 0 00-16-16h-16' fill='none' stroke='#000' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/></svg>
                        </span>
                        <span class="grid-col-fill margin-top-neg-1">
                            <span class="text-underline hover:text-no-underline">See all news</span><span class="text-no-underline"> →</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>