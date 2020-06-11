<section class="section single"
  id="{{ FrontPage::titleToId($csingle['title']) ?? 'about' }}">
  <div class="section__wrap">
    <h2 class="section__title">{{ $csingle['title'] ?? 'About' }}</h2>
    <div class="section__figure id-card" data-aos="fade-up">
         @includeWhen($csingle['icon']['image'], 'partials.img-srcset', ['img' => $csingle['icon']['image'], 'class' => 'id-card__icon'])
      <div class="id-card__text">{!! $csingle['icon']['text'] !!}</div>
    </div>
    <p class="section__description">{{ $csingle['description'] }}</p>

    @if ($csingle['cta_primary'] !== '' || $csingle['cta_secondary'] !== '')
      @include('partials.btns', ['section' => $csingle])
    @endif
  </div>
</section>
