<?php
    $title = block_value( 'title' );
    $content = block_value( 'content' );
    $type = block_value( 'type' );
?>

<div class="usa-alert usa-alert--<?php echo $type; ?>" >
  <div class="usa-alert__body">
        <?php if($title) { ?>
            <h3 class="usa-alert__heading"><?php echo $title; ?></h3>
        <?php } ?>
        <p class="usa-alert__text"><?php echo $content; ?></p>
  </div>
</div>