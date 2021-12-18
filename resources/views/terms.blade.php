@extends('layouts.template')
@section('title', '利用規約')

@section('content')
<main class="l-main u-bg-color--gray">
    <div class="l-project">
        <div class="l-content-md">
            <div class="p-terms">
                <h1 class="p-terms__heading">利用規約</h1>
                <ul class="p-terms__list">
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第1条　総則</h2>
                        <ul class="p-terms__content">
                            <li class="p-terms__content__item">
                                本利用規約は、株式会社match（以下「当社」といいます。）が提供するサービス「match」（以下「本サイト」といいます。）の利用者が遵守すべき事項及び利用者と当社との関係を定めるものです。
                            </li>
                            <li class="p-terms__content__item">
                                本サービスの利用者は、本利用規約の内容を十分理解した上でその内容を遵守することに同意して本サービスを利用するものとし、本サービスを利用した場合には、当該利用者は本利用規約を遵守することに同意したものとみなします。
                            </li>
                        </ul>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第2条　定義</h2>
                        <p class="p-terms__text">
                            本利用規約の中で使用される以下の各用語は、それぞれ以下の意味を有するものとします。
                        </p>
                        <ul class="p-terms__content">
                            <li class="p-terms__content__item">
                                「本サービス」：本サイトの閲覧や本サイトに付随するメール配信等を利用した業務委託に関する情報提供サービスの総称のことをいいます。
                            </li>
                            <li class="p-terms__content__item">
                                「会員」：本サイトで所定の会員登録手続を行って当社から登録の承諾を受けた個人又は法人をさします。
                            </li>
                            <li class="p-terms__content__item">
                                「利用者」：会員又は非会員を問わず本サービスの提供を受ける個人又は法人で、本サイトの閲覧者も含みます。
                            </li>
                            <li class="p-terms__content__item">
                                「利用企業」：当社に対して案件と人材のマッチングを委託した企業をいいます。
                            </li>
                            <li class="p-terms__content__item">
                                「本取引」：本サービスを利用して行われる当社と会員の間での業務委託契約をいいます。
                            </li>
                            <li class="p-terms__content__item">
                                「登録情報」：会員登録手続で入力・提供された一切の情報をいいます。
                            </li>
                        </ul>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第3条　規約の改定</h2>
                        <p class="p-terms__text">
                            本利用規約は、当社の判断により事前の予告なく変更・追加・削除されることがあります。利用者は、本利用規約変更後に本サイト・本サービスを利用した場合には、変更された本利用規約の内容に同意したものとみなされます。
                        </p>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第4条　会員登録</h2>
                        <ul class="p-terms__content">
                            <li class="p-terms__content__item">
                                会員登録手続を行うことができるのは、その会員となる本人（法人の場合には対外的な契約権限を有する者）に限るものとし、代理人による会員登録は認められないものとします。
                            </li>
                            <li class="p-terms__content__item">
                                会員登録手続を行う者は、登録情報の入力にあたり、入力した情報は全て真実であることを保証するものとします。
                            </li>
                            <li class="p-terms__content__item">
                                登録した情報全てにつき、その内容の正確性・真実性・最新性等一切について、会員自らが責任を負うものとします。
                            </li>
                            <li class="p-terms__content__item">
                                会員として登録できる者の資格・条件は以下の通りです。但し、法人の場合には第１号及び第２号は適用されません。<br>
                                満18歳以上であること。<br>
                                未成年である場合には法定代理人の包括的な同意を得ていること。<br>
                                電子メールアドレスを保有していること。<br>
                                既に本サービスの会員となっていないこと。<br>
                                本利用規約の全ての条項に同意すること。<br>
                                過去、現在又は将来にわたって、暴力団等の反社会的勢力に所属せず、これらのものと関係を有しないこと。
                            </li>
                            <li class="p-terms__content__item">
                                当社は、会員登録手続を行った個人又は法人が以下の各号に該当する場合、会員として登録することを承諾しない場合があります。また、承諾・登録後であっても、会員について以下の各号に該当する事実が判明した場合には、承諾・登録を取り消すことがあります。<br>
                                会員登録の資格・条件を満たさない場合又は満たさなくなった場合。<br>
                                入力された登録情報に虚偽の情報があることが判明した場合。<br>
                                当社からの電子メールを受領できない場合。<br>
                                本利用規約に違反する行為を行った場合。<br>
                                その他当社が当該会員の登録が不適切であると判断した場合。
                            </li>
                            <li class="p-terms__content__item">
                                登録情報及び本サービスの利用において当社が知り得た利用者の情報については、別途定める「個人情報保護方針」に従って取り扱われるものとし、利用者はこれに同意するものとします。
                            </li>
                            <li class="p-terms__content__item">
                                会員が退会を希望する場合には、所定の手続きを行うこととします。但し、当該会員が以下に定める状況にある間は退会できないものとします。<br>
                                会員が本サービスを利用して契約した業務の契約期間が完了していない場合。<br>
                                会員が受注者となって成立した本取引の決済手続きが完了していない場合。
                            </li>
                        </ul>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第5条　本サービスの概要</h2>
                        <p class="p-terms__text">
                            当社は、会員に対して、以下のサービスの全部又は一部を当社の判断で提供するものとします。
                        </p>
                        <ul class="p-terms__content">
                            <li class="p-terms__content__item">
                                会員から受領した登録情報と利用企業から受領した案件情報との照合、ならびに照合結果に基づく、案件情報の提供。弊社は、取得した会員の登録情報を利用企業に対して、案件情報との照合を行うために、開示・提供いたします。
                            </li>
                            <li class="p-terms__content__item">
                                利用企業から受領する案件条件に適合性が高いと当社が判断する会員に対する案件応募勧誘
                            </li>
                            <li class="p-terms__content__item">
                                利用企業への案件提案手続きおよび利用企業との商談調整
                            </li>
                            <li class="p-terms__content__item">
                                電話やテレビ会議等による案件相談の実施
                            </li>
                            <li class="p-terms__content__item">
                                案件情報に当社が相応しいと判断した会員との業務委託契約の締結
                            </li>
                        </ul>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第6条　当社提供サービスに関する知的財産権</h2>
                        <ul class="p-terms__content">
                            <li class="p-terms__content__item">
                                本サービスで当社が作成・提供する画像、テキスト、プログラム等に関する著作権等の一切の知的財産権は、当社に帰属します。
                            </li>
                            <li class="p-terms__content__item">
                                本サービスで当社が作成・提供・掲載する一切の画像、テキスト、プログラム等は、著作権法、商標法等の法律により保護されています。
                            </li>
                        </ul>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第7条　本取引の成果物等に関する知的財産権及びその利用</h2>
                        <p class="p-terms__text">
                            本サービスを通じて会員が当社に対して納品した成果物に関する著作権等 の知的財産権（著作権法第27条及び第28条の権利を含みます。）は、本取引の業務が完了するまでの間は会員に帰属するものとし、本取引の業務が完了した段階で当社に移転・帰属するものとします（会員が本取引開始前より有している知的財産権（以下「留保知的財産権」といいます。）を除きます。但し、会員は当社に対し、当該成果物を利用するために必要な範囲で留保知的財産権の利用（第三者への使用許諾を含みます。）を無償で許諾するものとします。）。但し、第三者の保有する知的財産権について、第三者の許可を得た上で会員が成果物に利用した場合、該当する知的財産権は、第三者に帰属し、当社に移転・帰属しないものとします。また、会員は、当該成果物にかかる著作者人格権を行使しないものとします。なお、本取引の中において別途取決めがある場合は、同取決めを優先します。
                        </p>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第8条　ID・パスワードの管理</h2>
                        <ul class="p-terms__content">
                            <li class="p-terms__content__item">
                                会員は、登録したID及びパスワードについて、自己の責任の下で適切に管理し、ID及びパスワードの盗用を防止する措置を自ら講じるものとします。
                            </li>
                            <li class="p-terms__content__item">
                                会員は、登録したID及びパスワードについて、第三者による利用や第三者への貸与・譲渡等の行為を行ってはならないものとします。
                            </li>
                            <li class="p-terms__content__item">
                                ID及びパスワードの管理不十分、使用上の過誤、第三者の使用等により被った損害は会員が責任を負うものとし、当社はかかる会員の損害から一切免責されるものとします。
                            </li>
                            <li class="p-terms__content__item">
                                会員は、ID及びパスワードの盗用や第三者による使用が判明した場合、直ちにその旨を当社に通知し、当社からの指示に従うものとします。
                            </li>
                        </ul>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第9条　業務資料等の管理及び返還</h2>
                        <ul class="p-terms__content">
                            <li class="p-terms__content__item">
                                会員は、本取引のために、利用企業、および当社から提供を受けた資料（以下「本件業務資料」といいます。）を善良なる管理者の注意義務をもって保管・管理するものとします。
                            </li>
                            <li class="p-terms__content__item">
                                会員は、本件業務資料を本取引の実施その他当社が指定した目的以外に使用してはならないものとします。
                            </li>
                            <li class="p-terms__content__item">
                                会員は、本件業務資料を本取引に必要な限度を超えて複製してはならないものとします。
                            </li>
                            <li class="p-terms__content__item">
                                当社または利用企業が本件業務資料の返還もしくは破棄を求めた場合、会員は遅滞なくこれらを当社または利用企業の指示に基づいて、返還もしくは破棄するものとします。
                            </li>
                        </ul>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第10条　情報開示について</h2>
                        <p class="p-terms__text">
                            会員は、本件業務資料並びに本取引に関連して知り得た利用企業または当社の技術上・販売上その他業務上のあらゆる情報を、当社の事前の書面（電子メールを含みます。）による承諾がない限り、第三者に開示または、漏えいしてはならないものとし、本取引以外に使用してはならないものとします。ただし、開示されたときに公知であったもの、また開示後公知になったものについては、この限りではない。なお、当社または利用企業がこれらの情報並びに情報を記載又は包含した書面その他の記録媒体及びその全ての複製物の返還もしくは破棄を求めた場合、会員は遅滞なくこれらを当社または利用企業の指示に基づいて、返還もしくは破棄するものとします。
                        </p>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第11条　地位等の譲渡禁止</h2>
                        <p class="p-terms__text">
                            利用者は、本利用規約に基づく権利、義務及び本利用規約の契約上の地位の全部又は一部について、これを第三者に譲渡、質入れ、その他の方法により処分してはならないものとします。但し、当社の書面による事前の承諾がある場合を除きます。
                        </p>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第12条　中途解約</h2>
                        <p class="p-terms__text">
                            会員は、有効期間中に本利用規約に基づく契約を終了する場合、当社の承諾を得たうえで、契約を終了することができるものとします。中途解約によって、当社に損害（第三者に損害が生じ、その損害について当社が填補した場合を含みます。）が発生した場合、会員は当社に対して賠償する責任を負うものとします。
                        </p>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第13条　禁止事項</h2>
                        <p class="p-terms__text">
                            本サービスの利用者が、以下に定める行為を行うことを禁止します。
                        </p>
                        <ul class="p-terms__content">
                            <li class="p-terms__content__item">
                                当社、他の利用者若しくは第三者の著作権、商標権等の知的財産権を侵害する行為、又は侵害するおそれのある行為。
                            </li>
                            <li class="p-terms__content__item">
                                他の利用者若しくは第三者の財産、プライバシー若しくは肖像権を侵害する行為、又は侵害するおそれのある行為。
                            </li>
                            <li class="p-terms__content__item">
                                一人の利用者が複数のメールアドレス等を登録して重複して会員登録を行う行為。
                            </li>
                            <li class="p-terms__content__item">
                                会員資格を停止ないし無効にされた会員に代わり会員登録をする行為。
                            </li>
                            <li class="p-terms__content__item">
                                アクセス可能な本サービス又は他者の情報を改ざん、消去する行為。
                            </li>
                            <li class="p-terms__content__item">
                                当社又は他者になりすます行為（詐称するためにメールヘッダ等の部分に細工を行う行為を含みます。）。
                            </li>
                            <li class="p-terms__content__item">
                                有害なコンピュータプログラム等を送信し、又は他者が受信可能な状態におく行為。
                            </li>
                            <li class="p-terms__content__item">
                                本人の同意を得ることなく、又は詐欺的な手段（いわゆるフィッシング及びこれに類する手段を含みます。）により他者の会員登録情報を取得する行為。
                            </li>
                            <li class="p-terms__content__item">
                                本サービスの運営を妨害する行為。他の利用者又は第三者が主導する情報の交換又は共有を妨害する行為。信用の毀損又は財産権の侵害等のように当社、利用者又は他者に不利益を与える行為。
                            </li>
                            <li class="p-terms__content__item">
                                長時間の架電、同様の問い合わせの繰り返しを過度に行い、又は義務や理由のないことを強要し、当社の業務に著しく支障を来たす行為。
                            </li>
                            <li class="p-terms__content__item">
                                上記各号の他、法令、又は本利用規約に違反する行為。公序良俗に違反する行為（暴力を助長し、誘発するおそれのある情報又は残虐な映像を送信又は表示する行為や心中の仲間を募る行為等を含みます。）。その他迷惑行為。
                            </li>
                            <li class="p-terms__content__item">
                                上記各号のいずれかに該当する行為（当該行為を他者が行っている場合を含みます。）を助長する目的で他のサイトにリンクを張る行為。
                            </li>
                            <li class="p-terms__content__item">
                                当社から紹介を受けた利用企業との間で、直接、個別契約に定める業務と同種又は類似の業務の委託を内容とする契約を締結する行為。
                            </li>
                            <li class="p-terms__content__item">
                                その他当社が利用者として不適当と判断した行為。
                            </li>
                        </ul>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第14条　監視業務</h2>
                        <p class="p-terms__text">
                            当社は、利用者が本サービスを適正に利用しているかどうかを監視する業務を当社の裁量により行うものとし、利用者はそれに同意するものとします。
                        </p>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第15条　規約違反への対処及び違約金等</h2>
                        <ul class="p-terms__content">
                            <li class="p-terms__content__item">
                                当社は、利用者の行為が本利用規約に反すると判断した場合、登録情報に虚偽の事実があることが判明した場合、支払停止もしくは支払不能となり、または破産手続開始、民事再生手続開始、会社更生手続開始、特別清算開始もしくはこれらに類する手続の開始の申立てがあった場合、その他、当社が会員としての登録の継続を適当でないと判断した場合、当社の判断により、当該利用者に何ら通知することなくして、本サービスの一時停止、会員登録の解除、本サービスへのアクセスを拒否等の必要な措置をとることができるものとします。
                            </li>
                            <li class="p-terms__content__item">
                                前項に基づく当社の対処に関する質問、苦情は一切受け付けておりません。なお、利用者は、当該措置によって被った一切の損害について、当社に対して賠償請求を行わないものとします。
                            </li>
                            <li class="p-terms__content__item">
                                当社は、利用者が本利用規約違反等の悪質な行為を行っていると判断した場合、当該利用者に対して法的措置を検討することができるものとします。
                            </li>
                            <li class="p-terms__content__item">
                                利用者は、利用者が本利用規約違反等の行為を行ったことにより当社に損害（第三者に損害が生じ、その損害について当社が填補した場合を含みます。）が生じた場合、その一切の損害について、当社に対して賠償する責任を負うものとします。
                            </li>
                            <li class="p-terms__content__item">
                                会員が、第14条第13号に違反した場合、当社は当該会員に対して、違約金として金100万円を請求することができるものとします。本項の規定は、当社の会員に対する当該違約金の定めを超える損害賠償請求を妨げるものではありません。
                            </li>
                        </ul>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第16条　弊社からの連絡又は通知</h2>
                        <ul class="p-terms__content">
                            <li class="p-terms__content__item">
                                弊社が会員への連絡又は通知の必要がある場合には、登録されたメールアドレス宛にメールするか、登録された住所宛に郵送することによって、連絡又は通知を行います。
                            </li>
                            <li class="p-terms__content__item">
                                弊社からの連絡又は通知を受け取りたくない場合は、本サービス内、「アカウント設定」ページにおいて、「メール配信を希望する」のチェックボックスを外すもしくは、メールにて「配信停止希望」とお知らせいただくことで変更ができるものとします。
                            </li>
                        </ul>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第17条　サイトの中断・変更・停止・終了</h2>
                        <ul class="p-terms__content">
                            <li class="p-terms__content__item">
                                当社は、システム障害及び保守、停電や火災などの天変地異、その他技術上・運営上の理由により、本サービスの提供が困難であると判断した場合、利用者への事前通知を行わず、本サービスの中断を行う場合があります。
                            </li>
                            <li class="p-terms__content__item">
                                当社は2週間前までに、会員に電子メールでの通知及び本サイト上で告知を行うことにより、本サービスの変更、停止及び終了を行うことができるものとします。
                            </li>
                            <li class="p-terms__content__item">
                                当社は、本条に基づき当社が行った措置に基づき利用者に生じた損害について一切の責任を負いません。
                            </li>
                        </ul>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第18条　免責</h2>
                        <ul class="p-terms__content">
                            <li class="p-terms__content__item">
                                会員登録取消し、利用者からのID・パスワードの第三者に漏洩、利用者による秘密漏示、本サービスのシステム不具合や障害・中断やデータの消失・漏洩等により生じた不利益・損害等、本サービスの利用により利用者に生じた一切の不利益・損害について当社は一切の責任を負いません。
                            </li>
                            <li class="p-terms__content__item">
                                利用者が、本サービスを利用することにより、他の利用者又は第三者に対し不利益・損害を与えた場合、利用者は自己の費用と責任においてこれを賠償するものとし、これらの一切の不利益・損害について当社は一切責任を負いません。
                            </li>
                            <li class="p-terms__content__item">
                                本サービス上でやりとりされるメッセージや送受信されるファイルに個人情報等が含まれていた場合、それによって会員が被った不利益・損害について、当社は一切責任を負いません。
                            </li>
                            <li class="p-terms__content__item">
                                当社は、会員の身元の保証をするものではなく、また会員又は利用企業が本サービス上で取引を完了することを保証するものでもありません。
                            </li>
                            <li class="p-terms__content__item">
                                当社は、本サービスを利用することにより、会員に適合する案件情報の提供があること、当社が会員に業務を依頼することを保証するものではなく、会員の経済的利益の享受につき何ら保証するものではありません。
                            </li>
                        </ul>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第19条　本サービスの譲渡等</h2>
                        <p class="p-terms__text">
                            当社は、本サービスの事業を第三者に譲渡した場合、当該事業譲渡に伴い、本サービスの運営者たる地位、本利用規約上の地位、本利用規約に基づく権利及び義務並びに会員の登録情報及びその他情報を当該事業譲渡の譲受人に譲渡することができるものとし、本サービスの会員は、会員たる地位、本利用規約上の地位、本利用規約に基づく権利及び義務並びに会員の登録情報その他情報の譲渡につきあらかじめ同意するものとします。
                        </p>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第20条　基準時間</h2>
                        <p class="p-terms__text">
                            本サービスの提供にあたって基準となる時刻は、全て当社のサーバ内で管理されている時刻によるものとします。
                        </p>
                    </li>
                    <li class="p-terms__item">
                        <h2 class="p-terms__sub-heading">第21条　準拠法・管轄裁判所</h2>
                        <ul class="p-terms__content">
                            <li class="p-terms__content__item">
                                本利用規約は日本法に基づき解釈されるものとし、本利用規約の一部が無効な場合でも、適用可能な項目については効力があるものとします。
                            </li>
                            <li class="p-terms__content__item">
                                本サービスに関連して訴訟等の必要が生じた場合には、東京地方裁判所を第一審の専属的合意管轄裁判所とします。
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main>
@endsection