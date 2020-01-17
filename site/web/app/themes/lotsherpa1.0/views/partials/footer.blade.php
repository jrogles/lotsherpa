<footer class="footer">
  <div class="footer__main">
    <div>
      <a class="footer__logo" href="{{ home_url('/') }}">
        <img src="{{ get_theme_mod('upload_logo') }}"
          alt="{{ get_bloginfo('name', 'display') }} Homepage"
          class="logo logo--footer">
      </a>
      <div class="footer__contact">
        <div>{{ get_theme_mod('phonenumber_humans') }}</div>
        <div>{{ get_theme_mod('email_address') }}</div>
        <div>{{ get_theme_mod('address') }}</div>
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
    Copyright {{ get_bloginfo('name', 'display') }} &copy;{{ get_the_date('Y') }}
  </div>
</footer>
