@if (empty($affiliate['link'] ))
<div class="affiliate" data-aos="fade-up">
  <img class="affiliate__icon"
    src="{{ $affiliate['icon']['url'] }}"
    alt="{{ $affiliate['name'] }}" />
</div>
@else
<a class="affiliate"
  title="{{ $affiliate['name'] }}"
  href="{{ $affiliate['link']['url'] }}"
  target="{{ $affiliate['link']['target'] }}"
  data-aos="fade-up">
  <img class="affiliate__icon"
    src="{{ $affiliate['icon']['url'] }}"
    alt="{{ $affiliate['name'] }}" />
</a>
@endif
