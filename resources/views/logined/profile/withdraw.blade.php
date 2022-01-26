@extends('layouts.template')
@section('title', '退会画面')

@section('content')
<main class="l-main u-bg-color--gray">
    <div class="p-mypage">
        <div class="l-content--lg">
            <div class="l-column">
                <div class="l-main-content">
                    <div class="p-mypage__withdraw">
                        <h2 class="p-mypage__withdraw__heading">退会</h2>
                        <p class="p-mypage__withdraw__text">
                            退会お手続きが完了するとデータの復元はできません。ご注意ください。
                        </p>
                        <div class="p-mypage__withdraw__btn">
                            <button data-target="modal-withdrawal" type="button" class="c-btn--danger u-m-auto js-modal-open">退会する</button>
                        </div>
                    </div>
                </div>
                <!-- サイドバー -->
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
    <!-- モーダル -->
    <div id="modal-withdrawal" class="c-modal js-modal">
        <div class="c-modal__bg js-modal-close"></div>
        <div class="c-modal__content">
            <button type="button" class="c-modal__close js-modal-close">
                <img src="{{ asset('images/close.svg') }}" alt="閉じる">
            </button>
            <form action="{{ route('users.destroy', Auth::user()->id) }}" method="POST" class="c-modal__form">
                @method('DELETE')
                @csrf
                <p class="c-modal__form__text">下記のボタンを押すと退会が完了します。よろしいですか？</p>
                <div class="c-modal__form__btn">
                    <button type="submit" class="c-btn--danger u-m-auto">退会する</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection