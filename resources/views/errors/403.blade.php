@extends('layouts.template')
@section('title', '403 Forbidden')

@section('content')
<main class="l-main u-bg-color--gray">
    <div class="l-project">
        <div class="l-content--md">
            <div class="p-error">
                <h2 class="p-error__heading">
                    アクセス権がありません。
                </h2>
                <p class="p-error__text">
                    アクセスしたページは表示できませんでした。
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