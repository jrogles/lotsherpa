import AOS from 'aos';

export default {
  init() {
    // JavaScript to be fired on all pages
    AOS.init({});

     $('a[href*="#"]:not([href="#"])').click(function() {
       if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
         var target = $(this.hash);
         target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
         if (target.length) {
           $('html, body').animate({
             scrollTop: target.offset().top - 200,
           }, 1000);
           return false;
         }
       }
     });

    //mobile nav
    $('.nav__mobile-toggle').click(function () {
      $('.header').toggleClass('active')

      if ($('.header').hasClass('active')) {
        $('.nav__mobile-toggle').text('Close');
      } else {
        $('.nav__mobile-toggle').text('Menu');
      }
    });

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired

  },
};
