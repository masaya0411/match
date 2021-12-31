@extends('layouts.template')
@section('title', 'DM一覧')

@section('content')
<main class="l-main u-bg-color--gray">
    <div class="p-mypage">
        <div class="l-content-lg">
            <h1 class="p-mypage__title">DM一覧</h1>
            <div class="l-column">
                <div class="l-main-content">
                    <div class="p-mypage__block">
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