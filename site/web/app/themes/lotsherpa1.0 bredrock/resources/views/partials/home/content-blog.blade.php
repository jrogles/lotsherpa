<section class="section"
  id="{!! FrontPage::titleToId($blog) !!}">
  <h2 class="section__title">{!! $blog['title'] !!}</h2>
  @if (!$blog['description'] == '')
  <p class="section__description">{!! $blog['description'] !!}</p>
  @endif

  <div class="posts">
    @foreach ( App::postQuery($blog['limit'],'') as $article )
      @include('partials.post-condensed')
    @endforeach
  </div>
</section>
