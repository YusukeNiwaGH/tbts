<?php get_header(); ?>
<?php $locale = get_locale();?>
<?php
//絞り込みの値を取得
$s = $_GET['s'];
$post_type = $_GET[ 'product' ] ?? '';
$product_category = $_GET[ 'category' ] ?? '';
//絞り込みの値をクエリ用に代入

$taxquery_category = array();

if ( $product_category ) {
  $taxquery_category = array(
    'taxonomy' => 'product_category',
    'terms' => $product_category,
    'field' => 'slug',
    'operator' => 'IN',
  );
}

?>
<?php
$args = array(
  'post_type' => 'product',
  'posts_per_page' => -1,
  's' => $s,
  'tax_query' => array(
    'relation' => 'AND', //ANDかORのどちらかを指定（大文字）
    $taxquery_category
  )
);
?>
<?php get_header(); ?>

<div class="l-wrapper">
  <div class="c-mv">
    <div class="c-mv__inner">
      <?php if('en_US' == $locale):?>
      <h1 class="c-mv__title">
        <span class="c-mv__en">PRODUCT</span>
      </h1>
      <?php else: ?>
      <h1 class="c-mv__title">
        <span class="c-mv__jp">製品</span>
        <span class="c-mv__en">PRODUCT</span>
      </h1>
      <?php endif; ?>
    </div>
  </div>
  <div class="l-section l-section--md">
    <div class="l-inner">
      <main>
        <div class="c-search">
          <p class="c-search__name"><?php if('ja' == $locale):?>製品名、形式名から探す<?php else: ?>SEARCH BY PRODUCTS &amp; FORMAT<?php endif; ?></p>
          <form id="form" action="<?php echo esc_url(home_url()); ?>/" method="get"  class="c-search__head">
            <input id="search" class="c-search__head-input" name="s" type="search"
              placeholder="<?php if('ja' == $locale):?>製品シリーズ / 形式名を入力<?php else: ?>ENTER PRODUCT SERIES / FORMAT NAME<?php endif; ?>">
            <div class="c-search__head-link">
              <button type="submit" class="c-search__head-submit"><span><?php if('ja' == $locale):?>検索する<?php else: ?>SEARCH<?php endif; ?></span></button>
            </div>
          </form>
          <form class="c-search__form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <p id="js-search-title" class="c-search__form-title"><?php if('en_US' == $locale):?>Refine search<?php else: ?>絞り込む<?php endif; ?><span class="c-search__form-icon"></span></p>
            <div class="c-search__form-inner">
              <table class="c-search__form-table">
                <?php if('ja' == $locale):?>
                <tr>
                  <th>三次元測定機</th>
                  <td>
                    <?php
                      $product_category_terms = get_terms('product_category');
                      $measuring = get_term_by( 'slug', '3d-measuring', 'product_category');
                      $measuring_id = $measuring->term_id;
                      $other_measuring = get_term_by( 'slug', 'other-measuring', 'product_category');
                      $other_measuring_id = $other_measuring->term_id;
                      foreach ( $product_category_terms as $product_category_term ):
                    ?>
                    <?php if($product_category_term->parent === $measuring_id): ?>
                    <label><input type="checkbox" value="<?php echo esc_attr($product_category_term->slug); ?>" name="category[]"<?php if(in_array($product_category_term->slug, (array)$product_category)):?> checked<?php endif; ?>><span><?php echo $product_category_term->name; ?></span></label>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </td>
                </tr>
                <tr>
                  <th>その他の測定機</th>
                  <td>
                    <?php
                      foreach ( $product_category_terms as $product_category_term ):
                    ?>
                    <?php if($product_category_term->parent === $other_measuring_id): ?>
                    <label><input type="checkbox" value="<?php echo esc_attr($product_category_term->slug); ?>" name="category[]"<?php if(in_array($product_category_term->slug, (array)$product_category)):?> checked<?php endif; ?>><span><?php echo $product_category_term->name; ?></span></label>
                    <?php endif; ?>
                    <?php endforeach; ?>
                  </td>
                </tr>
                <?php endif; ?>
                <tr>
                  <th><?php if('ja' == $locale):?>その他<?php else: ?>Type<?php endif; ?></th>
                  <td>
                    <?php
                      if('ja' == $locale){
                      $taxonomy_name = 'product_category';
                      $taxonomy_args = array(
                      'exclude'       => array($measuring_id,$other_measuring_id),
                      'hide_empty' => false,
                      'parent' => 0,
                      );
                      $product_other_terms = get_terms( $taxonomy_name, $taxonomy_args );
                    } else {
                      $taxonomy_name = 'product_category';
                      $taxonomy_args = array(
                      'hide_empty' => false,
                      'parent' => 0,
                      );
                      $product_other_terms = get_terms( $taxonomy_name, $taxonomy_args );
                    }
                      foreach ( $product_other_terms as $product_other_term ):
                    ?>
                    <label><input type="checkbox" value="<?php echo esc_attr($product_other_term->slug); ?>" name="category[]"><span><?php echo $product_other_term->name; ?></span></label>
                    <?php endforeach; ?>
                  </td>
                </tr>
              </table>
              <a href="<?php echo esc_url(home_url('product')); ?>/" class="c-search__cancel">×<?php if('en_US' == $locale):?>Unrefine your search<?php else: ?>絞り込みを解除する<?php endif; ?></a>
              <input type="hidden" name="post_type" value="product">
              <input type="hidden" name="s" value="<?php echo get_search_query(); ?>" />
              <?php if('en_US' == $locale):?>
              <p class="c-search__button">
                <button id="js-submit" type="submit" class="c-button c-button--paint"><span>SEARCH</span></button>
              </p>
              <?php else: ?>
              <p class="c-search__button">
                <button id="js-submit" type="submit" class="c-button c-button--paint"><span>この条件で絞り込む</span></button>
              </p>
              <?php endif; ?>
            </div>
          </form>
          <?php
          $the_query = new WP_Query( $args );
          if ( $the_query->have_posts() ): ?>
          <div class="c-search__card">

            <ul class="c-search__list">
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <li class="c-search__item">
                <a class="c-search__link" href="<?php the_permalink(); ?>">
                  <figure class="c-search__img-wrapper">
                  <?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail('blog_image');
                    } else {
                      echo '<img width="272" height="153" src="'. esc_url ( get_template_directory_uri() ).'/assets/images/common/img_noimage01.png" alt="" />';
                    }
                  ?>
                  </figure>
                  <h2 class="c-search__title"><?php the_title(); ?></h2>
                </a>
              </li>
              <?php endwhile; ?>
            </ul>
          </div>
          <?php else: ?>
          <?php if('ja' == $locale):?>
          <div class="c-search__not">
            <p class="c-search__not-title">該当する項目はありませんでした。</p>
            <p class="c-search__not-lead">条件を変えて再度検索してください。</p>
          </div>
          <?php else: ?>
          <div class="c-search__not">
            <p class="c-search__not-title">No matches found.</p>
            <p class="c-search__not-lead">Please change the criteria and search again.</p>
          </div>
          <?php endif; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </main>
    </div>
  </div>
  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php get_footer(); ?>