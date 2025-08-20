<?php $locale = get_locale();?>
<?php if(!is_page_template( ['page-marketo01.php','page-marketo02.php','page-nolead.php','page-lp-en.php'])): ?>
<div id="toPageTop" class="c-pagetop"><div class="c-pagetop-item"><span>PAGE TOP</span></div></div>
<?php if('en_US' == $locale):?>
  <footer class="l-footer">
  <div class="l-footer__inner">
    <div class="l-footer__left">
      <a class="l-footer__logo" href="<?php echo esc_url(home_url()); ?>/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-logo.svg" alt=""></a>
      <div class="u-md-hidden">
        <ul class="l-footer__sns">
          <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://www.youtube.com/channel/UCjfdk0WCT2vjdKbHTg4PLWw"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-youtube__off.svg" alt="YouTube"></a></li>
          <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://twitter.com/official_tbts"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-twitter__off.svg" alt="Twitter"></a></li>
          <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://www.facebook.com/official.tbts.tts/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-facebook__off.svg" alt="Facebook"></a></li>
          <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://linkedin.com/company/ttsofficial/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-linkedin__off.svg" alt="LinkedIn"></a></li>
        </ul>
        <div class="l-footer__lang" ontouchstart="">
          <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-lang.svg" alt="Language">
          <ul class="l-footer__lang-list">
            <li class="l-footer__lang-item"><a class="l-footer__lang-link" href="<?php echo esc_url(site_url()); ?>/">日本語</a></li>
            <li class="l-footer__lang-item"><a class="l-footer__lang-link" href="<?php echo esc_url(site_url()); ?>/en/">ENGLISH</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="l-footer__right">
      <?php if( have_rows('footer-menu01-en','option') ): ?>
      <ul class="l-footer__list">
        <?php while( have_rows('footer-menu01-en','option') ): the_row(); ?>
         <li class="l-footer__item"><a class="l-footer__link" href="<?php the_sub_field('footer-link'); ?>"><?php the_sub_field('footer-text'); ?></a>
          <?php if( have_rows('footer-child-list','option') ): ?>
           <ul class="l-footer__sub-list">
            <?php while( have_rows('footer-child-list','option') ): the_row(); ?>
             <li class="l-footer__sub-item"><a class="l-footer__sub-link" href="<?php the_sub_field('footer-child-link'); ?>">・ <?php the_sub_field('footer-child-text'); ?></a></li>
             <?php endwhile; ?>
           </ul>
           <?php endif; ?>
         </li>
         <?php endwhile; ?>
      </ul>
      <?php endif; ?>
      <?php if( have_rows('footer-menu02-en','option') ): ?>
      <ul class="l-footer__list">
        <?php while( have_rows('footer-menu02-en','option') ): the_row(); ?>
         <li class="l-footer__item"><a class="l-footer__link" href="<?php the_sub_field('footer-link'); ?>"><?php the_sub_field('footer-text'); ?></a>
          <?php if( have_rows('footer-child-list','option') ): ?>
           <ul class="l-footer__sub-list">
            <?php while( have_rows('footer-child-list','option') ): the_row(); ?>
             <li class="l-footer__sub-item"><a class="l-footer__sub-link" href="<?php the_sub_field('footer-child-link'); ?>">・ <?php the_sub_field('footer-child-text'); ?></a></li>
             <?php endwhile; ?>
           </ul>
           <?php endif; ?>
         </li>
         <?php endwhile; ?>
      </ul>
      <?php endif; ?>
      <?php if( have_rows('footer-menu03-en','option') ): ?>
      <ul class="l-footer__list">
        <?php while( have_rows('footer-menu03-en','option') ): the_row(); ?>
         <li class="l-footer__item"><a class="l-footer__link" href="<?php the_sub_field('footer-link'); ?>"><?php the_sub_field('footer-text'); ?></a>
          <?php if( have_rows('footer-child-list','option') ): ?>
           <ul class="l-footer__sub-list">
            <?php while( have_rows('footer-child-list','option') ): the_row(); ?>
             <li class="l-footer__sub-item"><a class="l-footer__sub-link" href="<?php the_sub_field('footer-child-link'); ?>">・ <?php the_sub_field('footer-child-text'); ?></a></li>
             <?php endwhile; ?>
           </ul>
           <?php endif; ?>
         </li>
         <?php endwhile; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
  <div class="u-md-only">
    <div class="l-footer__inner">
      <ul class="l-footer__sns">
        <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://www.youtube.com/channel/UCjfdk0WCT2vjdKbHTg4PLWw"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-youtube__off.svg" alt="YouTube"></a></li>
        <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://twitter.com/official_tbts"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-twitter__off.svg" alt="Twitter"></a></li>
        <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://www.facebook.com/official.tbts.tts/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-facebook__off.svg" alt="Facebook"></a></li>
        <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://linkedin.com/company/ttsofficial/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-linkedin__off.svg" alt="LinkedIn"></a></li>
      </ul>
      <div class="l-footer__lang" ontouchstart="">
        <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-lang.svg" alt="Language">
        <ul class="l-footer__lang-list">
          <li class="l-footer__lang-item"><a class="l-footer__lang-link" href="<?php echo esc_url(site_url()); ?>/">日本語</a></li>
          <li class="l-footer__lang-item"><a class="l-footer__lang-link" href="<?php echo esc_url(site_url()); ?>/en/">ENGLISH</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="l-footer__inner l-footer__bottom">
    <small class="l-footer__bottom-copyright">TOKYO BOEKI TECHNO-SYSTEM LTD. <br class="u-md-only">Copyright(c) 東京貿易テクノシステム</small>
    <ul class="l-footer__bottom-list">
      <li class="l-footer__bottom-item"><a class="l-footer__bottom-link" href="<?php echo esc_url(home_url()); ?>/policy/">POLICY</a></li>
      <li class="l-footer__bottom-item"><a class="l-footer__bottom-link" href="<?php echo esc_url(home_url()); ?>/sitemap/">SITE MAP</a></li>
    </ul>
  </div>
