<?php get_header(); ?>
<?php $locale = get_locale();?>
<?php if( have_posts() ): ?>

<div class="l-wrapper">

    <div class="c-mv">
      <div class="c-mv__inner">
        <h1 class="c-mv__title">
          <span class="c-mv__jp">TTSブログ</span>
          <span class="c-mv__en">TTS BLOG</span>
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
        <main class="p-tts">
          <div class="c-search">
            <form class="c-search__form" method="get" action="<?php echo esc_url(home_url('/')); ?>">
              <p id="js-search-title" class="c-search__form-title"><?php if('en_US' == $locale):?>Refine search<?php else: ?>絞り込む<?php endif; ?><span class="c-search__form-icon"></span></p>
              <div class="c-search__form-inner">
                <table class="c-search__form-table">
                  <tr>
                    <th>測定機・ソフト種類別</th>
                    <td>
                      <?php
                        $taxonomy_name = "useful_tag";
                        $measuring = get_term_by( 'slug', 'measuring-instrument-and-software', 'useful_tag');
                        $measuring_term_slug = $measuring->slug; //親タームslug指定
                        $measuring_termsparent = get_terms( $taxonomy_name, array('slug' => $measuring_term_slug)); //親ターム情報取得
                        $measuring_termchildren = get_terms( $taxonomy_name, array('parent' => $measuring_termsparent[0]->term_id)); //子ターム情報取得

                        foreach ( $measuring_termchildren as $measuring_term ):
                      ?>
                      <label><input type="checkbox" value="<?php echo esc_attr($measuring_term->slug); ?>" name="tag[]"><span><?php echo $measuring_term->name; ?></span></label>
                      <?php endforeach; ?>
                    </td>
                  </tr>
                  <tr>
                    <th>アプリケーション別</th>
                    <td>
                      <?php
                        $application = get_term_by( 'slug', 'application', 'useful_tag');
                        $application_term_slug = $application->slug; //親タームslug指定
                        $application_termsparent = get_terms( $taxonomy_name, array('slug' => $application_term_slug)); //親ターム情報取得
                        $application_termchildren = get_terms( $taxonomy_name, array('parent' => $application_termsparent[0]->term_id)); //子ターム情報取得
                        foreach ( $application_termchildren as $application_term ):
                      ?>
                      <label><input type="checkbox" value="<?php echo esc_attr($application_term->slug); ?>" name="tag[]"><span><?php echo $application_term->name; ?></span></label>
                      <?php endforeach; ?>
                    </td>
                  </tr>
                  <tr>
                    <th>ソリューション活用例</th>
                    <td>
                      <?php
                        $solution = get_term_by( 'slug', 'solution', 'useful_tag');
                        $solution_term_slug = $solution->slug; //親タームslug指定
                        $solution_termsparent = get_terms( $taxonomy_name, array('slug' => $solution_term_slug)); //親ターム情報取得
                        $solution_termchildren = get_terms( $taxonomy_name, array('parent' => $solution_termsparent[0]->term_id)); //子ターム情報取得

                      ?>
                      <?php foreach ( $solution_termsparent as $solution_term ): ?>
                      <label><input type="checkbox" value="<?php echo esc_attr($solution_term->slug); ?>" name="tag[]"><span><?php echo $solution_term->name; ?></span></label>
                      <?php endforeach; ?>
                      <?php foreach ( $solution_termchildren as $solution_term ): ?>
                      <label><input type="checkbox" value="<?php echo esc_attr($solution_term->slug); ?>" name="tag[]"><span><?php echo $solution_term->name; ?></span></label>
                      <?php endforeach; ?>
                    </td>
                  </tr>
                  <tr>
                    <th>イベント情報・その他</th>
                    <td>
                      <?php
                        $event = get_term_by( 'slug', 'event', 'useful_tag');
                        $event_term_slug = $event->slug; //親タームslug指定
                        $event_termsparent = get_terms( $taxonomy_name, array('slug' => $event_term_slug)); //親ターム情報取得
                        $event_termchildren = get_terms( $taxonomy_name, array('parent' => $event_termsparent[0]->term_id)); //子ターム情報取得

                      ?>
                      <?php foreach ( $event_termchildren as $event_term ): ?>
                      <label><input type="checkbox" value="<?php echo esc_attr($event_term->slug); ?>" name="tag[]"><span><?php echo $event_term->name; ?></span></label>
                      <?php endforeach; ?>
                    </td>
                  </tr>
                </table>
                <a href="<?php echo esc_url(home_url()); ?>/useful/column/" class="c-search__cancel"<?php if('ja' == $locale):?> onclick="gtag('event', 'ブログ_絞り込み解除', { 'event_category': '絞り込み解除' });"<?php endif; ?>>×<?php if('en_US' == $locale):?>Unrefine your search<?php else: ?>絞り込みを解除する<?php endif; ?></a>
                <input type="hidden" name="post_type" value="useful">
                <input type="hidden" name="s" value="<?php echo get_search_query(); ?>" />
                <?php if('en_US' == $locale):?>
                <p class="c-search__button">
                  <button id="js-submit" type="submit" class="c-button c-button--paint" disabled><span>SEARCH</span></button>
                 </p>
                <?php else: ?>
                <p class="c-search__button">
                  <button id="js-submit" type="submit" class="c-button c-button--paint" onclick="gtag('event', 'ブログ_絞り込み', { 'event_category': '絞り込み' });" disabled><span>この条件で絞り込む</span></button>
                </p>
                <?php endif; ?>
              </div>
            </form>
          </div>
          <div class="p-tts__inner">
            <?php if( have_posts() ): ?>
            <ul class="p-tts__article-list">
              <?php while( have_posts() ): the_post(); ?>
              <li class="p-tts__article-item">
                <a href="<?php the_permalink(); ?>" class="p-tts__article-link">
                  <div class="p-tts__article-photo">
                    <?php if (has_post_thumbnail()):?>
                    <?php the_post_thumbnail('blog_image');?>
                    <?php else: ?>
                      <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/useful/thumbnail_column.jpg" alt="">
                    <?php endif; ?>
                  </div>
                  <div class="p-tts__article-body">
                    <p class="p-tts__article-date"><?php the_time('Y.m.d'); ?></p>
                    <div class="p-tts__article-category">
                      <?php
                        $useful_tag_terms = get_the_terms($post->ID,'useful_tag');
                        if($useful_tag_terms ):
                        foreach ( $useful_tag_terms as $useful_tag_term ):
                      ?>
                      <span class="p-tts__article-category-item"><?php echo $useful_tag_term->name; ?></span>
                      <?php endforeach; endif; ?>
                    </div>
                    <h2 class="p-tts__article-title"><?php the_title(); ?></h2>
                  </div>
                </a>
              </li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>
          </div>
          <?php get_template_part('template/content', 'pager'); ?>
        </main>
      </div>
    </div>
  <?php get_template_part('template/content', 'cta'); ?>
</div>

<?php endif; ?>
<?php get_footer(); ?>