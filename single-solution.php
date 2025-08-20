<?php if(is_preview()): ?>
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
  <div class="l-section">
    <div class="l-inner l-inner--md">
      <main class="p-block">
        <?php the_content(); ?>
      </main>
    </div>
  </div>
  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
<?php else: ?>
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
  <div class="l-section">
    <div class="l-inner l-inner--md">
      <main class="p-block">
        <?php the_content(); ?>
      </main>
    </div>
  </div>
  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
<?php endif; ?>