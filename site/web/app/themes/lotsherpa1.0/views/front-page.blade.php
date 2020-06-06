@extends('layouts.app')

@section('content')
  <main class="main">
    @while(have_posts()) @php the_post() @endphp

      @includeWhen(isset($hero), 'partials.hero')
      <div class="feet__wrap"
        data-aos="feet"
        data-aos-offset="100"
        data-aos-easing="ease-in-out">
        @svg('images/YetiFeet.svg', 'feet')
      </div>
      <div class="feet__wrap"
        data-aos="feet"
        data-aos-offset="100"
        data-aos-easing="ease-in-out">
        @svg('images/YetiFeet.svg', 'feet')
      </div>
      <div class="feet__wrap"
        data-aos="feet"
        data-aos-offset="100"
        data-aos-easing="ease-in-out">
        @svg('images/YetiFeet.svg', 'feet')
      </div>
      @includeWhen(isset($cmulti), 'partials.home.content-multi')
      <div class="feet__wrap segway"
        data-aos="feet"
        data-aos-offset="200"
        data-aos-easing="ease-in-out">
        @svg('images/YetiFeet.svg', 'feet')
      </div>
      <div class="feet__wrap"
        data-aos="feet"
        data-aos-offset="200"
        data-aos-easing="ease-in-out">
        @svg('images/YetiFeet.svg', 'feet')
      </div>
      @includeWhen(isset($blog), 'partials.home.content-blog')
      <div class="feet__wrap"
        data-aos="feet"
        data-aos-offset="300"
        data-aos-easing="ease-in-out">
        @svg('images/YetiFeet.svg', 'feet')
      </div>
      @includeWhen(isset($csingle), 'partials.home.content-single')
      <div class="feet__wrap"
        data-aos="feet"
        data-aos-offset="200"
        data-aos-easing="ease-in-out">
        @svg('images/YetiFeet.svg', 'feet')
      </div>
      @includeWhen(isset($affiliates), 'partials.home.content-affiliates')

    @endwhile
  </main>
@endsection
