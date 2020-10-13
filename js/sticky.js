$(document).ready(function() {
  var stickyNavTop = $('.navbar-section').offset().top;

  var stickyNav = function(){
    var scrollTop = $(window).scrollTop();

    if (scrollTop > stickyNavTop) {
      $('.navbar-section').addClass('sticky');
    } else {
      $('.navbar-section').removeClass('sticky');
    }
  };

  stickyNav();

  $(window).scroll(function() {
    stickyNav();
  });
});

$(function () {
  $(document).scroll(function () {
    var $nav = $(".navbar-section");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});

$(function () {
  $(document).scroll(function () {
    var $nav = $(".navbar-a-links");
    $nav.toggleClass('scrolls', $(this).scrollTop() > $nav.height());
  });
});
