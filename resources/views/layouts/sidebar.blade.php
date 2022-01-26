<div class="l-side">
    <div class="c-side">
        <a href="{{ route('mypage') }}" class="c-side__mypage">
            マイページ
        </a>
        <div class="c-side__block">
            <p class="c-side__heading">お仕事を探す</p>
            <ul class="c-side__list">
                <li class="c-side__item">
                    <a href="{{ route('products.index') }}" class="c-side__link">案件一覧</a>
                </li>
            </ul>
        </div>
        <div class="c-side__block">
            <p class="c-side__heading">お仕事を頼む</p>
            <ul class="c-side__list">
                <li class="c-side__item">
                    <a href="{{ route('products.create') }}" class="c-side__link">案件を登録</a>
                </li>
            </ul>
        </div>
        <div class="c-side__block">
            <p class="c-side__heading">メッセージ</p>
            <ul class="c-side__list">
                <li class="c-side__item">
                    <a href="{{ route('public.index') }}" class="c-side__link">パブリック</a>
                </li>
                <li class="c-side__item">
                    <a href="{{ route('direct.index') }}" class="c-side__link">DM</a>
                </li>
            </ul>
        </div>
        <div class="c-side__block">
            <p class="c-side__heading">設定</p>
            <ul class="c-side__list">
                <li class="c-side__item">
                    <a href="{{ route('users.edit') }}" class="c-side__link">プロフィールを編集</a>
                </li>
                <li class="c-side__item">
                    <a href="{{ route('password.request') }}" class="c-side__link">パスワード変更</a>
                </li>
                <li class="c-side__item">
                    <a href="{{ route('users.delete_confirm') }}" class="c-side__link">退会</a>
                </li>
            </ul>
        </div>
    </div>
</div>