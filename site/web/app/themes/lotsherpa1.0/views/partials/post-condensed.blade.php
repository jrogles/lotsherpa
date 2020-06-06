<article class="post post--condensed">
  <a class="post__header" href="{{ get_permalink($article->ID) }}" target="_self">
    <img srcset="{!! get_the_post_thumbnail_url($article, 'medium') !!} 480w,
             {!! get_the_post_thumbnail_url($article, 'medium_large') !!}  800w,
             {!! get_the_post_thumbnail_url($article, 'large') !!} 1200w,
             {!! get_the_post_thumbnail_url($article, 'full') !!} 1400w"

     sizes="(max-width: 600px) 480px,
            800px, 1200px, 1400px"
     src="{!! get_the_post_thumbnail_url($article, 'medium') !!}"
     alt="{!! get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) !!}"
     class="wp-post-image">
    <div class="post__date">{{ get_the_date() }}</div>
  </a>
  <div class="post__body">
    <h5 class="post__title">{{ $article->post_title }}</h5>
    <div class="post__excerpt">{{ $article->post_excerpt }}</div>
  </div>
  <div class="post__categories">
    @foreach (get_the_category($article) as $cat)
      <a href="/category/{{ $cat->slug }}" target="_self" class="post__category">{!! $cat->name !!} </a>
    @endforeach
  </div>
  <div class="post__cta">
    <a class="post__link" href="{{ get_permalink($article->ID) }}" target="_self">More &gt;</a>
  </div>
</article>