</footer>
<?php else: ?>
  <footer class="l-footer">
  <div class="l-footer__inner">
    <div class="l-footer__left">
      <a class="l-footer__logo" href="<?php echo esc_url(home_url()); ?>/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-logo.svg" alt=""></a>
      <div class="u-md-hidden">
        <ul class="l-footer__sns">
          <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://www.youtube.com/channel/UCjfdk0WCT2vjdKbHTg4PLWw"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-youtube__off.svg" alt="YouTube"></a></li>
          <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://twitter.com/official_tbts"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-twitter__off.svg" alt="Twitter"></a></li>
          <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://www.facebook.com/official.tbts.tts/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-facebook__off.svg" alt="Facebook"></a></li>
          <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://linkedin.com/company/ttsofficial/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-linkedin__off.svg" alt="LinkedIn"></a></li>
        </ul>
        <div class="l-footer__lang" ontouchstart="">
          <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-lang.svg" alt="Language">
          <ul class="l-footer__lang-list">
            <li class="l-footer__lang-item"><a class="l-footer__lang-link" href="<?php echo esc_url(home_url()); ?>/">日本語</a></li>
            <li class="l-footer__lang-item"><a class="l-footer__lang-link" href="<?php echo esc_url(home_url()); ?>/en/">ENGLISH</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="l-footer__right">
      <?php if( have_rows('footer-menu01','option') ): ?>
      <ul class="l-footer__list">
        <?php while( have_rows('footer-menu01','option') ): the_row(); ?>
         <li class="l-footer__item"><a class="l-footer__link" href="<?php the_sub_field('footer-link'); ?>"><?php the_sub_field('footer-text'); ?></a>
          <?php if( have_rows('footer-child-list','option') ): ?>
           <ul class="l-footer__sub-list">
            <?php while( have_rows('footer-child-list','option') ): the_row(); ?>
             <li class="l-footer__sub-item"><a class="l-footer__sub-link" href="<?php the_sub_field('footer-child-link'); ?>">・ <?php the_sub_field('footer-child-text'); ?></a></li>
             <?php endwhile; ?>
           </ul>
           <?php endif; ?>
         </li>
         <?php endwhile; ?>
      </ul>
      <?php endif; ?>
      <?php if( have_rows('footer-menu02','option') ): ?>
      <ul class="l-footer__list">
        <?php while( have_rows('footer-menu02','option') ): the_row(); ?>
         <li class="l-footer__item"><a class="l-footer__link" href="<?php the_sub_field('footer-link'); ?>"><?php the_sub_field('footer-text'); ?></a>
          <?php if( have_rows('footer-child-list','option') ): ?>
           <ul class="l-footer__sub-list">
            <?php while( have_rows('footer-child-list','option') ): the_row(); ?>
             <li class="l-footer__sub-item"><a class="l-footer__sub-link" href="<?php the_sub_field('footer-child-link'); ?>">・ <?php the_sub_field('footer-child-text'); ?></a></li>
             <?php endwhile; ?>
           </ul>
           <?php endif; ?>
         </li>
         <?php endwhile; ?>
      </ul>
      <?php endif; ?>
      <?php if( have_rows('footer-menu03','option') ): ?>
      <ul class="l-footer__list">
        <?php while( have_rows('footer-menu03','option') ): the_row(); ?>
         <li class="l-footer__item"><a class="l-footer__link" href="<?php the_sub_field('footer-link'); ?>"><?php the_sub_field('footer-text'); ?></a>
          <?php if( have_rows('footer-child-list','option') ): ?>
           <ul class="l-footer__sub-list">
            <?php while( have_rows('footer-child-list','option') ): the_row(); ?>
             <li class="l-footer__sub-item"><a class="l-footer__sub-link" href="<?php the_sub_field('footer-child-link'); ?>">・ <?php the_sub_field('footer-child-text'); ?></a></li>
             <?php endwhile; ?>
           </ul>
           <?php endif; ?>
         </li>
         <?php endwhile; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>
  <div class="u-md-only">
    <div class="l-footer__inner">
      <ul class="l-footer__sns">
        <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://www.youtube.com/channel/UCjfdk0WCT2vjdKbHTg4PLWw"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-youtube__off.svg" alt="YouTube"></a></li>
        <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://twitter.com/official_tbts"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-twitter__off.svg" alt="Twitter"></a></li>
        <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://www.facebook.com/official.tbts.tts/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-facebook__off.svg" alt="Facebook"></a></li>
        <li class="l-footer__sns-item"><a target="_blank" rel="noopener noreferrer" class="l-footer__sns-link" href="https://linkedin.com/company/ttsofficial/"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-linkedin__off.svg" alt="LinkedIn"></a></li>
      </ul>
      <div class="l-footer__lang" ontouchstart="">
        <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/footer/footer-lang.svg" alt="Language">
        <ul class="l-footer__lang-list">
          <li class="l-footer__lang-item"><a class="l-footer__lang-link" href="<?php echo esc_url(home_url()); ?>/">日本語</a></li>
          <li class="l-footer__lang-item"><a class="l-footer__lang-link" href="<?php echo esc_url(home_url()); ?>/en/">ENGLISH</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="l-footer__inner l-footer__bottom">
    <small class="l-footer__bottom-copyright">TOKYO BOEKI TECHNO-SYSTEM LTD. <br class="u-md-only">Copyright(c) 東京貿易テクノシステム</small>
    <ul class="l-footer__bottom-list">
      <li class="l-footer__bottom-item"><a class="l-footer__bottom-link" href="<?php echo esc_url(home_url()); ?>/policy/">プライバシーポリシー</a></li>
      <li class="l-footer__bottom-item"><a class="l-footer__bottom-link" href="<?php echo esc_url(home_url()); ?>/sitemap/">サイトマップ</a></li>
    </ul>
  </div>
