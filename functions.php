<?php

/* CSSの読み込み
---------------------------------------------------------- */
if (!is_admin()) {
    function register_stylesheet()
    { //読み込むCSSを登録する
        wp_register_style('swiper_bundle_css', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
        wp_register_style('swiper_css', get_template_directory_uri() . '/assets/css/swiper.min.css');
        wp_register_style('style_css', get_template_directory_uri() . '/assets/css/style.css');
    }
}

if (!is_admin()) {
    function add_stylesheet()
    { //登録したCSSを以下の順番で読み込む
        register_stylesheet();
        wp_enqueue_style('swiper_bundle_css', '', array(), '1.0', false);
        wp_enqueue_style('swiper_css', '', array(), '1.0', false);
        wp_enqueue_style('style_css?date=20250730', '', array(), '1.0', false);
    }
    add_action('wp_enqueue_scripts', 'add_stylesheet');
}

/*
 スクリプトの読み込み
---------------------------------------------------------- */
if (!is_admin()) {
    function register_script()
    {
        // 読み込むJSを登録する
        wp_register_script('js321', get_template_directory_uri() . '/assets/js/jquery-3.2.1.min.js');
        wp_register_script('js_swiper_bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js');
        wp_register_script('js_lax', 'https://cdn.jsdelivr.net/npm/lax.js@2.0.3/lib/lax.min.js');
        if(!is_front_page()) {
          wp_register_script('js_particles', get_template_directory_uri() . '/assets/js/particles.min.js');
          wp_register_script('js_app', get_template_directory_uri() . '/assets/js/app.js');
        }
        wp_register_script('js_page', get_template_directory_uri() . '/assets/js/page.min.js');
        wp_register_script('js_cookie', get_template_directory_uri() . '/assets/js/jquery.cookie.min.js');
        if(!is_page_template(array( 'page-marketo01.php','page-marketo02.php'))) {
          wp_register_script('js_pagetop', get_template_directory_uri() . '/assets/js/pagetop.min.js');
        } else {
          wp_register_script('js_pagetop2', get_template_directory_uri() . '/assets/js/pagetop2.min.js');
        }
        if(is_page_template('page-nolead.php')) {
          wp_register_script('js_lp', get_template_directory_uri() . '/assets/js/lp.js');
        }
        if(is_front_page()) {
          wp_register_script('js_index', get_template_directory_uri() . '/assets/js/index.js');
        }
        if(is_home()) {
          wp_register_script('js_news_event', get_template_directory_uri() . '/assets/js/news_event.min.js');
        }
        if(is_page(array('movie','download'))) {
          wp_register_script('js_search_js_cancel', get_template_directory_uri() . '/assets/js/search_js_cancel.min.js');
        }
        if(is_404()) {
          wp_register_script('js_404', get_template_directory_uri() . '/assets/js/404.min.js');
        }
        if(is_tax('product_category')) {
          wp_register_script('js_product', get_template_directory_uri() . '/assets/js/accordion.min.js?20240801');
        }
        if(is_page_template('page-lp-en.php')) {
          wp_register_script('js_lp-modeling-machines', get_template_directory_uri() . '/assets/js/lp-modeling-machines.js');
        }
    }
}

if (!is_admin()) {
    function add_script()
    {
        // 登録したJSを以下の順番で読み込む
        register_script();
        wp_enqueue_script('js321', '', array(), '1.0', true);
        wp_enqueue_script('js_swiper_bundle', '', array(), '1.0', true);
        wp_enqueue_script('js_lax', '', array(), '1.0', true);
        if(!is_front_page()) {
          wp_enqueue_script('js_particles', '', array(), '1.0', true);
          wp_enqueue_script('js_app', '', array(), '1.0', true);
        }
        wp_enqueue_script('js_page', '', array(), '1.0', true);
        wp_enqueue_script('js_cookie', '', array(), '1.0', true);
        if(!is_page_template(array( 'page-marketo01.php','page-marketo02.php'))) {
          wp_enqueue_script('js_pagetop', '', array(), '1.0', true);
        } else {
          wp_enqueue_script('js_pagetop2', '', array(), '1.0', true);
        }
        if(is_page_template('page-nolead.php')) {
          wp_enqueue_script('js_lp', '', array(), '1.0', true);
        }
        if(is_front_page()) {
          wp_enqueue_script('js_index', '', array(), '1.0', true);
        }
        if(is_home()) {
          wp_enqueue_script('js_news_event', '', array(), '1.0', true);
        }
        if(is_page(array('movie','download'))) {
          wp_enqueue_script('js_search_js_cancel', '', array(), '1.0', true);
        }
        if(is_404()) {
          wp_enqueue_script('js_404', '', array(), '1.0', true);
        }
        if(is_tax('product_category')) {
          wp_enqueue_script('js_product', '', array(), '1.0', true);
        }
        if(is_page_template('page-lp-en.php')) {
          wp_enqueue_script('js_lp-modeling-machines', '', array(), '1.0', true);
        }
    }
    add_action('wp_print_scripts', 'add_script');
}

// theme_support
function custom_theme_setup()
{
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  add_theme_support('editor-styles');
  add_editor_style('editor-style.css');
}
add_action('after_setup_theme', 'custom_theme_setup');

add_image_size('top_mv', 2064, 1116, true);
add_image_size('top_mv--thumbnail', 280, 160, true);
add_image_size('top_pickup_image', 700, 394, true);
add_image_size('top_case_image', 270, 270, true);
add_image_size('single_image', 544, 304, true);

//投稿に使うディレクトリ指定[tp /]/
add_shortcode('tp', 'shortcode_tp');
function shortcode_tp($atts, $content = '')
{
  return get_template_directory_uri() . $content;
}

function shortcode_url()
{
  return home_url();
}
add_shortcode('url', 'shortcode_url');

// Embed
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'wp_generator');

