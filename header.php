<?php benjamin_template_settings(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<a class="usa-skipnav" href="#primary"><?php esc_html_e('Skip to main content', 'benjamin'); ?></a>

<?php
    benjamin_the_header();
?>

<div class="usa-overlay"></div>

<main id="usa-prose" role="main">