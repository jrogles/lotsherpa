import AOS from 'aos';
import Swiper from 'swiper';

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
    setTimeout(function() {

      //galleries via swiperjs
      $('.swiper-container').each(function () {
          var $this = $(this);
          var classes = $this.prop('className').split(/\s+/);
          var slideEffect;

          //get effect class from html
          classes.forEach(function (item) {
            if (item.indexOf('effect') >= 0) {
              slideEffect = item.replace(/swiper-/,'').replace(/effect-/,'');
            }
          });

          //console.log(slideEffect);

          var newSwiper = new Swiper(this, {
            // Optional parameters
            observer: true,
            observeParents: true,
            centeredSlides: true,
            centeredSlidesBounds: true,
            roundLengths: false,
            slidesPerView: 1,
            direction: 'horizontal',
            loop: true,
            watchSlidesVisibilty: true,
            uniqueNavElements: true,
            effect: slideEffect,
            fadeEffect: {
              crossFade: true,
            },
            coverflowEffect: {
              rotate: 50,
              slideShadows: false,
            },
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
              hideOnClick: true,
            },
            pagination: {
              el: '.swiper-pagination',
              type: 'bullets',
              clickable: 'true',
            },
            calculateHeight: true,
            autoplay: {
              delay: 5000,
            },
            lazy: true,
            preloadImages: false,
            on: {
              observerUpdate: function () {
                AOS.refresh();
              },
              init: function () {
                AOS.refresh();
              },
            },

          });

          newSwiper.update();

      });

      //galleries via swiperjs
      $('.swiper-container--hero').each(function () {
          var $this = $(this);
          var classes = $this.prop('className').split(/\s+/);
          var slideEffect;

          //get effect class from html
          classes.forEach(function (item) {
            if (item.indexOf('effect') >= 0) {
              slideEffect = item.replace(/swiper-/,'').replace(/effect-/,'');
            }
          });

          //console.log(slideEffect);

          var newSwiper = new Swiper(this, {
            // Optional parameters
            observer: true,
            observeParents: true,
            centeredSlides: true,
            centeredSlidesBounds: true,
            roundLengths: false,
            slidesPerView: 1,
            direction: 'horizontal',
            loop: true,
            watchSlidesVisibilty: true,
            uniqueNavElements: true,
            effect: slideEffect,
            fadeEffect: {
              crossFade: true,
            },
            coverflowEffect: {
              rotate: 50,
              slideShadows: false,
            },
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
              hideOnClick: true,
            },
            pagination: {
              el: '.swiper-pagination',
              type: 'bullets',
              clickable: 'true',
            },
            calculateHeight: true,
            autoplay: {
              delay: 5000,
            },
            lazy: true,
            preloadImages: true,
            on: {
              observerUpdate: function () {
                AOS.refresh();
              },
              init: function () {
                AOS.refresh();
              },
            },

          });

          newSwiper.update();

      });





    //   //swipers
    // var mySwiper = new Swiper ('.swiper-container', {
    //   // Optional parameters
    //   observer: true,
    //   observeParents: true,
    //   centeredSlides: true,
    //   centeredSlidesBounds: true,
    //   roundLengths: true,
    //   direction: 'horizontal',
    //   loop: true,
    //   uniqueNavElements: true,
    //   navigation: {
    //     nextEl: '.swiper-button-next',
    //     prevEl: '.swiper-button-prev',
    //     hideOnClick: true,
    //   },
    //   pagination: {
    //     el: '.swiper-pagination',
    //     type: 'bullets',
    //     clickable: 'true',
    //   },
    //   calculateHeight: true,
    //   autoplay: {
    //     delay: 5000,
    //   },
    //   lazy: true,
    //   preloadImages: false,
    // });





    }, 5);

    AOS.refresh();
  },
};
