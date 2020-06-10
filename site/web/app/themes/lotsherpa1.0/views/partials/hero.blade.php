<section class="section">
  <div class="hero">
    <div class="hero__copy">
      {!! $hero['text'] !!}

      @if ($hero['cta_primary'] !== '' || $hero['cta_secondary'] !== '')
        @include('partials.btns', ['section' => $hero])
      @endif
    </div>

    <div class="hero__figure {{ $hero['figure']['image_or_gallery'] }}">
      @if ($hero['figure']['image_or_gallery'] == 'image')
        @include('partials.img-srcset', ['img' => $hero['figure']['image'], 'class' => 'hero__img'])
      @else
        @include('partials.gallery.gallery-location', ['gallery' => $hero['figure']['gallery'], 'location' => '--hero'])
      @endif
    </div>

  </div>
</section>
