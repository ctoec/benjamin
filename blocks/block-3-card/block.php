<div class="display-flex flex-wrap margin-x-auto grid-col-fill" style="width: 100%; margin: 25px 0">
  <div class="grid-row grid-gap" style="width: 100%">
    <?php 
        $block_classes = "card-content";

        while(block_rows( 'cards' )) {
          block_row( 'cards' );

          $card_name = block_sub_value( 'title' );
          $card_description = block_sub_value( 'card-description' );
          $card_image = block_sub_value( 'image' );
          $card_link = block_sub_value( 'link' );
    ?>
      <div class="card-container grid-col-12 tablet:grid-col-4 display-flex">
        <?php if ($card_link) { ?>  
          <a href="<?php echo $card_link ?>" class="<?php echo $block_classes ?>">
        <?php } else { ?>
          <div class="<?php echo $block_classes ?>">
        <?php } ?>
          <?php if($card_image) { ?>
            <div class="card-image">
              <img src="<?php echo wp_get_attachment_url( $card_image ); ?>" alt="<?php echo $card_name; ?>" />
            </div>
          <?php } ?>
          <div class="card-inner">
            <div class="card-name"><?php echo $card_name; ?></div>
            <div class="card-description"><?php echo $card_description; ?></div>
          </div>
        <?php if ($card_link) { ?>  
          </a>
        <?php } else { ?>
          </div>
        <?php } ?>
      </div>
    <?php 
        }
        reset_block_rows( 'cards' );
    ?>
  </div>
</div>