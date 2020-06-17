window.NavigationInit = function() {
  let subnavs = document.querySelectorAll('.usa-sidenav__sublist');

  for (let i = 0; i < subnavs.length; i++) {
    const element = subnavs[i];
    const container = element.parentNode;
    const controller = container.querySelector('button');
    const currentItem = element.querySelector('.usa-current');

    if (currentItem) {
      container.classList.add('has-current');
      container.classList.add('is-active');
    } else {
      // Hide the subnav
      element.setAttribute('hidden', false);
    }

    // Add event to button to hide / show subnav
    controller.addEventListener('click', function(ev) {
      ev.preventDefault();
      toggleSubnav({
        container: container,
        element: element,
        controller: controller
      });
    });
  }
}

function toggleSubnav(obj) {
  const children = obj.container.querySelectorAll('.usa-sidenav__sublist');

  if (obj.element.getAttribute('hidden')) {
    obj.element.removeAttribute('hidden');
    obj.container.classList.add('is-active');
  } else {
    // Close the container
    obj.element.setAttribute('hidden', true);
    obj.container.classList.remove('is-active');

    // Close any of the children
    for (let i = 0; i < children.length; i++) {
      const element = children[i];
      element.setAttribute('hidden', true);
      element.classList.remove('is-active');
    }
  }
} 