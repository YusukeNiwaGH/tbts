"use strict";

$(function () {
  ctaFixed();
  Accordion();
  scrollAnimation();
});
var ctaFixed = function ctaFixed() {
  var ctaTopBox = $(".c-lp-ignition-fixedcta");
  $(window).on("scroll", function () {
    if (ctaTopBox.hasClass("u-close")) {
      ctaTopBox.fadeOut();
    } else {
      if ($(this).scrollTop() > 150) {
        ctaTopBox.fadeIn();
        $(".c-lp-ignition-fixedcta button").on("click", function () {
          ctaTopBox.addClass("u-close").fadeOut();
        });
      } else {
        ctaTopBox.fadeOut();
      }
    }
  });
};
var Accordion = function Accordion() {
  var accordion01 = $(".js-accordion dt");

  // クリックしたとき
  accordion01.on("click", function () {
    $(this).toggleClass("u-active").next().slideToggle();
  });

  // エンターキーを押したとき
  accordion01.on("keyup", function (e) {
    if (e.keyCode == 13) {
      $(this).toggleClass("u-active").next().slideToggle();
    }
  });
};
var scrollAnimation = function scrollAnimation() {
  var AnimTrigger = $(".js-effect"); //アニメーショントリガー
  var windowHeight = $(window).height(); //ウインドウの高さ

  // ロードした際に可視範囲に入っていたら実行される
  $(window).on("load", function () {
    AnimTrigger.each(function () {
      var imgPos = $(this).offset().top; //「AnimTrigger」の位置

      if (imgPos < windowHeight) {
        $(this).addClass("js-aniOn");
      }
    });
  });

  // スクロールした際に「AnimTrigger」ごとに、以下に記述する内容が実行される
  $(window).on("scroll", function () {
    var scroll = $(window).scrollTop(); //スクロールした量

    AnimTrigger.each(function () {
      var imgPos = $(this).offset().top; //「AnimTrigger」の位置

      //アニメーションする条件＝「画面の下から1/5まできた時点でアニメーション」
      if (scroll > imgPos - windowHeight + windowHeight / 5) {
        //スクロール量　が次の条件より多いとき　…　条件：トリガーの場所　引く　ウィンドウの高さ　足す　ウィンドウの高さ　割る　5（- windowHeight + windowHeight / 5 なので6/5でなく4/5）
        $(this).addClass("js-aniOn");
      }
    });
  });
};