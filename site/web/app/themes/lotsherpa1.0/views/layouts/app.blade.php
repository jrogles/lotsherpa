<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp id="body">
    @php do_action('get_header') @endphp
    @include('partials.header')
    <div class="content" role="document">
        @yield('content')
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
