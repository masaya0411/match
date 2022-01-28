@extends('layouts.template')
@section('title', $product->title)

@section('content')
<main class="l-main u-bg-color--gray">
    <!--  フラッシュメッセージ -->
    @if(session('flash_message'))
        <div class="c-flash-message c-flash-message--success js-flashMessage">
            {{ session('flash_message') }}
        </div>
    @endif
    
    <div class="l-project">
        <div class="l-content--md">
            <div class="p-dm-detail">

                <div class="p-dm-detail__head">
                    <div class="p-product-detail">

                        <h2 class="p-product-detail__title">
                            {{ $product->title }}
                        </h2>

                        <div class="p-product-detail__wrap">
                            <span class="c-badge--lg">
                                {{ $category }}
                            </span>
                            <!-- お気に入りボタン -->
                            @auth
                            <like-button :product="{{ json_encode($product) }}"></like-button>
                            @else
                            <i class="fas fa-heart p-product-detail__heart"  onclick='return confirm("お気に入り機能はログインしてからご利用いただけます。");'></i>
                            @endauth
                        </div>

                        <div class="p-product-detail__requester">
                            <a href="@if(!empty($post_user)) {{ route('users.show', $post_user->id) }} @else {{ route('users.show', 0) }} @endif" class="p-product-detail__requester__link">
                                <p class="p-product-detail__requester__title">依頼者：</p>
                                <div class="p-product-detail__img">
                                @if(empty($post_user))
                                    <img src="{{ asset('storage/profile_images/profile.png') }}">
                                @else
                                    <img src="{{ asset('storage/profile_images/'.$post_user->pic) }}">
                                @endif
                                </div>
                                <p class="p-product-detail__name">
                                    @if(empty($post_user))
                                    退会したユーザー
                                    @else
                                    {{ $post_user->name }}
                                    @endif
                                </p>    
                            </a>
                        </div>

                        @if(!empty($bord_id))
                        <div class="p-product-detail__dm">
                            <a href="/direct_messages/<?=$bord_id?>" class="p-product-detail__dm__link">この案件のDMへ</a>
                        </div>
                        @endif

                        <div class="p-product-detail__price">

                            @if($product->category_id == 1)
                                {{ number_format($product->min_price*1000) }} ~ {{ number_format($product->max_price*1000) }}
                                <span class="p-product-detail__price__unit">円</span>
                            @else
                                {{ $product->reward }}
                            @endif

                        </div>
                        <h3 class="p-product-detail__content">内容</h3>
                        <p class="p-product-detail__content__text">
                            {!! nl2br(e($product->description)) !!}
                        </p>

                        <form action="{{ route('bord.store', [$product->user_id, $product->id]) }}" method="POST" class="p-product-detail__form">
                            @csrf

                            @guest
                            <a href="/register" class="c-btn--apply u-m-auto">会員登録して応募する</a>
                            @else
                            @if(empty($post_user) || $product->user_id == Auth::user()->id)
                            <button type="button" class="c-btn--disabled u-m-auto" disabled="disabled">応募できません</button>
                            @elseif($apply_flg)
                            <button type="button" class="c-btn--disabled u-m-auto" disabled="disabled">応募完了</button>
                            @else
                            <button type="submit" class="c-btn--apply u-m-auto">応募する</button>
                            @endif
                            @endguest

                        </form>

                        <div class="p-product-detail__twitter">
                            <a href="https://twitter.com/intent/tweet?url=https://match-engineer.com/products/<?=$product->id?>&text=<?=$product->title?> / 誰でも、気軽に仕事が見つかるエンジニア特化の案件マッチングサービス『match』" target="blank_">
                                <i class="fab fa-twitter"></i>
                                ツイート
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-dm-detail__body">
                    <h2 class="p-dm-detail__body__title">パブリックメッセージ</h2>
                    <div class="p-dm-detail__comment">

                        <comment :comments="{{ json_encode($messages) }}" :auth="{{ (int)Auth::id() }}"></comment>

                        <!-- <div class="c-comment">
                        
                            @if(!empty($messages))
                                @foreach($messages as $msg)
                                @guest
                                <div class="c-comment__list">
                                    <div class="c-comment__user c-comment__user--receved">
                                        <a href="@if(!empty($msg->user)) {{ route('users.show', $msg->user->id) }} @else {{ route('users.show', 0) }} @endif" class="c-comment__user__avater c-comment__user__avater--receved">
                                            <div class="c-comment__user__avater__img">
                                                @if(!empty($msg->user))
                                                <img src="{{ asset('storage/profile_images/'.$msg->user->pic) }}">
                                                @else
                                                <img src="{{ asset('storage/profile_images/profile.png') }}">
                                                @endif
                                            </div>
                                            <p class="c-comment__user__avater__name">
                                                @if(!empty($msg->user))
                                                {{ $msg->user->name }}
                                                @else
                                                退会したユーザー
                                                @endif
                                            </p>
                                        </a>
                                        <div class="c-comment__user__content">
                                            <div class="c-comment__user__message c-comment__user__message--receved">
                                                <p class="c-comment__user__text">
                                                    {{ $msg->public_msg }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    @if(!empty($msg->user_id) && $msg->user_id == Auth::user()->id)
                                        <div class="c-comment__list">
                                            <div class="c-comment__user c-comment__user--send">
                                                <a href="{{ route('users.show', $msg->user->id) }}" class="c-comment__user__avater c-comment__user__avater--send">
                                                    <div class="c-comment__user__avater__img">
                                                        <img src="{{ asset('storage/profile_images/'.$msg->user->pic) }}">
                                                    </div>
                                                    <p class="c-comment__user__avater__name">
                                                        {{ $msg->user->name }}
                                                    </p>
                                                </a>
                                                <div class="c-comment__user__content">
                                                    <div class="c-comment__user__message c-comment__user__message--send">
                                                        <p class="c-comment__user__text">
                                                            {{ $msg->public_msg }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="c-comment__list">
                                            <div class="c-comment__user c-comment__user--receved">
                                                <a href="@if(!empty($msg->user)) {{ route('users.show', $msg->user->id) }} @else {{ route('users.show', 0) }} @endif" class="c-comment__user__avater c-comment__user__avater--receved">
                                                    <div class="c-comment__user__avater__img">
                                                        @if(!empty($msg->user))
                                                        <img src="{{ asset('storage/profile_images/'.$msg->user->pic) }}">
                                                        @else
                                                        <img src="{{ asset('storage/profile_images/profile.png') }}">
                                                        @endif
                                                    </div>
                                                    <p class="c-comment__user__avater__name">
                                                        @if(!empty($msg->user))
                                                        {{ $msg->user->name }}
                                                        @else
                                                        退会したユーザー
                                                        @endif
                                                    </p>
                                                </a>
                                                <div class="c-comment__user__content">
                                                    <div class="c-comment__user__message c-comment__user__message--receved">
                                                        <p class="c-comment__user__text">
                                                            {{ $msg->public_msg }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endguest
                                @endforeach
                            @endif

                        </div> -->

                    </div>
                    <form action="{{ route('public.store', $product->id) }}" method="POST" class="p-dm-detail__form js-countUp">
                        @csrf
                        <textarea name="public_msg" cols="30" rows="10" class="c-form__textarea c-form__textarea--message" placeholder="メッセージを入力して下さい" required="required">{{ old('public_msg') }}</textarea>
                        <div data-count="500" class="c-form__count js-countText">
                            <span>0/500</span>
                        </div>

                        @error('public_msg')
                            <span class="c-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="p-dm-detail__btn">
                            @guest
                            <a href="/register" class="c-btn u-m-auto">会員登録して送信</a>
                            @else
                            @if(empty($post_user))
                            <button type="submit" class="c-btn--disabled u-m-auto" disabled="disabled">送信できません</button>
                            @else
                            <button type="submit" class="c-btn u-m-auto">送信</button>
                            @endif
                            @endguest
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection