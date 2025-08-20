<?php
/*
Template Name: ページテンプレート(会社概要用)
*/
?>
<?php $locale = get_locale();?>
<?php get_header(); ?>

<?php if( have_posts() ): ?>
  <?php while( have_posts() ): the_post(); ?>
<div class="l-wrapper">
  <div class="p-page">
    <div class="c-mv">
      <div class="c-mv__inner">
        <?php if('en_US' == $locale):?>
          <h1 class="c-mv__title">
            <span class="c-mv__en" lang="ja"><?php the_title(); ?></span>
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
        <main class="p-page__body p-corporate">
          <div class="p-corporate__inner">
            <?php if( have_rows( 'corporate') ): ?>
            <ul class="p-corporate__list">
              <?php while( have_rows( 'corporate') ): the_row(); ?>
              <?php
                $corporate_image = get_sub_field( 'corporate-image');
                $corporate_url = $corporate_image['url'];
              ?>
              <li class="p-corporate__item">
                <a class="p-corporate__link" href="<?php the_sub_field('corporate-link');?>">
                  <div class="p-corporate__photo">
                    <img width="307" height="172" src="<?php echo $corporate_url;  ?>" alt="" />
                  </div>
                  <div class="p-corporate__body">
                    <h2 class="p-corporate__title"><?php the_sub_field('corporate-title');?></h2>
                    <p class="p-corporate__desc"><?php the_sub_field('corporate-desc');?></p>
                  </div>
                </a>
              </li>
              <?php endwhile; ?>
            </ul>
            <?php endif; ?>
          </div>
        </main>
      </div>
    </div>
  </div>
  <?php get_template_part('template/content', 'cta'); ?>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>