/*【出力カスタマイズ】年別アーカイブリストに年を表示する */
function my_get_archives_link($html){
  return preg_replace ( '/<\/a>/', '年</a>', $html );
}
add_filter('get_archives_link','my_get_archives_link');

/* the_archive_title 余計な文字を削除 */
add_filter('get_the_archive_title', function ($title) {
  if (is_category()) {
      $title = single_cat_title('', false);
  } elseif (is_tag()) {
      $title = single_tag_title('', false);
  } elseif (is_tax()) {
      $title = single_term_title('', false);
  } elseif (is_post_type_archive()) {
      $title = post_type_archive_title('', false);
  } elseif (is_date()) {
      $title = get_the_time('ニュース Y年');
  } elseif (is_search()) {
      $title = '検索結果：' . esc_html(get_search_query(false));
  } elseif (is_404()) {
      $title = '「404」ページが見つかりません';
  } else {
  }
  return $title;
});

function rename_cat_function($link) {
  return str_replace("/category/", "/", $link);
}
add_filter('user_trailingslashit', 'rename_cat_function');

function iframe_in_div($the_content)
{
  if (is_single()) {
    $the_content = preg_replace('/<iframe/i', '<div class="c-youtube"><iframe', $the_content);
    $the_content = preg_replace('/<\/iframe>/i', '</iframe></div>', $the_content);
  }
  return $the_content;
}
add_filter('the_content', 'iframe_in_div');

/*  パーマリンクからタクソノミー名を削除
-----------------------------------------------------*/
function my_custom_post_type_permalinks_set($termlink, $term, $taxonomy){
  if($term->taxonomy == 'useful_tag') {
    return str_replace('/'.$taxonomy.'/', '/tag/', $termlink);
  }else{
  return str_replace('/'.$taxonomy.'/', '/', $termlink);
  }
}
add_filter('term_link', 'my_custom_post_type_permalinks_set',11,3);


