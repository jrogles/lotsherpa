export default {
  init() {
    $('.featured-posts__toggle').click(function() {
      var $featured = $('.featured-posts');

      $('.main-posts').toggleClass('inactive');
      $featured.toggleClass('active');

      if ($featured.hasClass('active')) {
        $('.featured-posts__toggle').text('All Posts');
        $('.featured-posts__toggle').toggleClass('btn--soft btn--inverse');
      } else {
        $('.featured-posts__toggle').text($('.featured-posts__title').text());
        $('.featured-posts__toggle').toggleClass('btn--soft btn--inverse');
      }
    });
  },
  finalize() {
    // JavaScript to be fired on blog pages, after page specific JS is fired
  },
};
