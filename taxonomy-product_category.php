<?php //英語ページのタクソノミーアーカイブはarchive-product.phpでまとめているようです ?>
<?php get_header(); ?>
<div class="l-wrapper">
    <div class="c-mv">
      <div class="c-mv__inner">
        <h1 class="c-mv__title">
          <span class="c-mv__jp"><?php the_archive_title(); ?></span>
        </h1>
        <ul class="p-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php if (function_exists('bcn_display')) {
              bcn_display_list();
            } ?>
        </ul>
      </div>
    </div>
    <main>
      <div class="l-section l-section--md">
        <div class="l-inner">
          <?php
            $term_id = get_queried_object()->term_id;
            $term_name = get_queried_object()->name;
            $term_idsp = 'product_category_'.$term_id;
            $category_image = get_field('category_image',$term_idsp);
            $category_description = get_field('category_textarea',$term_idsp);
          ?>
          <div class="c-media">
            <?php if ($category_image):
                $url = $category_image['url'];
                $alt = $category_image['alt'];
                $width = $category_image['width'];
                $height = $category_image['height'];
            ?>
              <div class="c-media__img-wrapper">
                <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
              </div>
            <?php endif; ?>
            <div class="c-media__body">
              <h2 class="c-media__title"><?php the_archive_title(); ?></h2>
              <?php if ($category_description): ?>
                <div class="c-media__content">
                  <?php echo $category_description; ?>
                </div>
              <?php endif; ?>
            </div>
          </div><!--./c-media-->
          <div class="c-search">
            <h2 class="c-media__title">製品一覧</h2>
            <?php if( have_posts() ): ?>
              <?php $length = $wp_query->found_posts; ?>
              <div class="c-search__card<?php if ($length > 8) echo ' has-accordtion'; ?>">
                <ul class="c-search__list">
                  <?php while( have_posts() ): the_post(); ?>
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
                      <h3 class="c-search__title"><?php the_title(); ?></h3>
                    </a>
                  </li>
                  <?php endwhile; ?>
                </ul>
              </div>
              <button type="button" class="c-search__accordion-btn p-mv__button"><span>もっと見る</span></button>
            <?php endif; ?>
          </div>
          <div class="c-product__contents">
            <?php
              $categoryContents = get_field('category_detail_contents', $term_idsp);
              if ($categoryContents): foreach ($categoryContents as $content):
                $title = $content['category_detail_contents_title'];
                $leadtext = $content['category_detail_contents_lead'];
                $childContents = $content['category_detail_contents_children'];
            ?>
              <div class="c-product__content">
                <h2 class="c-media__title"><?php echo $title; ?></h2>
                <div class="c-product__lead">
                  <?php echo $leadtext; ?>
                </div>
                <?php
                  if ($childContents): foreach ($childContents as $childContent):
                    $childTitle = $childContent['category_detail_contents_children_title'];
                    $childText = $childContent['category_detail_contents_children_content'];  
                ?>
                  <div class="c-product__child">
                    <h3 class="c-product__child-title"><?php echo $childTitle; ?></h3>
                    <div class="c-product__child-content">
                      <?php echo $childText; ?>
                    </div>
                  </div>
                <?php endforeach; endif; ?>
              </div>
            <?php endforeach; endif; ?>
            <?php
              $faqLeadtext = get_field('category_detail_contents_faq_lead', $term_idsp);
              $faqContents = get_field('category_detail_contents_faq_contents', $term_idsp);
              if ($faqContents):
            ?>
              <div class="c-product__content">
                <h2 class="c-media__title">よくある質問と回答</h2>
                <div class="c-product__lead">
                  <?php echo $faqLeadtext; ?>
                </div>
                <div class="c-product__content-faq">
                  <?php
                    foreach ($faqContents as $content):
                      $question = $content['category_detail_contents_faq_contents_question'];
                      $answer = $content['category_detail_contents_faq_contents_answer'];  
                  ?>
                    <div class="faq-item">
                      <button type="button" class="faq-item-question"><?php echo $question; ?></button>
                      <div class="faq-item-answer">
                        <?php echo $answer; ?>
                      </div>
                    </div>
                  <?php endforeach; ?>                    
                </div>  
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="l-section u-bg-blue">
        <div class="c-relation">
          <div class="c-relation__inner l-inner">
            <h2 class="c-sub-title">関連情報</h2>
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
                $product_category_terms = get_terms('product_category');
                $measuring = get_term_by( 'slug', '3d-measuring', 'product_category');
                $measuring_id = $measuring->term_id;
                $other_measuring = get_term_by( 'slug', 'other-measuring', 'product_category');
                $other_measuring_id = $other_measuring->term_id;
                $taxonomy_name = 'product_category';
                $taxonomy_args = array(
                'exclude'       => array($measuring_id,$other_measuring_id),
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
      </div>
    </main>
  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php get_footer(); ?>