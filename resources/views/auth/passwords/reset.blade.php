@extends('layouts.template')
@section('title', 'パスワードリセット')

@section('content')
<!--  フラッシュメッセージ -->
@if(session('status'))
    <div class="c-flash-message c-flash-message--success js-flashMessage">
        {{ session('status') }}
    </div>
@endif
<main class="l-main u-bg-color--gray">
    <div class="l-form">
        <div class="l-content-md">
            <form action="{{ route('password.update') }}" class="c-form p-signup" method="POST">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <h1 class="c-form__heading">パスワードリセット</h1>
                <div class="c-form__list">
                    <label for="email" class="c-form__head">メールアドレス</label>
                    <input id="email" type="email" name="email" class="c-form__input @error('email') is-error @enderror" value="{{ $email ?? old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="c-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="c-form__list">
                    <label for="password" class="c-form__head">パスワード</label>
                    <input id="password" type="password" name="password" class="c-form__input @error('password') is-error @enderror" required autocomplete="new-password">

                    @error('password')
                        <span class="c-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="c-form__list">
                    <label for="password-confirm" class="c-form__head">パスワード(再入力)</label>
                    <input id="password-confirm" type="password" class="c-form__input" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="p-signup__btn">
                    <button type="submit" class="c-btn u-m-auto">
                        パスワードリセット
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>
@endsection