function custom_rewrite_rule() {

add_rewrite_rule('news-event/date/news/([0-9]{4})/?$', 'index.php?year=$matches[1]', 'top');
add_rewrite_rule('news-event/date/event/([0-9]{4})/?$', 'index.php?year=$matches[1]', 'top');

//ソリューション
add_rewrite_rule('solution/page/([0-9]+)/?$', 'index.php?post_type=solution&paged=$matches[1]', 'top');

$solution_taxonomy_name = 'solution_category';
$solution_taxonomy_args = array(
'hide_empty' => false,
'parent' => 0,
'child_of'      => 0,
'childless'     => true,
);

$solution_other_terms = get_terms( $solution_taxonomy_name, $solution_taxonomy_args );
foreach ( $solution_other_terms as $solution_other_term ):
add_rewrite_rule('solution/'.$solution_other_term->slug.'/([^/]+)/?$', 'index.php?solution=$matches[1]', 'top');
endforeach;

//↓親ターム一覧ページ
add_rewrite_rule('solution/([^/]+)/?$', 'index.php?solution_category=$matches[1]', 'top');
add_rewrite_rule('solution/([^/]+)/page/([0-9]+)/?$', 'index.php?solution_category=$matches[1]&paged=$matches[2]', 'top');
add_rewrite_rule('solution/industry/([^/]+)/?$', 'index.php?solution_industry=$matches[1]', 'top');
add_rewrite_rule('solution/industry/([^/]+)/page/([0-9]+)/?$', 'index.php?solution_industry=$matches[1]&paged=$matches[2]', 'top');

//↓子ターム一覧ページ
add_rewrite_rule('solution/([^/]+)/([^/]+)/?$', 'index.php?solution_category=$matches[2]', 'top');
add_rewrite_rule('solution/([^/]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?solution_category=$matches[2]&paged=$matches[3]', 'top');
add_rewrite_rule('solution/industry/([^/]+)/([^/]+)/?$', 'index.php?solution_industry=$matches[2]', 'top');
add_rewrite_rule('solution/industry/([^/]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?solution_industry=$matches[2]&paged=$matches[3]', 'top');

//製品
add_rewrite_rule('product/page/([0-9]+)/?$', 'index.php?post_type=product&paged=$matches[1]', 'top');

$product_taxonomy_name = 'product_category';
$product_taxonomy_args = array(
'hide_empty' => false,
'parent' => 0,
'child_of'      => 0,
'childless'     => true,
);

$product_other_terms = get_terms( $product_taxonomy_name, $product_taxonomy_args );
foreach ( $product_other_terms as $product_other_term ):
add_rewrite_rule('product/'.$product_other_term->slug.'/([^/]+)/?$', 'index.php?product=$matches[1]', 'top');
endforeach;

//↓親ターム一覧ページ
add_rewrite_rule('product/([^/]+)/?$', 'index.php?product_category=$matches[1]', 'top');
add_rewrite_rule('product/([^/]+)/page/([0-9]+)/?$', 'index.php?product_category=$matches[1]&paged=$matches[2]', 'top');

//↓子ターム一覧ページ
add_rewrite_rule('product/([^/]+)/([^/]+)/?$', 'index.php?product_category=$matches[2]', 'top');
add_rewrite_rule('product/([^/]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?product_category=$matches[2]&paged=$matches[3]', 'top');

//ユーザー事例
add_rewrite_rule('case/page/([0-9]+)/?$', 'index.php?post_type=case&paged=$matches[1]', 'top');

$case_taxonomy_name = 'case_category';
$case_taxonomy_args = array(
'hide_empty' => false,
'parent' => 0,
'child_of'      => 0,
'childless'     => true,
);

$case_other_terms = get_terms( $case_taxonomy_name, $case_taxonomy_args );
foreach ( $case_other_terms as $case_other_term ):
add_rewrite_rule('case/'.$case_other_term->slug.'/([^/]+)/?$', 'index.php?case=$matches[1]', 'top');
endforeach;

//↓親ターム一覧ページ
add_rewrite_rule('case/([^/]+)/?$', 'index.php?case_category=$matches[1]', 'top');
add_rewrite_rule('case/([^/]+)/page/([0-9]+)/?$', 'index.php?case_category=$matches[1]&paged=$matches[2]', 'top');
//↓子ターム一覧ページ
add_rewrite_rule('case/([^/]+)/([^/]+)/?$', 'index.php?case_category=$matches[2]', 'top');
add_rewrite_rule('case/([^/]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?case_category=$matches[2]&paged=$matches[3]', 'top');

//お役立ち情報
add_rewrite_rule('useful/column/page/([0-9]+)/?$', 'index.php?post_type=useful&paged=$matches[1]', 'top');

$useful_taxonomy_name = 'useful_category';
$useful_taxonomy_args = array(
'hide_empty' => false,
'parent' => 0,
'child_of'      => 0,
'childless'     => true,
);

$useful_other_terms = get_terms( $useful_taxonomy_name, $useful_taxonomy_args );
foreach ( $useful_other_terms as $useful_other_term ):
add_rewrite_rule('useful/column/'.$useful_other_term->slug.'/([^/]+)/?$', 'index.php?useful=$matches[1]', 'top');
endforeach;

//↓親ターム一覧ページ
add_rewrite_rule('useful/column/([^/]+)/?$', 'index.php?useful_category=$matches[1]', 'top');
add_rewrite_rule('useful/column/([^/]+)/page/([0-9]+)/?$', 'index.php?useful_category=$matches[1]&paged=$matches[2]', 'top');
add_rewrite_rule('useful/column/tag/([^/]+)/?$', 'index.php?useful_tag=$matches[1]', 'top');
add_rewrite_rule('useful/column/tag/([^/]+)/page/([0-9]+)/?$', 'index.php?useful_tag=$matches[1]&paged=$matches[2]', 'top');

//↓子ターム一覧ページ
add_rewrite_rule('useful/column/([^/]+)/([^/]+)/?$', 'index.php?useful_category=$matches[2]', 'top');
add_rewrite_rule('useful/column/([^/]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?useful_category=$matches[2]&paged=$matches[3]', 'top');
add_rewrite_rule('useful/column/tag/([^/]+)/([^/]+)/?$', 'index.php?useful_tag=$matches[2]', 'top');
add_rewrite_rule('useful/column/tag/([^/]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?useful_tag=$matches[2]&paged=$matches[3]', 'top');

//ユーザー事例
add_rewrite_rule('useful/webinar/page/([0-9]+)/?$', 'index.php?post_type=webinar&paged=$matches[1]', 'top');

$webinar_taxonomy_name = 'webinar_category';
$webinar_taxonomy_args = array(
'hide_empty' => false,
'parent' => 0,
'child_of'      => 0,
'childless'     => true,
);

$webinar_other_terms = get_terms( $webinar_taxonomy_name, $webinar_taxonomy_args );
foreach ( $webinar_other_terms as $webinar_other_term ):
add_rewrite_rule('useful/webinar/'.$webinar_other_term->slug.'/([^/]+)/?$', 'index.php?webinar=$matches[1]', 'top');
endforeach;

//↓親ターム一覧ページ
add_rewrite_rule('useful/webinar/([^/]+)/?$', 'index.php?webinar_category=$matches[1]', 'top');
add_rewrite_rule('useful/webinar/([^/]+)/page/([0-9]+)/?$', 'index.php?webinar_category=$matches[1]&paged=$matches[2]', 'top');
//↓子ターム一覧ページ
add_rewrite_rule('useful/webinar/([^/]+)/([^/]+)/?$', 'index.php?webinar_category=$matches[2]', 'top');
add_rewrite_rule('useful/webinar/([^/]+)/([^/]+)/page/([0-9]+)/?$', 'index.php?webinar_category=$matches[2]&paged=$matches[3]', 'top');

}
add_action('init', 'custom_rewrite_rule');

