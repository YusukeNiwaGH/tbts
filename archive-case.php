<?php get_header(); ?>
<?php $locale = get_locale();?>
  <div class="l-wrapper">
    <div class="c-mv">
      <div class="c-mv__inner">
        <?php if('en_US' == $locale):?>
          <h1 class="c-mv__title">
            <span class="c-mv__en">CASE</span>
          </h1>
        <?php else: ?>
          <h1 class="c-mv__title">
            <span class="c-mv__jp">ユーザー事例</span>
            <span class="c-mv__en">CASE</span>
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
                      <th><?php if('en_US' == $locale):?>Products & Solutions<?php else: ?>種類<?php endif; ?></th>
                      <td>
                        <?php
                          $case_category_terms = get_terms('case_category');
                          foreach ( $case_category_terms as $case_category_term ):
                        ?>
                        <label><input type="checkbox" value="<?php echo esc_attr($case_category_term->slug); ?>" name="category[]"><span><?php echo $case_category_term->name; ?></span></label>
                        <?php endforeach; ?>
                      </td>
                    </tr>
                  </table>
                  <a href="<?php echo esc_url(home_url()); ?>/case/" class="c-search__cancel"<?php if('ja' == $locale):?> onclick="gtag('event', 'ユーザー事例_絞り込み解除', { 'event_category': '絞り込み解除' });"<?php endif; ?>>×<?php if('en_US' == $locale):?>Unrefine your search<?php else: ?>絞り込みを解除する<?php endif; ?></a>
                  <input type="hidden" name="post_type" value="case">
                  <input type="hidden" name="s" value="<?php echo get_search_query(); ?>" />
                  <?php if('en_US' == $locale):?>
                  <p class="c-search__button">
                    <button id="js-submit" type="submit" class="c-button c-button--paint" disabled><span>SEARCH</span></button>
                  </p>
                  <?php else: ?>
                  <p class="c-search__button">
                    <button id="js-submit" type="submit" class="c-button c-button--paint" onclick="gtag('event', 'ユーザー事例_絞り込み', { 'event_category': '絞り込み' });" disabled><span>この条件で絞り込む</span></button>
                  </p>
                  <?php endif; ?>

                </div>
              </form>
            </div>
            <div class="p-case__inner">
              <?php if( have_posts() ): ?>
              <ul class="p-case__list">
                <?php while( have_posts() ): the_post(); ?>
                <li class="p-case__item">
                  <a class="p-case__link" href="<?php the_permalink(); ?>">
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
                      <?php
                          $case_category_terms = get_the_terms($post->ID,'case_category');
                          if($case_category_terms ):
                          foreach ( $case_category_terms as $case_category_term ):
                        ?>
                        <p class="p-case__category"><?php echo $case_category_term->name; ?></p>
                        <?php endforeach; endif; ?>
                      <div class="p-case__desc"><?php if (get_field('case-desc')) : ?><?php the_field('case-desc'); ?><?php endif; ?></div>
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