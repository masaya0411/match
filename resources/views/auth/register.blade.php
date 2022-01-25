@extends('layouts.template')
@section('title', '会員登録')

@section('content')
<main class="l-main u-bg-color--gray">
    <div class="l-form">
        <div class="l-content-md">
            <form action="{{ route('register') }}" class="c-form p-signup" method="POST">
                @csrf

                @if( count( $errors->all() ) < 1)
                    <input type="hidden" name="previous_url" value="{{ url()->previous() }}">
                @else
                    <input type="hidden" name="previous_url" value="{{ old('previous_url') }}">
                @endif
                
                <h1 class="c-form__heading">会員登録</h1>
                <div class="c-form__list">
                    <label for="email" class="c-form__head">メールアドレス</label>
                    <input id="email" type="email" name="email" class="c-form__input @error('email') is-error @enderror" value="{{ old('email') }}" required autocomplete="email">

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
                        登録する
                    </button>
                    <p class="p-signup__btn__text">
                        会員登録することで、
                        <a href="/terms" class="p-signup__btn__link">
                            利用規約
                        </a>・
                        <a href="/privacy" class="p-signup__btn__link">
                            プライボリシー
                        </a>
                        に同意したものとみなします。
                    </p>
                </div>

            </form>
        </div>
    </div>
</main>
@endsection
