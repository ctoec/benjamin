require('uswds');
require('./scroll-to-top');
require('./translate');

window.addEventListener('load', toggleSidebar);
window.addEventListener('resize', toggleSidebar);

function toggleSidebar() {
    var button = document.querySelector('.sidebar .usa-accordion__button');
    var sidebar = document.getElementById('sidebar');

    if (window.innerWidth > 1024) {
        button.setAttribute('aria-expanded', true);
        sidebar.hidden = false;
    } else {
        button.setAttribute('aria-expanded', false);
        sidebar.hidden = true;
    }
}