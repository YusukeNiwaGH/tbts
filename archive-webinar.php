<?php get_header(); ?>
<?php $locale = get_locale();?>
  <div class="l-wrapper">
    <div class="c-mv">
      <div class="c-mv__inner">
        <?php if('en_US' == $locale):?>
          <h1 class="c-mv__title">
            <span class="c-mv__en">WEBINAR</span>
          </h1>
        <?php else: ?>
          <h1 class="c-mv__title">
            <span class="c-mv__jp">ウェビナー</span>
            <span class="c-mv__en">WEBINAR</span>
          </h1>
        <?php endif; ?>
        <ul class="p-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
          <?php if (function_exists('bcn_display')) {
              bcn_display_list();
            } ?>
        </ul>
      </div>
    </div>
    <main class="p-case">
      <div class="l-section l-section--md">
        <div class="l-container">
          <div class="l-inner">
            <div id="js-search" class="c-search u-mt0">
              <form class="c-search__form u-mt0" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <p id="js-search-title" class="c-search__form-title"><?php if('en_US' == $locale):?>Refine search<?php else: ?>絞り込む<?php endif; ?><span class="c-search__form-icon"></span></p>
                <div class="c-search__form-inner">
                  <table class="c-search__form-table">
                    <tr>
                      <th><?php if('en_US' == $locale):?>Types of Webinars<?php else: ?>ウェビナー<?php endif; ?></th>
                      <?php if('en_US' == $locale):?>
                        <?php if( have_posts() ): ?>
                        <?php while( have_posts() ): the_post(); ?>
                        <?php
                          $webinar_category_terms = get_the_terms($post->ID,'webinar_category');
                          if($webinar_category_terms ):
                          foreach ( $webinar_category_terms as $webinar_category_term ):
                        ?>
                        <?php
                          $webinar_category = array();
                          $webinar_category[] =  $webinar_category_term->slug;
                        ?>
                        <?php endforeach; endif; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php
                          $webinar_category = array_unique($webinar_category);
                        ?>
                      <td>
                      <?php
                        $taxonomy_args = array(
                          'slug' => $webinar_category,
                          'hide_empty' => false,
                          'parent' => 0,
                        );
                        $webinar_category_terms = get_terms('webinar_category',$taxonomy_args);
                        foreach ( $webinar_category_terms as $webinar_category_term ):
                        ?>
                        <label><input type="checkbox" value="<?php echo esc_attr($webinar_category_term->slug); ?>" name="category[]"><span><?php echo $webinar_category_term->name; ?></span></label>
                        <?php endforeach; ?>
                      </td>
                      <?php else: ?>
                      <td>
                        <?php
                          $webinar_category_terms = get_terms('webinar_category');
                          foreach ( $webinar_category_terms as $webinar_category_term ):
                        ?>
                        <label><input type="checkbox" value="<?php echo esc_attr($webinar_category_term->slug); ?>" name="category[]"><span><?php echo $webinar_category_term->name; ?></span></label>
                        <?php endforeach; ?>
                      </td>
                      <?php endif; ?>
                    </tr>
                  </table>
                  <a href="<?php echo esc_url(home_url()); ?>/useful/webinar/" class="c-search__cancel"<?php if('ja' == $locale):?> onclick="gtag('event', 'ウェビナー_絞り込み解除', { 'event_category': '絞り込み解除' });"<?php endif; ?>>×<?php if('en_US' == $locale):?>Unrefine your search<?php else: ?>絞り込みを解除する<?php endif; ?></a>
                  <input type="hidden" name="post_type" value="webinar">
                  <input type="hidden" name="s" value="<?php echo get_search_query(); ?>" />
                  <?php if('en_US' == $locale):?>
                  <p class="c-search__button">
                    <button id="js-submit" type="submit" class="c-button c-button--paint" disabled><span>SEARCH</span></button>
                  </p>
                  <?php else: ?>
                  <p class="c-search__button">
                    <button id="js-submit" type="submit" class="c-button c-button--paint" onclick="gtag('event', 'ウェビナー_絞り込み', { 'event_category': '絞り込み' });" disabled><span>この条件で絞り込む</span></button>
                  </p>
                  <?php endif; ?>
                </div>
              </form>
            </div>
            <div class="p-case__inner">
              <?php if( have_posts() ): ?>
              <ul class="p-case__list">
                <?php while( have_posts() ): the_post(); ?>
                <?php $webinar_blank = get_field( 'webinar-blank'); ?>
                <li class="p-case__item">
                  <a class="p-case__link"<?php if($webinar_blank): ?> target="_blank" rel="noopener noreferrer"<?php endif; ?> href="<?php if (get_field('webinar-link')) : ?><?php the_field('webinar-link'); ?><?php else: ?><?php the_permalink(); ?><?php endif; ?>">
                    <div class="p-case__photo">
                    <?php
                      if (has_post_thumbnail()) {
                        the_post_thumbnail();
                      } else {
                        echo '<img src="'.esc_url ( get_template_directory_uri() ).'/assets/images/common/img_noimage01.png" alt="">';
                      }
                    ?>
                    </div>
                    <div class="p-case__body">
                      <h2 class="p-case__title"><?php the_title(); ?></h2>
                      <?php if (get_field('webinar-desc')) : ?><div class="p-case__desc"><?php the_field('webinar-desc'); ?></div><?php endif; ?>
                    </div>
                  </a>
                </li>
                <?php endwhile; ?>
              </ul>
              <?php endif; ?>
            </div>
            <?php get_template_part('template/content', 'pager'); ?>
          </div>
        </div>
      </div>
    </main>
  <?php get_template_part('template/content', 'cta'); ?>
</div>

<?php get_footer(); ?>