<?php
/*
Template Name: 製品動画ギャラリー
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
        <main class="p-page__body p-movie">
          <form class="c-search__form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <p id="js-search-title" class="c-search__form-title"><?php if('en_US' == $locale):?>Refine search<?php else: ?>絞り込む<?php endif; ?><span class="c-search__form-icon"></span></p>
            <div class="c-search__form-inner">
              <table class="c-search__form-table">
                <tr>
                  <th><?php if('en_US' == $locale):?>Products & Solutions<?php else: ?>種類<?php endif; ?></th>
                  <td>
                    <?php
                      $taxonomy_args = array(
                        'hide_empty' => false,
                      );
                      $movie_category_terms = get_terms('movie_category', $taxonomy_args);
                      foreach ( $movie_category_terms as $movie_category_term ):
                    ?>
                    <?php if($movie_category_term): ?>
                    <label><input type="checkbox" value="<?php echo esc_attr($movie_category_term->name); ?>" name="category"><span><?php echo $movie_category_term->name; ?></span></label>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </td>
                </tr>

              </table>
              <p id="js-cancel" class="c-search__cancel"<?php if('ja' == $locale):?> onclick="gtag('event', '製品動画_絞り込み解除', { 'event_category': '絞り込み解除' });"<?php endif; ?>>×<?php if('en_US' == $locale):?>Unrefine your search<?php else: ?>絞り込みを解除する<?php endif; ?></p>
            </div>
          </form>
          <?php if( have_rows( 'movie') ): ?>
          <div class="p-movie__list">
            <?php while( have_rows( 'movie') ): the_row(); ?>
            <?php $movie_category_id = get_sub_field( 'movie_category'); ?>
            <div data-category="<?php foreach ( $movie_category_id as $movie_category_id_term ): ?><?php echo $movie_category_id_term->name; ?><?php endforeach; ?>" class="p-movie__item">
              <div class="p-movie__youtube">
              <?php if( get_sub_field('movie_url') ): ?>
                <?php echo $embed_code = wp_oembed_get( get_sub_field('movie_url') ); ?>
              <?php endif; ?>
              </div>
              <div class="p-movie__body">
                <h2 class="p-movie__title"><?php the_sub_field('movie_title'); ?></h2>
                <div class="c-category">
                <?php if($movie_category_id): ?>
                <?php foreach ( $movie_category_id as $movie_category_id_term ): ?>
                  <span class="c-category__item"><?php echo $movie_category_id_term->name; ?></span>
                <?php endforeach; ?>
                <?php endif; ?>

                </div>
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
          <?php if('ja' == $locale):?>
          <div class="p-movie__cta">
            <div class="p-movie__head">
              <span class="p-movie__free">無料</span>
              <p class="p-movie__text">製品紹介やお役立ち資料を無料でご活用いただけます</p>
            </div>
            <div class="p-movie__button">
              <a href="<?php echo esc_url(home_url()); ?>/useful/download/" class="c-button c-button--paint"><span>カタログダウンロード</span></a>
            </div>
          </div>
          <?php endif; ?>
        </main>
      </div>
    </div>
  </div>
  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>