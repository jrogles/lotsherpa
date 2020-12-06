@extends('layouts.app')

@section('content')

  <h1>404 Error</h1>
    <p>The page you seek is not here. Please search or try another link.</p>
    {!! get_search_form(false) !!}

    @svg('images/404.svg', 'svg404')
@endsection
