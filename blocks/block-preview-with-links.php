<?php
    $theme = block_value( 'theme' );
    $title = block_value( 'title' );
    $content = block_value( 'content' );
    $image = block_value( 'image' );
    $location = block_value( 'image-location' );
    $linksHeading = block_value( 'links-heading' );
    $isLeft = $location === 'left';
?>

<div class="b padding-y-8<?php if($theme == 'grey') { ?> bg-gray-5<?php } ?>">
    <div class="grid-container">
        <div class="grid-row usa-prose">
            <div class="grid-col-fill order-<?php if ($isLeft) { ?>last desktop:margin-left-7<?php } else { ?>first desktop:margin-right-7<?php } ?>">
                <h2 class="text-violet-70v font-sans-xl text-normal margin-top-0 line-height-sans-2"><?php echo $title ?></h2>
                <div><?php echo $content ?></div>
                <?php if ($linksHeading) { ?>
                    <div class="margin-top-3 text-bold line-height-sans-6"><?php echo $linksHeading ?></div>
                <?php } ?>
                <?php if (block_rows( 'links' )) { ?>
                    <div class="grid-row">
                        <div class="tablet:grid-col">
                            <ul class="usa-list usa-list--unstyled">
                            <?php 
                                $count = 1;
                                while(block_rows( 'links' )) {
                                    block_row( 'links' );

                                    $link_icon = block_sub_value( 'link-icon' );
                                    $link_text = block_sub_value( 'link-text' );
                                    $link_url = block_sub_value( 'link-url' );
                            ?>
                                    <li class="padding-top-3">
                                        <a href="<?php echo($link_url) ?>" class="text-no-underline">
                                            <span class="grid-row flex-align-center">
                                                <img src="<?php echo wp_get_attachment_url( $link_icon ); ?>" alt="<?php echo $link_text; ?>" class="width-3 margin-right-1" />
                                                <span class="grid-col-fill"><span class="text-underline hover:text-no-underline"><?php echo($link_text) ?></span><span class="text-no-underline"> →</span></span>
                                            </span>
                                        </a>
                                    </li>
                            <?php

                                    if ($count == 2) {
                            ?>
                            </ul>
                        </div>
                        <div class="tablet:grid-col">
                            <ul class="usa-list usa-list--unstyled">
                            <?php 
                                    }
                                    $count++;
                                }

                                reset_block_rows( 'links' )
                            ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="grid-col-4 display-none desktop:display-block order-<?php if ($isLeft) { ?>first<?php } else { ?>last<?php } ?>">
                <?php if ($image) { ?>
                    <img src="<?php echo wp_get_attachment_url( $image ); ?>" alt="<?php echo $title; ?>" class="maxw-mobile width-full" />
                <?php } ?>
            </div>
        </div>
    </div>
</div>