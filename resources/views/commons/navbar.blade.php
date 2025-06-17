<header class="mb-4">
    <nav class="navbar bg-neutral text-neutral-content">
        {{-- トップページへのリンク --}}
        <div class="flex-1">
            <h1><a class="btn btn-ghost normal-case text-xl" href="/">筋トレ管理くん</a></h1>
        </div>

        <div class="flex-none">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                @if (Auth::check())
                    {{-- ログアウトへのリンク --}}
                    <a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">ログアウト</a>
                @else
                    {{-- ログインページへのリンク --}}
                    <a class="link link-hover" href="{{ route('login') }}">サインイン</a>
                    {{-- ユーザー登録ページへのリンク --}}
                    <a class="link link-hover" href="{{ route('register') }}">新規登録</a>
                @endif
            </form>
        </div>
    </nav>
</header>