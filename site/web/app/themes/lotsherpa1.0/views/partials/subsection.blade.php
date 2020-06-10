<div class="subsection subsection--{{ $figure_side }}"
  id="{{ $id }}">
  <div class="subsection__content">
    <h2 class="subsection__title">{{ $title }}</h2>
    <div class="subsection__copy">{!! $text !!}</div>
  </div>

  <div class="subsection__figure">
    @includeWhen($figure, 'partials.figure', ['figure' => $figure])
  </div>
</div>
