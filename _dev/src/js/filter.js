window.FilterInit = function() {
  let filterTrigger = document.getElementById('filter-trigger');
  let filterContent = document.getElementById('filter-content');

  filterContent.setAttribute('hidden', true);

  filterTrigger.addEventListener('click', function() {
    if (filterContent.getAttribute('hidden')) {
      filterContent.removeAttribute('hidden', true);
      filterTrigger.classList.add('is-active');
    } else {
      filterContent.setAttribute('hidden', true);
      filterTrigger.classList.remove('is-active');
    }
  });
}