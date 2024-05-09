<div class="bg-gray-900 shadow mb-5 max-h-96 overflow-y-scroll mt-10">
    @if ($post->comments->count())
        @foreach ( $post->comments as $comment )
            <div class="p-5 border-gray-300 border-b">
                <a href="{{ route('posts.index', $comment->user ) }} " class="font-bold text-gray-200">
                    {{$comment->user->username}}
                </a>
                <p class="text-gray-300">{{ $comment->comment }}
                <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}
            </div>
        @endforeach
    @else
        <p class="p-10 text-center text-white">No Hay Comentarios Aún</p>
    @endif
</div>
