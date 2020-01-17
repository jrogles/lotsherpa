@if (isset($tile['link']['url']))
<a href="{!! $tile['link']['url'] !!}"
  target="$tile['link']['target']"
  class="tile">
@else
<div class="tile">
@endif
  @if ($tile['icon'])
  <img src="{!! $tile['icon']['url'] !!}"
    alt="{!! $tile['icon']['alt'] !!}"
    class="tile__img" />
  @endif
  @if (isset($tile['text']))
  <h4 class="tile__title">{!! $tile['text'] !!}</h4>
  @endif
@if (isset($tile['link']['url']))
</a>
@else
</div>
@endif
