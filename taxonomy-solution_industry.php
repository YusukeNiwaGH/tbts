<?php get_header(); ?>
<div class="l-wrapper">
    <div class="c-mv">
      <div class="c-mv__inner">
        <h1 class="c-mv__title">
          <span class="c-mv__jp">ソリューション</span>
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
        <div class="l-inner p-industry">
          <h2 class="p-industry__title"><?php the_archive_title(); ?></h2>
          <div class="p-industry__lead"><?php echo term_description(); ?></div>
          <div class="c-search u-mt40 u-smt32">
            <?php if( have_posts() ): ?>
            <div class="c-search__card">
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
            <?php endif; ?>
          </div>
          <?php get_template_part('template/content', 'pager'); ?>
      </div>
    </div>
  </main>
  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php get_footer(); ?>