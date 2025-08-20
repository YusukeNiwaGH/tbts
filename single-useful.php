<?php get_header(); ?>

<?php if( have_posts() ): ?>
  <?php while( have_posts() ): the_post(); ?>
<div class="l-wrapper">
  <div class="c-mv">
    <div class="c-mv__inner">
      <h1 class="c-mv__title">
        <span class="c-mv__jp"><?php the_title(); ?></span>
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
      <div class="l-single">
        <main class="p-content p-block p-useful">
          <div class="p-content__head c-category">
            <?php
              $terms_name = get_the_terms($post->ID,'useful_tag');
            ?>
            <?php if($terms_name): ?>
            <?php foreach($terms_name as $term_name  ):?>
            <span class="c-category__item"><?php echo $term_name->name; ?></span>
            <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <?php the_content(); ?>
        </main>

        <div class="p-sidebar">
          <div class="p-sidebar__item">
            <h2 class="p-sidebar__title">測定機・ソフト種類別</h2>
            <ul class="p-sidebar__list">
              <?php
                $taxonomy_name = "useful_tag";
                $measuring = get_term_by( 'slug', 'measuring-instrument-and-software', 'useful_tag');
                $measuring_term_slug = $measuring->slug; //親タームslug指定
                $measuring_termsparent = get_terms( $taxonomy_name, array('slug' => $measuring_term_slug)); //親ターム情報取得
                $measuring_termchildren = get_terms( $taxonomy_name, array('parent' => $measuring_termsparent[0]->term_id)); //子ターム情報取得

                foreach ( $measuring_termchildren as $measuring_term ):
              ?>
              <li class="p-sidebar__child-item"><a href="<?php echo get_term_link( $measuring_term, "useful_tag");?>"><?php echo $measuring_term->name; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="p-sidebar__item">
            <h2 class="p-sidebar__title">アプリケーション別</h2>
            <ul class="p-sidebar__list">
              <?php
                $application = get_term_by( 'slug', 'application', 'useful_tag');
                $application_term_slug = $application->slug; //親タームslug指定
                $application_termsparent = get_terms( $taxonomy_name, array('slug' => $application_term_slug)); //親ターム情報取得
                $application_termchildren = get_terms( $taxonomy_name, array('parent' => $application_termsparent[0]->term_id)); //子ターム情報取得
                foreach ( $application_termchildren as $application_term ):
              ?>
              <li class="p-sidebar__child-item"><a href="<?php echo get_term_link( $application_term, "useful_tag");?>"><?php echo $application_term->name; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="p-sidebar__item">
            <h2 class="p-sidebar__title">ソリューション活用例</h2>
            <ul class="p-sidebar__list">
              <?php
                $solution = get_term_by( 'slug', 'solution', 'useful_tag');
                $solution_term_slug = $solution->slug; //親タームslug指定
                $solution_termsparent = get_terms( $taxonomy_name, array('slug' => $solution_term_slug)); //親ターム情報取得
                $solution_termchildren = get_terms( $taxonomy_name, array('parent' => $solution_termsparent[0]->term_id)); //子ターム情報取得

              ?>
              <?php foreach ( $solution_termsparent as $solution_term ): ?>
              <li class="p-sidebar__child-item"><a href="<?php echo get_term_link( $solution_term, "useful_tag");?>"><?php echo $solution_term->name; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="p-sidebar__item">
            <h2 class="p-sidebar__title">イベント情報・その他</h2>
            <ul class="p-sidebar__list">
              <?php
                $event = get_term_by( 'slug', 'event', 'useful_tag');
                $event_term_slug = $event->slug; //親タームslug指定
                $event_termsparent = get_terms( $taxonomy_name, array('slug' => $event_term_slug)); //親ターム情報取得
                $event_termchildren = get_terms( $taxonomy_name, array('parent' => $event_termsparent[0]->term_id)); //子ターム情報取得

              ?>
              <?php foreach ( $event_termchildren as $event_term ): ?>
              <li class="p-sidebar__child-item"><a href="<?php echo get_term_link( $event_term, "useful_tag");?>"><?php echo $event_term->name; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php
            $args = [
              'post_type' => 'useful',
              'posts_per_page' => 3,
            ];
            $useful_query = new WP_Query($args);
            if ($useful_query->have_posts()) :
          ?>
          <div class="p-sidebar__item">
            <h2 class="p-sidebar__title">最新記事</h2>
            <ul class="p-sidebar__article-list">
              <?php while ($useful_query->have_posts()) : $useful_query->the_post(); ?>
              <li class="p-sidebar__article-item">
                <a href="<?php the_permalink(); ?>" class="p-sidebar__article-link">
                  <p class="p-sidebar__article-date"><?php the_time('Y-m-d'); ?></p>
                  <p class="p-sidebar__article-title"><?php the_title(); ?></p>
                  <div class="p-sidebar__article-category">
                    <?php
                      $useful_tag_terms = get_the_terms($post->ID,'useful_tag');
                      if($useful_tag_terms ):
                      foreach ( $useful_tag_terms as $useful_tag_term ):
                    ?>
                    <span class="p-sidebar__article-category-item"><?php echo $useful_tag_term->name; ?></span>
                    <?php endforeach; endif; ?>
                  </div>
                </a>
              </li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php if( have_rows( 'recommend') ): ?>
  <div class="p-recommend">
    <div class="l-inner">
      <h2 class="c-title">こちらの記事もおすすめ</h2>
      <div class="p-tts">
        <ul class="p-tts__article-list">
          <?php while( have_rows( 'recommend') ): the_row(); ?>
          <?php
            $post_obj = get_sub_field('recommend-item');
            $post_photo = get_the_post_thumbnail( $post_obj->ID,'blog_image');
          ?>
          <li class="p-tts__article-item">
            <a href="<?php echo get_the_permalink($post_obj->ID); ?>" class="p-tts__article-link">
              <div class="p-tts__article-photo">
                <?php if ($post_photo):?>
                  <?php echo get_the_post_thumbnail( $post_obj->ID,'blog_image'); ?>
                <?php else: ?>
                  <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/useful/thumbnail_column.jpg" alt="">
                <?php endif; ?>
              </div>
              <div class="p-tts__article-body">
                <p class="p-tts__article-date"><?php echo get_the_date('Y.m.d',$post_obj->ID); ?></p>
                <div class="p-tts__article-category">
                <?php $useful_tag_article_terms = get_the_terms($post_obj->ID, 'useful_tag');?>
                  <?php if($useful_tag_article_terms): ?>
                  <?php foreach ( $useful_tag_article_terms as $useful_tag_article_term ): ?>
                    <span class="p-tts__article-category-item"><?php echo $useful_tag_article_term->name; ?></span>
                  <?php endforeach;?>
                  <?php endif; ?>
                </div>
                <h3 class="p-tts__article-title"><?php echo $post_obj->post_title; ?></h3>
              </div>
            </a>
          </li>
          <?php endwhile; ?>
        </ul>
      </div>
      <div class="p-recommend__button">
        <a href="<?php echo esc_url(home_url()); ?>/useful/column/" class="c-button c-button--paint"><span>TTSブログ一覧</span></a>
      </div>

    </div>
  </div>
  <?php endif; ?>
  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>