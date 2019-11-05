<?php


function benjamin_frontpage_settings($wp_customize) {

    // $section = 'rontpage_settings_section'; // old section
    $section = 'static_front_page';

     /**
      * Sortables
      * @var string
      */
    $wp_customize->add_setting( 'frontpage_sortables_setting', array(
        'default'        => '[{"name":"page-content","label":"Page Content"}]',
        'sanitize_callback' => 'benjamin_frontpage_sortable_sanitize',
    ) );

    $description = __('The page content is sortable, and optional.  Simply drag the 
        available components from the "available" box over to "active".  Once a widget 
        area has been dragged to "active" you\'ll need to add some ', 'benjamin');
    $description .= '<a href="' . esc_attr("javascript:wp.customize.control( 'navbar_brand_control' ).focus();") . 
        '" data-panel="widgets">';
    $description .= __('widgets', 'benjamin') . '</a>';


    $wp_customize->add_control( new Benjamin_Sortable_Control( $wp_customize,
        'frontpage_sortables_control', array(
            'description' => sprintf('%s', $description ),
            'label'   => __('Sortable Page Content', 'benjamin'),
            'section' => $section,
            'settings'=> 'frontpage_sortables_setting',
            'priority' => 1,
            'optional' => true,
            'choices' => array(
                    'widget-area-1' => __('Widget Area 1', 'benjamin'),
                    'widget-area-2' => __('Widget Area 2', 'benjamin'),
                    'widget-area-3' => __('Widget Area 3', 'benjamin'),
                    'page-content' => __('Page Content', 'benjamin'),
                ),
            )
        )
    );

}
add_action('customize_register', 'benjamin_frontpage_settings');
