<?php
  $cover_bg = get_field('block-background-image');
  $cover_head = get_field('block-headline');
  $cover_lead = get_field('block-lead-text');
  $cover_column_num = get_field('block-column-number');
  $cover_image = get_field('block-column-image');
  $cover_text = get_field('block-column-text');
  $cover_button_url = get_field('block-button-url');
  $cover_button_blank = get_field('block-button-blank');
  $cover_button_text = get_field('block-button-text');
?>
<?php if ($cover_head || $cover_lead || $cover_image || $cover_text || $cover_button_url): ?>
  <div class="c-cover-custom has-text">
    <?php if ($cover_bg): ?>
      <div class="c-cover-custom-bg">
        <img src="<?php echo $cover_bg['url'] ?>" alt="<?php echo $cover_bg['alt']; ?>">
      </div>
    <?php endif; ?>
    <div class="c-cover-custom-inner">
      <?php if ($cover_head): ?>
        <h2 class="c-cover-custom-head"><?php echo $cover_head; ?></h2>
      <?php endif; ?>
      <?php if ($cover_lead): ?>
        <p class="c-cover-custom-lead"><?php echo $cover_lead; ?></p>
      <?php endif; ?>
      <?php if ($cover_column_num == 'column2'): ?>
        <div class="c-cover-custom-column">
      <?php endif; ?>
        <?php if ($cover_image): ?>
          <figure class="c-cover-custom-figure">
            <img src="<?php echo $cover_image['url']; ?>" alt="<?php echo $cover_image['alt']; ?>">
            <figcaption><?php echo $cover_image['caption']; ?></figcaption>
          </figure>
        <?php endif; ?>
        <?php if ($cover_text): ?>
          <p class="c-cover-custom-text"><?php echo $cover_text; ?></p>
        <?php endif; ?>
      <?php if ($cover_column_num == 'column2'): ?>
        </div>
      <?php endif; ?>
      <?php if ($cover_button_url): ?>
        <div class="c-cover-custom-btn wp-block-button">
          <a href="<?php echo $cover_button_url; ?>"<?php if ($cover_button_blank) { echo ' target="_blank"'; } ?> class="wp-block-button__link wp-element-button"><?php echo $cover_button_text; ?></a>
        </div>
      <?php endif; ?>
    </div>
  </div>
<?php elseif ($cover_bg): ?>
  <div class="c-cover-custom">
    <div class="c-cover-custom-bg">
      <img src="<?php echo $cover_bg['url'] ?>" alt="<?php echo $cover_bg['alt']; ?>">
    </div>
  </div>
<?php endif; ?>