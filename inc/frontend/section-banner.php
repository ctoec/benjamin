<?php

$sidebars = wp_get_sidebars_widgets();

?>
<!-- Gov banner BEGIN -->
<div class="usa-alert-banner">
    <?php echo stripslashes(get_theme_mod('banner_text_setting', null));  //WPCS: xss ok. ?>
</div>  <!-- end accordion header -->

<!-- Gov banner END -->
