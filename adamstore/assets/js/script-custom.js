// script-custom.js
// Animasi smooth scroll untuk anchor link
$(document).ready(function(){
  $('a[href^="#"]').on('click', function(e) {
    var target = $(this.getAttribute('href'));
    if( target.length ) {
      e.preventDefault();
      $('html, body').stop().animate({
        scrollTop: target.offset().top - 70
      }, 600);
    }
  });
});

// Animasi fade-in pada card saat muncul di viewport
$(window).on('scroll load', function() {
  $('.card').each(function(){
    if($(this).offset().top < $(window).scrollTop() + $(window).height() - 60) {
      $(this).addClass('show');
    }
  });
});
