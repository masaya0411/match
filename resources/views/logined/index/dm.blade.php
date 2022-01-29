@extends('layouts.template')
@section('title', 'DM一覧')

@section('content')
<main class="l-main u-bg-color--gray">
    <div class="p-mypage">
        <div class="l-content--lg">
            <h1 class="p-mypage__title">DM一覧</h1>
            <div class="l-column">
                <div class="l-main-content">
                    <div class="p-mypage__block">
                        <div class="c-panel">

                            <direct-message 
                                :direct-bords="{{ json_encode($direct_bords) }}">
                            </direct-message>
                            
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