add_filter('template_include','custom_search_template');
function custom_search_template($template){
  if ( is_search() && get_query_var('s') ){
    $templates[] = 'search.php';
    $template = get_query_template('search',$templates);
  } elseif ( is_search() ){
    $post_types = get_query_var('post_type');
    foreach ( (array) $post_types as $post_type )
      $templates[] = "search-{$post_type}.php";
    $templates[] = 'search.php';
    $template = get_query_template('search',$templates);
  }
  return $template;
}

//投稿のタグをチェックボックスで選択できるようにする
function change_post_tag_to_checkbox() {
  $args = get_taxonomy('post_tag');
  $args -> hierarchical = true;//Gutenberg用
  $args -> meta_box_cb = 'post_categories_meta_box';//Classicエディタ用
  register_taxonomy( 'post_tag', 'post', $args);
}
add_action( 'init', 'change_post_tag_to_checkbox', 1 );

/*【管理画面】ACF Options Page の設定 */
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title' => 'ヘッダーメニュー', // ページタイトル
    'menu_title' => 'ヘッダーメニュー', // メニュータイトル
    'menu_slug' => 'header-menu', // メニュースラッグ
    'capability' => 'edit_posts',
    'redirect' => false
  ));

  acf_add_options_page(array(
    'page_title' => 'フッターメニュー', // ページタイトル
    'menu_title' => 'フッターメニュー', // メニュータイトル
    'menu_slug' => 'footer-menu', // メニュースラッグ
    'capability' => 'edit_posts',
    'redirect' => false
  ));

  acf_add_options_page(array(
    'page_title' => 'indexページの設定', // ページタイトル
    'menu_title' => 'indexページの設定', // メニュータイトル
    'menu_slug' => 'index_settings', // メニュースラッグ
    'capability' => 'edit_posts',
    'redirect' => false
  ));
}

