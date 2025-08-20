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
<div class="c-accordion">
  <?php if( have_rows( 'accordion') ): ?>
  <?php while( have_rows( 'accordion') ): the_row(); ?>
  <dt class="c-accordion__title<?php if (!get_sub_field('accordion-desc')) : ?> c-accordion__no-event<?php endif; ?>">
  <?php if (get_sub_field('accordion-title')) : ?><?php the_sub_field('accordion-title'); ?><?php endif; ?>
  <span class="c-accordion__icon is-close"></span>
  </dt>
  <dd class="c-accordion__body">
  <?php if (get_sub_field('accordion-desc')) : ?><?php the_sub_field('accordion-desc'); ?><?php endif; ?>
  </dd>
  <?php endwhile; ?>
  <?php endif; ?>
</div>