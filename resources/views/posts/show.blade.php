@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <hr>
    <h3>Comments</h3>
    <ul>
        @foreach ($post->comments as $comment)
            <li>{{ $comment->content }} - <small>{{ $comment->user->name }}</small></li>
        @endforeach
    </ul>

    @auth
    <form action="{{ route('comments.store', $post) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">Leave a Comment:</label>
            <textarea name="content" id="content" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endauth
</div>
@endsection
