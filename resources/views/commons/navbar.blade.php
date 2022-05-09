<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">J-Nature Reviews</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check()) {{--ログイン中--}}
                    {{--観光地の一覧--}}
                    <li class="nav-item">{!! link_to_route('places.index', '観光地一覧', [], ['class' => 'nav-link']) !!}</li>
                    {{--マイページ--}}
                    <li class="nav-item">{!! link_to_route('users.show', 'マイページ', ['user' => Auth::id()], ['class' => 'nav-link'] ) !!}</li>
                    {{--ログアウト--}}
                    <li class="nav-item">{!! link_to_route('logout', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
                
                
            </ul>
        </div>
    </nav>
</header>