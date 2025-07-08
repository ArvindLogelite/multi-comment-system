<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>

@include('partials.comments', ['comments' => $post->comments])


@if ($errors->any())
    <div style="color: red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<h4>Add Comment</h4>
<form method="POST" action="{{ route('comment.store') }}">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <textarea name="content"></textarea>
    <button type="submit">Submit</button>
</form>

