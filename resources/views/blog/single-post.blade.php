@extends('inc.navebar')
@section('main')


<section class="single-blog-post">
        <h1>{{ $post->title }}</h1>

        <p class="time-and-author">
          {{--  {{ ($post->created_at)->deffForHumans() }}  --}}
          {{--  {{ $post->created_at->deffForHumans() }}  --}}
          {{ $post->created_at->diffForHumans() }}
          <span>Written By {{ $post->user->name }}</span>
        </p>

        <div class="single-blog-post-ContentImage" data-aos="fade-left">
          <img src="{{ asset($post->imagePath) }}" alt="" />
        </div>

        <div class="about-text">
          {!! $post->body !!} 
        </div>
      </section>
      <section>
       @foreach ($comments as $comment)
         <b>{{ $comment->user->name }}</b><h4>{{  $comment->created_at->diffForHumans() }}</h4><br>
         <h3>{{ $comment->coment }}</h3>
         <br>*****<br><br>
       @endforeach
       @auth()
         <form action="{{ route('add.comment', $post) }}" method="POST" enctype="multipart/form-data" >
         @csrf
         <label for="come"> add a comment</label>
        <textarea name="comme"  cols="5" rows="1"></textarea>
             <input type="submit" value=" add comment">
       </form>
       @endauth

      </section>
      <section class="recommended">
        <p>Related</p>
        <div class="recommended-cards">
          
          @forelse ($relatedPosts as $relatedPost )
         <a href="{{ route('show.blog' ,$relatedPost) }}">
            <div class="recommended-card">
              <img src="{{ asset($relatedPost->imagePath) }}" alt="" loading="lazy" />
              <h4>
                {{ $relatedPost->title }}
              </h4>
            </div>
          </a>

          @empty
                <p> sorry , there is no related post ! </p>  
          @endforelse

        </div>
         
      </section>


@endsection