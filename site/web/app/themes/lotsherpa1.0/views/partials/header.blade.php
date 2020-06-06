<header class="header">
  <a class="logo" href="{{ home_url('/') }}">
        @if (isset($customized_theme['logo_ext']) && $customized_theme['logo_ext'] == 'svg')
          <?= do_shortcode( sprintf( '[wpsvg_inline id="%s"]', $customized_theme['logo_id'] ) ); ?>
        @endif

      <img src="{{ $customized_theme['logo'] }}"
      alt="{{ get_bloginfo('name', 'display') ?? 'Lotsherpa' }}"
      class="logo__img wpsvg-inline">
  </a>
  <div class="nav__mobile-toggle">Menu</div>
  <nav class="nav-primary">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
    @else
      <ul id="menu-main-menu" class="nav"><li class="menu-item menu-home"><a href="/">Home</a></li>
      </ul>
    @endif
  </nav>
</header>
