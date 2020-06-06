<section class="section"
  id="{!! FrontPage::titleToId($cmulti) !!}">
  <h2 class="section__title">{!! $cmulti['title'] !!}</h2>
  @if (!$cmulti['description'] == '')
  <p class="section__description">{!! $cmulti['description'] !!}</p>
  @endif

  @if ($cmulti['subsections'])
    @foreach($cmulti['subsections'] as $key => $subsection)
      @include('partials.home.content-subsection', $subsection)
      <div class="feet__wrap {!! App::evenOdd($key) !!}"
        data-aos="feet"
        data-aos-offset="200"
        data-aos-easing="ease-in-out"
      >
        @svg('images/YetiFeet.svg', 'feet')
      </div>
    @endforeach
  @endif
</section>
