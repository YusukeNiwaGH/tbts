<?php get_header(); ?>
<?php $locale = get_locale();?>
<div class="l-wrapper">
  <div class="p-news">
    <div class="c-mv">
      <div class="c-mv__inner">
        <p class="c-mv__title">
          <span class="c-mv__jp">404 Not Found</span>
        </p>
        <ul class="p-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php if (function_exists('bcn_display')) {
              bcn_display_list();
            } ?>
        </ul>
      </div>
    </div>
    <div class="l-section l-section">
      <div class="l-inner">

        <main class="p-404">
          <div class="p-404__inner">
            <?php if('ja' == $locale):?>
            <p class="p-404__title">ご指定のページがみつかりません</p>
            <p class="p-404__text">リニューアルなどの理由により、URLが変更・移動した可能性があります。<br class="u-md-hidden">
              以下より、目的のページをお探しください。</p>
            <?php else: ?>
            <p class="p-404__title">We are sorry, the page you requested cannot be found.</p>
            <p class="p-404__text">The URL may be misspelled or the page you’re looking for is no longer available.<br>
Please find the desired page again.</p>
            <?php endif; ?>
            <?php if('ja' == $locale):?>
            <p class="p-404__search-title"><?php if('ja' == $locale):?>製品名、ソリューション、形式名から探す<?php else: ?>SEARCH BY SOLUTIONS &amp; FORMAT<?php endif; ?></p>
            <?php endif; ?>
          </div>
          <?php if('ja' == $locale):?>
          <div class="c-product-search__section">
            <form id="form" action="<?php echo esc_url(home_url()); ?>/" method="get" class="c-product-search__search">
              <input id="search" class="c-product-search__search-input" name="s" type="search"
                placeholder="製品シリーズ / 形式名を入力">
              <div class="c-product-search__search-link">
                <button type="submit" class="c-product-search__search-submit"><span>製品検索</span></button>
              </div>
            </form>
            <div class="c-product-search__card">
              <div class="c-product-search__tab">
                <p class="c-product-search__tab-item is-active">製品から探す</p>
                <p class="c-product-search__tab-item">ソリューションから探す</p>
              </div>
              <div class="c-product-search__area">
                <div class="c-product-search__panel is-active">
                  <ul class="c-product-search__panel-list">
                    <?php
                      $product_taxonomy_args = array(
                      'hide_empty' => false,
                      'parent' => 0,
                      );
                      $product_category_terms = get_terms('product_category',$product_taxonomy_args);
                      foreach ( $product_category_terms as $product_category_term ):
                    ?>
                    <?php
                    $term_id = $product_category_term->term_id;
                    $term_idsp = 'product_category_'.$term_id;
                    $category_image = get_field('category_image',$term_idsp);
                    if( !empty($category_image) ):
                        $url = $category_image['url'];
                    ?>
                    <?php endif; ?>
                    <li class="c-product-search__panel-item">
                      <a class="c-product-search__panel-link" href="<?php echo get_term_link($product_category_term); ?>">
                        <figure class="c-product-search__panel-img-wrapper">
                        <?php if( !empty($category_image) ): ?>
                        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                        <?php else: ?>
                        <img width="272" height="153" src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/common/img_noimage01.png" alt="" />
                        <?php endif; ?>
                        </figure>
                        <h3 class="c-product-search__panel-title"><?php echo $product_category_term->name; ?></h3>
                      </a>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <div class="c-product-search__panel">
                  <ul class="c-product-search__panel-list">
                    <?php
                      $solution_taxonomy_args = array(
                      'hide_empty' => false,
                      'parent' => 0,
                      );
                      $solution_category_terms = get_terms('solution_category',$solution_taxonomy_args);
                      foreach ( $solution_category_terms as $solution_category_term ):
                    ?>
                    <?php
                    $solution_term_id = $solution_category_term->term_id;
                    $solution_term_idsp = 'solution_category_'.$solution_term_id;
                    $solution__image = get_field('category_image',$solution_term_idsp);
                    if( !empty($solution__image) ):
                        $url = $solution__image['url'];
                    ?>
                    <?php endif; ?>
                    <li class="c-product-search__panel-item">
                      <a class="c-product-search__panel-link" href="<?php echo get_term_link($solution_category_term); ?>">
                        <figure class="c-product-search__panel-img-wrapper">
                        <?php if( !empty($solution__image) ): ?>
                        <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                        <?php else: ?>
                        <img width="272" height="153" src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/common/img_noimage01.png" alt="" />
                        <?php endif; ?>
                        </figure>
                        <h3 class="c-product-search__panel-title"><?php echo $solution_category_term->name; ?></h3>
                      </a>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
              <div class="c-product-search__industry">
                <h3 class="c-product-search__industry-title">業界から探す</h3>
                <ul class="c-product-search__industry-list">
                  <?php
                    $solution_industry_terms = get_terms('solution_industry');
                    foreach ( $solution_industry_terms as $solution_industry_term ):
                  ?>
                  <li class="c-product-search__industry-item"><a class="c-product-search__industry-link" href="<?php echo get_term_link($solution_industry_term); ?>"><?php echo $solution_industry_term->name; ?></a>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </main>
      </div>
    </div>
  </div>
  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php get_footer(); ?>