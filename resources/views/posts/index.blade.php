
<!DOCTYPE html>
<html>
<head>
    <title>All Blog Posts</title>
</head>
<body>
    <h1>All Blog Posts</h1>

    @foreach ($posts as $post)
        <div style="margin-bottom: 20px;">
            <h2><a href="{{ url('/posts/' . $post->id) }}">{{ $post->title }}</a></h2>
            <p><strong>Author:</strong> {{ $post->author->name }}</p>
            <p>{{ Str::limit($post->content, 100) }}</p>
        </div>
    @endforeach
</body>
</html>
📄 Step 3: Create show.blade.php
This view shows a single post with its comments. Create the file:

bash
Copy code
resources/views/posts/show.blade.php
With this content:

blade
Copy code
<!-- resources/views/posts/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <p><strong>Author:</strong> {{ $post->author->name }}</p>
    <p>{{ $post->content }}</p>

    <hr>
    <h3>Comments</h3>
    @forelse ($post->comments as $comment)
        <div style="margin-bottom: 10px;">
            <strong>{{ $comment->commenter_name }}</strong>: {{ $comment->comment }}
        </div>
    @empty
        <p>No comments yet.</p>
    @endforelse

    <hr>
    <h3>Leave a Comment</h3>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ url('/posts/' . $post->id . '/comments') }}">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="commenter_name" required>
        </div>
        <div>
            <label>Comment:</label>
            <textarea name="comment" required></textarea>
        </div>
        <button type="submit">Submit Comment</button>
    </form>
</body>
</html>
