<div class="tile tile--multi">
  <div class="tile--multi__title">
    <span class="tile--multi__title__text">{!! $multi_cta['text'] !!}</span>
  </div>
  <div class="tile--multi__cta">
    <a href="{!! $multi_cta['icon_one']['url']['url'] !!}"
      target="{!! $multi_cta['icon_one']['url']['target'] !!}"
      class="tile--multi__link">
      <img src="{!! $multi_cta['icon_one']['icon']['url'] !!}"
        alt="{!! $multi_cta['icon_one']['icon']['alt'] !!}"
        class="tile--multi__img" />
    </a>
  </div>
  <div class="tile--multi__cta">
    <a href="{!! $multi_cta['icon_two']['url']['url'] !!}"
      target="{!! $multi_cta['icon_two']['url']['target'] !!}"
      class="tile--multi__link">
      <img src="{!! $multi_cta['icon_two']['icon']['url'] !!}"
        alt="{!! $multi_cta['icon_two']['icon']['alt'] !!}"
        class="tile--multi__img" />
    </a>
  </div>
</div>
