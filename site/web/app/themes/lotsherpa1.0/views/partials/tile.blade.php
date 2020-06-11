@if (!empty($tile['link']['url']))
<a href="{!! $tile['link']['url'] !!}"
  target="$tile['link']['target']"
  class="tile">
@else
<div class="tile">
@endif
    @includeWhen($tile['figure'], 'partials.figure', ['figure' => $tile['figure']])
  @if (!empty($tile['text']))
    <h4 class="tile__title">{!! $tile['text'] !!}</h4>
  @endif
@if (!empty($tile['link']['url']))
</a>
@else
</div>
@endif

