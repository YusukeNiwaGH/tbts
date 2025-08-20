<?php get_header(); ?>
<?php $locale = get_locale();?>
<div class="l-wrapper">
  <div class="p-news">
    <div class="c-mv">
      <div class="c-mv__inner">
      <?php if('ja' == $locale):?>
        <h1 class="c-mv__title">
          <span class="c-mv__jp">ニュース・イベント</span>
          <span class="c-mv__en">NEWS・EVENT</span>
        </h1>
        <?php else: ?>
        <h1 class="c-mv__title">
          <span class="c-mv__en">NEWS</span>
        </h1>
        <?php endif; ?>
        <ul class="p-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php if (function_exists('bcn_display')) {
              bcn_display_list();
            } ?>
        </ul>
      </div>
    </div>
    <main>
      <div class="l-section l-section--md">
        <div class="l-inner l-inner--md">
          <?php if('ja' == $locale):?>
            <div class="p-news__tab">
            <p class="p-news__tab-item is-active">ニュース</p>
            <p class="p-news__tab-item">イベント</p>
          </div>
          <?php
            $args = [
              'post_type' => 'post',
              'posts_per_page' => 5,
              'category_name' => 'news',
            ];
            $news_query = new WP_Query($args);
            if ($news_query->have_posts()) : ?>
            <div class="p-news__area">
              <div class="p-news__panel is-active">
                <ul class="p-news__list">
                <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                  <li class="p-news__article">
                    <?php $news_event_link = get_field( 'news_event_link'); ?>
                    <?php $news_event_blank = get_field( 'news_event_blank'); ?>
                    <a<?php if($news_event_link): ?> href="<?php echo $news_event_link; ?>"<?php else: ?> href="<?php the_permalink(); ?>"<?php endif; ?> <?php if($news_event_blank): ?> target="_blank" rel="noopener noreferrer"<?php endif; ?>class="p-news__article-link">
                      <time datetime="<?php the_time('Y-m-d'); ?>"
                          class="p-news__article-date"><?php the_time('Y.m.d'); ?></time>
                          <?php $news_tags = get_the_tags(); ?>
                          <?php if($news_tags): ?>
                          <?php foreach( $news_tags as $news_tag) {
                            echo '<span class="p-news__article-category">' . $news_tag->name . '</span>';
                            }
                          ?>
                          <?php else: ?>
                          <span class="p-news__article-category">お知らせ</span>
                          <?php endif; ?>
                      <span class="p-news__article-title"><?php the_title(); ?></span>
                    </a>
                  </li>
                <?php endwhile; ?>
                </ul>

                <div class="p-news__footer">
                  <a class="c-button" href="<?php echo esc_url(home_url()); ?>/news-event/news/"><span>ニュース一覧</span></a>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
          <?php
            $args = [
              'post_type' => 'post',
              'posts_per_page' => 6,
              'category_name' => 'event',
            ];
            $event_query = new WP_Query($args);
            if ($event_query->have_posts()) : ?>
            <div class="p-news__area">
              <div class="p-news__panel">
                <ul class="p-news__list has-thumb">
                  <?php while ($event_query->have_posts()) : $event_query->the_post(); ?>
                    <?php
                      $news_event_link = get_field('news_event_link');
                      $news_event_blank = get_field('news_event_blank');
                      // $news_event_image = get_field('news_event_thumb');
                      // $news_event_accepting = get_sub_field('news_event_accepting');
                    ?>
                    <li class="p-news__article">
                      <a<?php if($news_event_link): ?> href="<?php echo $news_event_link; ?>"<?php else: ?> href="<?php the_permalink(); ?>"<?php endif; ?> <?php if($news_event_blank): ?>target="_blank" rel="noopener noreferrer" <?php endif; ?>class="swiper-slide">
                        <div class="p-top-event__card-item">
                          <figure class="p-top-event__card-img-wrapper">
                            <?php
                              if (has_post_thumbnail()) {
                                the_post_thumbnail();
                              } else {
                                echo '<img src="'. esc_url ( get_template_directory_uri() ).'/assets/images/common/img_noimage01.png" alt="">';
                              }
                            ?>
                            <div class="p-top-event__card-mask"></div>
                          </figure>
                          <div class="p-top-event__card-body">
                            <?php
                            // if($news_event_accepting) {
                            //   foreach($news_event_accepting as $date) {
                            //   echo '<p class="p-top-event__card-accepting">受付中</p>';
                            //   }
                            // }
                            ?>
                            <p class="p-top-event__card-date is-archive">
                              <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                            </p>
                            <h3 class="p-top-event__card-title"><?php the_title(); ?></h3>
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php endwhile; ?>
                </ul>
                <div class="p-news__footer">
                  <a class="c-button c-button--md" href="<?php echo esc_url(home_url()); ?>/news-event/event/"><span>イベント一覧</span></a>
                </div>
              </div>
            </div>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>

          <?php else: ?>
            <?php
            $args = [
              'post_type' => 'post',
              'posts_per_page' => -1,
            ];
            $news_query = new WP_Query($args);
            if ($news_query->have_posts()) : ?>
          <ul class="p-news__list">
            <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
              <li class="p-news__article">
              <?php $news_event_link = get_field( 'news_event_link'); ?>
              <?php $news_event_blank = get_field( 'news_event_blank'); ?>
                <a<?php if($news_event_link): ?> href="<?php echo $news_event_link; ?>"<?php if($news_event_blank): ?> target="_blank" rel="noopener noreferrer"<?php endif; ?><?php else: ?> href="<?php the_permalink(); ?>"<?php endif; ?> class="p-news__article-link">
                  <time datetime="<?php the_time('Y-m-d'); ?>"
                    class="p-news__article-date"><?php the_time('Y.m.d'); ?>
                  </time>
                  <?php $news_tags = get_the_tags(); ?>
                  <?php if($news_tags): ?>
                  <?php foreach( $news_tags as $news_tag) {
                    echo '<span class="p-news__article-category">' . $news_tag->name . '</span>';
                    }
                  ?>
                  <?php else: ?>
                  <span class="p-news__article-category">お知らせ</span>
                  <?php endif; ?>
                  <h2 class="p-news__article-title"><?php the_title(); ?></h2>
                </a>
              </li>
            <?php endwhile; ?>
          </ul>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>

          <?php get_template_part('template/content', 'pager'); ?>
          <?php if('ja' == $locale):?>
          <section class="p-news__past">
            <h2 class="c-title">過去のニュース一覧</h2>
            <?php // 年別アーカイブリストを表示
              // カテゴリーのデータを取得
              $year=NULL; // 年の初期化
              $args = array( // クエリの作成
              'orderby' => 'date', // 日付順で表示
              'order'   => 'DESC',
              'posts_per_page' => -1 // すべての投稿を表示
              );
              $the_query = new WP_Query($args); if($the_query->have_posts()){ // 投稿があれば表示
              echo '<ul class="p-news__past-list">';
              while ($the_query->have_posts()): $the_query->the_post(); // ループの開始
              if ($year != get_the_date('Y')){ // 同じ年でなければ表示
              $year = get_the_date('Y'); // 年の取得
              echo '<li><a href="/news-event/date/'.$category_slug.'/'.$year.'">'.$year.'年</a></li>'; // 年別アーカイブリストの表示
              }
              endwhile; // ループの終了
              echo '</ul>';
              wp_reset_postdata(); // クエリのリセット
              }
            ?>
          </section>
          <?php else: ?>
            <section class="p-news__past">
            <h2 class="c-title">Past News</h2>
            <?php // 年別アーカイブリストを表示
              // カテゴリーのデータを取得
              $year=NULL; // 年の初期化
              $args = array( // クエリの作成
              'orderby' => 'date', // 日付順で表示
              'order'   => 'DESC',
              'posts_per_page' => -1 // すべての投稿を表示
              );
              $the_query = new WP_Query($args); if($the_query->have_posts()){ // 投稿があれば表示
              echo '<ul class="p-news__past-list">';
              while ($the_query->have_posts()): $the_query->the_post(); // ループの開始
              if ($year != get_the_date('Y')){ // 同じ年でなければ表示
              $year = get_the_date('Y'); // 年の取得
              echo '<li><a href="/en/news-event/'.$year.'">'.$year.'</a></li>'; // 年別アーカイブリストの表示
              }
              endwhile; // ループの終了
              echo '</ul>';
              wp_reset_postdata(); // クエリのリセット
              }
            ?>
          </section>
          <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
    </main>
  </div>
  <?php get_template_part('template/content', 'cta'); ?>
</div>

<?php get_footer(); ?>