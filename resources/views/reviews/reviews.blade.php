@if(count($reviews) > 0)
    <ul class="list-unstyled">
        @foreach($reviews as $review)
            <li class="media mb-3">
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        <a href="{{ route('users.show', ['user' => $review->user->id]) }}">{{ $review->user->name }}</a>
                        {{-- 投稿の所有者の観光地詳細ページへのリンク --}}
                        <a href="{{ route('places.show', ['place' => $review->place->id]) }}">{{ $review->place->name }}</a>
                        <span class="text-muted">posted at {{ $review->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($review->content)) !!}</p>
                    </div>
                    <div>
                        {{-- レビューを投稿したユーザのみ、そのレビューに削除ボタンが出る --}}
                        @if(Auth::id() == $review->user_id)
                            {{-- 投稿削除 --}}
                            {!! Form::open(['route' => ['reviews.destroy', $review->id], 'method' => 'delete']) !!} 
                            <!--$review->idを$review->place_idにする-->
                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                    
                </div>
            </li>
            
        @endforeach
    </ul>
    
    
@endif