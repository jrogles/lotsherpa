{{--
  Template Name: Interior - Long
--}}

@extends('layouts.app')

@section('content')
  <main class="main">
    @while(have_posts()) @php the_post() @endphp
    <h1 class="main__title">{!! App::title() !!}</h1>
    <div class="main__description">{{ the_content() }}</div>

    @if ($contents)
      @if (TemplateInteriorLong::hasJumplinks($contents))
      <div class="subsections__nav">
        @foreach($contents as $content)
          @include('partials.nav-subsections', $content)
        @endforeach
      </div>
      @endif

      @include('partials.disclosures')

      <div class="subsections">
        @foreach($contents as $content)
          @include('partials.subsection', $content)
        @endforeach

        @if ( has_post_thumbnail() )
          <div class="main__figure">

              @include('partials.img-srcset-featured', ['img' => App::getFeaturedImage()])

          </div>
        @endif
      </div>
    @endif

    @endwhile
  </main>
@endsection



