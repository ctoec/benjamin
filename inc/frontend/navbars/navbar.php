<?php
$sticky = get_theme_mod('navbar_sticky_setting', 'no') == 'yes' ? 'sticky' : '';
global $wp;
?>

<div class="usa-overlay"></div>
<header class="usa-header usa-header--basic" role="banner">
    <div class="display-flex desktop:padding-x-4">
        <div class="usa-logo" id="extended-mega-logo">
            <?php benjamin_navbar_brand(); ?>
        </div>
        <button class="usa-menu-btn display-flex flex-align-center">
            <svg fill='none' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 35 25'><path fill='#fff' d='M0 0h35v5H0zM0 10h35v5H0zM0 20h35v5H0z'/></svg>
            <span>Menu</span>
        </button>
        <nav aria-label="Primary navigation" class="usa-nav padding-0">
            <button class="usa-menu-btn display-flex flex-align-center width-full">
                <span role="presentation">Menu</span>
                <img src="data:image/svg+xml,%3Csvg fill='none' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 26'%3E%3Cpath fill='%23fff' d='M0 20.047L20.047 0l5.657 5.657L5.657 25.704z'/%3E%3Cpath fill='%23fff' d='M6 .047l20.046 20.046-5.657 5.657L.343 5.704z'/%3E%3C/svg%3E" alt="close menu" class="height-2 margin-left-auto">
            </button>
            <div class="usa-nav__inner width-full desktop:margin-left-5 desktop:display-flex desktop:flex-align-center">
                <?php
                    $args =  array(
                        'theme_location' => 'primary',
                        'container' => '',
                        'menu_class' => 'order-first usa-nav__primary usa-accordion',
                        'walker' => new BenjaminNavbarWalker(),
                        'fallback_cb' => 'benjamin_set_default_menu'
                    );

                    wp_nav_menu($args);
                ?>
                <ul class="usa-nav__primary usa-accordion" style="margin-left: auto; margin-top: 0;">
                    <li>
                        <form class="usa-search usa-search--small ">
                            <div class="usa-search--cse display-flex flex-align-center">
                                <script async src="https://cse.google.com/cse.js?cx=016363712229386134106:tlizitetjji"></script>
                                <div class="gcse-searchbox-only" data-resultsUrl="/results"></div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
