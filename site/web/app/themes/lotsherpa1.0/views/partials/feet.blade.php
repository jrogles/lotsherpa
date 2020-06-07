@for($i = 0; $i < ($amount ?? 1); $i++)
  <div class="feet__wrap {!! $class ?? null !!}"
    data-aos="feet"
    data-aos-offset="{!! $offset ?? 100 !!}"
    data-aos-easing="ease-in-out">
    @svg('images/YetiFeet.svg', 'feet')
  </div>
@endfor
