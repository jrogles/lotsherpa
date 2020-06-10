<div class="affiliate swiper-slide">
  @if (!empty($affiliate['link'] ))
    <a class="affiliate"
      title="{{ $affiliate['name'] }}"
      href="{{ $affiliate['link']['url'] }}"
      target="{{ $affiliate['link']['target'] }}">
  @endif

  @include('partials.img-srcset', ['img' => $affiliate['icon'], 'class' => 'affiliate__icon'])

  @if (!empty($affiliate['link'] ))
    </a>
  @endif
</div>

