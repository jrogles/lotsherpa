<div class="subsection subsection--{{ $subsection['orientation'] }}" >
  <div class="subsection__content">
    <h3 class="subsection__title">{{ $subsection['title'] }}</h3>
    <div class="subsection__copy">
      {!! $subsection['text'] !!}
      @includeWhen(!empty($subsection['cta']),'partials.btns', ['section' => $subsection])
    </div>
  </div>
    @includeWhen($subsection['figure'], 'partials.figure', ['figure' => $subsection['figure']])
</div>


