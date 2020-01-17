<header class="header">
  <a class="logo" href="{{ home_url('/') }}">
    @if ($customized_theme['logo_ext'] == 'svg')
    <?= do_shortcode( sprintf( '[wpsvg_inline id="%s"]', $customized_theme['logo_id'] ) ); ?>
    @else
    <img src="{{$customized_theme['upload_logo']}}"
    alt="{{ get_bloginfo('name', 'display') }}"
    class="logo__img wpsvg-inline">
    @endif
  </a>
  <div class="nav__mobile-toggle">Menu</div>
  <nav class="nav-primary">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
    @endif
  </nav>
</header>
