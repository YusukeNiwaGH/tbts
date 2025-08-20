<?php get_header(); ?>
<?php $locale = get_locale();?>
<?php
//絞り込みの値を取得
$s = $_GET['s'];
$post_type = $_GET[ 'webinar' ];
$webinar_category = $_GET[ 'category' ];
//絞り込みの値をクエリ用に代入

if ( $webinar_category ) {
  $taxquery_category = array(
    'taxonomy' => 'webinar_category',
    'terms' => $webinar_category,
    'field' => 'slug',
    'operator' => 'IN',
  );
}
?>
<?php
$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
$args = array(
  'post_type' => 'webinar',
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
        <?php if('en_US' == $locale):?>
          <h1 class="c-mv__title">
            <span class="c-mv__en">WEBINAR</span>
          </h1>
        <?php else: ?>
          <h1 class="c-mv__title">
            <span class="c-mv__jp">ウェビナー</span>
            <span class="c-mv__en">WEBINAR</span>
          </h1>
        <?php endif; ?>
      </div>
    </div>
    <main class="p-case">
      <div class="l-section l-section--md">
        <div class="l-container">
          <div class="l-inner">
            <div id="js-search" class="c-search u-mt0">
              <form class="c-search__form u-mt0" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <p id="js-search-title" class="c-search__form-title"><?php if('en_US' == $locale):?>Refine search<?php else: ?>絞り込む<?php endif; ?><span class="c-search__form-icon"></span></p>
                <div class="c-search__form-inner">
                  <table class="c-search__form-table">
                    <tr>
                      <th><?php if('en_US' == $locale):?>Types of Webinars<?php else: ?>ウェビナー<?php endif; ?></th>
                      <?php if('en_US' == $locale):?>
                      <?php if( have_posts() ): ?>
                      <?php while( have_posts() ): the_post(); ?>
                      <?php
                        $webinar_category_terms = get_the_terms($post->ID,'webinar_category');
                        if($webinar_category_terms ):
                        foreach ( $webinar_category_terms as $webinar_category_term ):
                      ?>
                      <?php $webinar_category[] =  $webinar_category_term->slug; ?>
                      <?php endforeach; endif; ?>
                      <?php endwhile; ?>
                      <?php endif; ?>
                      <?php
                        $webinar_category = array_unique($webinar_category);
                      ?>
                      <td>
                      <?php
                        $taxonomy_args = array(
                          'slug' => $webinar_category,
                          'hide_empty' => false,
                          'parent' => 0,
                        );
                        $webinar_category_terms = get_terms('webinar_category',$taxonomy_args);
                        foreach ( $webinar_category_terms as $webinar_category_term ):
                        ?>
                        <label><input type="checkbox" value="<?php echo esc_attr($webinar_category_term->slug); ?>" name="category[]"<?php if(in_array($webinar_category_term->slug, (array)$webinar_category)):?> checked<?php endif; ?>><span><?php echo $webinar_category_term->name; ?></span></label>
                        <?php endforeach; ?>
                      </td>
                      <?php else: ?>
                      <td>
                        <?php
                          $webinar_category_terms = get_terms('webinar_category');
                          foreach ( $webinar_category_terms as $webinar_category_term ):
                        ?>
                        <label><input type="checkbox" value="<?php echo esc_attr($webinar_category_term->slug); ?>" name="category[]"<?php if(in_array($webinar_category_term->slug, (array)$webinar_category)):?> checked<?php endif; ?>><span><?php echo $webinar_category_term->name; ?></span></label>
                        <?php endforeach; ?>
                      </td>
                      <?php endif; ?>
                    </tr>
                  </table>
                  <a href="<?php echo esc_url(home_url()); ?>/useful/webinar/" class="c-search__cancel">×<?php if('en_US' == $locale):?>Unrefine your search<?php else: ?>絞り込みを解除する<?php endif; ?></a>
                  <input type="hidden" name="post_type" value="webinar">
                  <input type="hidden" name="s" value="<?php echo get_search_query(); ?>" />
                  <?php if('en_US' == $locale):?>
                  <p class="c-search__button">
                    <button type="submit" id="js-submit" class="c-button c-button--paint" disabled><span>SEARCH</span></button>
                  </p>
                  <?php else: ?>
                  <p class="c-search__button">
                    <button type="submit" id="js-submit" class="c-button c-button--paint" disabled><span>この条件で絞り込む</span></button>
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
                <?php $webinar_blank = get_field( 'webinar-blank'); ?>
                <li class="p-case__item">
                  <a class="p-case__link"<?php if($webinar_blank): ?> target="_blank" rel="noopener noreferrer"<?php endif; ?> href="<?php if (get_field('webinar-link')) : ?><?php the_field('webinar-link'); ?><?php else: ?><?php the_permalink(); ?><?php endif; ?>">
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
                      <?php if (get_field('webinar-desc')) : ?><div class="p-case__desc"><?php the_field('webinar-desc'); ?></div><?php endif; ?>
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
          </div>
        </div>
      </div>
    </main>
  <?php get_template_part('template/content', 'cta'); ?>
</div>

<?php get_footer(); ?>