<?php
/*
Template Name:Marketoフォーム(1カラム)
*/
?>
<?php get_header(); ?>

<?php if( have_posts() ): ?>
  <?php while( have_posts() ): the_post(); ?>
<div class="l-wrapper">
  <div class="p-page">
    <div class="c-mv">
      <div class="c-mv__inner">
        <h1 class="c-mv__title">
          <span class="c-mv__jp"><?php the_title(); ?></span>
        </h1>
      </div>
    </div>
    <?php $mv_size = get_field( 'mv_size'); ?>
    <?php if($mv_size): ?>
    <div class="l-section l-section">
    <?php else: ?>
    <div class="l-section l-section--md">
    <?php endif; ?>
      <div class="l-inner">
        <?php
          global $post;
          $slug = $post->post_name;
        ?>
        <main class="p-page__body p-block p-<?php echo $slug; ?>">
          <div class="c-marketo">
            <div class="c-marketo__inner">
              <?php the_content(); ?>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
  <!--
  <?php get_template_part('template/content', 'cta'); ?>
    -->
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>