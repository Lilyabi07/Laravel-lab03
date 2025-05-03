<!-- show.blade.php : will display a single blog post and its comments, as well as a form to submit a new comment. -->

<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <p>By {{ $post->author->name }}</p>
    <p>{{ $post->content }}</p>

    <hr>

    <h2>Comments</h2>

    @if ($post->comments->count())
        <ul>
            @foreach ($post->comments as $comment)
                <li>
                    <strong>{{ $comment->commenter_name }}</strong>: {{ $comment->comment }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No comments yet.</p>
    @endif

    <hr>

    <h3>Leave a Comment</h3>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('/posts/' . $post->id . '/comments') }}" method="POST">
        @csrf
        <div>
            <label for="commenter_name">Your Name:</label><br>
            <input type="text" name="commenter_name" id="commenter_name" value="{{ old('commenter_name') }}">
        </div>
        <div>
            <label for="comment">Comment:</label><br>
            <textarea name="comment" id="comment">{{ old('comment') }}</textarea>
        </div>
        <div>
            <button
