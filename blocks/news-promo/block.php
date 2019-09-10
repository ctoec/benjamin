<?php
    $title = block_value( 'title' );
    $promo = block_value( 'subscribe-promo' );

    $args = array(
        'post_type' => 'news',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 1
    );
    $query = new WP_Query( $args );
?>

<div class="b bg-gray-5 padding-top-8 usa-prose">
    <div class="grid-container">
        <h2 class="text-violet-70v text-center font-sans-xl text-normal margin-top-0 line-height-sans-2"><?php echo $title ?></h2>
        <div class="grid-row margin-top-8">
            <div class="tablet:grid-col-6 padding-6 bg-white border-top border-left border-right border-base-lighter overflow-hidden">
                <?php
                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            get_template_part('template-parts/feed/news', get_post_format());
                        }
                        wp_reset_postdata();
                    }
                ?>
                <a href="/news" class="text-no-underline">
                    <span class="grid-row flex-align-center">
                        <span class="grid-col-fill"><span class="text-underline hover:text-no-underline">View all News &amp; Updates</span><span class="text-no-underline"> →</span></span>
                    </span>
                </a>
            </div>
            <div class="tablet:grid-col-6 padding-6">
                <form action="/news" method="GET" class="usa-form">
                    <div class="margin-bottom-4">
                        <?php echo $promo; ?>
                    </div>
                    <div class="grid-row">
                        <div class="grid-col-12 tablet:grid-col-8 tablet:padding-right-2">
                            <input name="email" id="email" type="email" value="" class="usa-input margin-0" tabindex="1" placeholder="email@address.com">
                        </div>
                        <div class="grid-col-12 margin-top-2 tablet:margin-top-0 tablet:grid-col-4">
                            <button class="usa-button margin-0" style="margin-top: 0 !important">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>