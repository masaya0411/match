@extends('layouts.template')
@section('title', '登録済み案件一覧')

@section('content')
<main class="l-main u-bg-color--gray">
    <div class="p-mypage">
        <div class="l-content-lg">
            <h1 class="p-mypage__title">登録済み案件一覧</h1>
            <div class="l-column">
                <div class="l-main-content">
                    <div class="p-mypage__block">
                        <div class="c-panel">
                            <ul class="c-panel__list">

                                @if($products->isEmpty())
                                <div class="c-panel__none">
                                    登録済み案件はありません
                                </div>
                                @else
                                @foreach($products as $product)
                                <li class="c-panel__item p-mypage__panel">
                                    <a href="{{ route('products.show',$product->id) }}" class="c-panel__link">
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
                                    <div class="p-mypage__panel__btn">
                                        <a href="{{ route('products.edit',$product->id) }}" class="p-mypage__panel__btn--edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="p-mypage__panel__btn--delete js-modal-open" data-target="modal{{$product->id}}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>

                                    <!-- 削除モーダル -->
                                    <div id="modal{{$product->id}}" class="c-modal js-modal">
                                        <div class="c-modal__bg js-modal-close"></div>
                                        <div class="c-modal__content">
                                            <button type="button" class="c-modal__close js-modal-close">
                                                <img src="{{ asset('images/close.svg') }}" alt="閉じる">
                                            </button>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="c-modal__form">
                                                @method('DELETE')
                                                @csrf

                                                <p class="c-modal__form__text">
                                                    {{ $product->title }}を削除しますか？
                                                </p>
                                                <div class="c-modal__form__btn">
                                                    <button type="submit" class="c-btn--danger u-m-auto">削除</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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