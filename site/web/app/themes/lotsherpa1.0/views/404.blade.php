@extends('layouts.app')

@section('content')

  @if (!have_posts())
    <div>
      <h1 class="center">404 Error</h1>
      <p class="center">The page you seek is not here. Please search or try another link.</p>
      {!! get_search_form(false) !!}

      @svg('images/404.svg', 'svg404')



    </div>


  @endif
@endsection