function register_my_menus() {
  register_nav_menus( array( //複数のナビゲーションメニューを登録する関数
  //'「メニューの位置」の識別子' => 'メニューの説明の文字列',
    'header-menu'  => 'Header Menu',
  ) );
}
add_action( 'after_setup_theme', 'register_my_menus' );

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {
    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
      // register a test block.
      acf_register_block_type(array(
          'name'              => 'media_parts',
          'title'             => __('関連パーツ'),
          'description'       => __('media_parts Block'),
          'render_template'   => 'blocks/media-parts.php',
          'category'          => 'my-category',
          'icon'              => 'lightbulb',
          'keywords'          => array( 'media_parts' ),
          'mode' => 'auto',
      ));
      acf_register_block_type(array(
        'name'              => 'accordion_parts',
        'title'             => __('アコーディオンパーツ'),
        'description'       => __('accordion_parts Block'),
        'render_template'   => 'blocks/accordion-parts.php',
        'category'          => 'my-category',
        'icon'              => 'lightbulb',
        'keywords'          => array( 'accordion_parts' ),
        'mode' => 'auto',
      ));
      acf_register_block_type(array(
        'name'              => 'cover_custom_parts',
        'title'             => __('全幅カスタムブロック'),
        'description'       => __('cover_custom_parts Block'),
        'render_template'   => 'blocks/cover-custom-parts.php',
        'category'          => 'my-category',
        'icon'              => 'lightbulb',
        'keywords'          => array( 'cover_custom_parts' ),
        'mode' => 'auto',
      ));
    }
}

function my_localizable_post_types( $localizable ) {
	$custom_post_types = array('product','useful','case','solution','webinar'); // 自分のカスタム投稿タイプ名を入れる
    return array_merge($localizable,$custom_post_types);
}
add_filter( 'bogo_localizable_post_types', 'my_localizable_post_types', 10, 1 );

function extend_date_archives_add_rewrite_rules($wp_rewrite) {
  $rules = array();
  $structures = array(
      $wp_rewrite->get_category_permastruct() . $wp_rewrite->get_date_permastruct(),
      $wp_rewrite->get_category_permastruct() . $wp_rewrite->get_month_permastruct(),
      $wp_rewrite->get_category_permastruct() . $wp_rewrite->get_year_permastruct(),
  );
  foreach( $structures as $s ){
      $rules += $wp_rewrite->generate_rewrite_rules($s);
  }
  $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'extend_date_archives_add_rewrite_rules');

/*<link>からtype属性 <script>からtype属性*/
function remove_type_attr( $tag ) {
  return preg_replace( "| type='.+?'s*|", "", $tag );
}
add_filter( 'style_loader_tag', 'remove_type_attr' );  //
add_filter( 'script_loader_tag', 'remove_type_attr' ); //

