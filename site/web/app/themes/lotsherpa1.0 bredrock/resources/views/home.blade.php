@extends('layouts.app')

@section('content')
  <h1>{!! App::title() !!}</h1>

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  @while (have_posts()) @php the_post() @endphp
    @include('partials.content-'.get_post_type())
  @endwhile

  @if($featured_category)
  <div class="featured-posts">
    <h2>{!! $featured_category->name !!}</h2>
    @php $q = App::postQuery(6,$featured_category->term_id) @endphp
    @foreach ( $q as $article )
      @include('partials.post-condensed')
    @endforeach
  </div>
  @endif

  {!! get_the_posts_navigation() !!}




@endsection