</footer>
<?php endif; ?>
<?php else: ?>
<div id="toPageTop" class="c-pagetop"><div class="c-pagetop-item"><span>PAGE TOP</span></div></div>
  <?php if(is_page_template('page-lp-en.php')): ?>
  <footer class="l-footer l-footer--copyright l-footer--copyright-machines">
    <small class="l-footer__bottom-copyright-machines">TOKYO BOEKI TECHNO-SYSTEM LTD.<br class="u-md-only">Copyright(c) 東京貿易テクノシステム</small>
  </footer>
  <?php else: ?>
  <footer class="l-footer l-footer--copyright">
    <small class="l-footer__bottom-copyright">TOKYO BOEKI TECHNO-SYSTEM LTD. <br class="u-md-only">Copyright(c) 東京貿易テクノシステム</small>
  </footer>
  <?php endif; ?>
<?php endif; ?>

<?php if(is_single('3d-magic-regalis')):?>
  <div class="chatbot">
    <script>
    (function (c, n, s) {
        if (c[n] === void 0) {c['ULObject'] = n;
        c[n] = c[n] || function () {(c[n].q = c[n].q || []).push(arguments)};
        c[n].l = 1 * new Date();var e = document.createElement('script');
        e.async = 1;e.src = s + "/chatbot.js";
        var t = document.getElementsByTagName('script')[0];t.parentNode.insertBefore(e, t);}
    })(window, 'ul_widget', 'https://support-widget.userlocal.jp');
    let isFirstOpen = true;
    let scrollPos = window.scrollY;
    let initScrollPos = 0;
    if (isFirstOpen) {
      window.addEventListener('scroll', function(){
        initScrollPos = window.scrollY;
      });
    }
    ul_widget('init', { 'id': '03b99c6b2000b2107828', 'lg_id': '' });
    ul_widget('event', 'popup_open', function() {
      if (isFirstOpen) {
        scrollPos = initScrollPos;
      } else {
        scrollPos = window.scrollY;
      }
      $('body').css('top', -scrollPos).removeClass('chatbot-close');
      isFirstOpen = false;
    });
    ul_widget('event', 'popup_close', function() {
      $('body').css('top', 0).addClass('chatbot-close');
      window.scrollTo(0, scrollPos);
    });
    </script>
  </div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>

</html>
