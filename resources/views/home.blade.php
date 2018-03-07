@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created by</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Body</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{ str_limit($post->title, 10) }}</td>
                                <td>{{ str_limit($post->slug, 10) }}</td>
                                <td>{{ $post->category->title }}</td>
                                @if($post->status === 1)
                                    <td>Published</td>
                                @else
                                    <td>In review</td>
                                @endif
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                <td> {!! str_limit($post->body, 20) !!} </td>
                                <td>
                                    @can('update', $post)
                                    <a class="btn btn-warning" href="{{ route('posts.edit', $post->slug) }}">Edit</a>
                                    @endcan
                                    @can('delete', $post)
                                    <a class="btn btn-danger" href="#">Delete</a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
