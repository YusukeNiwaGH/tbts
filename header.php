<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<?php $locale = get_locale();?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/favicon/favicon.ico">
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-NH3V536');</script>
  <!-- End Google Tag Manager -->
  <?php wp_head(); ?>
</head>

<body<?php if(is_front_page()):?> class="front"<?php endif;?>>
<?php wp_body_open(); ?>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NH3V536"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <?php if('ja' == $locale):?>
  <header id="header" class="l-header">
    <div class="l-header__left l-header__inner">
      <?php if(is_front_page()): ?>
      <h1 class="l-header__logo">
        <a href="<?php echo esc_url(home_url()); ?>/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-logo.svg" alt="東京貿易テクノシステム株式会社"></a>
      </h1>
      <?php else: ?>
      <div class="l-header__logo">
        <a href="<?php echo esc_url(home_url()); ?>/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-logo.svg" alt="東京貿易テクノシステム株式会社"></a>
      </div>
      <?php endif; ?>
      <?php if(!is_page_template( ['page-marketo01.php','page-marketo02.php','page-nolead.php'])): ?>
      <div class="l-header__right">
        <div class="l-header__menu">

          <nav class="l-header__pc-bottom">
            <?php if( have_rows('header-menu','option') ): ?>
            <ul class="l-header__list">
              <?php while( have_rows('header-menu','option') ): the_row(); ?>
              <li class="l-header__item<?php if(get_sub_field('header-child-list','option')): ?> l-header__child-menu<?php endif; ?>">
                <a href="<?php the_sub_field('header-title-link'); ?>" class="l-header__item-link"><?php the_sub_field('header-title-jp'); ?></a><?php if(get_sub_field('header-child-list','option')): ?><span class="l-header__item--arrow"></span><?php endif; ?>
                <div class="l-header__child-inner">
                  <div class="l-header__child-title">
                    <div class="l-header__child-title-inner">
                      <a href="<?php the_sub_field('header-title-link'); ?>">
                        <span class="l-header__child-title-en"><?php the_sub_field('header-title-en'); ?></span>
                        <span class="l-header__child-title-jp"><?php the_sub_field('header-title-jp'); ?></span>
                      </a>
                    </div>
                  </div>
                  <?php if( have_rows('header-child-list','option') ): ?>
                  <ul class="l-header__child-list">
                    <?php while( have_rows('header-child-list','option') ): the_row(); ?>
                    <li class="l-header__child-item l-header__grandchild-menu"><a class="l-header__child-item-link" href="<?php the_sub_field('header-child-link'); ?>"><?php the_sub_field('header-child-text'); ?></a>
                      <?php if( have_rows('header-grandchild-list','option') ): ?>
                      <ul class="l-header__grandchild-list">
                        <?php while( have_rows('header-grandchild-list','option') ): the_row(); ?>
                        <li class="l-header__grandchild-item"><a class="l-header__grandchild-item-link" href="<?php the_sub_field('header-grandchild-link'); ?>"><?php the_sub_field('header-grandchild-text'); ?></a></li>
                        <?php endwhile; ?>
                      </ul>
                      <?php endif; ?>
                    </li>
                    <?php endwhile; ?>
                  </ul>
                  <?php endif; ?>
                </div>
              </li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>
          </nav>
          <div class="l-header__pc-head">
            <ul class="l-header__sns-list">
              <li class="l-header__sns-item"><a target="_blank" rel="noopener noreferrer" href="https://www.tokyo-boeki.co.jp/" class="l-header__sns-item-link"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/logo-tokyo-boeki.png" alt="ロゴ：東京貿易グループ" width="74" height="36"></a></li>
              <li class="l-header__sns-item">
                <div class="l-header__lang l-header__lang--pc" ontouchstart="">
                  <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-lang--pc.svg" alt="Language">
                  <ul class="l-header__lang-list l-header__lang-list--pc">
                    <li class="l-header__lang-item"><a class="l-header__lang-link" href="<?php echo esc_url(home_url()); ?>/">日本語</a></li>
                    <li class="l-header__lang-item"><a class="l-header__lang-link" href="<?php echo esc_url(home_url()); ?>/en/">ENGLISH</a></li>
                  </ul>
                </div>
              </li>
              <li class="l-header__sns-item"><a target="_blank" rel="noopener noreferrer" href="https://www.youtube.com/channel/UCjfdk0WCT2vjdKbHTg4PLWw" class="l-header__sns-item-link"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-youtube.svg" alt="YouTube"></a></li>
              <li class="l-header__sns-item has-text">
                <a target="_blank" rel="noopener noreferrer" href="/members/" class="l-header__sns-item-link">
                  <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-support.svg" alt="">
                  <span class="l-header__sns-item-link-text">サポートサイト</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="l-header__footer">
            <ul class="l-header__bottom-list">
              <li class="l-header__bottom-item"><a class="l-header__bottom-link" href="<?php echo esc_url(home_url()); ?>/policy/">プライバシーポリシー</a></li>
              <li class="l-header__bottom-item"><a class="l-header__bottom-link" href="<?php echo esc_url(home_url()); ?>/sitemap/">サイトマップ</a></li>
            </ul>
            <div class="l-header__sns">
              <div class="l-header__sns-item has-text">
                <a target="_blank" rel="noopener noreferrer" href="/members/" class="l-header__sns-item-link">
                  <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-support--sp.svg" alt="">
                  <span class="l-header__sns-item-link-text">サポートサイト</span>
                </a>
              </div>
            </div>
            <ul class="l-header__sns">
              <li class="l-header__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-header__sns-link" href="https://www.youtube.com/channel/UCjfdk0WCT2vjdKbHTg4PLWw"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-youtube--sp.svg" alt="YouTube"></a></li>
              <li class="l-header__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-header__sns-link" href="https://twitter.com/official_tbts"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-twitter--sp.svg" alt="Twitter"></a></li>
              <li class="l-header__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-header__sns-link" href="https://www.facebook.com/official.tbts.tts/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-facebook--sp.svg" alt="Facebook"></a></li>
              <li class="l-header__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-header__sns-link" href="https://linkedin.com/company/ttsofficial/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-linkedin--sp.svg" alt="LinkedIn"></a></li>
            </ul>
            <div class="l-header__lang" ontouchstart="">
              <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-lang.svg" alt="Language">
              <ul class="l-header__lang-list">
                <li class="l-header__lang-item"><a class="l-header__lang-link" href="<?php echo esc_url(site_url()); ?>/">日本語</a></li>
                <li class="l-header__lang-item"><a class="l-header__lang-link" href="<?php echo esc_url(site_url()); ?>/en/">ENGLISH</a></li>
              </ul>
            </div>
            <div class="c-cta c-cta--no-image l-header__cta">
              <ul class="c-cta__list">
              <li class="c-cta__item"><a id="menu-cta" class="c-cta__link" href="/useful/download/"><div class="c-cta__link-image"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-download--sp.svg" alt=""></div><div class="c-cta__link-text">ダウンロード</div></a></li>
              <li class="c-cta__item"><a id="menu-cta" class="c-cta__link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><div class="c-cta__link-image"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/common/icon-mail.svg" alt=""></div><div class="c-cta__link-text">各種お問い合わせ</div></a></li>
              </ul>
              <div class="c-cta__footer">
                <p class="c-cta__footer-title">カスタマーサポートセンター</p>
                <p class="c-cta__footer-time">受付時間：　平日：9:00～12:00／13:00~17:00（土日祝日を除きます。）</p>
                <a href="tel:046-246-3956" class="c-cta__footer-tel">TEL.<span>046-246-3956</span></a>
              </div>
            </div>
            <div id="js-header_button" class="l-header__close"><span>×</span> 閉じる</div>
          </div>
        </div>
        <div class="l-header__cta-button">
          <a id="header-cta" class="l-header__cta-button-link -download" href="/useful/download/">
            <span class="l-header__cta-button-link--icon">
              <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-download.svg" alt="" width="20" height="20">
            </span>
            <span class="l-header__cta-button-link--text">ダウンロード</span>
          </a>
          <a id="header-cta" class="l-header__cta-button-link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
            <span class="l-header__cta-button-link--icon">
              <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-mail.svg" alt="" width="21" height="15">
            </span>
            <span class="l-header__cta-button-link--text">お問い合わせ</span>
          </a>
        </div>
      </div>

      <div class="l-header__group-icon">
        <a target="_blank" rel="noopener noreferrer" href="https://www.tokyo-boeki.co.jp/" class="l-header__sns-item-link"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/logo-tokyo-boeki.png" alt="ロゴ：東京貿易グループ" width="74" height="36"></a>
      </div>
      <div class="l-header__toggle" id="js-header_toggle">
        <button class="l-header__toggle-wrap">
          <span class="l-header__toggle-line"></span>
          <span class="l-header__toggle-line"></span>
          <span class="l-header__toggle-text">MENU</span>
        </button>
      </div>
      <?php else: ?>
      <?php endif; ?>
    </div>
  </header>
  <?php else: ?>
  <header id="header" class="l-header">
    <div class="l-header__left l-header__inner">
      <?php if(is_front_page()): ?>
      <h1 class="l-header__logo">
        <a href="<?php echo esc_url(home_url()); ?>/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-logo.svg" alt="東京貿易テクノシステム株式会社"></a>
      </h1>
      <?php else: ?>
      <div class="l-header__logo">
        <a href="<?php echo esc_url(home_url()); ?>/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-logo.svg" alt="東京貿易テクノシステム株式会社"></a>
      </div>
      <?php endif; ?>
      <?php if(!is_page_template( ['page-marketo01.php','page-marketo02.php','page-nolead.php','page-lp-en.php'])): ?>
      <div class="l-header__right">
        <div class="l-header__menu">

          <nav class="l-header__pc-bottom">
            <?php if( have_rows('header-menu-en','option') ): ?>
            <ul class="l-header__list">
              <?php while( have_rows('header-menu-en','option') ): the_row(); ?>
              <li class="l-header__item<?php if(get_sub_field('header-child-list','option')): ?> l-header__child-menu<?php endif; ?>">
                <a href="<?php the_sub_field('header-title-link'); ?>" class="l-header__item-link"><?php the_sub_field('header-title-en'); ?></a><?php if(get_sub_field('header-child-list','option')): ?><span class="l-header__item--arrow"></span><?php endif; ?>
                <div class="l-header__child-inner">
                  <div class="l-header__child-title">
                    <div class="l-header__child-title-inner">
                      <a href="<?php the_sub_field('header-title-link'); ?>">
                        <span class="l-header__child-title-en"><?php the_sub_field('header-title-en'); ?></span>
                      </a>
                    </div>
                  </div>
                  <?php if( have_rows('header-child-list','option') ): ?>
                  <ul class="l-header__child-list">
                    <?php while( have_rows('header-child-list','option') ): the_row(); ?>
                    <li class="l-header__child-item l-header__grandchild-menu"><a class="l-header__child-item-link" href="<?php the_sub_field('header-child-link'); ?>"><?php the_sub_field('header-child-text'); ?></a>
                      <?php if( have_rows('header-grandchild-list','option') ): ?>
                      <ul class="l-header__grandchild-list">
                        <?php while( have_rows('header-grandchild-list','option') ): the_row(); ?>
                        <li class="l-header__grandchild-item"><a class="l-header__grandchild-item-link" href="<?php the_sub_field('header-grandchild-link'); ?>"><?php the_sub_field('header-grandchild-text'); ?></a></li>
                        <?php endwhile; ?>
                      </ul>
                      <?php endif; ?>
                    </li>
                    <?php endwhile; ?>
                  </ul>
                  <?php endif; ?>
                </div>
              </li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>
          </nav>
          <div class="l-header__pc-head">
            <ul class="l-header__sns-list">
              <li class="l-header__sns-item"><a target="_blank" rel="noopener noreferrer" href="https://www.tokyo-boeki.co.jp/en/" class="l-header__sns-item-link"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/logo-tokyo-boeki.png" alt="Logo: Tokyo Boeki Group" width="74" height="36"></a></li>
              <li class="l-header__sns-item">
                <div class="l-header__lang l-header__lang--pc" ontouchstart="">
                  <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-lang--pc.svg" alt="Language">
                  <ul class="l-header__lang-list l-header__lang-list--pc">
                    <li class="l-header__lang-item"><a class="l-header__lang-link" href="<?php echo esc_url(site_url()); ?>/">日本語</a></li>
                    <li class="l-header__lang-item"><a class="l-header__lang-link" href="<?php echo esc_url(site_url()); ?>/en/">ENGLISH</a></li>
                  </ul>
                </div>
              </li>
              <li class="l-header__sns-item"><a target="_blank" rel="noopener noreferrer" href="https://www.youtube.com/channel/UCjfdk0WCT2vjdKbHTg4PLWw" class="l-header__sns-item-link"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-youtube.svg" alt="YouTube"></a></li>
              <li class="l-header__sns-item has-text">
                <a target="_blank" rel="noopener noreferrer" href="/members/" class="l-header__sns-item-link">
                  <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-support.svg" alt="">
                  <span class="l-header__sns-item-link-text en">support</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="l-header__footer">
            <ul class="l-header__bottom-list">
              <li class="l-header__bottom-item"><a class="l-header__bottom-link" href="<?php echo esc_url(home_url()); ?>/policy/">POLICY</a></li>
              <li class="l-header__bottom-item"><a class="l-header__bottom-link" href="<?php echo esc_url(home_url()); ?>/sitemap/">SITE MAP</a></li>
            </ul>
            <div class="l-header__sns">
              <div class="l-header__sns-item has-text">
                <a target="_blank" rel="noopener noreferrer" href="/members/" class="l-header__sns-item-link">
                  <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-support--sp.svg" alt="">
                  <span class="l-header__sns-item-link-text">support</span>
                </a>
              </div>
            </div>
            <ul class="l-header__sns">
              <li class="l-header__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-header__sns-link" href="https://www.youtube.com/channel/UCjfdk0WCT2vjdKbHTg4PLWw"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-youtube--sp.svg" alt="YouTube"></a></li>
              <li class="l-header__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-header__sns-link" href="https://twitter.com/official_tbts"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-twitter--sp.svg" alt="Twitter"></a></li>
              <li class="l-header__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-header__sns-link" href="https://www.facebook.com/official.tbts.tts/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-facebook--sp.svg" alt="Facebook"></a></li>
              <li class="l-header__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-header__sns-link" href="https://linkedin.com/company/ttsofficial/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-linkedin--sp.svg" alt="LinkedIn"></a></li>
            </ul>
            <div class="l-header__lang" ontouchstart="">
              <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-lang.svg" alt="Language">
              <ul class="l-header__lang-list">
                <li class="l-header__lang-item"><a class="l-header__lang-link" href="<?php echo esc_url(site_url()); ?>/">日本語</a></li>
                <li class="l-header__lang-item"><a class="l-header__lang-link" href="<?php echo esc_url(site_url()); ?>/en/">ENGLISH</a></li>
              </ul>
            </div>
            <div class="c-cta c-cta--no-image l-header__cta">
              <ul class="c-cta__list">
                <li class="c-cta__item"><a class="c-cta__link" href="/en/form-inquiry/"><div class="c-cta__link-image"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/common/icon-mail.svg" alt=""></div><div class="c-cta__link-text">CONTACT</div></a><span class="c-cta__arrow"></span></li>
              </ul>
              <div class="c-cta__footer">
                <p class="c-cta__footer-title">CONTACT US</p>
                <a href="tel:+81-46-246-3955" class="c-cta__footer-tel u-mt8">TEL.<span>+81-46-246-3955</span></a>
                <p class="c-cta__footer-time u-mt0">International Sales</p>
              </div>
            </div>
            <div id="js-header_button" class="l-header__close"><span>×</span> CLOSE</div>
          </div>
        </div>
        <div class="l-header__cta-button">
          <a class="l-header__cta-button-link" href="/en/form-inquiry/">
            <span class="l-header__cta-button-link--icon">
              <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/header-mail.svg" alt="">
            </span>
            <span class="l-header__cta-button-link--text">CONTACT</span>
          </a>
        </div>
      </div>
      <div class="l-header__group-icon">
        <a target="_blank" rel="noopener noreferrer" href="https://www.tokyo-boeki.co.jp/en/" class="l-header__sns-item-link"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/header/logo-tokyo-boeki.png" alt="Logo: Tokyo Boeki Group" width="74" height="36"></a>
      </div>
      <div class="l-header__toggle" id="js-header_toggle">
        <button class="l-header__toggle-wrap">
          <span class="l-header__toggle-line"></span>
          <span class="l-header__toggle-line"></span>
          <span class="l-header__toggle-text">MENU</span>
        </button>
      </div>
      <?php else: ?>
      <?php endif; ?>
      <?php if(is_page_template('page-lp-en.php')): ?>
      <div class="l-header__contact-machines">
          <div class="p-lp-modeling-machines-button">
              <a href="/en/form-inquiry/">Contact</a>
          </div>
      </div>
      <?php else: ?>
      <?php endif; ?>
    </div>
  </header>
  <?php endif; ?>
  <?php if(!is_front_page() && !is_page_template('page-nolead.php') && !is_page_template('page-lp-en.php')): ?>
    <div id="particles-js"></div>
  <?php endif; ?>
