@if ( App::svgCheck($img['url']) )
<div data-aos="fade-up" class=" {{ $class ?? '' }}">
    <?= do_shortcode( sprintf( '[wpsvg_inline id="%s"]', $img['ID'] ?? $img['Id'] ) ); ?>
</div>
@else
    <img srcset="{{ $img['sizes']['medium'][0] }} 480w,
             {{ $img['sizes']['medium_large'][0] }}  800w,
             {{ $img['sizes']['large'][0] }} 1200w,
             {{ $img['sizes']['full'][0] }} 1400w"

     sizes="(max-width: 600px) 480px,
            800px, 1200px, 1400px"
     src="{{ $img['sizes']['medium'][0] }}"
     alt="{{ $img['alt'] }}"
     class="{{ $class ?? '' }}"
     data-aos="fade-up" />
@endif
