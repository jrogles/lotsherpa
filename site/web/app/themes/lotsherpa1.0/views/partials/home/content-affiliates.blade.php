<div class="section affiliates">
  <div class="swiper-container--affiliates swiper-effect-slide">
    <div class="swiper-wrapper gallery">
      @foreach($affiliates as $affiliate)
        @include('partials.affiliates', $affiliate)
      @endforeach
    </div>
  </div>
</div>
