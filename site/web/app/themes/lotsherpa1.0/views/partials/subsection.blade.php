<div class="subsection subsection--{{ $figure_side }}"
  id="{{ $id }}" data-aos="fade-up">
  <div class="subsection__content">
    <h2 class="subsection__title">{{ $title }}</h2>
    <div class="subsection__copy">{{ $text }}</div>
  </div>

  <div class="subsection__figure">
    @include('partials.figure', ['figure' => $figure])
  </div>
</div>
