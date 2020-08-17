require('uswds');
require('./scroll-to-top');
require('./navigation');
require('./filter');
require('./link-icons');

window.addEventListener('load', toggleSidebar);
window.addEventListener('resize', toggleSidebar);
window.addEventListener('load', NavigationInit);
window.addEventListener('load', FilterInit);

function toggleSidebar() {
    var button = document.querySelector('.sidebar .menu-control');
    var sidebar = document.getElementById('sidebar');

    if (window.innerWidth > 1025) {
        button.setAttribute('aria-expanded', true);
        sidebar.hidden = false;
    } else {
        button.setAttribute('aria-expanded', false);
        sidebar.hidden = true;
    }
}