<footer class="footer">
  <div class="footer__main">
    <div>
      <a class="footer__logo" href="{{ home_url('/') }}">
        <img src="{{ $customized_theme['logo'] }}"
          alt="{{ get_bloginfo('name', 'display') ?? 'Lotsherpa' }} Homepage"
          class="logo logo--footer">
      </a>
      <div class="footer__contact">
        <div class="footer__contact-phone">{{ $customized_theme['phone'] }}</div>
        <div class="footer__contact-email">{{ $customized_theme['email'] }}</div>
        <div class="footer__contact-address">{{ $customized_theme['address'] }}</div>
      </div>
    </div>
    @if (has_nav_menu('footer_navigation'))
      {!!
        wp_nav_menu([
        'theme_location' => 'footer_navigation',
        'menu_class' => 'nav footer__nav',
        'container_id' => 'footer-nav',
        ])
        !!}
    @endif
  </div>
  <div class="footer__copyright">
    &copy;{{ get_the_date('Y') }} {{ get_bloginfo('name', 'display') ?? 'Lotsherpa.com' }}
  </div>
</footer>
