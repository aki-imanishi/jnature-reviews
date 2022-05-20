@if(count($places) > 0)
    <ul class="list-unstyled">
        @foreach($places as $place)
            <li class="media">
                <img class="col-sm-2" src="{{ asset(\Storage::url('place_image/' . $place->image1)) }}" width="100px" height="150px">
                <div class="media-body">
                    <div>
                        <h5><a href="/places/{{ $place->id }}">{{ $place->name }}</a></h5>
                    </div>
                    <div>
                       <p>{{ $place->information }}</p> 
                    </div>
                    
                </div>
            </li>
            <br>
        @endforeach
        
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $places->links() }}
@endif