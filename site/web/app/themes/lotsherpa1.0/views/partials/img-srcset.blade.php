@if ( App::svgCheck($img['url']) )
<img
     src="{{ $img['sizes']['medium'] }}"
     alt="{{ $img['alt'] }}"
     class="figure figure__img figure__img--svg figure__img--{{ App::imgAspect( $img['url'] ) }}
     {{ $class ?? '' }}" />
@else
  <img srcset="{{ $img['sizes']['medium'] }} 480w,
             {{ $img['sizes']['medium_large'] }}  800w,
             {{ $img['sizes']['large'] }} 1200w,
             {{ $img['url'] }} 1400w"

     sizes="(max-width: 600px) 480px,
            800px, 1200px, 1400px"
     src="{{ $img['sizes']['medium'] }}"
     alt="{{ $img['alt'] }}"
     class="figure figure__img figure__img--{{ App::imgAspect( $img['url'] ) }}
     {{ $class ?? '' }}" />
@endif
