@extends('layouts.app')

@section('content')
  <main class="main">
    @while(have_posts()) @php the_post() @endphp

      @includeWhen(isset($hero), 'partials.hero')
      @includeWhen(isset($cmulti), 'partials.home.content-multi')
      @includeWhen(isset($blog), 'partials.home.content-blog')
      @includeWhen(isset($csingle), 'partials.home.content-single')
      @includeWhen(isset($affiliates), 'partials.home.content-affiliates')

    @endwhile
  </main>
@endsection
