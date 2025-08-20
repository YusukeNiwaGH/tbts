<?php
/*
Template Name: カタログダウンロード
*/
?>
<?php get_header(); ?>
<?php $locale = get_locale();?>
<?php if( have_posts() ): ?>
  <?php while( have_posts() ): the_post(); ?>
<div class="l-wrapper">
  <div class="p-page">
    <div class="c-mv">
      <div class="c-mv__inner">
        <h1 class="c-mv__title">
          <span class="c-mv__jp"><?php the_title(); ?></span>
          <span class="c-mv__en"><?php if (get_field('en-title')) : ?><?php the_field('en-title'); ?><?php endif; ?></span>
        </h1>
        <ul class="p-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php if (function_exists('bcn_display')) {
              bcn_display_list();
            } ?>
        </ul>
      </div>
    </div>
    <div class="l-section l-section--md">
      <div class="l-inner">
        <main class="p-page__body p-download">
          <form class="c-search__form" method="get" action="<?php echo esc_url(home_url('/')); ?>#js-search">
            <p id="js-search-title" class="c-search__form-title">絞り込む<span class="c-search__form-icon"></span></p>
            <div class="c-search__form-inner">
              <table class="c-search__form-table">
                <tr>
                  <th>種類</th>
                  <td>
                    <?php
                      $taxonomy_args = array(
                        'hide_empty' => false,
                      );
                      $download_category_terms = get_terms('download_category', $taxonomy_args);
                      foreach ( $download_category_terms as $download_category_term ):
                    ?>
                    <?php if($download_category_term): ?>
                    <label><input type="checkbox" value="<?php echo esc_attr($download_category_term->name); ?>" name="category"><span><?php echo $download_category_term->name; ?></span></label>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </td>
                </tr>

              </table>
              <p id="js-cancel" class="c-search__cancel" onclick="gtag('event', 'カタログ_絞り込み解除', { 'event_category': '絞り込み解除' });">×絞り込みを解除する</p>
            </div>
          </form>
          <?php if( have_rows( 'download') ): ?>
          <div class="p-download__list">
            <?php while( have_rows( 'download') ): the_row(); ?>
            <?php
              $download_title = get_sub_field( 'download_title');
              $download_category_id = get_sub_field( 'download_category');
              $download_image = get_sub_field( 'download_image');
              $download_image_url = $download_image['url'];
              $download_form = get_sub_field( 'download_form');
              $download_blank = get_sub_field( 'download_blank');
              $download_link = get_sub_field( 'download_link');

            ?>
            <div data-category="<?php foreach ( $download_category_id as $download_category_id_term ): ?><?php echo $download_category_id_term->name; ?><?php endforeach; ?>" class="p-download__item">
              <div class="p-download__photo">
                <img src="<?php echo $download_image_url; ?>" alt="">
              </div>
              <div class="p-download__body">
                <h2 class="p-download__title"><?php echo $download_title; ?></h2>
                <?php if($download_form): ?>
                <div class="p-download__dl">
                  <a<?php if($download_blank): ?> target="_blank" rel="noopener noreferrer"<?php endif; ?> href="<?php echo $download_form; ?>" class="c-button c-button--sm"><span>ダウンロードする</span></a>
                </div>
                <?php endif; ?>
                <?php if($download_link): ?>
                <a href="<?php echo $download_link;?>" class="p-download__product-link">製品ページへ</a>
                <?php endif; ?>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
          <?php endif; ?>
          <?php if('ja' == $locale):?>
          <div class="c-youtube-link p-movie__link">
            <a target="_blank" rel="noopener noreferrer" href="https://www.youtube.com/channel/UCjfdk0WCT2vjdKbHTg4PLWw"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/common/bnr-youtube.png" alt="公式YouTube"></a>
          </div>
          <?php else: ?>
          <div class="c-youtube-link p-movie__link">
            <a target="_blank" rel="noopener noreferrer" href="https://www.youtube.com/channel/UCjfdk0WCT2vjdKbHTg4PLWw"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/common/en_bnr-youtube.png" alt="公式YouTube"></a>
          </div>
          <?php endif; ?>
          <div class="p-download__cta">
            <div class="p-download__head">
              <p class="p-download__text">製品紹介やお役立ち資料を無料でご活用いただけます</p>
            </div>
            <div class="p-download__button">
              <a href="<?php echo esc_url(home_url()); ?>/useful/movie/" class="c-button c-button--paint"><span>製品動画ギャラリー</span></a>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>