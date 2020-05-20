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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'usa-prose margin-bottom-3 padding-bottom-3 border-bottom border-base-lighter grid-row' ); ?>>
    <?php if (strtotime($date) > strtotime('-30 days')) { ?>
        <div class="flex-auto padding-right-105">
            <div class="font-sans-3xs padding-x-1 padding-y-05 text-white text-uppercase bg-ct-blue">New</div>
        </div>
    <?php } ?>
    <div class="flex-fill">
        <header>
            <h3 class="font-sans-md text-normal line-height-sans-4 margin-top-0 margin-bottom-0">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
        </header><!-- .entry-header -->
        <div>
            <div class="font-sans-md"><?php echo implode(", ", $categories); ?></div>
            <div class="font-sans-sm text-base-light"><?php the_date('m/d/Y'); ?></div>
        </div>
    </div>
</article><!-- #post-## -->
