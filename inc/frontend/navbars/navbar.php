<?php
$sticky = get_theme_mod('navbar_sticky_setting', 'no') == 'yes' ? 'sticky' : '';
?>

<div class="usa-overlay"></div>
<header class="usa-header usa-header--extended" role="banner">
    <div class="usa-navbar">
        <div class="usa-logo" id="extended-mega-logo">
            <?php benjamin_navbar_brand(); ?>
        </div>
        <button class="usa-menu-btn">Menu</button>
    </div>
    <nav aria-label="Primary navigation" class="usa-nav">
        <div class="usa-nav__inner">
            <button class="usa-nav__close"><img src="../../dist/img/close.svg" alt="close"></button>
            <ul class="usa-nav__primary usa-accordion">
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
            </ul>
            <div class="usa-nav__secondary">
                <ul id="translate-navigation" class="usa-nav__primary usa-accordion notranslate width-auto margin-right-05" style="margin-top: 0;">
                    <li class="usa-nav__primary-item">
                        <a href="/calendar" class="usa-nav__link">Calendar</a>
                    </li>
                    <li class="usa-nav__primary-item">
                        <button class="usa-accordion__button usa-nav__link usa-nav__translate" aria-expanded="false" aria-controls="translations">
                        <?php include(get_template_directory() . '/assets/frontend/img/globe-americas.svg'); ?>
                        <span id="selectedLanguage">Languages</span>
                        </button>
                        <ul class="usa-nav__submenu notranslate" id="translations" hidden="">
                        <li class="usa-nav__submenu-item">
                            <a href="#"data-google-lang="en">
                            <span>English</span>
                            </a>
                        </li>
                        <li class="usa-nav__submenu-item">
                            <a href="#" class="" data-google-lang="es">
                            <span>Español</span>
                            </a>
                        </li>
                        <li class="usa-nav__submenu-item">
                            <a href="#" class="" data-google-lang="vi">
                            <span>Tiếng Việt</span>
                            </a>
                        </li>
                        <li class="usa-nav__submenu-item">
                            <a href="#" class="" data-google-lang="pt">
                            <span>Portugese</span>
                            </a>
                        </li>
                        <li class="usa-nav__submenu-item">
                            <a href="#" class="" data-google-lang="ht">
                            <span>Kreyòl Ayisyen</span>
                            </a>
                        </li>
                        <li class="usa-translate__power">
                            <?php include(get_template_directory() . '/assets/frontend/img/translate.svg'); ?>
                        </li>
                        </ul>
                    </li>
                </ul>
                <form class="usa-search usa-search--small ">
                    <div class="usa-search--cse display-flex flex-align-center">
                        <script async src="https://cse.google.com/cse.js?cx=016363712229386134106:tlizitetjji"></script>
                        <div class="gcse-searchbox-only" data-resultsUrl="/results"></div>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</header>
