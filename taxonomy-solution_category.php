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
          <div class="c-media">
            <div class="c-media__img-wrapper">
              <?php
               $term_id = get_queried_object()->term_id;
               $term_name = get_queried_object()->name;
               $term_idsp = 'solution_category_'.$term_id;
               $category_image = get_field('category_image',$term_idsp);
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
                <?php echo term_description(); ?>
              </div>
            </div>
          </div>
          <!--./c-media-->
          <div class="c-search">
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
                    <h3 class="c-search__title"><?php the_title(); ?></h3>
                  </a>
                </li>
                <?php endwhile; ?>
              </ul>
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
              $taxonomy_name = 'solution_category';
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
    </div>
  </main>
  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php get_footer(); ?>