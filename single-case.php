<?php get_header(); ?>

<?php if( have_posts() ): ?>
  <?php while( have_posts() ): the_post(); ?>
<div class="l-wrapper">
  <div class="c-mv">
    <div class="c-mv__inner">
      <h1 class="c-mv__title">
        <span class="c-mv__jp"><?php the_title(); ?></span>
        <?php
          $case_category_terms = get_the_terms($post->ID,'case_category');
          if($case_category_terms ):
          foreach ( $case_category_terms as $case_category_term ):
        ?>
        <span class="c-mv__category"><?php echo $case_category_term->name; ?></span>
        <?php endforeach; endif; ?>

      </h1>
      <ul class="p-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if (function_exists('bcn_display')) {
            bcn_display_list();
          } ?>
      </ul>
    </div>
  </div>
  <div class="l-section l-section--md">
    <div class="l-inner l-inner--md">
      <main class="p-block">
        <?php the_content(); ?>
      </main>
    </div>
  </div>
  <?php if( have_rows( 'relation') ): ?>
  <div class="l-section u-bg-blue">
    <div class="l-inner">
      <?php if('ja' == $locale):?>
      <h2 class="c-title u-mb0">関連事例</h2>
      <?php else: ?>
      <h2 class="c-title u-mb0">Related Cases</h2>
      <?php endif; ?>

      <ul class="p-case__list">
        <?php while( have_rows( 'relation') ): the_row(); ?>
        <?php
          $post_obj = get_sub_field('relation-item');
          $post_photo = get_the_post_thumbnail( $post_obj->ID,'blog_image');
        ?>
        <li class="p-case__item">
          <a class="p-case__link" href="<?php echo get_the_permalink($post_obj->ID); ?>">
            <div class="p-case__photo">
              <?php if ($post_photo):?>
                <?php echo get_the_post_thumbnail( $post_obj->ID,'blog_image'); ?>
              <?php else: ?>
                <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/common/img_noimage01.png" alt="">
              <?php endif; ?>
            </div>
            <div class="p-case__body">
              <h2 class="p-case__title"><?php echo $post_obj->post_title; ?></h2>
              <?php
                  $case_category_terms = get_the_terms($post_obj->ID,'case_category');
                  if($case_category_terms ):
                  foreach ( $case_category_terms as $case_category_term ):
                ?>
                <p class="p-case__category"><?php echo $case_category_term->name; ?></p>
                <?php endforeach; endif; ?>
              <div class="p-case__desc"><?php if (get_field('case-desc',$post_obj->ID)) : ?><?php the_field('case-desc',$post_obj->ID); ?><?php endif; ?></div>
            </div>
          </a>
        </li>
        <?php endwhile; ?>
      </ul>
    </div>
  </div>
  <?php endif; ?>
  <?php if( have_rows( 'relation-point') ): ?>
  <div class="l-section">
    <div class="l-inner">
      <div class="c-relation">
        <div class="c-relation__inner l-inner">
          <h3 class="c-sub-title">導入にあたって気になるポイントを詳しく解説します</h3>
          <ul class="c-relation__list">
            <?php while( have_rows( 'relation-point') ): the_row(); ?>
            <li class="c-relation__item"><a class="c-relation__link" href="<?php the_sub_field('relation-point-link');?>"><span><?php the_sub_field('relation-point-text');?></span></a></li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</div>
<?php get_template_part('template/content', 'cta'); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>