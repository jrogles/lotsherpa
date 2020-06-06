@extends('layouts.app')

@section('content')

  <div class="main-posts">
    <h1 class="main-posts__title">{!! App::title() !!}</h1>

    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif

    <div class="posts">
      @while (have_posts()) @php the_post() @endphp
        @includeWhen(!(has_term($featured_id,"category")) , 'partials.content-'.get_post_type())
      @endwhile
    </div>


  </div>

  @if($featured_category)
  <div class="featured-posts__toggle btn btn--soft">{!! $featured_category->name !!}</div>
  <div class="featured-posts">
    <h2 class="featured-posts__title">{!! $featured_name !!}</h2>

    <div class="posts">
      @foreach ( $featured_posts as $article )
        @include('partials.post-condensed')
      @endforeach
    </div>
  </div>
  @endif

  {!! get_the_posts_navigation() !!}

@endsection


