<div class="subsection subsection--{!! strtolower($subsection['orientation']) !!}" data-aos="fade-up">
  <div class="subsection__content">
    <h3 class="subsection__title">{!! $subsection['title'] !!}</h3>
    <div class="subsection__copy">
      {!! $subsection['text'] !!}
      @include('partials.btns', ['section' => $subsection])
    </div>
  </div>
  <!--<a class="subsection__figure" href="{!! $subsection['cta']['url'] !!}">-->
    @include('partials.figure', ['figure' => $subsection['figure']])

  <!--</a>-->
</div>
