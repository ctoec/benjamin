<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Benjamin
 */

 $cats = get_the_terms($id, 'news-category');

 if ($cats) {
    foreach ( $cats as $cat ) {
        $categories[] = $cat->name;
    }
 }

 $date = get_the_date();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'usa-prose margin-bottom-3 grid-row news-promo-item' ); ?>>
    <?php if (strtotime($date) > strtotime('-15 days')) { ?>
        <div class="flex-auto padding-right-2">
            <div class="font-sans-3xs width-9 text-center padding-y-05 text-white text-uppercase bg-ct-blue">New</div>
        </div>
    <?php } ?>
    <div class="news-promo-content flex-fill padding-bottom-3 margin-top-neg-05">
        <header>
            <?php if ($args['hide_categories']) { ?>
                <h3 class="font-sans-md line-height-sans-4 margin-top-0 margin-bottom-0">
            <?php } ?>
                <a href="<?php the_permalink(); ?>" class="text-normal"><?php the_title(); ?></a>
            <?php if ($args['hide_categories']) { ?>
                </h3>
            <?php } ?>
        </header><!-- .entry-header -->
        <div>
            <?php if (!$args['hide_categories']) { ?>
                <div class="font-sans-md"><?php echo implode(", ", $categories); ?></div>
            <?php } ?>
            <div class="font-sans-sm text-base-light"><?php the_date('m/d/Y'); ?></div>
        </div>
    </div>
</article><!-- #post-## -->