add_action( 'init', 'change_post_label' );
function change_post_label() {
  global $wp_post_types;
	$locale = get_locale();
	$product_labels = $wp_post_types['product']->labels;
  $solution_labels = $wp_post_types['solution']->labels;
  $case_labels = $wp_post_types['case']->labels;
  $webinar_labels = $wp_post_types['webinar']->labels;

	if('en_US' == $locale){
		$product_labels->name = 'PRODUCT';
    $solution_labels->name = 'SOLUTION';
    $case_labels->name = 'CASE';
    $webinar_labels->name = 'WEBINAR';
	}
}

function change_posts_per_page($query) {
  if ( is_admin() || ! $query->is_main_query() ) {
    return;
  }

  if ( $query->is_post_type_archive('product') ) {
    $query->set( 'posts_per_page', '-1' );
    $query->set( 'orderby', 'menu_order' );
    $query->set( 'order', 'asc' );

  }
  if ( $query->is_tax(array('product_category','solution_category')) ) {
    $query->set( 'posts_per_page', '-1' );
    $query->set( 'orderby', 'menu_order' );
    $query->set( 'order', 'asc' );
  }
  if ( $query->is_tax(array('case_category','solution_industry','webinar_category')) ) {
    $query->set( 'orderby', 'menu_order' );
    $query->set( 'order', 'asc' );
  }
  if ( $query->is_post_type_archive('solution') ) {
    $query->set( 'posts_per_page', '-1' );
    $query->set( 'orderby', 'menu_order' );
    $query->set( 'order', 'asc' );
  }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );

function admin_favicon() {
  echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_template_directory_uri() . '/assets/favicon/favicon.ico" />';
 }
add_action('admin_head', 'admin_favicon');

function localize_title($title) {
// bloginfo()によって、翻訳後の値を取得
ob_start();
bloginfo('name');
$localizedName = ob_get_clean();
// get_bloginfo()によって、翻訳前の値を取得
$originalName = get_bloginfo('name');
// 翻訳前の値を翻訳後の値に置換
return str_replace($originalName, $localizedName, $title);
}
// 上記の処理を、YoastSEOがサイトのタイトルを出力するときに実施
add_filter( 'wpseo_title', 'localize_title', 10, 1 );

function localize_description($description) {
// bloginfo()によって、翻訳後の値を取得
ob_start();
bloginfo('description');
$localizedDescription = ob_get_clean();
// get_bloginfo()によって、翻訳前の値を取得
$originalDescription = get_bloginfo('description');
// 翻訳前の値を翻訳後の値に置換
return str_replace($originalDescription, $localizedDescription, $description);
}
// 上記の処理を、YoastSEOがキャッチフレーズを出力するときに実施
add_filter( 'wpseo_metadesc', 'localize_description', 10, 1 );

function custom_title($title) {
  if(is_page_template('page-nolead.php')) {
    $lp_title = get_field('lp-title');
    return $lp_title.'｜東京貿易テクノシステム株式会社：TTS';
  } else if(is_post_type_archive(array('product','solution','case','useful','webinar'))) {
    $locale = get_locale();
    $post_type_name = get_post_type();
    $post_type_name_ja = $post_type_name . "-title-ja";
    $post_type_name_en = $post_type_name . "-title-en";
    if('ja' == $locale){
      $product_title = get_field($post_type_name_ja,'option');
      return  $product_title;
    } else {
      if( is_tax(array('product_category','solution_category','case_category','solution_industry','useful_category','useful_tag','webinar_category'))){
        $product_title = get_the_archive_title();;
        return  $product_title;
      } else {
      $product_title = get_field($post_type_name_en,'option');
      return  $product_title;
      }
    }
  }
}
add_filter( 'wpseo_title', 'custom_title' );

