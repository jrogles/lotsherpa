<article @php post_class('post post--condensed') @endphp>
  <a class="post__header" href="{{ get_permalink() }}" target="_self">
    {!! the_post_thumbnail() !!}
    <div class="post__date">{{ get_the_date() }}</div>
  </a>
  <div class="post__body">
    <h5 class="post__title">{{ the_title() }}</h5>
    <p class="post__excerpt">{{ the_excerpt() }}</p>
  </div>
  <div class="post__categories">
    @foreach (get_the_category() as $cat)
      <a href="/category/{{ $cat->slug }}" target="_self" class="post__category">{!! $cat->name !!} </a>
    @endforeach
  </div>
  <div class="post__cta">
    <a class="post__link" href="{{ get_permalink() }}" target="_self">More &gt;</a>
  </div>
</article>
