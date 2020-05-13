<header class="header">
  <a class="logo" href="{{ home_url('/') }}"><img src="{{get_theme_mod('upload_logo')}}"
      alt="{{ get_bloginfo('name', 'display') }}"
      class="logo__img"></a>
  <nav class="nav-primary">
    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
    @endif
  </nav>
  <div class="nav__mobile-toggle">Menu</div>
</header>
