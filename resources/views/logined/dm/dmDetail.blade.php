@extends('layouts.template')
@section('title', 'DM詳細')

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
                    <div class="p-dm-detail__head__wrap">
                        <div class="p-dm-detail__head__img">
                            @if(!empty($partner_info))
                            <img src="{{ asset('storage/profile_images/'.$partner_info->pic) }}">
                            @else
                            <img src="{{ asset('storage/profile_images/profile.png') }}">
                            @endif
                        </div>
                        <h2 class="p-dm-detail__head__name">
                            @if(!empty($partner_info))
                            {{ $partner_info->name }}
                            @else
                            退会したユーザー
                            @endif
                        </h2>
                    </div>
                    <h1 class="p-dm-detail__head__heading">案件情報</h1>
                    <div class="p-dm-detail__head__product">
                        <h2 class="p-dm-detail__head__product__title">
                            {{ $product->title }}
                        </h2>
                        <span class="c-badge--sm">
                            {{ $category }}
                        </span>

                        @if($product->category_id == 1)
                            <p class="p-dm-detail__head__product__amount">
                            {{ number_format($product->min_price*1000) }} ~ {{ number_format($product->max_price*1000) }}円
                            </p>
                        @else
                            <p class="p-dm-detail__head__product__amount">
                                {{ $product->reward }}
                            </p>
                        @endif

                        <p class="p-dm-detail__head__product__apply">
                            応募日：
                            <span class="p-dm-detail__head__product__apply__date">
                                {{ $bord->created_at->format('Y/m/d') }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="p-dm-detail__body">
                    <div class="p-dm-detail__comment">
                        <div class="c-comment">

                            @if(!$messages->isEmpty())
                                @foreach($messages as $msg)
                                    @if(!empty($msg->from_user) && $msg->from_user == Auth::user()->id)
                                        <div class="c-comment__list">
                                            <div class="c-comment__user c-comment__user--send">
                                                <a href="{{ route('users.show', $msg->from_user) }}" class="c-comment__user__avater c-comment__user__avater--send">
                                                    <div class="c-comment__user__avater__img">
                                                        <img src="{{ asset('storage/profile_images/'.Auth::user()->pic) }}">
                                                    </div>
                                                    <p class="c-comment__user__avater__name">
                                                        {{ Auth::user()->name }}
                                                    </p>
                                                </a>
                                                <div class="c-comment__user__content">
                                                    <div class="c-comment__user__message c-comment__user__message--send">
                                                        <p class="c-comment__user__text">
                                                            {{ $msg->msg }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="c-comment__list">
                                            <div class="c-comment__user c-comment__user--receved">
                                                <a href="@if(!empty($partner_info)) {{ route('users.show', $partner_info->id) }} @else {{ route('users.show', 0) }} @endif" class="c-comment__user__avater c-comment__user__avater--receved">
                                                    <div class="c-comment__user__avater__img">
                                                        @if(!empty($partner_info))
                                                        <img src="{{ asset('storage/profile_images/'.$partner_info->pic) }}">
                                                        @else
                                                        <img src="{{ asset('storage/profile_images/profile.png') }}">
                                                        @endif
                                                    </div>
                                                    <p class="c-comment__user__avater__name">
                                                        @if(!empty($partner_info))
                                                        {{ $partner_info->name }}
                                                        @else
                                                        退会したユーザー
                                                        @endif
                                                    </p>
                                                </a>
                                                <div class="c-comment__user__content">
                                                    <div class="c-comment__user__message c-comment__user__message--receved">
                                                        <p class="c-comment__user__text">
                                                            {{ $msg->msg }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                            @if(empty($partner_info))
                            <p class="c-error">パートナーが退会しました。メッセージは送れません。</p>
                            @endif

                        </div>
                    </div>

                    @if(!empty($partner_info))
                    <form action="{{ route('direct.store' ,[$bord->id, $partner_info->id]) }}" method="POST" class="p-dm-detail__form js-countUp">
                        @csrf

                        <textarea name="msg" cols="30" rows="10" class="c-form__textarea c-form__textarea--message" placeholder="メッセージを入力して下さい" required="required">{{ old('msg') }}</textarea>
                        <div data-count="500" class="c-form__count js-countText">
                            <span>0/500</span>
                        </div>

                        @error('msg')
                            <span class="c-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="p-dm-detail__btn">
                            <button type="submit" class="c-btn u-m-auto">送信</button>
                        </div>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</main>
@endsection