<?php
    $logo = block_value( 'logo' );
    $heading = block_value( 'heading' );
    $background = block_value( 'background-image' );
?>

<div class="b b--hero padding-y-8" style="background-image: url(<?php echo wp_get_attachment_url( $background ); ?>)">
    <div class="grid-container">
        <div class="grid-row">
            <?php if ($logo) { ?>
                <img src="<?php echo wp_get_attachment_url( $logo ); ?>" alt="<?php echo $heading; ?>" class="height-6" />
            <?php } ?>
        </div>
        <h1 class="font-sans-3xl text-white line-height-sans-3 text-normal margin-bottom-0 maxw-tablet">
            <?php echo $heading; ?>
        </h1>
    </div>
</div>