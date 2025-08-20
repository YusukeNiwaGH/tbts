<?php
/*
Template Name:英語用LP
*/
?>
<?php get_header(); ?>
<?php if( have_posts() ): ?>
  <?php while( have_posts() ): the_post(); ?>
    <?php
      global $post;
      $slug = $post->post_name;
    ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
<?php endif; ?>
<?php get_template_part('template/content', 'cta'); ?>
<?php get_footer(); ?>