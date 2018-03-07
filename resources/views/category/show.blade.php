@extends('layouts.blog')

@section('content')

<div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-3 mb-4 font-italic border-bottom">
        All Post
      </h3>
      @foreach($category->posts as $postCategory)
      <div class="blog-post">
      <h2 class="blog-post-title"><a href="{{ route('posts.show', $postCategory->slug) }}">{{ $postCategory->title }}</a></h2>
      <p class="blog-post-meta">{{ $postCategory->created_at->diffForHumans() }} <a href="#">{{ $postCategory->user->name }}</a> in <a href="">{{ $postCategory->category->title }}</a></p>

      <p>{!! str_limit($postCategory->body, 600) !!} <a href="">read more...</a></p>
        
      </div><!-- /.blog-post -->
      @endforeach

      <nav aria-label="Page navigation example">


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