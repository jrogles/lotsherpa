<div class="figure">
@if ( App::svgCheck($img['url']) )
<div data-aos="fade-up" class="figure__img figure__img--svg figure__img--{{ App::imgAspect( $img['url'] ) }} {{ $class ?? '' }}">
    <?= do_shortcode( sprintf( '[wpsvg_inline id="%s"]', $img['ID'] ?? $img['Id'] ) ); ?>
</div>
@else
  <img srcset="{{ $img['sizes']['medium'] }} 480w,
             {{ $img['sizes']['medium_large'] }}  800w,
             {{ $img['sizes']['large'] }} 1200w,
             {{ $img['url'] }} 1400w"

     sizes="(max-width: 600px) 480px,
            800px, 1200px, 1400px"
     src="{{ $img['sizes']['medium'] }}"
     alt="{{ $img['alt'] ?? '' }}"
     class="figure__img figure__img--{{ App::imgAspect( $img['url'] ) }}
     {{ $class ?? '' }}" />
@endif
</div>
