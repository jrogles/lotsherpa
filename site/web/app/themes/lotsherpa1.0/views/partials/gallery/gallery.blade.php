<div class="figure swiper-container
  swiper-effect-{!! $gallery['transition_type'] !!}">
    <div class="swiper-wrapper gallery">
        @foreach($gallery['gallery_images'] as $slide)
          @include('partials.gallery.slide-lazy')
        @endforeach
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-pagination"></div>
</div>
