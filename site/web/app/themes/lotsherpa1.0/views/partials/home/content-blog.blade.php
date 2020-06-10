<section class="section" data-aos="fade-up"
  id="{{ FrontPage::titleToId($blog['title']  ?? 'blog') }}">
  <h2 class="section__title">{{ $blog['title'] ?? 'Blog' }}</h2>
  @if (!empty($blog['description']))
  <p class="section__description">{{ $blog['description'] }}</p>
  @endif

  <div class="posts">
    @foreach ( App::postQuery($blog['limit'],'') as $article )
      @include('partials.post-condensed')
    @endforeach
  </div>
  <a href="{{ $blog['blog_archive_page'] }}" class="posts-link"><h6>More articles ></h6></a>
</section>
