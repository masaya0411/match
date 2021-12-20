@extends('layouts.template')
@section('title', '案件一覧')

@section('content')
<main class="l-main u-bg-color--gray">
    <div class="p-mypage">
        <div class="l-content-lg">
            <h1 class="p-mypage__title">案件一覧</h1>
            <div class="l-column">
                <div class="l-main-content">

                    <!-- 検索バー -->
                    <form action="" method="GET" class="c-search">
                        <div class="c-search__head">
                            <h2 class="c-search__title">検索</h2>
                        </div>
                        <div class="c-search__body">
                            <select name="category_id" class="c-search__select">

                                @foreach($categories as $id => $category_name)
                                    <option value="{{ $id }}">{{ $category_name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="c-search__btn-wrap">
                            <button type="submit" class="c-search__btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>

                    <div class="p-mypage__block">
                        <div class="c-panel">
                            <ul class="c-panel__list">
                                @foreach($products as $product)

                                <li class="c-panel__item">
                                    <a href="#" class="c-panel__link">
                                        <h3 class="c-panel__title">{{ $product->title }}</h3>
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
                                                    {{ number_format($product->min_price*1000) }}~{{ number_format($product->max_price*1000) }}
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

                <!-- サイドバー -->
                @include('layouts.sidebar')
            </div>
        </div>
    </div>
</main>
@endsection