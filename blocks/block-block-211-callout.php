<?php
    $text = block_value( 'text' );
    $cta = block_value( 'cta' );
    $background = block_value( 'background' );
?>

<div class="b padding-y-8" style="background-image: url(<?php echo wp_get_attachment_url( $background ); ?>); background-size: cover">
    <div class="grid-container width-full">
        <div class="grid-row flex-align-center width-full">
            <div class="grid-col-12 tablet:grid-col-8 desktop:grid-col-fill">
                <h2 class="text-white font-sans-l text-normal margin-top-0 margin-bottom-2 line-height-sans-2"><?php echo $text ?></h2>
                <div class="b--cta text-white"><?php echo $cta ?></div>
            </div>
            <div class="desktop:grid-col-4 margin-right-6 margin-top-3 desktop:margin-left-6 desktop:margin-right-0 desktop:margin-top-0">
                <img src="<?php echo get_template_directory_uri() . '/assets/frontend/img/211.svg'; ?>" alt="211 of Connecticut" class="height-6">
            </div>
        </div>
    </div>
</div>