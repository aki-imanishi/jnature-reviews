@extends('layouts.app')

@section('content')

    @if(count($places) > 0)
        <ul class="list-unstyled">
            @foreach($places as $place)
                <li class="media">
                    <img class="col-sm-2" src="{{ asset($place->image1) }}" alt="">
                    <div class="media-body">
                        <div>
                            {{ $place->name }}
                        </div>
                        <div>
                            {{-- 観光地の詳細ページへのリンク --}}
                            <p>{!! link_to_route('places.show', '詳細を見る', ['place' => $place->id]) !!}</p>
                        </div>
                    </div>
                </li>
            @endforeach
            
        </ul>
        {{-- ページネーションのリンク --}}
        {{ $places->links() }}
    @endif
    
@endsection