<section class="section">
  <div class="hero">
    <div class="hero__figure">
      <img src="{!! $hero['image']['url'] !!}"
        alt="{!! $hero['image']['alt'] !!}"
        class="hero__img">
    </div>
    <div class="hero__copy">
      {!! $hero['text'] !!}

      @include('partials.btns', ['section' => $hero])
    </div>
  </div>
</section>
