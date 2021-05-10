<?php
    $title = block_value( 'title' );
    $content = block_value( 'content' );
    $cta_link = block_value( 'cta-link' );
    $cta_title = block_value( 'cta-title' );
    $contact_heading = block_value( 'contact-header' );
    $contact_content = block_value( 'contact-content' );
    $image = block_value( 'commissioner-image' );
    $name = block_value( 'commissioner-name' );
    $bio = block_value( 'commissioner-bio' );
?>

<div class="b b--commissioner padding-y-8">
    <div class="grid-container width-full">
        <h2 class="text-white text-center font-sans-xl text-normal margin-top-0 line-height-sans-2 text-bold"><?php echo $title ?></h2>
        <div class="grid-row">
            <div class="tablet:grid-col-8">
                <div class="usa-prose margin-bottom-5">
                    <p>
                        <span class="text-white"><?php echo $content ?></span>
                    </p>
                </div>
                <div class="margin-bottom-5">
                    <a href="<?php echo $cta_link ?>" class="usa-button usa-button--big usa-button--white bg-white">
                        <span class="display-flex flex-align-center">
                            <span class="text-ct-blue text-left"><?php echo $cta_title ?></span>
                            <span><img src="<?php echo get_template_directory_uri() . '/assets/frontend/img/arrow-right-blue.svg'; ?>" alt="Go to <?php echo $cta_title ?>" aria-role="presentation" height="16" class="margin-left-3" /></span>
                        </span>
                    </a>
                </div>
                <div class="grid-row">
                    <div class="grid-col-auto margin-right-2 height-6 width-6 display-flex flex-align-center flex-justify-center">
                        <img src="<?php echo get_template_directory_uri() . '/assets/frontend/img/phone.svg'; ?>" alt="Contact OEC" class="height-full width-full"/>
                    </div>
                    <div class="grid-col-fill">
                        <div class="text-white text-bold font-sans-md"><?php echo $contact_heading ?></div>
                        <div class="text-white font-sans-sm"><?php echo $contact_content ?></div>
                    </div>
                </div>
            </div>
            <div class="tablet:grid-col-4 margin-top-5 tablet:margin-top-0">
                <div class="tablet:margin-x-auto text-center">
                    <?php if ($image) { ?>
                        <img src="<?php echo wp_get_attachment_url( $image ); ?>" alt="<?php echo $name; ?>" height="200" width="200" />
                    <?php } ?>
                    <div class="text-white text-bold font-sans-md"><?php echo $name ?></div>
                    <div class="text-white font-sans-sm">Commissioner</div>
                    <div class="text-white font-sans-sm"><?php echo $bio ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
