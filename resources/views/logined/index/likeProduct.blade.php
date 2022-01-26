@extends('layouts.template')
@section('title', 'お気に入り一覧')

@section('content')
<main class="l-main u-bg-color--gray">
    <div class="p-mypage">
        <div class="l-content--lg">
            <h1 class="p-mypage__title">お気に入り一覧</h1>
            <div class="l-column">
                <div class="l-main-content">
                    <div class="p-mypage__block">
                        <div class="c-panel">
                            <ul class="c-panel__list">
                                
                                @if($like_products->isEmpty())
                                <div class="c-panel__none">
                                    お気に入りはありません
                                </div>
                                @else
                                @foreach($like_products as $like_product)
                                <li class="c-panel__item">
                                    <a href="{{ route('products.show',$like_product->id) }}" class="c-panel__link">
                                        <h3 class="c-panel__title">
                                            {{$like_product->title}}
                                        </h3>
                                        <div class="c-panel__badge-wrap">
                                            <span class="c-panel__badge c-badge--sm">
                                            @foreach($categories as $id => $category_name)

                                            @if($like_product->category_id == $id)
                                                {{ $category_name }}
                                            @endif

                                            @endforeach
                                            </span>
                                        </div>
                                        <div class="c-panel__price-wrap">
                                            @if($like_product->category_id == 1)
                                                <p class="c-panel__price">
                                                    {{ number_format($like_product->min_price*1000) }} ~ {{ number_format($like_product->max_price*1000) }}
                                                </p>
                                                <span class="c-panel__unit">円</span>
                                            @else
                                                <p class="c-panel__price">
                                                    {{ $like_product->reward }}
                                                </p>
                                            @endif
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- サイドバー -->
                @include('layouts.sidebar')
            </div>
        </div>
    </div>

</main>
@endsection