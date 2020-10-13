$(document).ready(function() {
  var stickyNavTop = $('.navmenu-section').offset().top;

  var stickyNav = function(){
    var scrollTop = $(window).scrollTop();

    if (scrollTop > stickyNavTop) {
      $('.navmenu-section').addClass('sticky');
    } else {
      $('.navmenu-section').removeClass('sticky');
    }
  };

  stickyNav();

  $(window).scroll(function() {
    stickyNav();
  });
});
