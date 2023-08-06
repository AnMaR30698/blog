@extends('inc.navebar')
@section('main')
{{--  it is welcome page  --}}

      <!-- header -->
      <header class="header">
        <div class="header-text">
          <h1>Alphayo Blog</h1>
          <h4>Home of verified news...</h4>
        </div>
        <div class="overlay"></div>
      </header>


      <h2 class="header-title">Latest Blog Posts</h2>
        <section class="cards-blog latest-blog">

            @foreach ($posts as $post)
               <div class="card-blog-content">
          <img src="{{ asset($post->imagePath) }}" alt="" />
          <p>
            {{ $post->created_at->diffForHumans() }}
             {{--  {{ $post->created_at }}  --}}
            {{--  {{  $post->created_at ? $post->created_at->diffForHumans : '-'}}  --}}
            <span>Written By {{ $post->user->name }}</span>
          </p>
          <h4>
            <a href="{{ route('show.blog' ,$post) }}">{{ $post->title }}</a>
          </h4>
        </div>
            @endforeach

        </section>



@endsection
