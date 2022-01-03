<div class="l-header">
    <header class="c-header">
        <div class="c-header__logo">
            @if(Auth::check())
            <a href="/mypage" class="c-header__logo__link">
            @else
            <a href="/" class="c-header__logo__link">
            @endif
                <img src="{{ asset('images/logo.svg') }}" alt="ロゴ：match">
            </a>
        </div>

        <!-- ハンバーガーメニュー -->
        <div class="c-header__menu-trigger js-toggle-sp-menu">
            <span class="c-header__menu-line"></span>
            <span class="c-header__menu-line"></span>
            <span class="c-header__menu-line"></span>
        </div>

        @guest
            <ul class="c-header__list">
                <li class="c-header__item">
                    <a href="#match" class="c-header__link">
                        <span class="c-header__link--green">matchとは</span>
                    </a>
                </li>
                <li class="c-header__item">
                    <a href="#works" class="c-header__link">
                        <span class="c-header__link">新しいお仕事</span>
                    </a>
                </li>
                <li class="c-header__item">
                    <a href="#use" class="c-header__link">
                        ご利用方法
                    </a>
                </li>
                <li class="c-header__item">
                    <a href="#customer" class="c-header__link">
                        お客様の声
                    </a>
                </li>
                <li class="c-header__item">
                    <a href="#question" class="c-header__link">
                        Q&A
                    </a>
                </li>
            </ul>
        </header>

        <nav class="c-header-nav js-toggle-sp-menu-target">
            <div class="c-header-nav__content">
                <div class="c-header-nav__btn__wrap">
                    <a href="{{ route('login') }}" class="c-header-nav__btn c-header-nav__login__btn">ログイン</a>
                    <a href="{{ route('register') }}" class="c-header-nav__btn c-header-nav__register__btn">会員登録</a>
                </div>
            </div>
        </nav>
    @else
        <nav class="c-header-nav js-toggle-sp-menu-target">
            <div class="c-header-nav__content">
                <div class="c-headr-nav__user">
                    <button type="button" class="c-header-nav__user__btn js-userListBtn">
                        <span class="c-header-nav__user__icon">
                            <img src="{{ asset('/storage/profile_images/'.Auth::user()->pic) }}" alt="アイコン：プロフィール画像">
                        </span>
                        {{ Auth::user()->name }}さん
                    </button>

                    <ul class="c-header-nav__user__list js-userListBtn-target">
                        <li class="c-header-nav__user__item">
                            <a href="{{ route('mypage') }}" class="c-header-nav__user__link js-header-link">
                                マイページ
                            </a>
                        </li>
                        <li class="c-header-nav__user__item">
                            <a href="{{ route('products.index') }}" class="c-header-nav__user__link js-header-link">
                                案件を探す
                            </a>
                        </li>
                        <li class="c-header-nav__user__item">
                            <a href="{{ route('products.create') }}" class="c-header-nav__user__link js-header-link">
                                案件を登録する
                            </a>
                        </li>
                        <li class="c-header-nav__user__item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="c-header-nav__user__link c-header-nav__user__link--logout js-header-link">
                                    ログアウト
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endguest
</div>