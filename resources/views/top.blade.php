@extends('layouts.template')
@section('title', 'エンジニア特化の案件マッチングサイト')

@section('content')
<main class="l-main">
    <!--  フラッシュメッセージ -->
    @if(session('flash_message'))
        <div class="c-flash-message c-flash-message--success js-flashMessage">
            {{ session('flash_message') }}
        </div>
    @endif

    <!-- トップバナー -->
    <div class="p-top__hero">
        <div class="p-top__hero__content">
            <h1 class="p-top__hero__title">「誰でも」、「気軽に」<br>
                                            　仕事が見つかる</h1>
            <a href="{{ route('register') }}" class="c-btn p-top__hero__btn">無料ではじめる</a>
        </div>
    </div>

    <!-- matchとは -->
    <section id="match" class="p-top__match u-bg-color--gray">
        <div class="l-content-lg">
            <h2 class="p-top__match__heading c-top__heading ">matchとは</h2>
            <div class="p-top__match__wrap">
                <img class="p-top__match__img" src="{{ asset('images/undraw_Working_re_ddwy.png') }}" alt="仕事をするイラスト">
                <p class="p-top__match__text">
                    みなさんは、案件に応募するとき、<br>
                    「色々入力したりするの面倒だなぁ...」<br>
                    「ごちゃごちゃしててわかりにくいなぁ...」<br>
                    こう感じたことはありませんか？<br>
                    <br>
                    matchは「<span class="p-top__match__text--bold">誰でも</span>」、「<span class="p-top__match__text--bold">気軽に</span>」<br>
                    案件に応募したり、<br>
                    案件を投稿できる<span class="p-top__match__text--bold">エンジニアに特化した</span><br>
                    案件マッチングサービスです。
                </p>
            </div>
        </div>
    </section>

    <!-- 新しいお仕事 -->
    <section id="works" class="p-top__works">
        <div class="l-content-lg">
            <h2 class="p-top__works__heading c-top__heading">新着のお仕事</h2>
            <div class="p-top__works__wrap">
                <product-panel 
                    :products="{{ json_encode($products) }}" 
                    :categories="{{ json_encode($categories) }}">>
                </product-panel>
            </div>
            <div class="p-top__works__btn">
                <a href="{{ route('products.index') }}" class="c-btn u-m-auto">お仕事をもっと見る</a>
            </div>
        </div>
    </section>

    <!-- ご利用方法 -->
    <section id="use" class="p-top__use u-bg-color--gray">
        <div class="l-content-lg">
            <h2 class="p-top__use__heading c-top__heading">ご利用方法</h2>
            <div class="p-top__use__wrap">
                <div class="p-top__use__card">
                    <div class="p-top__use__card-head">
                        <h3 class="p-top__use__card-heading">STEP.<span class="p-top__use__font-size">1</span></h3>
                    </div>
                    <div class="p-top__use__card-body">
                        <img src="{{ asset('images/undraw_Programmer_re_owql.png) }}" alt="会員登録をするイラスト" class="p-top__use__card-img u-top__img--width">
                    </div>
                    <div class="p-top__use__card-foot">
                        <h3 class="p-top__use__card-title">会員登録する</h3>
                        <p class="p-top__use__card-text">
                            まずは無料で会員登録をしましょう。<br>
                            matchは、メールアドレスだけで簡単に登録ができます。
                        </p>
                    </div>
                </div>
                <div class="p-top__use__card">
                    <div class="p-top__use__card-head">
                        <h3 class="p-top__use__card-heading">STEP.<span class="p-top__use__font-size">2</span></h3>
                    </div>
                    <div class="p-top__use__card-body">
                        <img src="{{ asset('images/undraw_Business_deal_re_up4u.png') }}" alt="仕事を見つけるイラスト" class="p-top__use__card-img">
                    </div>
                    <div class="p-top__use__card-foot">
                        <h3 class="p-top__use__card-title">お仕事を見つける</h3>
                        <p class="p-top__use__card-text">
                            単発案件、レベニューシェア案件がございます。
                            希望のお仕事を見つけ、応募しましょう。
                        </p>
                    </div>
                </div>
                <div class="p-top__use__card">
                    <div class="p-top__use__card-head">
                        <h3 class="p-top__use__card-heading">STEP.<span class="p-top__use__font-size">3</span></h3>
                    </div>
                    <div class="p-top__use__card-body">
                        <img src="{{ asset('images/undraw_Chatting_re_j55r.png') }}" alt="チャットをするイラスト" class="p-top__use__card-img">
                    </div>
                    <div class="p-top__use__card-foot">
                        <h3 class="p-top__use__card-title">DMで連絡する</h3>
                        <p class="p-top__use__card-text">
                            ダイレクトメッセージ機能で、お仕事の詳細について打ち合わせしましょう。<br>
                            あなたにピッタリのお仕事がきっと見つかります。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ご利用者様の声 -->
    <section id="customer" class="p-top__customer">
        <div class="l-content-lg">
            <h2 class="p-top__customer__heading c-top__heading">ご利用者様の声</h2>
            <div class="p-top__customer__wrap">
                <div class="p-top__customer__panel">
                    <div class="p-top__customer__panel-head">
                        <img src="{{ asset('images/22232908_s.jpg') }}" alt="利用者の声画像" class="p-top__customer__panel-img">
                    </div>
                    <div class="p-top__customer__panel-body">
                        <h3 class="p-top__customer__panel-title">田中さん</h3>
                        <p class="p-top__customer__panel-sub-title">フリーランスエンジニア</p>
                        <p class="p-top__customer__panel-text">
                            matchで自分の希望にあった案件を見つけることができました。エンジニアの方々にぜひともおすすめしたいサービスです。
                        </p>
                    </div>
                </div>
                <div class="p-top__customer__panel">
                    <div class="p-top__customer__panel-head">
                        <img src="{{ asset('images/22271746_s.jpg') }}" alt="利用者の声画像" class="p-top__customer__panel-img">
                    </div>
                    <div class="p-top__customer__panel-body">
                        <h3 class="p-top__customer__panel-title">山田さん</h3>
                        <p class="p-top__customer__panel-sub-title">フリーランスエンジニア</p>
                        <p class="p-top__customer__panel-text">
                            matchで自分の希望にあった案件を見つけることができました。エンジニアの方々にぜひともおすすめしたいサービスです。
                        </p>
                    </div>
                </div>
                <div class="p-top__customer__panel">
                    <div class="p-top__customer__panel-head">
                        <img src="{{ asset('images/4595608_s.jpg') }}" alt="利用者の声画像" class="p-top__customer__panel-img">
                    </div>
                    <div class="p-top__customer__panel-body">
                        <h3 class="p-top__customer__panel-title">佐藤さん</h3>
                        <p class="p-top__customer__panel-sub-title">主婦・副業</p>
                        <p class="p-top__customer__panel-text">
                            matchで自分の希望にあった案件を見つけることができました。エンジニアの方々にぜひともおすすめしたいサービスです。
                        </p>
                    </div>
                </div>
            </div>
            <a href="{{ route('register') }}" class="c-btn u-m-auto">無料ではじめる</a>
        </div>
    </section>

    <!-- Q&A -->
    <section id="question" class="p-top__question u-bg-color--gray">
        <div class="l-content-lg">
            <h2 class="p-top__question__headeing c-top__heading">Q&A</h2>
            <div class="p-top__question__wrap">
                <dl class="p-top__question__acdn">
                    <dt class="p-top__question__acdn-title js-acdn" data-target="question01">
                        <div class="p-top__question__logo">Q</div>
                        <p class="p-top__question__q">
                            利用するのにお金はかかりますか？
                        </p>
                    </dt>
                    <dd id="question01" class="p-top__question__acdn-text">
                            matchへの会員登録は無料です。<br>
                            お仕事を依頼し、納品された際には、受注者の方に報酬をお支払いいただく必要があります。
                    </dd>
                </dl>
                <dl class="p-top__question__acdn">
                    <dt class="p-top__question__acdn-title js-acdn" data-target="question02">
                        <div class="p-top__question__logo">Q</div>
                        <p class="p-top__question__q">
                            案件に応募したあとはどうすればいいですか？
                        </p>
                    </dt>
                    <dd id="question02" class="p-top__question__acdn-text">
                            matchのDM（ダイレクトメッセージ）機能を使って依頼者さまと案件の詳細についてお話しください。
                    </dd>
                </dl>
                <dl class="p-top__question__acdn">
                    <dt class="p-top__question__acdn-title js-acdn" data-target="question03">
                        <div class="p-top__question__logo">Q</div>
                        <p class="p-top__question__q">
                            案件に関して質問することはできませんか？
                        </p>
                    </dt>
                    <dd id="question03" class="p-top__question__acdn-text">
                        案件詳細画面のパブリックメッセージにて、依頼者さまに案件に関する質問をすることができます。<br>
                        詳細につきましては、案件に応募後、DMにてお話ししください。
                    </dd>
                </dl>
            </div>
            <a href="{{ route('register') }}" class="c-btn u-m-auto">無料ではじめる</a>
        </div>
    </section>

</main>
@endsection