function my_description( $description ){
	if( is_tax(array('product_category','solution_category','case_category','solution_industry','useful_category','useful_tag','webinar_category'))){
    $locale = get_locale();
    if('ja' == $locale){
      // $obj = get_queried_object();
      // $term_description = $obj->description;
      // return  $term_description;
      return  $description;
    } else {
      $obj = get_queried_object();
      $term_id = $obj->term_id;
      $taxonomy_name = $obj->taxonomy;
      $term_idsp = $taxonomy_name.'_'.$term_id;
      $term_description = get_field('en_category_textarea',$term_idsp);
      return  $term_description;
    }
  }

  if(is_post_type_archive(array('product','solution','case','useful','webinar'))) {
    $locale = get_locale();
    $post_type_name = get_post_type();
    $post_type_name_ja = $post_type_name . "-text-ja";
    $post_type_name_en = $post_type_name . "-text-en";
    if('ja' == $locale){
      $product_text = get_field($post_type_name_ja,'option');
      return  $product_text;
    } else {
      $product_text = get_field($post_type_name_en,'option');
      return  $product_text;
    }
  }
	return $description;
}

add_filter( 'wpseo_metadesc',  'my_description');

function custom_og_title($title) {
	if( is_tax(array('product_category','solution_category','case_category','solution_industry','useful_category','useful_tag','webinar_category'))){
      // $obj = get_queried_object();
      // $term_name = $obj->name;
      // return  $term_name;
      return $title;
  }
  if(is_post_type_archive(array('product','solution','case','useful','webinar'))) {
    $locale = get_locale();
    $post_type_name = get_post_type();
    $post_type_name_ja = $post_type_name . "-title-ja";
    $post_type_name_en = $post_type_name . "-title-en";
    if('ja' == $locale){
      $product_title = get_field($post_type_name_ja,'option');
      return  $product_title;
    } else {
      $product_title = get_field($post_type_name_en,'option');
      return  $product_title;
    }
  }
  return $title;
}
add_filter( 'wpseo_opengraph_title', 'custom_og_title' );

function custom_og_desc($desc) {
	if( is_tax(array('product_category','solution_category','case_category','solution_industry','useful_category','useful_tag','webinar_category'))){
    $locale = get_locale();
    if('ja' == $locale){
      // $obj = get_queried_object();
      // $term_description = $obj->description;
      // return  $term_description;
      return $desc;
    } else {
      $obj = get_queried_object();
      $term_id = $obj->term_id;
      $taxonomy_name = $obj->taxonomy;
      $term_idsp = $taxonomy_name.'_'.$term_id;
      $term_description = get_field('en_category_textarea',$term_idsp);
      return  $term_description;
    }
  }
  if(is_post_type_archive(array('product','solution','case','useful','webinar'))) {
    $locale = get_locale();
    $post_type_name = get_post_type();
    $post_type_name_ja = $post_type_name . "-text-ja";
    $post_type_name_en = $post_type_name . "-text-en";
    if('ja' == $locale){
      $product_text = get_field($post_type_name_ja,'option');
      return  $product_text;
    } else {
      $product_text = get_field($post_type_name_en,'option');
      return  $product_text;
    }
  }
  return $desc;
}
add_filter( 'wpseo_opengraph_desc', 'custom_og_desc' );

// RSSフィードのリンクを除去
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

// ページネーション不具合修正
function adjust_category_paged($query = []) {
  $locale = get_locale();
  if ('ja' == $locale) {
    if (isset($query['name'])
      && $query['name'] === 'page'
      && isset($query['page'])
      && isset($query['category_name'])) { // ニュース・イベントのカテゴリーページの2ページ目以降（/news-event/news/page/XX/、/news-event/evemt/page/XX/）
        $query['paged'] = intval($query['page']);
        unset($query['name']);
        unset($query['page']);
    } elseif (isset($query['paged'])
      && isset($query['category_name'])
      && strpos($query['category_name'], 'date/') !== false) { // ニュース・イベントの年別アーカイブの2ページ目以降（/news-event/date/news/YYYY/page/XX/、/news-event/date/event/YYYY/page/XX/）
        $parses = parse_url($_SERVER["REQUEST_URI"]);
        $urls = explode("/",$parses["path"]);
        $urls = array_filter($urls, "strlen");
        $urls = array_values($urls);
        $year = $urls[3];
        $query['year'] = intval($year);
        unset($query['name']);
    } elseif (isset($query['year'])
      && !($query['post_type'] ?? '')) { // ニュース・イベントの年別アーカイブ最初のページ（/news-event/date/news/YYYY/、/news-event/date/event/YYYY/）
        $parses = parse_url($_SERVER["REQUEST_URI"]);
        $urls = explode("/",$parses["path"]);
        $urls = array_filter($urls, "strlen");
        $urls = array_values($urls);
        $category = $urls[2];
        $query['category_name'] = $category;
    } elseif (isset($query['s'])
      && !($query['post_type'] ?? '')) { // 検索ページ
        $query['post_type'] = array('solution','product','post');
    }
  }
  return $query;
}
add_filter('request', 'adjust_category_paged');


