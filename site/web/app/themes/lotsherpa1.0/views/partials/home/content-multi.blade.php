<section class="section"
  id="{{ FrontPage::titleToId($cmulti['title'] ?? 'services') }}">
  <h2 class="section__title">{{ $cmulti['title'] ?? 'Services' }}</h2>
  @if (!$cmulti['description'] == '')
  <p class="section__description">{{ $cmulti['description'] }}</p>
  @endif

  @if ($cmulti['subsections'])
    @foreach($cmulti['subsections'] as $key => $subsection)
      @include('partials.home.content-subsection', $subsection)
      @include('partials.feet', ['class' => App::evenOdd($key), 'offset' => 200])
    @endforeach
  @endif
</section>
