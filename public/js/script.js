/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/script.js":
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  // SPメニュー
  $('.js-toggle-sp-menu').on('click', function () {
    $(this).toggleClass('c-header__menu--active');
    $('.js-toggle-sp-menu-target').toggleClass('c-header-nav__open');
  }); // ヘッダーアイコンクリック時にメニューを表示

  $('.js-userListBtn').on('click', function () {
    $('.js-userListBtn-target').toggleClass('is-show');
  });
  $('.js-header-link').on('click', function () {
    $('.js-userListBtn-target').toggleClass('is-show');
  });
  $(document).on('click', function (e) {
    if (!$(e.target).closest('.js-userListBtn').length && !$(e.target).closest('.js-header-link').length) {
      $('.js-userListBtn-target').removeClass('is-show');
    }
  }); // アコーディオンメニュー

  $('.js-acdn').on('click', function () {
    $(this).toggleClass('u-acdn-arrow');
    var target = $(this).data('target');
    $('#' + target).slideToggle();
  }); // モーダル

  $('.js-modal-open').on('click', function () {
    // $('.js-modal').fadeIn();
    var modalTarget = $(this).data('target');
    $('#' + modalTarget).fadeIn();
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
  }); // 案件登録画面カテゴリー選択時の表示・非表示

  function showSelectCategory(select) {
    var val = $(select).val();
    var selectProject = '#status' + val;
    $('.js-projectSelectHide').hide().find('input[type=text]').prop("disabled", true);
    $(selectProject).show().find('input[type=text]').prop("disabled", false);
  }

  $('.js-projectSelect').each(function () {
    showSelectCategory($(this));
  });
  $('.js-projectSelect').on('change', function () {
    showSelectCategory($(this));
  }); // 文字数カウンター

  function countInputText(input) {
    var counter = $(input).parents('.js-countUp').find('.js-countText'); // データ属性(data-count)から最大文字数を取得

    var maxLength = counter.data('count'); // 現在の文字数を取得

    var currentLength = $(input).val().length;
    var htmlVal = currentLength + '/' + maxLength; // 現在の文字数と最大文字数を比較して、
    // 現在の文字数が多ければ赤く表示する

    if (parseInt(currentLength) >= parseInt(maxLength)) {
      counter.html("<span style='color:red'>" + htmlVal + "</span>");
    } else {
      counter.html(htmlVal);
    }
  } // ページ表示時に文字数をカウントして表示


  $('textarea, input[type=text]').each(function () {
    countInputText($(this));
  }); // フォーム入力時に文字数をカウントして表示

  $('textarea, input[type=text]').on('keydown keyup keypress change', function () {
    countInputText($(this));
  }); //フラッシュメッセージ

  setTimeout(function () {
    $('.js-flashMessage').slideUp("fast");
  }, 3000); // 画像ライブプレビュー

  var $fileUpload = $('#file_upload');
  $fileUpload.on('change', function (e) {
    var file = this.files[0];
    $img = $('.js-profImg');
    fileReader = new FileReader();

    fileReader.onload = function (event) {
      $img.attr('src', event.target.result).show();
    };

    fileReader.readAsDataURL(file);
  });
});

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/script.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Applications/MAMP/htdocs/match/resources/js/script.js */"./resources/js/script.js");


/***/ })

/******/ });