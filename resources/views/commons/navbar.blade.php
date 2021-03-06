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
                    {{--マイページ--}}
                    {{--<li class="nav-item">{!! link_to_route('users.show', 'マイページ', ['user' => Auth::id()], ['class' => 'nav-link'] ) !!}</li>--}}
                    <li class="nav-item">
                        <a href="/users/{{ Auth::id() }}" class="nav-link">マイページ</a>
                    </li>
                    {{--ログアウト--}}
                    <li class="nav-item">
                        {{--{!! link_to_route('logout', 'ログアウト', [], ['class' => 'nav-link']) !!}--}}
                        <a href="/logout" class="nav-link">ログアウト</a>
                    </li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">
                        {{--{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link']) !!}--}}
                        <a href="signup" class="nav-link">会員登録</a>
                    </li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">
                        {{--{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}--}}
                        <a href="login" class="nav-link">ログイン</a>
                    </li>
                @endif
                
                
            </ul>
        </div>
    </nav>
</header>