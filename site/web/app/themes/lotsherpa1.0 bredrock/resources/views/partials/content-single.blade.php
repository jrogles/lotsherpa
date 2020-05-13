<article @php post_class() @endphp>
  <div class="post__header">
    {{ the_post_thumbnail('large') }}
    <h1 class="post__title">{!! get_the_title() !!}</h1>
    <div class="post__date">@include('partials/entry-meta')</div>
    <div class="post__categories">
      @foreach (get_the_category() as $cat)
        @if ($cat->name !== 'Featured')
          <a href="">{{ $cat->name }}</a>
        @endif
      @endforeach
    </div>
  </div>
  <div class="post__body entry-content">
    @php the_content() @endphp
  </div>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>

<div>

  @if($related_posts)
  <div class="related-posts">
    @foreach ( $related_posts as $article )
      @include('partials.post-condensed')
    @endforeach
  </div>
  @endif

</div>
