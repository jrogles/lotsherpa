<div class="post post--condensed">
  <a class="post__header" href="{{ get_permalink($article->ID) }}" target="_self">
    {!! get_the_post_thumbnail($article, 'thumbnail') !!}
    <div class="post__date">{{ get_the_date() }}</div>
  </a>
  <div class="post__body">
    <h5 class="post__title">{{ $article->post_title }}</h5>
    <p class="post__excerpt">{{ $article->post_excerpt }}</p>
  </div>
  <div class="post__categories">
    @foreach (get_the_category($article) as $cat)
      <a href="/category/{{ $cat->slug }}" target="_self" class="post__category">{!! $cat->name !!} </a>
    @endforeach
  </div>
  <div class="post__cta">
    <a class="btn btn--inverse" href="{{ get_permalink($article->ID) }}" target="_self">More</a>
  </div>
</div>

