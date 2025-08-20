"use strict";

var cardsAccordion = function cardsAccordion() {
  var cardsAccordion = $('.c-search__card.has-accordtion');
  if (cardsAccordion.length) {
    $(window).on('load', function () {
      // アコーディオン初期表示の透過
      var cards = $('.c-search__list');
      if (window.innerWidth > 768) {
        cards.children('.c-search__item:gt(7)').hide(); // 8個目までの高さを動的取得するため8個目以降を一旦非表示
      } else {
        cards.children('.c-search__item:gt(5)').hide(); // 6個目までの高さを動的取得するため8個目以降を一旦非表示
      }

      var cardsHeightClose = cards.outerHeight(); // 8個目(SP:6個目)までの高さを動的取得
      cards.children('.c-search__item').show(); // 8個目(SP:6個目)以降を再度表示
      cardsAccordion.css('height', cardsHeightClose); // 動的取得したheightをwrapperに指定

      // アコーディオンを開く
      var accordionBtn = $('.c-search__accordion-btn');
      var cardsHeightOpen = cards.outerHeight(); // wrapperの高さを再取得

      accordionBtn.on("click", function () {
        if (cardsAccordion.hasClass('is-open')) {
          cardsAccordion.css('height', cardsHeightClose).removeClass('is-open');
          $(this).removeClass('accordion-is-open');
          $(this).children('span').text('もっと見る');
        } else {
          cardsAccordion.css('height', cardsHeightOpen).addClass('is-open');
          $(this).addClass('accordion-is-open');
          $(this).children('span').text('閉じる');
        }
      });
    });
  }
};
var faqAccordion = function faqAccordion() {
  var $question = $('.faq-item-question');
  $question.on("click", function () {
    $(this).toggleClass('answer-open');
    $(this).next('.faq-item-answer').slideToggle(300);
  });
};
cardsAccordion();
faqAccordion();