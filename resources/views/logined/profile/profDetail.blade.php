@extends('layouts.template')
@section('title', 'プロフィール詳細')

@section('content')
<main class="l-main u-bg-color--gray">
    <div class="l-project">
        <div class="l-content-md">
            <div class="p-user">
                <div class="p-user__info">
                    <div class="p-user__img">
                        <img src="{{ asset('storage/profile_images/'.$user->pic) }}">
                    </div>
                    <h2 class="p-user__name">
                        {{ $user->name }}
                    </h2>
                    <div class="p-user__content">
                        <p class="p-user__content__text">
                            {!! nl2br(e($user->introduction)) !!}
                        </p>
                    </div>
                </div>
                <div class="p-user__product">
                    <h2 class="p-user__product__heading">このユーザーが登録した案件</h2>
                    <div class="p-user__product__wrap">
                        <div class="c-panel">
                            <ul class="c-panel__list">

                            @if($products->isEmpty())
                                <div class="c-panel__none">
                                    登録済み案件はありません
                                </div>
                            @endif
                            
                            @foreach($products as $product)
                                <li class="c-panel__item">
                                    <a href="{{ route('products.show', $product->id) }}" class="c-panel__link">
                                        <h3 class="c-panel__title">
                                            {{ $product->title }}
                                        </h3>
                                        <div class="c-panel__badge-wrap">
                                            <span class="c-panel__badge c-badge-sm">

                                            @foreach($categories as $id => $category_name)
                                                @if($product->category_id == $id)
                                                    {{ $category_name }}
                                                @endif
                                            @endforeach

                                            </span>
                                        </div>
                                        <div class="c-panel__price-wrap">
                                            @if($product->category_id == 1)
                                                <p class="c-panel__price">
                                                    {{ number_format($product->min_price*1000) }} ~ {{ number_format($product->max_price*1000) }}
                                                </p>
                                                <span class="c-panel__unit">円</span>
                                            @else
                                                <p class="c-panel__price">
                                                    {{ $product->reward }}
                                                </p>
                                            @endif
                                        </div>
                                    </a>
                                </li>
                            @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection