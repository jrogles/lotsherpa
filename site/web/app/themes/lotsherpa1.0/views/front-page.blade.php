@extends('layouts.app')

@section('content')
  <main class="main">
    @while(have_posts()) @php the_post() @endphp

      @includeWhen($hero, 'partials.hero')
      @includeWhen($hero, 'partials.feet', ['amount' => 3, 'offset' => 300])


      @includeWhen($cmulti, 'partials.home.content-multi')
      @includeWhen($cmulti, 'partials.feet', ['amount' => 2, 'offset' => 300])


      @includeWhen($blog, 'partials.home.content-blog')
      @includeWhen($blog, 'partials.feet', ['offset' => 300])

      @includeWhen($csingle, 'partials.home.content-single')
      @includeWhen($hero, 'partials.feet', ['offset' => 200])

      @includeWhen($affiliates, 'partials.home.content-affiliates')

    @endwhile
  </main>
@endsection
