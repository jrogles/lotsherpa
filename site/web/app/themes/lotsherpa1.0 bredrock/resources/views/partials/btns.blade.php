@if (
  isset($section['cta_secondary']) ||
  isset($section['cta_primary']) ||
  isset($section['cta']))
  <p class="btns">
    @if (isset($section['cta_secondary']))
      <a class="btn btn--secondary" href="{!! $section['cta_secondary']['url'] !!}" target="{!! $section['cta_secondary']['target'] !!}">{!! $section['cta_secondary']['title'] !!}</a>
    @endif
    @if (isset($section['cta_primary']))
      <a class="btn btn--primary"
        href="{!! $section['cta_primary']['url'] !!}"
        target="{!! $section['cta_primary']['target'] !!}">
        {!! $section['cta_primary']['title'] !!}</a>
    @endif
    @if (isset($section['cta']))
      <a class="btn" href="{!! $section['cta']['url'] !!}" target="{!! $section['cta']['target'] !!}">
      {!! $section['cta']['title'] !!}</a>
    @endif
  </p>
@endif
