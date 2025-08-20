<?php get_header(); ?>
<?php $locale = get_locale();?>
<?php
//絞り込みの値を取得
$s = $_GET['s'];
$post_type = $_GET[ 'solution' ];
$solution_category = $_GET[ 'category' ] ?? '';
$solution_industry = $_GET[ 'industry' ] ?? '';
//絞り込みの値をクエリ用に代入

if ( $solution_category ) {
  $taxquery_category = array(
    'taxonomy' => 'solution_category',
    'terms' => $solution_category,
    'field' => 'slug',
    'operator' => 'IN',
  );
}

if ( $solution_industry ) {
  $taxquery_industry = array(
    'taxonomy' => 'solution_industry',
    'terms' => $solution_industry,
    'field' => 'slug',
    'operator' => 'IN',
  );
}
?>
<?php
$args = array(
  'post_type' => 'solution',
  'posts_per_page' => -1,
  's' => $s,
  'tax_query' => array(
    'relation' => 'AND', //ANDかORのどちらかを指定（大文字）
    $taxquery_category, $taxquery_industry
  )
);
$term_order = 'orderby=term_order';
?>

<div class="l-wrapper">

    <div class="c-mv">
      <div class="c-mv__inner">
        <?php if('en_US' == $locale):?>
        <h1 class="c-mv__title">
          <span class="c-mv__en">SOLUTION</span>
        </h1>
        <?php else: ?>
        <h1 class="c-mv__title">
          <span class="c-mv__jp">ソリューション</span>
          <span class="c-mv__en">SOLUTIONS</span>
        </h1>
        <?php endif; ?>
      </div>
    </div>
    <main id="main">
      <div class="l-section l-section--md">
        <div class="l-inner">
          <div class="c-search">
            <p class="c-search__name"><?php if('ja' == $locale):?>ソリューション、形式名から探す<?php else: ?>SEARCH BY SOLUTIONS &amp; FORMAT<?php endif; ?></p>
            <form id="form" action="<?php echo esc_url(home_url('/')); ?>" method="get"  class="c-search__head">
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
                  <tr>
                    <th><?php if('ja' == $locale):?>種類<?php else: ?>TYPE<?php endif; ?></th>
                    <td>
                      <?php
                        $solution_category_terms = get_terms('solution_category',$term_order);
                        foreach ( $solution_category_terms as $solution_category_term ):
                      ?>
                      <label><input type="checkbox" value="<?php echo esc_attr($solution_category_term->slug); ?>" name="category[]"<?php if(in_array($solution_category_term->slug, (array)$solution_category)):?> checked<?php endif; ?>><span><?php echo $solution_category_term->name; ?></span></label>
                      <?php endforeach; ?>
                    </td>
                  </tr>
                  <tr>
                    <th><?php if('ja' == $locale):?>業界から探す<?php else: ?>SEARCH BY INDUSTRY<?php endif; ?></th>
                    <td>
                      <?php
                        $solution_industry_terms = get_terms('solution_industry',$term_order);
                        foreach ( $solution_industry_terms as $solution_industry_term ):
                      ?>
                      <label><input type="checkbox" value="<?php echo esc_attr($solution_industry_term->slug); ?>" name="industry[]"<?php if(in_array($solution_industry_term->slug, (array)$solution_industry)):?> checked<?php endif; ?>><span><?php echo $solution_industry_term->name; ?></span></label>
                      <?php endforeach; ?>
                    </td>
                  </tr>
                </table>
                <a href="<?php echo esc_url(home_url()); ?>/solution/" class="c-search__cancel">×<?php if('en_US' == $locale):?>Unrefine your search<?php else: ?>絞り込みを解除する<?php endif; ?></a>
                <input type="hidden" name="post_type" value="solution">
                <input type="hidden" name="s" value="<?php echo get_search_query(); ?>" />
                <?php if('en_US' == $locale):?>
                <p class="c-search__button">
                  <button id="js-submit" type="submit" class="c-button c-button--paint" disabled><span>SEARCH</span></button>
                </p>
                <?php else: ?>
                <p class="c-search__button">
                  <button id="js-submit" type="submit" class="c-button c-button--paint" disabled><span>この条件で絞り込む</span></button>
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
                  <a class="c-search__link" href="<?php echo get_primary_link($post); ?>">
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
          </div>
        </div>
      </div>
      <?php if ( $the_query->have_posts() ): ?>
      <?php else: ?>
      <div class="c-relation">
        <div class="c-relation__inner l-inner">
          <h3 class="c-sub-title">関連情報</h3>
          <ul class="c-relation__list">
          <?php
            $taxonomy = $wp_query->get_queried_object();
            $taxonomy_parent = $taxonomy->parent;
            ?>
            <?php if($taxonomy->parent == 0): ?>
              <?php
              $taxonomy_name = 'product_category';
              $taxonomy_args = array(
              'hide_empty' => false,
              'parent' => 0,
              );
              $taxonomy_terms = get_terms( $taxonomy_name, $taxonomy_args );
              foreach ( $taxonomy_terms as $taxonomy_term ):
            ?>
            <li class="c-relation__item"><a class="c-relation__link" href="<?php echo get_term_link($taxonomy_term); ?>"><span><?php echo $taxonomy_term->name; ?></span></a></li>
            <?php endforeach; ?>
            <?php else: ?>
              <?php
              $taxonomy_name = 'solution_category';
              $taxonomy_args = array(
              'hide_empty' => false,
              'parent' => $taxonomy_parent,
              );
              $taxonomy_terms = get_terms( $taxonomy_name, $taxonomy_args );
              foreach ( $taxonomy_terms as $taxonomy_term ):
            ?>
            <li class="c-relation__item"><a class="c-relation__link" href="<?php echo get_term_link($taxonomy_term); ?>"><span><?php echo $taxonomy_term->name; ?></span></a></li>
            <?php endforeach; ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </main>
  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php get_footer(); ?>