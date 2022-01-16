@extends('layouts.template')
@section('title', 'プロフィール編集')

@section('content')
<main class="l-main u-bg-color--gray">
    <!--  フラッシュメッセージ -->
    @if(session('flash_message'))
        <div class="c-flash-message c-flash-message--success js-flashMessage">
            {{ session('flash_message') }}
        </div>
    @endif

    <div class="l-project">
        <div class="l-content-lg">
            <div class="l-column">
                <div class="l-main-content">
                    <div class="p-profile">
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="c-form">
                            @method('PUT')
                            @csrf
                            
                            <h1 class="c-form__heading">プロフィール編集</h1>
                            <div class="p-profile__head">
                                <h2 class="p-profile__title">プロフィール画像</h2>
                                <div class="p-profile__img">
                                    <img src="{{ asset('storage/profile_images/'.$user->pic) }}" class="js-profImg">
                                </div>
                                <label for="file_upload" class="c-btn--upload u-m-auto">
                                    画像をアップロード
                                    <input type="file" name="pic" id="file_upload" accept="image/*">
                                </label>

                                @error('pic')
                                    <span class="c-error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="p-profile__body">

                                <div class="c-form__list">
                                    <p class="c-form__head">メールアドレス</p>
                                    <div class="p-profile__mail">
                                        <p class="p-profile__mail__text">
                                            {{ $user->email }}
                                        </p>
                                        <button type="button" data-target="modal{{ $user->id }}" class="p-profile__mail__btn js-modal-open">変更する</button>
                                    </div>
                                </div>

                                <div class="c-form__list js-countUp">
                                    <p class="c-form__head">ニックネーム</p>
                                    <input type="text" name="name" class="c-form__input @error('name') is-error @enderror" value="{{ old('name', $user->name) }}" placeholder="山田太郎" required="required">
                                    <div data-count="10" class="c-form__count js-countText">
                                        <span>0/10</span>
                                    </div>

                                    @error('name')
                                        <span class="c-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="c-form__list js-countUp">
                                    <p class="c-form__head">自己紹介</p>
                                    <textarea name="introduction" cols="30" rows="10" class="c-form__textarea @error('introduction') is-error @enderror" placeholder="こんにちは！よろしくお願いします！">{{ old('introduction', $user->introduction) }}</textarea>
                                    <div data-count="5000" class="c-form__count js-countText">
                                        <span>0/5000</span>
                                    </div>

                                    @error('introduction')
                                        <span class="c-error" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="p-profile__btn">
                                    <button class="c-btn u-m-auto">更新する</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- サイドバー -->
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
    <!-- モーダル -->
    <div id="modal{{ $user->id }}" class="c-modal js-modal">
        <div class="c-modal__bg js-modal-close"></div>
        <div class="c-modal__content">
            <button type="button" class="c-modal__close js-modal-close">
                <img src="{{ asset('images/close.svg') }}" alt="閉じる">
            </button>
            <form action="{{ route('users.email') }}" method="POST" class="c-modal__form">
                @csrf

                <div class="c-form__list">
                    <p class="c-form__head">現在のメールアドレス</p>
                    <p class="c-modal__form__text">{{ $user->email }}</p>
                </div>
                <div class="c-form__list">
                    <p class="c-form__head">新しいメールアドレス</p>
                    <input type="email" name="new_email" class="c-form__input" placeholder="メールアドレス">
                    <p class="c-modal__form__text--sub">
                        メールアドレスを変更すると確認メールが送信されます。メール内のURLをクリックすると変更完了です。
                    </p>
                </div>
                <div class="c-modal__form__btn">
                    <button type="submit" class="c-btn u-m-auto">変更する</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection