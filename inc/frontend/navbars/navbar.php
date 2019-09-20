<?php
$sticky = get_theme_mod('navbar_sticky_setting', 'no') == 'yes' ? 'sticky' : '';
?>

<div class="usa-overlay"></div>
<header class="usa-header border-bottom border-primary-lighter" role="banner">
  <div class="padding-y-2 padding-x-2 tablet:padding-x-4">
    <div class="display-flex flex-align-center">
      <div class="flex-fill desktop:flex-auto margin-right-2">
        <?php benjamin_navbar_brand(); ?>
      </div>
      <button class="usa-menu-btn">Menu</button>
      <nav role="navigation" class="usa-nav display-flex flex-align-center flex-fill">
        <button class="usa-nav__close"><img src="<?php echo get_template_directory_uri() ?>/assets/frontend/img/close.svg" alt="close"></button>
        <div class="desktop:order-last display-flex desktop:flex-auto flex-align-center desktop:flex-justify-end">
            <div class="usa-search--cse display-flex flex-align-center">
                <script async src="https://cse.google.com/cse.js?cx=016363712229386134106:tlizitetjji"></script>
                <div class="gcse-searchbox-only" data-resultsUrl="/results"></div>
            </div>
        </div>
        <div class="desktop:display-flex width-full desktop:width-auto desktop:flex-fill flex-align-center">
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
            <ul id="translate-navigation" class="usa-nav__primary usa-accordion notranslate width-auto margin-right-05" style="margin-top: 0;">
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
        </div>
      </nav>
    </div>
  </div>
</header>
