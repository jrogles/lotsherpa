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
        @include('partials.content-'.get_post_type())
      @endwhile
    </div>


  </div>

  @if($featured_category)
  <div class="featured-posts__toggle btn btn--soft">{!! $featured_category->name !!}</div>
  <div class="featured-posts">
    <h2 class="featured-posts__title">{!! $featured_category->name !!}</h2>

    <div class="posts">
      @php $q = App::postQuery(6,$featured_category->term_id) @endphp
      @foreach ( $q as $article )
        @include('partials.post-condensed')
      @endforeach
    </div>
  </div>
  @endif

  {!! get_the_posts_navigation() !!}




@endsection


