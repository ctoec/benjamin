<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Benjamin
*/

?>

</main><!-- #usa-prose -->
<footer class="bg-footer" role="contentinfo">
  <div class="grid-container">
    <div class="padding-y-5">
      <div class="grid-row grid-gap">
        <div class="tablet:grid-col-7 margin-top-5 tablet:margin-top-0">
          <div class="grid-row grid-gap">
            <div class="grid-col-12 tablet:grid-col-auto margin-right-6 margin-bottom-4 desktop:margin-bottom-0">
              <a href="https://www.ct.gov"><?php echo('<img src="' . get_template_directory_uri() . '/assets/frontend/img/ct.svg" alt="' . get_bloginfo('name', 'display') . '" class="display-block height-6" />'); ?></a>
            </div>
            <div class="grid-col-12 tablet:grid-col-auto">
              <a href="/"><?php echo('<img src="' . get_template_directory_uri() . '/assets/frontend/img/logo-white.svg" alt="' . get_bloginfo('name', 'display') . '" class="display-block height-6" />'); ?></a>
            </div>
          </div>
        </div>
        <div class="tablet:grid-col-5 margin-top-6 tablet:margin-top-0">
          <div class="grid-row grid-gap">
            <div class="tablet:grid-col-6 desktop:grid-col-4 footer-list">
              <?php dynamic_sidebar( 'footer-left' ); ?>
            </div>
            <div class="tablet:grid-col-6 desktop:grid-col-4 footer-list margin-top-5 tablet:margin-top-0">
              <?php dynamic_sidebar( 'footer-right' ); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="display-flex margin-top-5 desktop:flex-justify-center">
        <a href="https://www.facebook.com/ctoec" class="margin-right-3"><?php echo('<img src="' . get_template_directory_uri() . '/assets/frontend/img/social-icons/facebook.svg" alt="' . get_bloginfo('name', 'display') . '" class="display-block height-4" />'); ?></a>
        <a href="https://twitter.com/ct_oec" class="margin-right-3"><?php echo('<img src="' . get_template_directory_uri() . '/assets/frontend/img/social-icons/twitter.svg" alt="' . get_bloginfo('name', 'display') . '" class="display-block height-4" />'); ?></a>
        <a href="https://www.instagram.com/ctoecgov/" class="margin-right-3"><?php echo('<img src="' . get_template_directory_uri() . '/assets/frontend/img/social-icons/instagram.svg" alt="' . get_bloginfo('name', 'display') . '" class="display-block height-4" />'); ?></a>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
<script src="//translate.google.com/translate_a/element.js?cb=TranslateInit"></script>
<a href="#primary" class="usa-button usa-button--secondary tablet:display-flex tablet:flex-row flex-align-center width-9 tablet:width-auto" id="scrolltotop" title="Scroll to top" hidden>
  <div class="margin-bottom-05 tablet:margin-right-1 tablet:margin-bottom-0">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 496 496"><path fill="#FFF" fill-rule="nonzero" d="M248 496c137 0 248-111 248-248S385 0 248 0 0 111 0 248s111 248 248 248zm0-448c110.5 0 200 89.5 200 200s-89.5 200-200 200S48 358.5 48 248 137.5 48 248 48zm20 328h-40c-6.6 0-12-5.4-12-12V248h-67c-10.7 0-16-12.9-8.5-20.5l99-99c4.7-4.7 12.3-4.7 17 0l99 99c7.6 7.6 2.2 20.5-8.5 20.5h-67v116c0 6.6-5.4 12-12 12z"/></svg>
  </div>
  <span class="display-none tablet:display-block">Scroll&nbsp;to&nbsp;</span>
  <span class="text-uppercase tablet:text-no-uppercase">top</span>
</a>
</body>
</html>
