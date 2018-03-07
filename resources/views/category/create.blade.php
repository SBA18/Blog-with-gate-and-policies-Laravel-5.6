@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Category</div>

                <div class="card-body">
                <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Title</label>
                          <input type="text" name="title" class="form-control" id="title" placeholder="Category title" required>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Category list</div>

                <div class="card-body">
                    <ul class="nav flex-column">
                        @foreach($categories as $category)
                        <li class="nav-item">
                        <a class="nav-link active" href="#">{{ $category->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')

@endsection