<?php
/*
Template Name:Marketoフォーム(2カラム)
*/
?>
<?php get_header(); ?>

<?php if( have_posts() ): ?>
  <?php while( have_posts() ): the_post(); ?>
<div class="l-wrapper">
  <div class="c-mv">
    <div class="c-mv__inner">
      <h1 class="c-mv__title">
        <span class="c-mv__jp"><?php the_title(); ?></span>
      </h1>
    </div>
  </div>
  <div class="l-section l-section">
    <div class="l-inner">
      <div class="p-single p-single__inner p-single--marketo">
        <main class="p-single__body p-single__body--marketo">
          <?php the_content(); ?>
        </main>

        <div class="c-marketo-sidebar">
          <?php
            $param = array(
              'script' => array(
                'src' => array()
              ),
              'form' => array(
                'id' => array()
              ),
              'div' => array(
                'class' => array()
              ),
              'p' => array(
                'class' => array()
              ),
              'a' => array(
                'href' => array()
              ),
              'style' => array(),
              'b' => array(),
              'br' => array(),
            );
          ?>
          <?php if (get_field('marketo')) : ?><?php echo wp_kses(get_field('marketo'), $param); ?><?php endif; ?>
        </div>
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