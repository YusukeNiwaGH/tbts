<?php get_header(); ?>
<?php
$s = $_GET['s'];
?>
<?php
$args = array(
  'post_type' => array('solution','product','post'),
  'posts_per_page' => 12,
  'paged' => get_query_var('paged'),
  's' => $s,
);
?>
<div class="l-wrapper">
    <div class="c-mv">
      <div class="c-mv__inner">
        <p class="c-mv__title">
          <span class="c-mv__jp"><?php the_archive_title(); ?></span>
        </p>
        <div>
      </div>
    </div>
    <div class="l-section l-section--md">
      <main>
        <div class="l-inner l-inner--md">
          <div class="c-search u-mt40 u-smt32">
            <?php
              $the_query = new WP_Query( $args );
              if ( $the_query->have_posts() ): ?>

            <div class="c-freeword">
              <ul class="c-freeword__article-list">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <li class="c-freeword__article-item">
                  <a href="<?php the_permalink(); ?>" class="c-freeword__article-link">
                    <div class="c-freeword__article-photo">
                      <?php
                        if (has_post_thumbnail()) {
                          the_post_thumbnail('blog_image');
                        } else {
                          echo '<img width="272" height="153" src="'. esc_url ( get_template_directory_uri() ).'/assets/images/common/img_noimage01.png" alt="" />';
                        }
                      ?>
                    </div>
                    <div class="c-freeword__article-body">
                      <h3 class="c-freeword__article-title"><?php the_title(); ?></h3>
                      <div class="c-freeword__article-text"><?php the_excerpt(); ?></div>
                    </div>
                  </a>
                </li>

                <?php endwhile; ?>
              </ul>
            </div>
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
    </main>
  </div>
  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php get_footer(); ?>