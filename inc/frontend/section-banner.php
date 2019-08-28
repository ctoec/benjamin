<?php

$sidebars = wp_get_sidebars_widgets();

?>
<!-- Gov banner BEGIN -->
<header class="usa-dark-background padding-y-2 padding-x-2 tablet:padding-x-4 text-white">
    <?php echo stripslashes(get_theme_mod('banner_text_setting', null));  //WPCS: xss ok. ?>
</header>  <!-- end accordion header -->

<!-- Gov banner END -->
