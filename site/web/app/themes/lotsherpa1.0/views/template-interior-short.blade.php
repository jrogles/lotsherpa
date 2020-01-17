{{--
  Template Name: Interior - Short
--}}

@extends('layouts.app')

@section('content')
  <main class="main {{ strtolower(get_field('left_or_right')) }}">
    @while(have_posts()) @php the_post() @endphp

    <div class="section">
      <h1 class="section__title">{!! App::title() !!}</h1>
      <div class="section__content">{{ the_content() }}</div>
    </div>
    <div class="section section__secondary">
      @if ($additional_content_one)
        @include('partials.tile', ['tile' => $additional_content_one])
      @endif
      @if ($additional_content_two)
        @include('partials.tile', ['tile' => $additional_content_two])
      @endif
      @if ($multi_cta)
        @include('partials.tile-multi')
      @endif
    </div>

    @endwhile
  </main>
  @include('partials.disclosures')

@endsection