function custom_archive_pre_get_posts( $query ) {
  // 管理画面である場合、または、メインクエリでない(サブクエリである)場合、何もしない
  if ( is_admin() || ! $query->is_main_query() ){
      return;
  }

  // カテゴリー記事一覧ページである場合の1ページあたりの取得記事数
  // 特定のカテゴリの場合、is_category( $category )の形式を使用する
  if ( $query->is_category('event') ) {
      $query->set( 'posts_per_page', 6 );
  } elseif ( $query->is_category('news') ) {
      $query->set( 'posts_per_page', 12 );
  }
}
add_filter( 'pre_get_posts', 'custom_archive_pre_get_posts' );

/* プライマリーカテゴリーとして選択したものがURLになるように
https://wordpress.org/support/topic/primary-category-on-custom-post-types/ */
function cptp_term_luogo( $term_obj, $terms, $taxonomy, $post ){
  $post_id = $post->ID;

  if ( get_post_type( $post_id ) == 'solution' && !is_post_type_archive( 'solution' ) ) {
    if ( class_exists('WPSEO_Primary_Term') ) {
      $primary_solution_cat = new WPSEO_Primary_Term( 'solution_category', $post_id );
      $primary_solution_cat_id = $primary_solution_cat->get_primary_term();

      if ( $primary_solution_cat_id ):
          $solution_cat = get_term( $primary_solution_cat_id );
      endif;

      if( $taxonomy == 'solution_category' ):
          $term_obj = $solution_cat;
      endif;
    }
    return $term_obj;
  } else {
    return $term_obj;
  }
}
add_filter( 'cptp_post_link_term', 'cptp_term_luogo', 10, 4);

// プライマリーカテゴリーがある場合Breadcrumb NavXTカスタマイズ
function bcn_wpseo_primary_term($bcnObj) {
  if ( is_singular('solution') ) {
    if ( class_exists('WPSEO_Primary_Term') ) {
      $trail[1] = $bcnObj->trail[1];
      $wpseo_primary_term = new WPSEO_Primary_Term( 'solution_category', get_the_id() );
      $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
      $term = get_term( $wpseo_primary_term );
      $category = get_the_terms(get_the_id(), 'solution_category');
      if (is_wp_error($term)) {
        $category_display = $category[0]->name;
        $category_link = get_category_link( $category[0]->term_id );
      } else {
        $category_display = $term->name;
        $category_link = get_category_link( $term->term_id );
      }
      $trail[1]->set_title($category_display);
      $trail[1]->set_url($category_link);
    }
  }
  return $bcnObj;
}
add_action('bcn_after_fill', 'bcn_wpseo_primary_term');

// プライマリーカテゴリーを設定している場合はそのカテゴリーでURLを取得
function get_primary_link($post) {
  $slug = $post->post_name;
  $category = get_the_terms($post->ID, 'solution_category');
  if ($category){
    $category_link = '';
    if ( class_exists('WPSEO_Primary_Term') ) {
      $wpseo_primary_term = new WPSEO_Primary_Term( 'solution_category', $post->ID );
      $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
      $term = get_term( $wpseo_primary_term );
      if (is_wp_error($term)) {
        $category_link = get_category_link( $category[0]->term_id );
      } else {
        $category_link = get_category_link( $term->term_id );
      }
    } else {
      $category_link = get_category_link( $category[0]->term_id );
    }
  }
  $permalink = $category_link . $slug . '/';
  $permalink = esc_url($permalink);
  return $permalink;
}
