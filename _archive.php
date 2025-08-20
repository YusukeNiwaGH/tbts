<?php get_header(); ?>
<?php $locale = get_locale();?>
<?php
  $parses = parse_url($_SERVER["REQUEST_URI"]);
  $urls = explode("/",$parses["path"]);
  $urls = array_filter($urls, "strlen");
  $urls = array_values($urls);
  $args = array( // クエリの作成
    'post_status' => 'publish',
    'orderby' => 'date', // 日付順で表示
    'order'   => 'DESC',
    'posts_per_page' => 12
  );
  if ('ja' == $locale) {
    $category_slug = $urls[2];
    $year = $urls[3];
    $args = array_merge(
      $args,
      array(
        'date_query' => array(
          array(
            'category_name' => $category_slug,
          ),
        ),
      )
    );
    if ($category_slug == 'event') {
      $category_name = 'イベント情報';
    } elseif ($category_slug == 'news') {
      $category_name = 'ニュース';
    }
  } else {
    $year = $urls[2];
  }
  if ($year) {
    $args = array_merge(
      $args,
      array(
        'date_query' => array(
          array(
            'year' => $year,
          ),
        ),
      )
   );
  }
  $the_query = new WP_Query($args);
?>
<div class="l-wrapper">
  <div class="p-news">
    <div class="c-mv">
      <div class="c-mv__inner">
        <?php if('ja' == $locale):?>
          <h1 class="c-mv__title">
            <?php if($year && $category_name): ?>
              <span class="c-mv__jp"><?php echo $year; ?>年の<?php echo $category_name; ?>一覧</span>
            <?php elseif($year): ?>
              <span class="c-mv__jp"><?php echo $year; ?>年の一覧</span>
            <?php elseif($category_name): ?>
              <span class="c-mv__jp"><?php echo $category_name; ?>一覧</span>
            <?php else: ?>
              <span class="c-mv__jp">ニュース一覧</span>
            <?php endif; ?>
            <span class="c-mv__en"><?php echo $category_slug; ?></span>
          </h1>
        <?php else: ?>
          <h1 class="c-mv__title">
            <?php if($year): ?>
              <span class="c-mv__en"><?php echo $year; ?> News List</span>
            <?php else: ?>
              <span class="c-mv__en">News List</span>
            <?php endif; ?>
          </h1>
        <?php endif; ?>

        <ul class="p-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <!-- Breadcrumb NavXT 7.1.0 -->
          <?php if('ja' == $locale):?>
            <li class="home"><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to 東京貿易テクノシステム株式会社：TTS." href="https://www.tbts.co.jp" class="home"><span property="name">TOP</span></a><meta property="position" content="1"></span></li>
            <li class="post-root post post-post"><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to ニュース・イベント." href="https://www.tbts.co.jp/news-event/" class="post-root post post-post"><span property="name">ニュース・イベント</span></a><meta property="position" content="2"></span></li>
            <li class="archive date-year current-item"><span property="itemListElement" typeof="ListItem"><span property="name" class="archive date-year current-item">
              <?php if($year && $category_name): ?>
                <?php echo $year; ?>年の<?php echo $category_name; ?>一覧
              <?php elseif($year): ?>
                <?php echo $year; ?>年の一覧
              <?php elseif($category_name): ?>
                <?php echo $category_name; ?>一覧
              <?php else: ?>
                ニュース一覧
              <?php endif; ?>
            </span><meta property="url" content="https://www.tbts.co.jp/news-event/2023/"><meta property="position" content="3"></span></li>
          <?php else: ?>
            <li class="home"><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to 東京貿易テクノシステム株式会社：TTS." href="https://www.tbts.co.jp/en" class="home"><span property="name">TOP</span></a><meta property="position" content="1"></span></li>
            <li class="post-root post post-post"><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to NEWS." href="https://www.tbts.co.jp/en/news-event/" class="post-root post post-post"><span property="name">NEWS</span></a><meta property="position" content="2"></span></li>
            <li class="archive date-year current-item"><span property="itemListElement" typeof="ListItem"><span property="name" class="archive date-year current-item">
              <?php if($year): ?>
                <?php echo $year; ?> News List
              <?php else: ?>
                News List
              <?php endif; ?>
            </span><meta property="url" content="https://www.tbts.co.jp/en/news-event/2022/"><meta property="position" content="3"></span></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
    <main>
      <div class="l-section l-section--md">
        <div class="l-inner l-inner--md">
          <?php if($the_query->have_posts()): ?>
            <?php if ($category_slug == 'event'): ?>
              <ul class="p-news__list has-thumb">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                  <?php
                    $news_event_link = get_field('news_event_link');
                    $news_event_blank = get_field('news_event_blank');
                    $news_event_image = get_field('news_event_thumb');
                    $news_event_accepting = get_sub_field('news_event_accepting');
                  ?>
                  <li class="p-news__article">
                    <a<?php if($news_event_link): ?> href="<?php echo $news_event_link; ?>"<?php else: ?> href="<?php the_permalink(); ?>"<?php endif; ?> <?php if($news_event_blank): ?>target="_blank" rel="noopener noreferrer" <?php endif; ?>class="swiper-slide">
                      <div class="p-top-event__card-item">
                        <figure class="p-top-event__card-img-wrapper">
                          <?php if($news_event_image): ?>
                            <img src="<?php echo $news_event_image; ?>" alt="" />
                          <?php else: ?>
                            <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/common/img_noimage01.png" alt="" />
                          <?php endif; ?>
                          <div class="p-top-event__card-mask"></div>
                        </figure>
                        <div class="p-top-event__card-body">
                          <?php
                          if($news_event_accepting) {
                            foreach($news_event_accepting as $date) {
                            echo '<p class="p-top-event__card-accepting">受付中</p>';
                            }
                          }
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
            <?php else: ?>
              <ul class="p-news__list">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                  <?php $news_event_link = get_field( 'news_event_link'); ?>
                  <?php $news_event_blank = get_field( 'news_event_blank'); ?>
                  <li class="p-news__article">
                    <a<?php if($news_event_link): ?> href="<?php echo $news_event_link; ?>"<?php else: ?> href="<?php the_permalink(); ?>"<?php endif; ?> <?php if($news_event_blank): ?> target="_blank" rel="noopener noreferrer"<?php endif; ?>class="p-news__article-link">
                      <time datetime="<?php the_time('Y-m-d'); ?>" class="p-news__article-date"><?php the_time('Y.m.d'); ?></time>
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
            <?php endif; ?>
          <?php endif; ?>

          <?php get_template_part('template/content', 'pager'); ?>
          <section class="p-news__past">
            <?php if('ja' == $locale):?>
              <h2 class="c-title">過去の<?php echo $category_name; ?>一覧</h2>
            <?php else: ?>
              <h2 class="c-title">Past News</h2>
            <?php endif; ?>
            <?php // 年別アーカイブリストを表示
              // カテゴリーのデータを取得
              $year = NULL; // 年の初期化
              $args = array( // クエリの作成
                'post_status' => 'publish',
                'orderby' => 'date', // 日付順で表示
                'order'   => 'DESC',
                'posts_per_page' => -1 // すべての投稿を表示
              );
              if ('ja' == $locale) {
                $args = array_merge(
                  $args,
                  array(
                    'date_query' => array(
                      array(
                        'category_name' => $category_slug,
                      ),
                    ),
                  )
                );
              }
              $the_query = new WP_Query($args); if($the_query->have_posts()){ // 投稿があれば表示
              echo '<ul class="p-news__past-list">';
              while ($the_query->have_posts()): $the_query->the_post(); // ループの開始
                if ($year != get_the_date('Y')){ // 同じ年でなければ表示
                  $year = get_the_date('Y'); // 年の取得
                  if('ja' == $locale) {
                    echo '<li><a href="/news-event/date/'.$category_slug.'/'.$year.'">'.$year.'年</a></li>'; // 年別アーカイブリストの表示
                  } else {
                    echo '<li><a href="/en/news-event/'.$year.'">'.$year.'</a></li>'; // 年別アーカイブリストの表示
                  }
                }
              endwhile; // ループの終了
              echo '</ul>';
              wp_reset_postdata(); // クエリのリセット
              }
            ?>
          </section>
        </div>
      </div>
    </main>
  </div>
  <?php get_template_part('template/content', 'cta'); ?>
</div>

<?php get_footer(); ?>