<?php benjamin_template_settings(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>

<a class="usa-skipnav" href="#primary"><?php esc_html_e('Skip to main content', 'benjamin'); ?></a>

<div class="ct-header display-flex padding-x-2 desktop:padding-x-4">
    <div class="ct-header-logo">
        <?php echo('<img src="' . get_template_directory_uri() . '/assets/frontend/img/ct-logo.png" alt="' . get_bloginfo('name', 'display') . '" class="display-block height-4" />'); ?>
    </div>
    <div class="ct-translations">
        <input type="checkbox" name="ct-translate" id="ct-translate" tabindex="0" title="Toggle translation menu" />
        <label id="ct-translate-label" class="ct-translations-label" for="ct-translate">
            <?php echo('<img src="' . get_template_directory_uri() . '/assets/frontend/img/globe-americas.svg" class="display-block width-3 height-4" role="presentation" />'); ?>
            <span>Languages</span>
        </label>
        <script>
            // Get arbitrary element with id "my-element"
            var isInside = document.querySelector('#ct-translate-label');
            var trInput = document.querySelector('#ct-translate');

            trInput.addEventListener('keydown', function(e) {
                if (e.keyCode === 13) {
                    trInput.checked = !trInput.checked;
                }
            });
            
            // Listen for click events on body
            document.body.addEventListener('click', function (event) {
                if (isInside.contains(event.target) || event.target.id == 'ct-translate') {
                    return;
                } else {
                    setTimeout(function() {
                        if (trInput.checked) {
                            trInput.checked = false;
                        } 
                    }, 100);
                }
            });
        </script>
        <ul class="ct-translations-list" id="translations">
            <li class="usa-nav__submenu-item">
            <a href="https://translate.google.com/translate?hl=en&amp;sl=en&amp;u=https://www.ctoec.org&amp;tl=es" data-language="es" target="_parent" class="nturl notranslate">
            <span>Español</span>
            </a>
            </li>
            <li class="usa-nav__submenu-item">
            <a href="https://translate.google.com/translate?hl=en&amp;sl=en&amp;u=https://www.ctoec.org&amp;tl=pt" data-language="pt" target="_parent" class="nturl notranslate">
            <span>Portugese</span>
            </a>
            </li>
            <li class="usa-nav__submenu-item">
            <a href="https://translate.google.com/translate?hl=en&amp;sl=en&amp;u=https://www.ctoec.org&amp;tl=pl" data-language="pl" target="_parent" class="nturl notranslate">
            <span>Polski</span>
            </a>
            </li>
            <li class="usa-nav__submenu-item">
            <a href="https://translate.google.com/translate?hl=en&amp;sl=en&amp;u=https://www.ctoec.org&amp;tl=ko" data-language="ko" target="_parent" class="nturl notranslate">
            <span>한국어/韓國語</span>
            </a>
            </li>
            <li class="usa-nav__submenu-item">
            <a href="https://translate.google.com/translate?hl=en&amp;sl=en&amp;u=https://www.ctoec.org&amp;tl=zh" data-language="zh" target="_parent" class="nturl notranslate">
            <span>简体字</span>
            </a>
            </li>
            <li class="usa-nav__submenu-item">
            <a href="https://translate.google.com/translate?hl=en&amp;sl=en&amp;u=https://www.ctoec.org&amp;tl=ht" data-language="ht" target="_parent" class="nturl notranslate">
            <span>Kreyòl Ayisyen</span>
            </a>
            </li>
            <li class="usa-nav__submenu-item">
            <a href="https://translate.google.com/translate?hl=en&amp;sl=en&amp;u=https://www.ctoec.org&amp;tl=ar" data-language="ar" target="_parent" class="nturl notranslate">
            <span>ٱلْعَرَبِيَّة</span>
            </a>
            </li>
            <li class="usa-nav__submenu-item">
            <a href="https://translate.google.com/translate?hl=en&amp;sl=en&amp;u=https://www.ctoec.org&amp;tl=en" data-language="ar" target="_parent" class="nturl notranslate">
            <span>Translate more languages</span>
            </a>
            </li>
            <li class="usa-translate__power">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 152 70"><title>Translated by Google</title><g fill="none" fill-rule="nonzero"><path fill="#EA4335" d="M65 46.5C65 53.7 59.38 59 52.5 59 45.6 59 40 53.7 40 46.5 40 39.25 45.6 34 52.5 34 59.37 34 65 39.25 65 46.5zm-6 0c0-4.45-3.24-7.5-7-7.5-3.75 0-7 3.05-7 7.5 0 4.41 3.24 7.5 7 7.5s7-3.1 7-7.5z"></path><path fill="#FBBC05" d="M92 46.5C92 53.7 86.4 59 79.5 59S67 53.7 67 46.5C67 39.26 72.6 34 79.5 34A12.3 12.3 0 0 1 92 46.5zm-6 0c0-4.45-3.24-7.5-7-7.5s-7 3.05-7 7.5c0 4.41 3.24 7.5 7 7.5s7-3.1 7-7.5z"></path><path fill="#4285F4" d="M119 34.74v22.33c0 9.18-5.68 12.93-12.4 12.93a12.4 12.4 0 0 1-11.55-7.33l4.98-1.97a7.18 7.18 0 0 0 6.57 4.4c4.3 0 6.96-2.52 6.96-7.28v-1.78h-.2c-1.28 1.5-3.75 2.82-6.86 2.82-6.52 0-12.5-5.42-12.5-12.38C94 39.46 99.98 34 106.5 34c3.1 0 5.57 1.32 6.86 2.78h.2v-2.02H119v-.02zm-5 11.8c0-4.35-3.02-7.54-6.85-7.54-3.9 0-7.15 3.18-7.15 7.55 0 4.3 3.25 7.45 7.15 7.45 3.83 0 6.85-3.15 6.85-7.45z"></path><path fill="#34A853" d="M127 21v37h-5V21z"></path><path fill="#EA4335" d="M147.51 50.62l4.26 2.84a12.42 12.42 0 0 1-10.4 5.54C134.3 59 129 53.5 129 46.5c0-7.43 5.34-12.5 11.76-12.5 6.47 0 9.64 5.16 10.67 7.95l.57 1.42-16.67 6.92c1.27 2.5 3.26 3.79 6.04 3.79 2.79 0 4.72-1.39 6.14-3.46zM134.01 46L145 41.54c-.6-1.5-2.42-2.54-4.57-2.54a6.66 6.66 0 0 0-6.43 7z"></path><path fill="#4285F4" d="M19.78 43.18v-5.33h17.95c.18.93.27 2.02.27 3.22 0 4-1.1 8.95-4.62 12.46-3.42 3.57-7.8 5.47-13.6 5.47C9.04 59 0 50.26 0 39.5S9.04 20 19.78 20c5.94 0 10.18 2.33 13.37 5.37l-3.76 3.76a13.58 13.58 0 0 0-9.61-3.8 13.87 13.87 0 0 0-9.93 4.14A14.11 14.11 0 0 0 5.79 39.5a14.11 14.11 0 0 0 4.05 10.04 13.87 13.87 0 0 0 9.94 4.14c5.09 0 7.99-2.05 9.84-3.9 1.5-1.5 2.5-3.65 2.89-6.6H19.78z"></path><path fill="#FFFFFF" d="M4.3 2.65H0V0h11.75v2.65h-4.3v11.71H4.3V2.65zm8.8 1.31h2.7V5.9h.04c.27-.66.74-1.21 1.33-1.6a3.4 3.4 0 0 1 1.99-.61c.18 0 .4.03.62.1v2.66c-.34-.07-.68-.1-1.02-.1-.53 0-.97.08-1.33.26-.34.16-.64.4-.87.71-.22.3-.38.65-.48 1.06-.09.4-.14.83-.14 1.3v4.69H13.1V3.96zm7.68 3.2c.04-.67.21-1.23.5-1.67.3-.44.67-.8 1.13-1.07.48-.28 1-.47 1.54-.57a8.72 8.72 0 0 1 1.71-.17c.52 0 1.05.04 1.59.11.53.07 1.02.22 1.46.43a3 3 0 0 1 1.09.9c.28.38.42.89.42 1.52v5.4c0 .48.03.93.08 1.35.05.43.15.76.28.97H27.7a4.1 4.1 0 0 1-.2-1c-.46.46-1 .8-1.6.98a6.43 6.43 0 0 1-3.28.1c-.43-.12-.8-.3-1.12-.56-.33-.26-.59-.6-.76-.97a3.27 3.27 0 0 1-.27-1.39c0-.59.1-1.07.31-1.45.21-.39.48-.7.8-.92.33-.23.7-.4 1.13-.51a18.87 18.87 0 0 1 2.54-.43c.42-.04.78-.1 1.1-.19.33-.08.58-.2.77-.35.19-.15.27-.38.26-.67 0-.3-.05-.55-.15-.74a1.1 1.1 0 0 0-.4-.42c-.17-.1-.36-.17-.59-.2a4.76 4.76 0 0 0-.7-.05c-.57 0-1.01.12-1.33.36-.32.24-.51.65-.57 1.21h-2.86zm6.59 2.11c-.12.1-.27.2-.45.25-.4.11-.81.2-1.23.25l-.69.1c-.21.05-.43.1-.63.17-.21.06-.4.15-.54.27-.16.11-.28.26-.38.43-.09.17-.14.4-.14.66s.05.47.14.65c.1.17.22.3.39.4.16.11.34.18.56.22.21.04.43.06.66.06.56 0 1-.1 1.3-.28a1.93 1.93 0 0 0 .96-1.47c.03-.27.05-.48.05-.64V9.27zm5.06-5.3h2.71V5.4h.06c.36-.6.83-1.04 1.4-1.32a4.84 4.84 0 0 1 3.64-.1A2.84 2.84 0 0 1 42 6.19c.11.53.17 1.12.17 1.76v6.4h-2.85V8.48c0-.86-.14-1.5-.4-1.92-.27-.43-.75-.64-1.43-.64-.78 0-1.34.23-1.69.7-.34.46-.52 1.22-.52 2.28v5.45h-2.85V3.96v.01zm14.12 7.01c-.02.53.24 1.04.68 1.34.2.14.43.24.7.31.47.12.96.13 1.44.03.22-.05.42-.12.6-.22s.33-.24.45-.4c.12-.17.18-.38.18-.64 0-.43-.28-.75-.85-.96-.57-.22-1.36-.43-2.38-.65-.42-.09-.82-.2-1.22-.33-.39-.12-.74-.3-1.05-.5a2.23 2.23 0 0 1-1.02-1.94c0-.67.13-1.22.39-1.65.26-.43.6-.77 1.03-1.02.43-.24.91-.42 1.45-.52a8.9 8.9 0 0 1 3.28.01c.53.1 1 .29 1.42.54.41.26.76.6 1.03 1.02.28.42.44.96.5 1.6h-2.72c-.04-.55-.25-.92-.62-1.12a2.8 2.8 0 0 0-1.33-.29l-.52.03a1.27 1.27 0 0 0-.91.43c-.1.12-.15.3-.15.5 0 .26.1.47.28.63.19.16.43.3.73.4.3.1.65.18 1.04.26l1.18.27c.42.09.82.2 1.22.34a4 4 0 0 1 1.05.53c.3.22.56.5.74.82.19.33.28.74.28 1.22 0 .69-.13 1.26-.4 1.72a3.3 3.3 0 0 1-1.08 1.12 4.4 4.4 0 0 1-1.52.59 8.82 8.82 0 0 1-3.5-.01 4.66 4.66 0 0 1-1.54-.6 3.45 3.45 0 0 1-1.1-1.12 3.5 3.5 0 0 1-.47-1.74h2.71zM55.2 0h2.85v14.36H55.2V0zm4.98 7.16a3.26 3.26 0 0 1 1.63-2.74c.47-.27 1-.47 1.53-.57a8.72 8.72 0 0 1 1.72-.17c.52 0 1.05.04 1.59.11.53.07 1.02.22 1.46.43.44.22.8.52 1.09.9.28.38.42.89.42 1.52v5.4c0 .48.03.93.08 1.35.05.43.15.76.28.97h-2.9a4.1 4.1 0 0 1-.2-1c-.45.46-.98.8-1.6.98a6.31 6.31 0 0 1-3.27.1c-.43-.12-.8-.3-1.13-.56-.32-.26-.58-.6-.75-.97a3.27 3.27 0 0 1-.27-1.39c0-.59.1-1.07.31-1.45.2-.39.48-.7.8-.92.33-.23.7-.4 1.13-.51a19.16 19.16 0 0 1 2.54-.43c.41-.04.78-.1 1.1-.19.32-.08.58-.2.77-.35.18-.15.27-.38.26-.67 0-.3-.05-.55-.15-.74a1.1 1.1 0 0 0-.4-.42c-.17-.1-.37-.17-.59-.2a4.76 4.76 0 0 0-.71-.05c-.56 0-1 .12-1.33.36-.32.24-.5.65-.56 1.21h-2.85zm6.59 2.11c-.12.1-.27.2-.45.25-.4.11-.81.2-1.23.25l-.7.1c-.2.05-.42.1-.62.17-.21.06-.4.15-.55.27a1.4 1.4 0 0 0-.37.43c-.1.17-.14.4-.14.66s.05.47.14.65c.1.17.22.3.38.4.16.11.35.18.57.22a3.45 3.45 0 0 0 1.96-.22c.31-.19.54-.41.69-.67.14-.27.23-.53.27-.8.03-.27.05-.48.05-.64V9.27zm8.67-5.3h2.09v1.9h-2.09v5.15c0 .48.08.8.24.97.16.16.48.24.97.24.3 0 .59-.03.88-.08v2.21a6 6 0 0 1-.8.08 19 19 0 0 1-.87.02c-.44 0-.86-.03-1.25-.09a3.1 3.1 0 0 1-1.05-.35c-.3-.18-.53-.42-.7-.75-.2-.4-.28-.82-.27-1.26V5.87h-1.73v-1.9h1.73V.83h2.85v3.14zm10.44 4.07a3.3 3.3 0 0 0-.7-1.64c-.35-.38-.87-.57-1.57-.57a2.16 2.16 0 0 0-2.23 1.53c-.08.26-.12.48-.14.68h4.64zm-4.64 1.81c.05.93.28 1.6.7 2.02.44.41 1.05.62 1.86.62a2.5 2.5 0 0 0 1.48-.43c.42-.3.67-.6.76-.92h2.51a4.77 4.77 0 0 1-1.84 2.68 5.5 5.5 0 0 1-3.02.8c-.81 0-1.55-.13-2.2-.4a4.6 4.6 0 0 1-2.72-2.84A6.34 6.34 0 0 1 78.78 7a5.1 5.1 0 0 1 4.91-3.32 4.61 4.61 0 0 1 3.93 1.9c.42.57.73 1.22.91 1.96.2.74.26 1.51.2 2.31h-7.49zm16.55-.72c0-.43-.04-.84-.12-1.24-.08-.4-.22-.74-.41-1.04-.2-.3-.45-.55-.75-.74a2.2 2.2 0 0 0-1.17-.28c-.47 0-.86.1-1.18.28-.32.2-.58.44-.78.75-.2.3-.33.66-.42 1.05-.17.8-.17 1.64.01 2.45.1.4.25.76.45 1.07.21.32.47.57.79.77.31.2.69.29 1.13.29.47 0 .86-.1 1.18-.28.31-.19.56-.44.75-.76.19-.31.32-.67.4-1.07.08-.4.12-.82.12-1.25zm.04 3.9h-.04a2.9 2.9 0 0 1-1.31 1.22c-.55.25-1.16.37-1.84.37a4.11 4.11 0 0 1-3.5-1.68 5.57 5.57 0 0 1-.87-1.78 7.48 7.48 0 0 1 0-4.11c.2-.65.48-1.22.86-1.72a4.27 4.27 0 0 1 5.21-1.25c.55.25.99.64 1.31 1.15h.04V0h2.85v14.36h-2.7v-1.33h-.01zm18.05-3.86c0-.44-.04-.86-.14-1.27-.1-.4-.24-.75-.44-1.06a2.3 2.3 0 0 0-.75-.74c-.3-.18-.67-.27-1.1-.27a2.1 2.1 0 0 0-1.84 1c-.2.32-.35.67-.45 1.07-.2.83-.2 1.7 0 2.52.1.4.25.76.45 1.06a2.1 2.1 0 0 0 1.85 1c.75.02 1.45-.36 1.84-1 .2-.3.35-.66.44-1.06.1-.4.14-.82.14-1.25zM108.28 0h2.84v5.23h.04c.35-.54.82-.93 1.42-1.18.6-.25 1.22-.37 1.86-.37 1.11 0 2.17.47 2.92 1.3.4.45.74 1.02 1 1.7.25.7.37 1.52.37 2.47 0 .95-.12 1.77-.38 2.46a4.7 4.7 0 0 1-1 1.7c-.74.83-1.8 1.3-2.91 1.31-.77 0-1.45-.12-2.05-.36a2.6 2.6 0 0 1-1.37-1.23h-.04v1.33h-2.7V0zm17.38 15.65c-.3.84-.73 1.44-1.28 1.8-.55.37-1.31.55-2.3.55-.58 0-1.16-.03-1.74-.1v-2.35l.82.08c.29.02.57.03.85.02.37-.04.65-.2.83-.45.18-.25.27-.53.27-.84 0-.23-.04-.44-.12-.64l-3.63-9.76h3.03l2.35 7.12h.04l2.27-7.12H130l-4.34 11.69z"></path></g></svg>                            </li>
        </ul>
    </div>
</div>

<?php
    benjamin_the_header();
?>

<div class="usa-overlay"></div>

<main id="usa-prose" role="main">