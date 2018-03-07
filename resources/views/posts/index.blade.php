@extends('layouts.blog')

@section('content')

<div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-3 mb-4 font-italic border-bottom">
        Latest Blog posts
      </h3>
      @foreach($posts as $post)
      <div class="blog-post">
      <h2 class="blog-post-title"><a href="{{ route('posts.show', $post->slug)}}">{{ $post->title }}</a></h2>
      <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }} <a href="{{ route('userPosts', $post->user->uuid) }}">{{ $post->user->name }}</a> in <a href="{{ route('category', $post->category->uuid) }}">{{ $post->category->title }}</a></p>

      <p>{!! str_limit($post->body, 600) !!} <a href="{{ route('posts.show', $post->slug) }}">read more...</a></p>
        
      </div><!-- /.blog-post -->
      @endforeach

      <nav aria-label="Page navigation example">

        {{ $posts->links() }}

      </nav>
      <hr>
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
      </nav>

    </div><!-- /.blog-main -->

    @include('layouts.partials.sidebar')

</div><!-- /.row -->

@endsection