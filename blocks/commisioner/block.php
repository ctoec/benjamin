<?php
    $title = block_value( 'title' );
    $content = block_value( 'content' );
    $cta_link = block_value( 'cta-link' );
    $cta_title = block_value( 'cta-title' );
    $contact_heading = block_value( 'contact-header' );
    $contact_content = block_value( 'contact-content' );
    $image = block_value( 'commissioner-image' );
    $name = block_value( 'commissioner-name' );
?>

<div class="b b--commissioner padding-y-8 usa-prose">
    <div class="grid-container">
        <h2 class="text-white text-center font-sans-xl text-normal margin-top-0 line-height-sans-2"><?php echo $title ?></h2>
        <div class="grid-row">
            <div class="tablet:grid-col-8">
                <div class="text-white margin-bottom-5"><?php echo $content ?></div>
                <div class="margin-bottom-5">
                    <a href="<?php echo $cta_link ?>" class="padding-y-2 padding-x-3 bg-primary-darker display-inline-block text-no-underline">
                        <span class="text-white"><?php echo $cta_title ?></span>
                    </a>
                </div>
                <div class="grid-row flex-align-center">
                    <div class="grid-col-auto margin-right-2 height-6 width-6 display-flex flex-align-center flex-justify-center">
                        <img src="<?php echo get_template_directory_uri() . '/assets/frontend/img/phone.svg'; ?>" alt="Contact OEC" class="height-full width-full"/>
                    </div>
                    <div class="grid-col-fill">
                        <div class="text-white font-sans-md"><?php echo $contact_heading ?></div>
                        <div class="text-white"><?php echo $contact_content ?></div>
                    </div>
                </div>
            </div>
            <div class="tablet:grid-col-4 padding-x-5 margin-top-5 tablet:margin-top-0">
                <div class="tablet:margin-x-auto text-center">
                    <?php if ($image) { ?>
                        <img src="<?php echo wp_get_attachment_url( $image ); ?>" alt="<?php echo $name; ?>" class="height-card width-card" />
                    <?php } ?>
                    <div class="text-white font-sans-md"><?php echo $name ?></div>
                    <div class="text-white">Commissioner</div>
                </div>
            </div>
        </div>
    </div>
</div>