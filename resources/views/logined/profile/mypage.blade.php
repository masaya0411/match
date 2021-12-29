@extends('layouts.template')
@section('title', 'マイページ')

@section('content')
<main class="l-main u-bg-color--gray">
    <!--  フラッシュメッセージ -->
    @if(session('flash_message'))
        <div class="c-flash-message c-flash-message--success js-flashMessage">
            {{ session('flash_message') }}
        </div>
    @endif

    <div class="p-mypage">
        <div class="l-content-lg">
            <h1 class="p-mypage__title">マイページ</h1>
            <div class="l-column">
                <div class="l-main-content">

                    <div class="p-mypage__block">
                        <div class="p-mypage__block__head">
                            <h2 class="p-mypage__block__title">登録済み案件</h2>
                            <a href="#" class="p-mypage__block__link">一覧へ</a>
                        </div>
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

                    <div class="p-mypage__block">
                        <div class="p-mypage__block__head">
                            <h2 class="p-mypage__block__title">応募済み案件</h2>
                            <a href="#" class="p-mypage__block__link">一覧へ</a>
                        </div>
                        <div class="c-panel">
                            <ul class="c-panel__list">

                                @if($apply_products->isEmpty())
                                <div class="c-panel__none">
                                    応募済み案件はありません
                                </div>
                                @else
                                @foreach($apply_products as $apply_product)
                                <li class="c-panel__item">
                                    <a href="{{ route('products.show',$apply_product->id) }}" class="c-panel__link">
                                        <h3 class="c-panel__title">
                                            {{$apply_product->title}}
                                        </h3>
                                        <div class="c-panel__badge-wrap">
                                            <span class="c-panel__badge c-badge-sm">
                                            @foreach($categories as $id => $category_name)

                                            @if($apply_product->category_id == $id)
                                                {{ $category_name }}
                                            @endif

                                            @endforeach
                                            </span>
                                        </div>
                                        <div class="c-panel__price-wrap">
                                            @if($apply_product->category_id == 1)
                                                <p class="c-panel__price">
                                                    {{ number_format($apply_product->min_price*1000) }} ~ {{ number_format($apply_product->max_price*1000) }}
                                                </p>
                                                <span class="c-panel__unit">円</span>
                                            @else
                                                <p class="c-panel__price">
                                                    {{ $apply_product->reward }}
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

                    <div class="p-mypage__block">
                        <div class="p-mypage__block__head">
                            <h2 class="p-mypage__block__title">お気に入り</h2>
                            <a href="#" class="p-mypage__block__link">一覧へ</a>
                        </div>
                        <div class="c-panel">
                            <ul class="c-panel__list">
                                <li class="c-panel__item">
                                    <a href="#" class="c-panel__link">
                                        <h3 class="c-panel__title">【急募】常駐でのお仕事をお願いします</h3>
                                        <div class="c-panel__badge-wrap">
                                            <span class="c-panel__badge c-badge-sm">単発</span>
                                        </div>
                                        <div class="c-panel__price-wrap">
                                            <p class="c-panel__price">1,000~2,000</p>
                                            <span class="c-panel__unit">円</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="c-panel__item">
                                    <a href="#" class="c-panel__link">
                                        <h3 class="c-panel__title">【急募】常駐でのお仕事をお願いします</h3>
                                        <div class="c-panel__badge-wrap">
                                            <span class="c-panel__badge c-badge-sm">レベニューシェア</span>
                                        </div>
                                        <div class="c-panel__price-wrap">
                                            <p class="c-panel__text">要相談</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="p-mypage__block">
                        <div class="p-mypage__block__head">
                            <h2 class="p-mypage__block__title">パブリックメッセージ</h2>
                            <a href="#" class="p-mypage__block__link">一覧へ</a>
                        </div>
                        <div class="c-panel">
                            <ul class="c-panel__list">

                            @if($public_messages->isEmpty())
                            <div class="c-panel__none">
                                パブリックメッセージはありません
                            </div>
                            @else
                            @foreach($public_messages as $public_message)
                                <li class="c-panel__item">
                                    <a href="{{ route('products.show', $public_message->id) }}" class="c-panel__link">
                                        <h3 class="c-panel__title">
                                            {{ $public_message->title }}
                                        </h3>
                                        <div class="p-mypage__pb-msg__wrap">
                                            <p class="p-mypage__pb-msg__text">
                                                {{ $public_message->msg->public_msg }}
                                            </p>
                                            <span class="p-mypage__pb-msg__time">
                                                {{ $public_message->msg->created_at->format('Y/m/d H:i') }}
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                            @endif

                            </ul>
                        </div>
                    </div>

                    <div class="p-mypage__block">
                        <div class="p-mypage__block__head">
                            <h2 class="p-mypage__block__title">DM</h2>
                            <a href="#" class="p-mypage__block__link">一覧へ</a>
                        </div>
                        <div class="c-panel">
                            <ul class="c-panel__list">

                                @if($direct_bords->isEmpty())
                                <div class="c-panel__none">
                                    DMはありません
                                </div>
                                @else
                                @foreach($direct_bords as $bord)
                                <li class="c-panel__item">
                                    <a href="{{ route('direct.show', $bord->id) }}" class="c-panel__link p-mypage__dm__wrap">
                                        <div class="p-mypage__dm__link">
                                            @if(!empty($bord->user))
                                            <img src="{{ asset('storage/profile_images/'.$bord->user->pic) }}">
                                            @else
                                            <img src="{{ asset('storage/profile_images/profile.png') }}">
                                            @endif
                                        </div>
                                        <div class="p-mypage__dm__body">
                                            <p class="p-mypage__dm__name">
                                                @if(!empty($bord->user))
                                                {{ $bord->user->name }}
                                                @else
                                                退会したユーザー
                                                @endif
                                            </p>
                                            <p class="p-mypage__dm__text">
                                                @if($bord->direct_messages->isEmpty())
                                                まだメッセージはありません
                                                @else
                                                {{ $bord->direct_messages->sortByDesc('created_at')->first()->msg }}
                                                @endif
                                            </p>
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