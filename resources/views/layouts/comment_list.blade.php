@foreach ($poker->comments as $comment)
  <div class="mb-2">
        <span>{{ $comment->comment }}</span>
        @if ($comment->user->id == Auth::id())
            <a class="delete-comment" data-remote="true" rel="nofollow" data-method="delete" href="/comments/{{ $comment->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </a>
        @endif
        <div>
            @if($comment->is_liked_by_auth_user())
                <a href="{{ route('unlike', ['id' => $comment->id]) }}" class="btn btn-success btn-sm">いいね<span class="badge">{{ $comment->likes->count() }}</span></a>
            @else
                <a href="{{ route('like', ['id' => $comment->id]) }}" class="btn btn-secondary btn-sm">いいね<span class="badge">{{ $comment->likes->count() }}</span></a>
            @endif
        </div>
  </div>
@endforeach