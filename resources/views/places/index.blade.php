@if(count($places) > 0)
    <ul class="list-unstyled">
        @foreach($places as $place)
            <li class="media">
                <img class="col-sm-2" src="{{ asset(\Storage::url('place_image/' . $place->image1)) }}" width="100" height="150">
                <div class="media-body">
                    <div>
                        {{ $place->name }}
                    </div>
                    <div>
                        {{-- 観光地の詳細ページへのリンク --}}
                        <p>
                            <a href="/places/{{ $place->id }}">詳細を見る</a>
                            {{--{!! link_to_route('places.show', '詳細を見る', ['place' => $place->id]) !!}--}}
                        </p>
                    </div>
                </div>
            </li>
            <br>
        @endforeach
        
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $places->links() }}
@endif