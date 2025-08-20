<?php
  $current_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $page_url = get_term_link($term, $taxonomy);
?>
<?php if($current_url != $page_url ): ?>
<?php wp_safe_redirect(home_url('404')); exit; ?>
<?php else: ?>
<?php get_header(); ?>
<?php if( have_posts() ): ?>
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
  <div class="l-section l-section--md">
    <div class="l-inner l-inner--md">
      <main class="p-tts">
        <?php if( have_posts() ): ?>
        <ul class="p-tts__article-list">

          <?php while( have_posts() ): the_post(); ?>
          <li class="p-tts__article-item">
            <a href="<?php the_permalink(); ?>" class="p-tts__article-link">
              <div class="p-tts__article-photo">
                <?php if (has_post_thumbnail()):?>
                <?php the_post_thumbnail('blog_image');?>
                <?php else: ?>
                  <img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/images/useful/thumbnail_column.jpg" alt="">
                <?php endif; ?>
              </div>
              <div class="p-tts__article-body">
                <p class="p-tts__article-date"><?php the_time('Y.m.d'); ?></p>
                <div class="p-tts__article-category">
                  <?php
                    $useful_tag_terms = get_the_terms($post->ID,'useful_tag');
                    if($useful_tag_terms ):
                    foreach ( $useful_tag_terms as $useful_tag_term ):
                  ?>
                  <span class="p-tts__article-category-item"><?php echo $useful_tag_term->name; ?></span>
                  <?php endforeach; endif; ?>
                </div>
                <h2 class="p-tts__article-title"><?php the_title(); ?></h2>
              </div>
            </a>
          </li>
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>
        <?php get_template_part('template/content', 'pager'); ?>
      </main>
    </div>
  </div>
  <?php get_template_part('template/content', 'cta'); ?>
</div>

<?php endif; ?>
<?php get_footer(); ?>
<?php endif; ?>