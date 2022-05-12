<ul class="nav nav-tabs">
    {{--レビュー一覧タブ--}}
    <li class="nav-item">
        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
            レビュー一覧
            <span class="badge badge-secondary">{{ $user->reviews_count }}</span>
        </a>
    </li>
    
    <!--自分の保存した観光地のみ見ることができる-->
    @if(Auth::id() == $user->id)
        {{--行きたい観光地一覧タブ--}}
        <li class="nav-item">
            <a href="{{ route('saved', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('saved') ? 'active' : '' }}">
                行きたい観光地一覧
                <span class="badge badge-secondary">{{ $user->save_places_count }}</span>
            </a>
        </li>
    @endif
    
</ul>