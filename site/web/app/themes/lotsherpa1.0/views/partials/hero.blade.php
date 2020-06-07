<section class="section">
  <div class="hero">
    <div class="hero__copy">
      {!! $hero['text'] !!}

      @include('partials.btns', ['section' => $hero])
    </div>

    <div class="hero__figure {{ $hero['figure']['image_or_gallery'] }}">
      @if ($hero['figure']['image_or_gallery'] == 'image')
      <img src="{{ $hero['figure']['image']['url'] }}"
        alt="{{ $hero['figure']['image']['alt'] }}"
        class="hero__img">
      @else
        @include('partials.gallery.gallery', ['gallery' => $hero['figure']['gallery'], 'location' => '--hero'])
      @endif
    </div>

  </div>
</section>
