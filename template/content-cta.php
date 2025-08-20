<?php $locale = get_locale();?>
<div id="cta" class="l-section c-cta">
<div class="l-inner">
  <ul class="c-cta__list">
    <li class="c-cta__item">
      <?php if('en_US' == $locale):?>
      <a class="c-cta__link" href="/en/form-inquiry/">
      <?php else: ?>
      <a id="footer-cta" class="c-cta__link" href="/form-inquiry/">
      <?php endif; ?>
        <div class="c-cta__link-image"><img
            src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/common/icon-mail.svg" alt="">
        </div>
        <?php if('en_US' == $locale):?>
        <div class="c-cta__link-text">CONTACT</div>
        <?php else: ?>
        <div class="c-cta__link-text">各種お問い合わせ</div>
        <?php endif; ?>
      </a><span class="c-cta__arrow"></span></li>
  </ul>
</div>
</div>