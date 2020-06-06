<div class="swiper-slide">
@if ( App::svgCheck($slide['url']) )
<img
     data-src="{!! $slide['sizes']['medium'] !!}"
     alt="{!! $slide['alt'] !!}"
     class="figure__img figure__svg figure__img--{!! App::imgAspect( $slide['url'] ) !!} swiper-lazy" />
     <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
@else
  <img data-srcset="{!! $slide['sizes']['medium'] !!} 480w,
             {!! $slide['sizes']['medium_large'] !!}  800w,
             {!! $slide['sizes']['large'] !!} 1200w,
             {!! $slide['url'] !!} 1400w"

     sizes="50vw"
     data-src="{!! $slide['sizes']['medium'] !!}"
     alt="{!! $slide['alt'] !!}"
     class="figure__img figure__img--{!! App::imgAspect( $slide['url'] ) !!} swiper-lazy">
     <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
@endif
</div>
