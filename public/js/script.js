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
});