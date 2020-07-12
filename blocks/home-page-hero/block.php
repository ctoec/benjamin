<?php
    $logo = block_value( 'logo' );
    $heading = block_value( 'heading' );
    $background = block_value( 'background-image' );
?>

<div class="b">
    <div class="b--hero" style="background-image: url(<?php echo wp_get_attachment_url( $background ); ?>);"></div>
    <div class="b--wave" style="background-image: url(<?php echo get_template_directory_uri() . '/assets/frontend/img/bg.svg'; ?>)">
        <div class="padding-y-5 padding-x-2 desktop:padding-x-8">
            <div class="maxw-tablet">
                <?php if ($logo) { ?>
                    <img src="<?php echo wp_get_attachment_url( $logo ); ?>" alt="<?php echo $heading; ?>" class="height-6 desktop:display-none" />
                <?php } ?>
                <h1 class="font-sans-5xl text-white line-height-sans-2 text-normal margin-top-0 margin-bottom-0">
                    <?php echo $heading; ?>
                </h1>
            </div>
        </div>
    </div>
</div>