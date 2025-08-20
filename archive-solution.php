<?php get_header(); ?>
<?php $locale = get_locale();?>
<?php if( have_posts() ): ?>
<?php
$term_order = 'orderby=term_order';
?>
<div class="l-wrapper">

    <div class="c-mv">
      <div class="c-mv__inner">
        <?php if('en_US' == $locale):?>
        <?php if(is_tax()): ?>
        <span class="c-mv__en"><?php the_archive_title(); ?></span>
        <?php else: ?>
        <span class="c-mv__en">SOLUTIONS</span>
        <?php endif; ?>
        <?php else: ?>
        <h1 class="c-mv__title">
          <span class="c-mv__jp">ソリューション</span>
          <span class="c-mv__en">SOLUTIONS</span>
        </h1>
        <?php endif; ?>

        <ul class="p-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php if (function_exists('bcn_display')) {
              bcn_display_list();
            } ?>
        </ul>
      </div>
    </div>
    <div class="l-section l-section--md">
      <div class="l-inner">
      <?php if('en_US' == $locale):?>
        <?php if(is_tax()): ?>
        <div class="c-media">
          <div class="c-media__img-wrapper">
            <?php
             $term_id = get_queried_object()->term_id;
             $term_name = get_queried_object()->name;
             $term_idsp = 'solution_category_'.$term_id;
             $category_image = get_field('category_image',$term_idsp);
             $category_textarea = get_field('en_category_textarea',$term_idsp);
            if( !empty($category_image) ):
                // vars
                $url = $category_image['url'];
            ?>
            <?php endif; ?>
            <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
          </div>
          <div class="c-media__body">
            <h2 class="c-media__title"><?php the_archive_title(); ?></h2>
            <div class="c-media__content">
              <?php if ($category_textarea) : ?><?php echo $category_textarea; ?><?php endif; ?>
            </div>
          </div>
        </div>
        <!--./c-media-->
        <?php else: ?>
        <div class="c-media">
          <div class="c-media__img-wrapper">
            <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/solution/img_solution01.jpg" alt="">
          </div>
          <div class="c-media__body">
            <?php $solution_title_en = get_field('solution-title-en','option'); ?>
            <?php $solution_text_en = get_field('solution-text-en','option'); ?>
            <?php if($solution_title_en ): ?>
            <h2 class="c-title u-mb40 u-smb24"><?php echo $solution_title_en;?></h2>
            <?php endif; ?>
            <?php if($solution_text_en ): ?>
            <div class="c-media__content">
            <?php echo $solution_text_en; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <main>
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
                      <label><input type="checkbox" value="<?php echo esc_attr($solution_category_term->slug); ?>" name="category[]"><span><?php echo $solution_category_term->name; ?></span></label>
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
                      <label><input type="checkbox" value="<?php echo esc_attr($solution_industry_term->slug); ?>" name="industry[]"><span><?php echo $solution_industry_term->name; ?></span></label>
                      <?php endforeach; ?>
                    </td>
                  </tr>
                </table>
                <a href="<?php echo esc_url(home_url()); ?>/solution/" class="c-search__cancel"<?php if('ja' == $locale):?> onclick="gtag('event', 'ソリューション_絞り込み解除', { 'event_category': '絞り込み解除' });"<?php endif; ?>>×<?php if('en_US' == $locale):?>Unrefine your search<?php else: ?>絞り込みを解除する<?php endif; ?></a>
                <input type="hidden" name="post_type" value="solution">
                <input type="hidden" name="s" value="<?php echo get_search_query(); ?>" />
                <?php if('en_US' == $locale):?>
                <p class="c-search__button">
                  <button id="js-submit" type="submit" class="c-button c-button--paint" disabled><span>SEARCH</span></button>
                 </p>
                <?php else: ?>
                <p class="c-search__button">
                  <button id="js-submit" type="submit" class="c-button c-button--paint" onclick="gtag('event', 'ソリューション_絞り込み', { 'event_category': '絞り込み' });" disabled><span>この条件で絞り込む</span></button>
                </p>
                <?php endif; ?>
              </div>
            </form>
            <?php if( have_posts() ): ?>
            <div class="c-search__card">

              <ul class="c-search__list">
                <?php while( have_posts() ): the_post(); ?>
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
            <?php endif; ?>
          </div>
        </main>
      </div>
    </div>
  <?php get_template_part('template/content', 'cta'); ?>
</div>

<?php endif; ?>
<?php get_footer(); ?>