<?php get_header(); ?>
  <div class="l-wrapper">
    <div class="c-mv">
      <div class="c-mv__inner">
        <h1 class="c-mv__title">
          <span class="c-mv__jp"><?php the_archive_title(); ?></span>
          <span class="c-mv__en"><?php echo $term; ?></span>
        </h1>
        <ul class="p-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php if (function_exists('bcn_display')) {
              bcn_display_list();
            } ?>
        </ul>
      </div>
    </div>
    <main class="p-case">
      <div class="l-section l-section--md">
        <div class="l-container">
          <div class="l-inner">
            <div class="p-case__inner">
              <?php if( have_posts() ): ?>
              <ul class="p-case__list">
                <?php while( have_posts() ): the_post(); ?>
                <?php $webinar_blank = get_field( 'webinar-blank'); ?>
                <li class="p-case__item">
                  <a class="p-case__link"<?php if($webinar_blank): ?> target="_blank" rel="noopener noreferrer"<?php endif; ?> href="<?php if (get_field('webinar-link')) : ?><?php the_field('webinar-link'); ?><?php else: ?><?php the_permalink(); ?><?php endif; ?>">
                    <div class="p-case__photo">
                    <?php
                      if (has_post_thumbnail()) {
                        the_post_thumbnail();
                      } else {
                        echo '<img src="'.esc_url ( get_template_directory_uri() ).'/assets/images/common/img_noimage01.png" alt="">';
                      }
                    ?>
                    </div>
                    <div class="p-case__body">
                      <h2 class="p-case__title"><?php the_title(); ?></h2>
                      <?php if (get_field('webinar-desc')) : ?><div class="p-case__desc"><?php the_field('webinar-desc'); ?></div><?php endif; ?>
                    </div>
                  </a>
                </li>
                <?php endwhile; ?>
              </ul>
              <?php endif; ?>
            </div>
            <?php get_template_part('template/content', 'pager'); ?>
          </div>
        </div>
      </div>
    </main>
  <?php get_template_part('template/content', 'cta'); ?>
</div>

<?php get_footer(); ?>