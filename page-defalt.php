<?php
/*
Template Name: ページテンプレート(静的コーディング用)
*/
?>
<?php get_header(); ?>

<?php if( have_posts() ): ?>
  <?php while( have_posts() ): the_post(); ?>
<div class="l-wrapper">
  <div class="p-page">
    <div class="c-mv">
      <div class="c-mv__inner">
        <?php if('en_US' == $locale):?>
          <h1 class="c-mv__title">
            <span class="c-mv__en"><?php the_title(); ?></span>
          </h1>
        <?php else: ?>
          <h1 class="c-mv__title">
            <span class="c-mv__jp"><?php the_title(); ?></span>
            <span class="c-mv__en"><?php if (get_field('en-title')) : ?><?php the_field('en-title'); ?><?php endif; ?></span>
        </h1>
        <?php endif; ?>

        <ul class="p-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php if (function_exists('bcn_display')) {
              bcn_display_list();
            } ?>
        </ul>
      </div>
    </div>
    <div class="l-section l-section--md">
      <div class="l-inner">
        <?php
          global $post;
          $slug = $post->post_name;
        ?>
        <main class="p-page__body p-<?php echo $slug; ?>">
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