<?php get_header(); ?>
<?php $locale = get_locale();?>
<?php
//絞り込みの値を取得
$s = $_GET['s'];
$post_type = $_GET[ 'case' ];
$case_category = $_GET[ 'category' ];
//絞り込みの値をクエリ用に代入

if ( $case_category ) {
  $taxquery_category = array(
    'taxonomy' => 'case_category',
    'terms' => $case_category,
    'field' => 'slug',
    'operator' => 'IN',
  );
}

?>
<?php
$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
$args = array(
  'post_type' => 'case',
  'posts_per_page' => 12,
  'paged' => get_query_var('paged'),
  's' => $s,
  'tax_query' => array(
    'relation' => 'AND', //ANDかORのどちらかを指定（大文字）
    $taxquery_category
  )
);
?>
<div class="l-wrapper">
    <div class="c-mv">
      <div class="c-mv__inner">
        <h1 class="c-mv__title">
          <span class="c-mv__jp">ユーザー事例</span>
          <span class="c-mv__en">CASE</span>
        </h1>
      </div>
    </div>
    <div class="l-section l-section--md">
      <div class="l-inner">
        <main class="p-case">
          <div class="c-search">
            <form class="c-search__form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
              <p id="js-search-title" class="c-search__form-title"><?php if('en_US' == $locale):?>Refine search<?php else: ?>絞り込む<?php endif; ?><span class="c-search__form-icon"></span></p>
              <div class="c-search__form-inner">
                <table class="c-search__form-table">
                  <tr>
                    <th><?php if('en_US' == $locale):?>Products & Solutions<?php else: ?>種類<?php endif; ?></th>
                    <td>
                      <?php
                        $case_category_terms = get_terms('case_category');
                        foreach ( $case_category_terms as $case_category_term ):
                      ?>
                      <label><input type="checkbox" value="<?php echo esc_attr($case_category_term->slug); ?>" name="category[]"<?php if(in_array($case_category_term->slug, (array)$case_category)):?> checked<?php endif; ?>><span><?php echo $case_category_term->name; ?></span></label>
                      <?php endforeach; ?>
                    </td>
                  </tr>
                </table>
                <a href="<?php echo esc_url(home_url()); ?>/case/" class="c-search__cancel">×<?php if('en_US' == $locale):?>Unrefine your search<?php else: ?>絞り込みを解除する<?php endif; ?></a>
                <input type="hidden" name="post_type" value="case">
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
          </div>
          <div class="p-case__inner">
            <?php
            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ): ?>
            <ul class="p-case__list">
              <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <li class="p-case__item">
                <a class="p-case__link" href="<?php the_permalink(); ?>">
                  <div class="p-case__photo">
                  <?php
                    if (has_post_thumbnail()) {
                      the_post_thumbnail();
                    } else {
                      echo '<img src="'.esc_url ( get_template_directory_uri() ).'/assets/images/common/img_noimage01.png" alt="">';
                    }
                  ?>
                  </div>
                  <div class="p-case__body">
                    <h2 class="p-case__title"><?php the_title(); ?></h2>
                    <?php
                        $case_category_terms = get_the_terms($post->ID,'case_category');
                        if($case_category_terms ):
                        foreach ( $case_category_terms as $case_category_term ):
                      ?>
                      <p class="p-case__category"><?php echo $case_category_term->name; ?></p>
                      <?php endforeach; endif; ?>
                      <div class="p-case__desc"><?php if (get_field('case-desc')) : ?><?php the_field('case-desc'); ?><?php endif; ?></div>
                  </div>
                </a>
              </li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </div>
          <div class="pager">
            <?php
              echo paginate_links(array(
                'mid_size' => 1,
                'current' => max(1, get_query_var('paged')),
                'total' => $the_query->max_num_pages,
                'prev_text' => '◀︎',
                'next_text' => '▶︎',
              ));
            ?>
          </div>
        </main>
      </div>
    </div>
  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php get_footer(); ?>