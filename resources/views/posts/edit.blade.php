@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                <form method="POST" action="{{ route('posts.update', $post->slug) }}">
                    @csrf
                    @method('PATCH')
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Slug</label>
                          <input type="text" name="slug" class="form-control" id="slug" value="{{ $post->slug }}" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Category</label>
                          <select class="form-control" name="category_id" id="category_id">
                                <option value="{{ $post->category->id }}">{{ $post->category->title }}</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                          </select>
                        </div>
                        @can('publishPost', \App\Post::class)
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="{{ $post->status }}">
                                    @if($post->status === 0)
                                        In review
                                    @else
                                        Published
                                    @endif
                                </option>
                                <option value="0">In review</option>
                                <option value="1">Published</option>
                            </select>
                        </div>
                        @endcan
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Post body</label>
                        <textarea class="form-control" name="body" id="body" rows="10">{{ $post->body }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')

<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>

<script>
    tinymce.init({
        selector: '#body'
    });
</script>

@endsection