<section class="section"
  id="{!! FrontPage::titleToId($cmulti) !!}">
  <h2 class="section__title">{!! $cmulti['title'] !!}</h2>
  @if (!$cmulti['description'] == '')
  <p class="section__description">{!! $cmulti['description'] !!}</p>
  @endif

  @if ($cmulti['subsections'])
    @foreach($cmulti['subsections'] as $subsection)
      @include('partials.home.content-subsection', $subsection)
    @endforeach
  @endif
</section>
