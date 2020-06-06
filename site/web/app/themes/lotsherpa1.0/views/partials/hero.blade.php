<section class="section">
  <div class="hero">
    <div class="hero__copy">
      {!! $hero['text'] !!}
    </div>

    @include('partials.btns', ['section' => $hero])

    <div class="hero__figure {!! $hero['image_or_gallery'] !!}">
      @if ($hero['image_or_gallery'] == 'image')
      <img src="{!! $hero['image']['url'] !!}"
        alt="{!! $hero['image']['alt'] !!}"
        class="hero__img">
      @else
        @include('partials.gallery.gallery', ['gallery' => $hero['gallery']])
      @endif
    </div>

  </div>
</section>
