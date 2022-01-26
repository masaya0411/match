@extends('layouts.template')
@section('title', 'パブリックメッセージ一覧')

@section('content')
<main class="l-main u-bg-color--gray">
    <div class="p-mypage">
        <div class="l-content--lg">
            <h1 class="p-mypage__title">パブリックメッセージ一覧</h1>
            <div class="l-column">
                <div class="l-main-content">
                    <div class="p-mypage__block">
                        <div class="c-panel">
                            <ul class="c-panel__list">

                                @if($public_messages->isEmpty())
                                <div class="c-panel__none">
                                    メッセージはありません
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
                </div>
                <!-- サイドバー -->
                @include('layouts.sidebar')
            </div>
        </div>
    </div>

</main>
@endsection