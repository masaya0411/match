@extends('layouts.template')
@section('title', 'パスワード再設定')

@section('content')
<!--  フラッシュメッセージ -->
@if(session('status'))
    <div class="c-flash-message c-flash-message--success js-flashMessage">
        {{ session('status') }}
    </div>
@endif

<main class="l-main u-bg-color--gray">
    <div class="l-form">
        <div class="l-content--md">
            <form action="{{ route('password.email') }}" class="c-form p-signup" method="POST">
                @csrf
                
                <h1 class="c-form__heading">パスワード変更</h1>
                <p class="c-form__text">
                    ご登録いただいたメールアドレスを入力してください。<br>
                    メールアドレス宛にパスワード再設定のメールをお送りします。<br>
                </p>

                <div class="c-form__list">
                    <label class="c-form__head">メールアドレス</label>
                    <input id="email" type="email" name="email" class="c-form__input @error('email') is-error @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="c-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="p-signup__btn">
                    <button type="submit" class="c-btn u-m-auto">送信する</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection