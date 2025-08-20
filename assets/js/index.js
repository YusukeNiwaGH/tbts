"use strict"; //48時間以内に2回目以降ならローディング画面非表示の設定

var _Swiper;

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var isAccess = $.cookie('access'); //キーが入っていれば値を取得
// cookieが取得できなければアニメーション表示（もし過去にアクセスしていても、48時間で消えているためcookieは取得できない）

if (isAccess === undefined) {
  $(".front").css("display", "block");
  $("#loading").css("display", "block"); //１回目はローディングを表示

  $("#loading").addClass("loading-anime");
  setTimeout(function () {
    setTimeout(function () {
      $("#loading").fadeOut(1000, function () {
        //1000ミリ秒（1秒）かけて画面がフェードアウト
        $.cookie('access', true, {
          expires: 2
        }); //accessキーでアクセスフラグを記録
      });
    }, 1700); //1700ミリ秒（1.7秒）後に処理を実行
  }, 1000); //1000ミリ秒（1秒）後に処理を実行
} else {
  $("#loading").css("display", "none"); //48時間以内で2回目のアクセスでローディング画面非表示

  $(".front").css("display", "block");
} //サムネイル


var sliderThumbnail = new Swiper('.p-mv__photo-footer .swiper-container', {
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true
});
var bar = document.querySelector('.p-mv__progressbar_in');
var slider1 = new Swiper('.p-mv__slider .swiper-container', (_Swiper = {
  loop: true,
  loopAdditionalSlides: 1,
  effect: 'fade',
  fadeEffect: {
    crossFade: true
  },
  autoplay: true
}, _defineProperty(_Swiper, "autoplay", {
  delay: 5000
}), _defineProperty(_Swiper, "pagination", {
  el: ".swiper-pagination",
  type: "fraction"
}), _defineProperty(_Swiper, "on", {
  slideChangeTransitionStart: function slideChangeTransitionStart() {
    bar.style.transitionDuration = '0s', bar.style.transform = 'scaleX(0)';
  },
  slideChangeTransitionEnd: function slideChangeTransitionEnd() {
    bar.style.transitionDuration = 5000 + 'ms', bar.style.transform = 'scaleX(1)';
  }
}), _defineProperty(_Swiper, "thumbs", {
  swiper: sliderThumbnail
}), _Swiper));
$(window).on('load', function () {
  $('.p-mv__stop').on('click', function () {
    var _class = $(this).attr('class');

    if (_class == 'p-mv__stop stop') {
      $(this).addClass('start').removeClass('stop').removeClass('p-mv__footer');
      $(".p-mv__footer").hide();
      slider1.autoplay.stop();
    } else {
      $(this).addClass('stop').removeClass('start');
      slider1.autoplay.start();
    }
  });
});
var eventSwiper = null;
var mediaQuery = window.matchMedia('(max-width:768px)');

var checkBreakpoint = function checkBreakpoint(e) {
  if (e.matches) {
    initSwiper();
  } else if (eventSwiper) {
    eventSwiper.destroy(false, true);
  }
};

var initSwiper = function initSwiper() {
  eventSwiper = new Swiper('.p-top-event__card .swiper', {
    // Optional parameters
    loop: true,
    slidesPerView: 'auto',
    spaceBetween: 16,
    autoplay: {
      // 自動再生させる
      delay: 3000 // 次のスライドに切り替わるまでの時間（ミリ秒）

    },
    // 前後の矢印
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });
};

mediaQuery.addListener(checkBreakpoint);
checkBreakpoint(mediaQuery);
var caseSwiper = new Swiper('.p-top-case__card .swiper', {
  // Optional parameters
  loop: true,
  slidesPerView: 'auto',
  spaceBetween: 40,
  // 前後の矢印
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  breakpoints: {
    769: {
      spaceBetween: 64
    }
  }
}); //ページの読み込みが完了したタイミングで実行

window.onload = function () {
  //lax.jsを初期化
  lax.init(); // ドライバーを追加する

  lax.addDriver('scrollY', function () {
    return window.scrollY;
  });
  var event = $('#js-event');
  var eventWidth = event.width(); // 要素にアニメーションを紐づける

  lax.addElements('#js-event', {
    scrollY: {
      translateX: [["elInY", "elOutY"], ["screenWidth", "-screenWidth"]]
    }
  });
  lax.addElements('#js-solution', {
    scrollY: {
      translateX: [["elInY", "elOutY"], ["-screenWidth", "screenWidth"]]
    }
  });
};

jQuery('.c-product-search__tab-item').click(function () {
  var index = jQuery('.c-product-search__tab-item').index(this);
  jQuery('.c-product-search__tab-item, .c-product-search__panel').removeClass('is-active');
  jQuery(this).addClass('is-active');
  jQuery('.c-product-search__panel').eq(index).addClass('is-active');
});