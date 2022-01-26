@extends('layouts.template')
@section('title', 'ログイン')

@section('content')
<main class="l-main u-bg-color--gray">
    <div class="l-form">
        <div class="l-content--md">

            <form action="{{ route('login') }}" class="c-form p-signup" method="POST">
                @csrf
                
                <h1 class="c-form__heading">ログイン</h1>
                
                <div class="c-form__list">
                    <label for="email" class="c-form__head">メールアドレス</label>
                    <input id="email" type="email" name="email" class="c-form__input @error('email') is-error @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="c-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="c-form__list">
                    <label for="password" class="c-form__head">パスワード</label>
                    <input id="password" type="password" name="password" class="c-form__input @error('password') is-error @enderror" value="{{ old('password') }}" required autocomplete="current-password">

                    @error('password')
                        <span class="c-error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="c-form__list">
                    <label for="remember" class="c-form__checkbox">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <p class="c-form__checkbox__text">
                            次回からログインを省略する
                        </p>
                    </label>
                </div>

                <div class="p-signup__btn">
                    <button type="submit" class="c-btn u-m-auto">
                        ログイン
                    </button>

                    <div class="p-signup__link">
                        <a href="{{ route('password.request') }}" class="p-signup__link__forget">
                            パスワードをお忘れですか？
                        </a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</main>
@endsection