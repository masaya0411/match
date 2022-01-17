@extends('layouts.template')
@section('title', '404 Not Found')

@section('content')
<main class="l-main u-bg-color--gray">
    <div class="l-project">
        <div class="l-content-md">
            <div class="p-error">
                <h2 class="p-error__heading">
                    該当アドレスのページを<br>
                    見つける事ができませんでした。
                </h2>
                <p class="p-error__text">
                    お探しのページが見つかりませんでした。<br>
                    一時的にアクセスできない状況にあるか、<br>
                    移動もしくは削除された可能性があります。
                </p>
                <div class="p-error__btn">
                    @guest
                    <a href="/" class="c-btn u-m-auto">トップへ戻る</a>
                    @else
                    <a href="/mypage" class="c-btn u-m-auto">トップへ戻る</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</main>
@endsection