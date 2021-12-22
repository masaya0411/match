@extends('layouts.template')
@section('title', '案件詳細')

@section('content')
<main class="l-main u-bg-color--gray">
    <div class="l-project">
        <div class="l-content-md">
            <div class="p-dm-detail">

                <div class="p-dm-detail__head">
                    <div class="p-product-detail">

                        <h2 class="p-product-detail__title">
                            {{ $product->title }}
                        </h2>

                        <div class="p-product-detail__wrap">
                            <span class="c-badge-lg">
                                {{ $category->category_name }}
                            </span>
                            <i class="fas fa-heart js-click-like p-product-detail__heart"></i>
                        </div>

                        <div class="p-product-detail__requester">
                            <a href="profDetail.html" class="p-product-detail__requester__link">
                                <p class="p-product-detail__requester__title">依頼者：</p>
                                <div class="p-product-detail__img">
                                    <img src="{{ asset('images/profile.png') }}">
                                </div>
                                <p class="p-product-detail__name">aaaaaaaaaaaa</p>    
                            </a>
                        </div>

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
                            {{ $product->description }}
                        </p>

                        <form class="p-product-detail__form">
                            <button type="submit" class="c-btn--apply u-m-auto">応募する</button>
                        </form>

                        <div class="p-product-detail__twitter">
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                                ツイート
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-dm-detail__body">
                    <h2 class="p-dm-detail__body__title">パブリックメッセージ</h2>
                    <div class="p-dm-detail__comment">
                        <div class="c-comment">
                            <div class="c-comment__list">
                                <div class="c-comment__user c-comment__user--send">
                                    <a href="profDetail.html" class="c-comment__user__avater c-comment__user__avater--send">
                                        <div class="c-comment__user__avater__img">
                                            <img src="{{ asset('images/profile.png') }}">
                                        </div>
                                        <p class="c-comment__user__avater__name">aaa</p>
                                    </a>
                                    <div class="c-comment__user__content">
                                        <div class="c-comment__user__message c-comment__user__message--send">
                                            <p class="c-comment__user__text">aaaaaaaa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="c-comment__list">
                                <div class="c-comment__user c-comment__user--receved">
                                    <a href="profDetail.html" class="c-comment__user__avater c-comment__user__avater--receved">
                                        <div class="c-comment__user__avater__img">
                                            <img src="{{ asset('images/profile.png') }}">
                                        </div>
                                        <p class="c-comment__user__avater__name">aaa</p>
                                    </a>
                                    <div class="c-comment__user__content">
                                        <div class="c-comment__user__message c-comment__user__message--receved">
                                            <p class="c-comment__user__text">aaaaaaa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="" method="POST" class="p-dm-detail__form js-countUp">
                        <textarea name="message" cols="30" rows="10" class="c-form__textarea c-form__textarea--message" placeholder="メッセージを入力して下さい"></textarea>
                        <div data-count="500" class="c-form__count js-countText">
                            <span>0/500</span>
                        </div>
                        <div class="p-dm-detail__btn">
                            <button type="submit" class="c-btn u-m-auto">送信</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection