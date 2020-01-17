<section class="section single"
  id="{!! FrontPage::titleToId($csingle) !!}">
  <div class="section__wrap">
    <h2 class="section__title">{!! $csingle['title'] !!}</h2>
    <div class="section__figure id-card" data-aos="fade-up">
        <img src="{!! $csingle['icon']['image']['url'] !!}" alt="{!! $csingle['icon']['image']['alt'] !!}" class="id-card__icon">
      <div class="id-card__text">{!! $csingle['icon']['text'] !!}</div>
    </div>
    <p class="section__description">{!! $csingle['description'] !!}</p>
    @include('partials.btns', ['section' => $csingle])
  </div>
</section>
