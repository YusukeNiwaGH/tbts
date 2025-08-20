<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

?>
<ul class="c-media-parts">
  <?php if( have_rows( 'media_parts') ): ?>
  <?php while( have_rows( 'media_parts') ): the_row(); ?>
  <li class="c-media-parts__item">
    <a class="c-media-parts__link" href="<?php if (get_sub_field('media_parts_link')) : ?><?php the_sub_field('media_parts_link'); ?><?php endif; ?>">
      <?php
      $media_part_image = get_sub_field( 'media_parts_image');
      $media_part_url = $media_part_image['url'];
      ?>
      <div class="c-media-parts__img-wrapper">
        <img src="<?php echo $media_part_url; ?>" alt="image">
      </div>
      <div class="c-media-parts__body">
        <p><?php if (get_sub_field('media_parts_text')) : ?><?php the_sub_field('media_parts_text'); ?><?php endif; ?></p>
      </div>
    </a>
  </li>
  <?php endwhile; ?>
  <?php endif; ?>
</ul>