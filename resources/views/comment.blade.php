@foreach ($comments as $comment)
    @php
        // Validate depth and calculate margin-left
        $depth = is_numeric($comment->depth) && $comment->depth > 0 ? $comment->depth : 1;
        $marginLeft = ($depth - 1) * 20;
    @endphp

    <div 
        style="<?php echo 'margin-left: ' . $marginLeft . 'px; border-left: 1px solid #ccc; padding-left: 10px; margin-bottom: 10px;'; ?>"
    >
        <p>{{ $comment->content }}</p>

        @if ($depth < 3)
            <form method="POST" action="{{ route('comment.store') }}">
                @csrf
                <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}">
                <textarea name="content" rows="2" required placeholder="Write your reply..."></textarea>
                <button type="submit">Reply</button>
            </form>
        @endif

        {{-- Recursive call to show replies --}}
        @if ($comment->replies->count() > 0)
            @include('partials.comments', ['comments' => $comment->replies])
        @endif
    </div>
@endforeach
