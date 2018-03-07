@extends('layouts.blog')

@section('content')

<div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $post->title }}
      </h3>
      
      <div class="blog-post">
      <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }} <a href="#">{{ $post->user->name }}</a> in <a href="{{ route('category', $post->category->uuid) }}">{{ $post->category->title }}</a></p>

      <p>{!! $post->body !!}</p>
        
      </div><!-- /.blog-post -->
 
      <hr>

    </div><!-- /.blog-main -->

    @include('layouts.partials.sidebar')

</div><!-- /.row -->

@endsection