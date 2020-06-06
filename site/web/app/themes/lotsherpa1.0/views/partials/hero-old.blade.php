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
        <!-- Slider main container -->
        <div class="swiper-container
          swiper-effect-{!! $hero['gallery']['transition_type'] !!}">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach($hero['gallery']['gallery_images'] as $figure)
                  @include('partials.gallery-lazy', $figure)
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

        </div>
      @endif
    </div>

  </div>
</section>
