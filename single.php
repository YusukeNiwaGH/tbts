<?php get_header(); ?>

<?php if( have_posts() ): ?>
  <?php while( have_posts() ): the_post(); ?>
<div class="l-wrapper">
  <div class="p-news">
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
        <main class="p-news__body p-block">
          <div class="p-news__single-head">
            <div class="p-news__date"><?php the_time('Y.m.d'); ?></div>
            <?php
              $category = get_the_category();
              $cat_name = $category[0]->cat_name;
              $cat_slug = $category[0]->category_nicename;
              ?>
              <span class="p-news__category"><?php echo $cat_name; ?></span>
          </div>
          <?php the_content(); ?>
        </main>
      </div>
    </div>
  </div>
  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>