var scrollMin = window.innerHeight * 2;

window.onscroll = function() {

  var el = document.getElementById("scrolltotop");

  if (document.body.scrollTop > scrollMin || document.documentElement.scrollTop > scrollMin) {
    el.hidden = false;
  } else {
    el.hidden = true;
  }

};
