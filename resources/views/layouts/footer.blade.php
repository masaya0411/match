<footer id="footer" class="c-footer">
    <div class="l-content-lg">
        <div class="c-footer__nav">
            <p class="c-footer__nav__heading">サービスメニュー</p>
            <ul class="c-footer__nav__list">
                <li class="c-footer__nav__item">
                    @guest
                    <a href="/" class="c-footer__nav__link">トップページ</a>
                    @else
                    <a href="/mypage" class="c-footer__nav__link">トップページ</a>
                    @endguest
                </li>
                <li class="c-footer__nav__item">
                    <a href="{{ route('register') }}" class="c-footer__nav__link">会員登録</a>
                </li>
                <li class="c-footer__nav__item">
                    <a href="{{ route('login') }}" class="c-footer__nav__link">ログイン</a>
                </li>
                <li class="c-footer__nav__item">
                    <a href="{{ route('mypage') }}" class="c-footer__nav__link">マイページ</a>
                </li>
                <li class="c-footer__nav__item">
                    <a href="{{ route('products.index') }}" class="c-footer__nav__link">お仕事を探す</a>
                </li>
            </ul>
        </div>
        <div class="c-footer__nav">
            <p class="c-footer__nav__heading">会社情報</p>
            <ul class="c-footer__nav__list">
                <li class="c-footer__nav__item">
                    <a href="/terms" class="c-footer__nav__link">利用規約</a>
                </li>
                <li class="c-footer__nav__item">
                    <a href="/privacy" class="c-footer__nav__link">プライボリシー</a>
                </li>
            </ul>
        </div>
    </div>
    <small class="c-footer__copy">Copyright © match. All Rights Reserved.</small>
</div>