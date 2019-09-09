<?php
    $title = block_value( 'title' );
?>

<div class="b padding-y-8">
    <div class="grid-container">
        <h2 class="text-violet-70v text-center font-sans-xl text-normal margin-top-0 line-height-sans-2"><?php echo $title ?></h2>
        <div class="display-flex flex-wrap flex-align-center">
            <div class="display-flex flex-wrap margin-x-auto grid-col-fill maxw-tablet-lg">
                <?php 
                    while(block_rows( 'cards' )) {
                        block_row( 'cards' );

                        $card_name = block_sub_value( 'card-name' );
                        $card_link = block_sub_value( 'card-link' );
                        $card_image = block_sub_value( 'card-image' );
                ?>
                        <div class="grid-col-12 tablet:grid-col-6 desktop:grid-col-4 display-flex flex-justify-center flex-align-center">
                            <a href="<?php echo $card_link ?>" class="display-flex flex-justify-center flex-align-center border border-base-lighter shadow-2 padding-4 height-15 margin-top-4 margin-x-2 margin-bottom-0 width-full text-black text-no-underline text-center">
                                <?php if($card_image) { ?>
                                    <img src="<?php echo wp_get_attachment_url( $card_image ); ?>" alt="<?php echo $card_name; ?>" class="width-15" />
                                <?php } else { ?>
                                    <?php echo $card_name; ?>
                                <?php } ?>
                            </a>
                        </div>
                <?php 
                    }

                    reset_block_rows( 'cards' );
                ?>
            </div>
        </div>
    </div>
</div>