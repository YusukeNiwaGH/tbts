<?php get_header(); ?>
<?php $locale = get_locale();?>
<?php get_template_part('template/content', 'loading'); ?>
<?php
    $front_page_id = get_option('page_on_front');
  ?>
<div class="l-wrapper">
  <?php
    $args = [
      'post_type' => 'post',
      'posts_per_page' => 1,
      'category_name' => "emergency",
    ];
    $emergency_query = new WP_Query($args);
    if ($emergency_query->have_posts()) :
  ?>
  <?php while ($emergency_query->have_posts()) : $emergency_query->the_post(); ?>
  <div class="p-emergency">
    <div class="p-emergency__inner">
      <p><span class="p-emergency__category">緊急のお知らせ</span><span class="p-emergency__text"><?php the_title(); ?></span></p>
    </div>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
  <div class="p-mv">
    <div class="p-mv__scroll">
      <div class="p-mv__scroll-item"><span>SCROLL</span></div>
    </div>
    <div class="p-mv__slider">
      <div class="swiper-container">
      <!--
      <div class="p-mv__stop stop">
                  <picture><source media="(min-width: 993px)" srcset="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/top/mv_stop.png, <?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/top/mv_stop@2x.png 2x"><source media="(max-width: 992px)" srcset="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/top/mv_stop--mobile.png"><img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/top/mv_stop.png" alt=""></picture>
                </div>
       -->
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- 繰り返しフィールドを表示 -->
          <?php if( have_rows( 'top_mv', $front_page_id ) ): ?>
          <?php while( have_rows( 'top_mv', $front_page_id ) ): the_row(); ?>
          <?php
            $top_mv_image = get_sub_field( 'top_mv_image', $front_page_id );
            $top_mv_link = get_sub_field( 'top_mv_link', $front_page_id );
            $top_mv_blank = get_sub_field( 'top_mv_blank', $front_page_id );
            $top_mv_url = $top_mv_image['url'];
          ?>
          <div class="swiper-slide">
            <div class="p-mv__body">
              <div class="p-mv__photo">
                <div class="p-mv__photo-head">
                  <div class="mv__item" style="background-image:url(<?php echo $top_mv_url;  ?>);"></div>
                </div>
              </div>
              <!--/p-mv__photo-->
              <div class="p-mv__content">
                <div class="p-mv__inner">
                  <p class="p-mv__text">
                  <span><?php the_sub_field('top_mv_title', $front_page_id); ?></span>
                  </p>
                  <?php if($top_mv_link): ?>
                  <a<?php if($top_mv_blank): ?> target="_blank" rel="noopener noreferrer"<?php endif; ?> href="<?php the_sub_field('top_mv_link', $front_page_id); ?>" class="p-mv__button"><span>VIEW MORE</span></a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="p-mv__footer">
      <div class="p-mv__progressbar"><span class="p-mv__progressbar_in"></span></div>
      <div class="swiper-pagination"></div>
    </div>
    <!--.p-mv__body-->
    <div class="p-mv__photo-footer">
      <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
        <?php if( have_rows( 'top_mv_thumbnail', $front_page_id ) ): ?>
          <?php while( have_rows( 'top_mv_thumbnail', $front_page_id ) ): the_row(); ?>
          <?php
            $top_mv_thumbnail_image = get_sub_field( 'top_mv_thumbnail_item', $front_page_id );
            $top_mv_thumbnail_url = $top_mv_thumbnail_image['url'];
          ?>
          <div class="swiper-slide">
            <img src="<?php echo $top_mv_thumbnail_url;  ?>" width="140" height="81" alt="">
          </div>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <?php
    if('en_US' == $locale) :
    $args = [
      'post_type' => 'post',
      'posts_per_page' => 1,
      'category_name' => "news",
    ];
    $news_query = new WP_Query($args);
    if ($news_query->have_posts()) :
  ?>
	<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
  <?php $news_event_link = get_field( 'news_event_link'); ?>
  <?php $news_event_blank = get_field( 'news_event_blank'); ?>
	<div class="l-inner">
    <div class="p-top-information--en">
      <a <?php if($news_event_link): ?>href="<?php echo $news_event_link; ?>"<?php else: ?>href="<?php the_permalink(); ?>"<?php endif; ?><?php if($news_event_blank): ?> target="_blank" rel="noopener noreferrer"<?php endif; ?> class="p-top-information__article">
        <span class="p-top-information__article-title">NEWS</span>
        <span class="p-top-information__article-date"><?php the_time('Y.m.d'); ?></span>
        <?php $news_tags = get_the_tags(); ?>
        <?php if($news_tags) : ?>
        <?php foreach( $news_tags as $news_tag) {
          echo '<span class="p-news__article-category">' . $news_tag->name . '</span>';
        }?>
        <?php else: ?>
        <span class="p-news__article-category">Notice</span>
        <?php endif; ?>
        <span class="p-top-information__article-sub-title"><?php the_title(); ?></span>
      </a>
    </div>
  </div>
  <?php endwhile; ?>
  <?php endif; // end if($news_query->have_posts()) ?>
  <?php endif; // end if('en_US' == $locale) ?>
  <?php wp_reset_postdata(); ?>

  <?php if('ja' == $locale):?>
  <section class="l-section c-product-search">
    <div class="c-product-search__section">
      <div class="l-inner">
        <h2 class="p-top-section-title">
          <span class="p-top-section-title__en">PRODUCT SOLUTIONS</span>
          <span class="p-top-section-title__jp">製品・ソリューション検索</span>
        </h2>
        <form id="form" action="<?php echo esc_url(home_url()); ?>/" method="get" class="c-product-search__search">
          <input id="search" class="c-product-search__search-input" name="s" type="search" placeholder="製品シリーズ / 形式名を入力">
          <div class="c-product-search__search-link">
            <button type="submit" class="c-product-search__search-submit"><span>検索する</span></button>
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

                    $product_category_term_id = $product_category_term->term_id;
                    $args = [
                      'post_type' => 'product',
                      'tax_query' => array(
                        array(
                          'taxonomy' => 'product_category',
                          'terms' => $product_category_term_id,
                          'field' => 'id',
                        )
                      )
                    ];
                    $product_category_permalink = '';
                    $product_category_query = new WP_Query( $args );
                    $product_category_count = $product_category_query->found_posts;
                    if ( $product_category_count === 1 ) :
                      $product_category_permalink = get_permalink( $product_category_query->posts[0]->ID );
                    endif;
                ?>
                <?php
                $product_term_id = $product_category_term->term_id;
                $product_term_idsp = 'product_category_'.$product_term_id;
                $product__image = get_field('category_image',$product_term_idsp);
                if( !empty($product__image) ):
                  $url = $product__image['url'];
                  $alt = $product__image['alt'];
                  $width = $product__image['width'];
                  $height = $product__image['height'];
                ?>
                <?php endif; ?>
                <li class="c-product-search__panel-item">
                  <a class="c-product-search__panel-link" href="<?php echo ( isset( $product_category_permalink ) && $product_category_permalink ) ? $product_category_permalink : get_term_link( $product_category_term ); ?>">
                    <figure class="c-product-search__panel-img-wrapper">
                    <?php if( !empty($product__image) ): ?>
                    <img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $alt ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" loading="lazy">
                    <?php else: ?>
                    <img width="272" height="153" src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/common/img_noimage01.png" alt="" loading="lazy">
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
                    $alt = $solution__image['alt'];
                    $width = $solution__image['width'];
                    $height = $solution__image['height'];
                ?>
                <?php endif; ?>
                <li class="c-product-search__panel-item">
                  <a class="c-product-search__panel-link" href="<?php echo get_term_link($solution_category_term); ?>">
                    <figure class="c-product-search__panel-img-wrapper">
                    <?php if( !empty($solution__image) ): ?>
                    <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($alt); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" loading="lazy">
                    <?php else: ?>
                    <img width="272" height="153" src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/common/img_noimage01.png" alt="" loading="lazy">
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
    </div>
  </section>
  <?php endif; ?>

  <?php if('ja' == $locale) : ?>
  <section class="l-section u-bg-blue">
    <div class="l-inner">
      <div class="p-top-useful">
        <h2 class="p-top-section-title p-top-section-title--center">
          <span class="p-top-section-title__en">USEFUL INFORMATION</span>
          <span class="p-top-section-title__jp">お役立ち情報</span>
        </h2>
        <div class="p-top-section-lead">”測る”に関わる記事やウェビナー情報など<br>
        お客さまのビジネスにかかわりの深いテーマをピックアップし多彩なコンテンツを掲載しています。</div>
        <div class="p-top-useful__card" id="js-useful-card">
          <!-- 繰り返しフィールドを表示 -->
          <?php if( have_rows( 'top_useful', $front_page_id ) ): ?>
          <?php while( have_rows( 'top_useful', $front_page_id ) ): the_row(); ?>
          <?php
                $top_useful_image = get_sub_field( 'top_useful_image', $front_page_id );
                $top_useful_url   = $top_useful_image['url'];
                $top_useful_width = $top_useful_image['width'];
                $top_useful_height = $top_useful_image['height'];
              ?>
          <a href="<?php the_sub_field('top_useful_link', $front_page_id); ?>" class="p-top-useful__card-item">
            <figure class="p-top-useful__card-img-wrapper">
              <img width="<?php echo esc_attr( $top_useful_width ); ?>" height="<?php echo esc_attr( $top_useful_height ); ?>" src="<?php echo $top_useful_url; ?>" alt="" loading="lazy">
            </figure>
            <div class="p-top-useful__card-body">
              <h3 class="p-top-useful__card-title"><?php the_sub_field('top_useful_title', $front_page_id); ?></h3>
            </div>
          </a>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <div class="l-inner p-top-useful__button">
          <a href="<?php echo esc_url(home_url()); ?>/useful/" class="c-button c-button--left"><span>お役立ち情報一覧</span></a>
        </div>
      </div>
    </div>
  </section>
  <?php endif; // end if('ja' == $locale) ?>

  <?php if( have_rows( 'notice_solution', $front_page_id ) ): ?>
  <section class="p-top-solution <?php echo ( 'en_US' === $locale ) ? 'u-bg-blue' : ''; ?>">
    <div class="p-top-solution__title">
      <h2 id="js-solution">FEATURED SOLUTION</h2>
    </div>
    <div class="l-inner">
      <?php if('ja' == $locale):?>
      <p class="p-top-solution__jp-title">注目ソリューション</p>
      <p class="p-top-section-lead">モノづくりに欠かせない「測定」の質をより良くするための３Dソリューションをご提案しています。</p>
      <?php endif; ?>
      <div class="p-top-solution__card" id="js-solution-card">
        <?php while( have_rows( 'notice_solution', $front_page_id ) ): the_row(); ?>
        <?php
          $notice_solution_image = get_sub_field( 'notice_solution_image', $front_page_id );
          if ( !empty( $notice_solution_image ) ) {
              $alt = $notice_solution_image['alt'];
              $width = $notice_solution_image['width'];
              $height = $notice_solution_image['height'];
          }
        ?>
        <div class="p-top-solution__card-item">
          <?php $notice_solution_url = $notice_solution_image['url']; ?>
          <div class="p-top-solution__card-img-wrapper">
            <?php if ( !empty( $notice_solution_image ) ) : ?>
              <img width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" src="<?php echo esc_url($notice_solution_url); ?>" alt="<?php echo esc_attr($alt); ?>" loading="lazy">
            <?php endif; ?>
          </div>
          <div class="p-top-solution__card-body">
            <h3 class="p-top-solution__card-title"><?php the_sub_field('notice_solution_title'); ?></h3>
            <p class="p-top-solution__card-desc"><?php the_sub_field('notice_solution_desc'); ?></p>
            <a href="<?php the_sub_field('notice_solution_link'); ?>" class="p-top-solution__card-company"><?php the_sub_field('notice_solution_text'); ?></a>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php
    $args = [
      'post_type' => 'case',
      'posts_per_page' => 5,
    ];
    $case_query = new WP_Query($args);
    if ($case_query->have_posts()) :
  ?>
  <section class="l-section <?php echo ( 'ja' === $locale ) ? 'u-bg-blue' : 'l-section--line'; ?>">
    <div class="l-inner">

      <div class="p-top-case">
        <div class="p-top-case__item p-top-case__title">
          <h2 class="p-top-section-title">
            <span class="p-top-section-title__en">CASE STUDY</span>
            <?php if('ja' == $locale):?>
            <span class="p-top-section-title__jp">ユーザー事例</span>
            <?php endif; ?>
          </h2>
          <?php if('ja' == $locale):?>
          <div class="p-top-section-lead u-text-left">業界を問わずモノづくりに携わる<br>様々な企業の皆様にご利用いただいています。</div>
          <div class="p-top-case__button u-md-hidden">
            <a href="<?php echo esc_url(home_url()); ?>/case/" class="c-button"><span>ユーザー事例一覧</span></a>
          </div>
          <?php else: ?>
          <div class="p-top-section-lead u-text-left">Our products are used by a wide variety of companies who engage in Monozukuri.</div>
          <div class="p-top-case__button u-md-hidden">
          <a href="<?php echo esc_url(home_url()); ?>/case/" class="c-button"><span>CASE LIST</span></a>
          </div>
          <?php endif; ?>
        </div>
        <div class="p-top-case__item p-top-case__body">
          <div class="p-top-case__card">

            <div class="swiper">
              <div class="swiper-button">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              </div>
              <div class="swiper-wrapper">
                <?php while ($case_query->have_posts()) : $case_query->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="swiper-slide">
                  <figure class="p-top-case__card-img-wrapper">
                    <?php
                      if (has_post_thumbnail()) {
                        the_post_thumbnail();
                      } else {
                        echo '<img width="270" height="270" src="'. esc_url ( get_template_directory_uri() ).'/assets/images/common/img_noimage01.png" alt="" loading="lazy">';
                      }
                    ?>
                    <div class="p-top-case__card-mask"></div>
                  </figure>
                  <div class="p-top-case__card-body">
                  <h3 class="p-top-case__card-title"><?php the_title(); ?></h3>
                  <?php
                    $case_category_terms = get_the_terms($post->ID,'case_category');
                    if($case_category_terms ):
                    foreach ( $case_category_terms as $case_category_term ):
                  ?>
                    <p class="p-top-case__card-category"><?php echo $case_category_term->name; ?></p>
                  <?php endforeach; endif; ?>


                  </div>
                </a>
                <?php endwhile; ?>
              </div>
            </div>
          </div>
          <?php if('ja' == $locale):?>
          <div class="p-top-case__button u-md-only">
            <a href="<?php echo esc_url(home_url()); ?>/case/" class="c-button"><span>ユーザー事例一覧</span></a>
          </div>
          <?php else: ?>
          <div class="p-top-case__button u-md-only">
            <a href="<?php echo esc_url(home_url()); ?>/case/" class="c-button"><span>CASE LIST</span></a>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>

  <?php
    $args = [
      'post_type' => 'post',
      'posts_per_page' => 5,
      'tax_query' => array(
        array(
          'taxonomy' => 'category',
          'field' => 'slug',
          'terms' => 'emergency',
          'operator' => 'NOT IN',// 指定したタームを除外
        ),
      ),
    ];
    $news_query = new WP_Query($args);
    if ($news_query->have_posts()) :
  ?>
  <section class="l-section">
    <div class="l-inner">
      <div class="p-top-news">
        <div class="p-top-news__item p-top-news__title">
          <?php if('ja' == $locale):?>
          <h2 class="p-top-section-title">
            <span class="p-top-section-title__en">NEWS</span>
            <span class="p-top-section-title__jp">お知らせ</span>
          </h2>
          <?php else: ?>
            <h2 class="p-top-section-title">
            <span class="p-top-section-title__en">NEWS</span>
          </h2>
          <?php endif; ?>
          <?php if('ja' == $locale):?>
          <div class="p-top-news__button u-md-hidden">
            <a href="<?php echo esc_url(home_url()); ?>/news-event/" class="c-button"><span>お知らせ一覧</span></a>
          </div>
          <?php else: ?>
            <div class="p-top-news__button u-md-hidden">
            <a href="<?php echo esc_url(home_url()); ?>/news-event/" class="c-button"><span>NEWS LIST</span></a>
          </div>
          <?php endif; ?>
        </div>
        <div class="p-top-news__item p-top-news__body">
          <ul class="p-top-news__list">
            <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
            <li class="p-top-news__article">
              <?php $news_event_link = get_field( 'news_event_link'); ?>
              <?php $news_event_blank = get_field( 'news_event_blank'); ?>
              <a<?php if($news_event_link): ?> href="<?php echo $news_event_link; ?>"<?php else: ?> href="<?php the_permalink(); ?>"<?php endif; ?><?php if($news_event_blank): ?> target="_blank" rel="noopener noreferrer"<?php endif; ?> class="p-top-news__article-link">
                <time datetime="<?php the_time('Y-m-d'); ?>" class="p-top-news__article-date"><?php the_time('Y.m.d'); ?></time>
                <?php $news_tags = get_the_tags(); ?>
                <?php if($news_tags): ?>
                <?php foreach( $news_tags as $news_tag) {
                  echo '<span class="p-top-news__article-category">' . $news_tag->name . '</span>';
                  }
                ?>
                <?php else: ?>
                <span class="p-top-news__article-category">お知らせ</span>
                <?php endif; ?>
                <span class="p-top-news__article-title"><?php the_title(); ?></span>
              </a>
            </li>
            <?php endwhile; ?>
          </ul>
          <?php if('ja' == $locale):?>
          <div class="p-top-news__button u-md-only">
            <a href="<?php echo esc_url(home_url()); ?>/news-event/" class="c-button"><span>お知らせ一覧</span></a>
          </div>
          <?php else: ?>
          <div class="p-top-news__button u-md-only">
            <a href="<?php echo esc_url(home_url()); ?>/news-event/" class="c-button"><span>NEWS LIST</span></a>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>

  <?php if('en_US' == $locale) : ?>
  <section class="l-section u-bg-blue">
    <div class="l-inner">
      <div class="p-top-useful">
        <h2 class="p-top-section-title p-top-section-title--center">
          <span class="p-top-section-title__en">USEFUL INFORMATION</span>
        </h2>
        <div class="p-top-useful__card" id="js-useful-card">
          <!-- 繰り返しフィールドを表示 -->
          <?php if( have_rows( 'top_useful', $front_page_id ) ): ?>
          <?php while( have_rows( 'top_useful', $front_page_id ) ): the_row(); ?>
          <?php
            $top_useful_image = get_sub_field( 'top_useful_image', $front_page_id );
            $top_useful_url = $top_useful_image['url'];
            $top_useful_width = $top_useful_image['width'];
            $top_useful_height = $top_useful_image['height'];
          ?>
          <a href="<?php the_sub_field('top_useful_link', $front_page_id); ?>" class="p-top-useful__card-item  p-top-useful__card-item--en">
            <figure class="p-top-useful__card-img-wrapper">
              <img width="<?php echo esc_attr( $top_useful_width ); ?>" height="<?php echo esc_attr( $top_useful_height ); ?>" src="<?php echo $top_useful_url; ?>" alt="" loading="lazy">
            </figure>
            <div class="p-top-useful__card-body">
              <h3 class="p-top-useful__card-title"><?php the_sub_field('top_useful_title', $front_page_id); ?></h3>
            </div>
          </a>
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <div class="l-inner p-top-useful__button">
          <a href="<?php echo esc_url(home_url()); ?>/useful/" class="c-button c-button--left"><span>USEFUL LIST</span></a>
        </div>
      </div>
    </div>
  </section>
  <?php endif; // end if('en_US' == $locale) ?>

  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php get_footer(); ?>