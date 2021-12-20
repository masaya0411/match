$(function() {
    // SPメニュー
    $('.js-toggle-sp-menu').on('click', function () {
        $(this).toggleClass('c-header__menu--active');
        $('.js-toggle-sp-menu-target').toggleClass('c-header-nav__open');
    });


    // ヘッダーアイコンクリック時にメニューを表示
    $('.js-userListBtn').on('click', function () {
        $('.js-userListBtn-target').toggleClass('is-show');
    });
    $('.js-header-link').on('click', function() {
        $('.js-userListBtn-target').toggleClass('is-show');
    })
    $(document).on('click', function(e){
        if( !$(e.target).closest('.js-userListBtn').length && !$(e.target).closest('.js-header-link').length ) {
            $('.js-userListBtn-target').removeClass('is-show');
        }
    });


    // アコーディオンメニュー
    $('.js-acdn').on( 'click', function(){
        $(this).toggleClass('u-acdn-arrow');

        var target = $(this).data('target');
        $('#' + target).slideToggle();
    });


    // モーダル
    $('.js-modal-open').on('click', function() {
        $('.js-modal').fadeIn();
    });
    $('.js-modal-close').on('click', function() {
        $('.js-modal').fadeOut();
    });


    // 案件登録画面カテゴリー選択時の表示・非表示
    function showSelectCategory(select) {
        var val = $(select).val();

        var selectProject = '#status' + val;
        $('.js-projectSelectHide').hide().find('input[type=text]').prop("disabled", true);
        $(selectProject).show().find('input[type=text]').prop("disabled", false);
    }

    $('.js-projectSelect').each(function() {
        showSelectCategory($(this));
    })

    $('.js-projectSelect').on('change', function() {
        showSelectCategory($(this));
    });


    // 文字数カウンター
    function countInputText(input) {

        var counter = $(input).parents('.js-countUp').find('.js-countText');

        // データ属性(data-count)から最大文字数を取得
        var maxLength = counter.data('count');
    
        // 現在の文字数を取得
        var currentLength = $(input).val().length;
        var htmlVal = currentLength + '/' + maxLength;

        // 現在の文字数と最大文字数を比較して、
        // 現在の文字数が多ければ赤く表示する
        if( parseInt(currentLength) >= parseInt(maxLength) ) {
            counter.html("<span style='color:red'>" + htmlVal + "</span>");
        } else {
            counter.html(htmlVal);
        }
    }

    // ページ表示時に文字数をカウントして表示
    $('textarea, input[type=text]').each(function(){
        countInputText($(this));
    });
    // フォーム入力時に文字数をカウントして表示
    $('textarea, input[type=text]').on('keydown keyup keypress change',function(){
        countInputText($(this));
    });


    //フラッシュメッセージ
    setTimeout(function(){
        $('.js-flashMessage').slideUp("fast");
    }, 3000);
});