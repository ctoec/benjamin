<?php

function benjamin_get_sidebar($template, $position = 'none', $size ='BENJAMIN_ONE_FOURTH'){

    $class = '';
    $vertical = array('left', 'right');
    $horizontal = array('top', 'bottom');

    $size = $size ? constant($size) : BENJAMIN_ONE_THIRD;

    if(in_array($position, $vertical)):
        $class = $size;
    endif;

    $visibility = get_theme_mod($template . '_sidebar_visibility_setting', 'always-visible');
    $class .= ' '. $visibility;

    ?>

    <div class="sidebar <?php echo esc_attr($class); ?> widgetarea--<?php echo esc_attr($template); ?>">
        <div class="usa-accordion margin-bottom-3">
            <h2 class="usa-accordion__heading desktop:display-none">
                <button class="usa-accordion__button" aria-expanded="true" aria-controls="sidebar">In this Section</button>
            </h2>
            <div id="sidebar" class="usa-accordion__content padding-0">
                <?php dynamic_sidebar($template); ?>
            </div>
        </div>
    </div>

    <?php


}
