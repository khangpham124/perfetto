<?php
add_theme_support('post-thumbnails');


//login logo
function custom_login_logo() {
        echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/images/logo.png) 50% 50% no-repeat !important;background-size:180px 180px !important; width:180px !important;height:180px !important; }</style>';
}

add_action('login_head', 'custom_login_logo');


//timthumb

define('THEME_DIR', get_template_directory_uri());
/* Timthumb CropCropimg */
function thumbCrop($img='', $w=false, $h=false, $zc=1){
    if($h)
        $h = "&amp;h=$h";
    else
        $h = "";
        
    if($w)
        $w = "&amp;w=$w";
    else
        $w = "";
    $img = str_replace(get_bloginfo('url'), '', $img);
    $image_url = THEME_DIR . "/timthumb/timthumb.php?src=" . $img . $h . $w ;
    return $image_url;

}
$image_cache = THEME_DIR . "/php/cache/";
// chmod($image_cache, 0777);

// 管理画面サイドバーメニュー非表示
function remove_menus () {
    if (!current_user_can('level_9')) { //level9以下のユーザーの場合メニューをunsetする
    global $menu;
    var_dump($menu);
    unset($menu[2]);//ダッシュボード
    unset($menu[4]);//メニューの線1
    unset($menu[5]);//投稿
    unset($menu[15]);//リンク
    unset($menu[20]);//ページ
    unset($menu[25]);//コメント
    unset($menu[59]);//メニューの線2
    unset($menu[60]);//テーマ
    unset($menu[65]);//プラグイン
    unset($menu[70]);//プロフィール
    unset($menu[75]);//ツール
    unset($menu[80]);//設定
    unset($menu[90]);//メニューの線3
    }
}
add_action('admin_menu', 'remove_menus');

function custom_admin_footer() {
    echo 'Perfetto Vietnam - Develop by <a href="http://vnese-freelance.co/">Vnese Group Team</a>';
}
add_filter('admin_footer_text', 'custom_admin_footer');

/* term drop down function */
function todo_restrict_manage_posts() {
    global $typenow;
    $args=array( 'public' => true, '_builtin' => false );
    $post_types = get_post_types($args);
    if ( in_array($typenow, $post_types) ) {
    $filters = get_object_taxonomies($typenow);
        foreach ($filters as $tax_slug) {
            $tax_obj = get_taxonomy($tax_slug);
            wp_dropdown_categories(array(
                'show_option_all' => __('カテゴリー '),
                'taxonomy' => $tax_slug,
                'name' => $tax_obj->name,
                'orderby' => 'term_order',
                'selected' => $_GET[$tax_obj->query_var],
                'hierarchical' => $tax_obj->hierarchical,
                'show_count' => false,
                'hide_empty' => true
            ));
        }
    }
}
function todo_convert_restrict($query) {
    global $pagenow;
    global $typenow;
    if ($pagenow=='edit.php') {
        $filters = get_object_taxonomies($typenow);
        foreach ($filters as $tax_slug) {
            $var = &$query->query_vars[$tax_slug];
            if ( isset($var) ) {
                $term = get_term_by('id',$var,$tax_slug);
                $var = $term->slug;
            }
        }
    }
    return $query;
}
add_action( 'restrict_manage_posts', 'todo_restrict_manage_posts' );
add_filter('parse_query','todo_convert_restrict');
/* term drop down function end*/

//for archives
global $my_archives_post_type;
add_filter( 'getarchives_where', 'my_getarchives_where', 10, 2 );
function my_getarchives_where( $where, $r ) {
  global $my_archives_post_type;
  if ( isset($r['post_type']) ) {
    $my_archives_post_type = $r['post_type'];
    $where = str_replace( '\'post\'', '\'' . $r['post_type'] . '\'', $where );
  } else {
    $my_archives_post_type = '';
  }
  return $where;
}
add_filter( 'get_archives_link', 'my_get_archives_link' );
function my_get_archives_link( $link_html ) {
  global $my_archives_post_type;
  if ( '' != $my_archives_post_type )
    $add_link .= '?post_type=' . $my_archives_post_type;
	$link_html = preg_replace("/href=\'(.+)\'\s/","href='$1".$add_link."'",$link_html);

  return $link_html;
}

// paging
$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'my_modify_posts_per_page', 0);
function my_modify_posts_per_page() {
    add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
}


// Custom post

//sample
add_action('init', 'my_custom_products');
function my_custom_products()
{
  $labels = array(
    'name' => _x('Products', 'post type general name'),
    'singular_name' => _x('Products', 'post type singular name'),
    'add_new' => _x('Add Products', 'news'),
    'add_new_item' => __('Add new item'),
    'edit_item' => __('Edit item'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_staff' => __('Products'),
    'not_found' =>  __('Not Found'),
    'not_found_in_trash' => __('Not found in trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
    'has_archive' => true
  );
  register_post_type('products',$args);
}

// make taxonomy
add_action ('init','create_productscat_taxonomy','0');
function create_productscat_taxonomy () {
	$taxonomylabels = array(
	'name' => _x('productscat','post type general name'),
	'singular_name' => _x('productscat','post type singular name'),
	'search_items' => __('productscat'),
	'all_items' => __('productscat'),
	'parent_item' => __( 'Parent Cat' ),
	'parent_item_colon' => __( 'Parent Cat:' ),
	'edit_item' => __('Cat記事を編集'),
	'add_new_item' => __('Cat記事を書く'),
	'menu_name' => __( 'categories' ),
	);
	$args = array(
	'labels' => $taxonomylabels,
	'hierarchical' => true,
	'has_archive' => true,
	'show_ui' => true,
	 'query_var' => true,
	 'rewrite' => array( 'slug' => 'productscat' )
	);
	register_taxonomy('productscat','products',$args);
}

add_action ('init','create_productsbrand_taxonomy','0');
function create_productsbrand_taxonomy () {
	$taxonomylabels = array(
	'name' => _x('productsbrand','post type general name'),
	'singular_name' => _x('productsbrand','post type singular name'),
	'search_items' => __('productsbrand'),
	'all_items' => __('productsbrand'),
	'parent_item' => __( 'Parent Cat' ),
	'parent_item_colon' => __( 'Parent Cat:' ),
	'edit_item' => __('Cat記事を編集'),
	'add_new_item' => __('Cat記事を書く'),
	'menu_name' => __( 'Brand' ),
	);
	$args = array(
	'labels' => $taxonomylabels,
	'hierarchical' => true,
	'has_archive' => true,
	'show_ui' => true,
	 'query_var' => true,
	 'rewrite' => array( 'slug' => 'productsbrand' )
	);
	register_taxonomy('productsbrand','products',$args);
}

add_action('init', 'my_custom_news');
function my_custom_news()
{
  $labels = array(
    'name' => _x('News', 'post type general name'),
    'singular_name' => _x('News', 'post type singular name'),
    'add_new' => _x('Add News', 'news'),
    'add_new_item' => __('Add new item'),
    'edit_item' => __('Edit item'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_staff' => __('News'),
    'not_found' =>  __('Not Found'),
    'not_found_in_trash' => __('Not found in trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
    'has_archive' => true
  );
  register_post_type('news',$args);
}

add_action('init', 'my_custom_job');
function my_custom_job()
{
  $labels = array(
    'name' => _x('Job', 'post type general name'),
    'singular_name' => _x('Job', 'post type singular name'),
    'add_new' => _x('Add Job', 'news'),
    'add_new_item' => __('Add new item'),
    'edit_item' => __('Edit item'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_staff' => __('Job'),
    'not_found' =>  __('Not Found'),
    'not_found_in_trash' => __('Not found in trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
    'has_archive' => true
  );
  register_post_type('job',$args);
}

add_action('init', 'my_custom_showroom');
function my_custom_showroom()
{
  $labels = array(
    'name' => _x('Showroom', 'post type general name'),
    'singular_name' => _x('Showroom', 'post type singular name'),
    'add_new' => _x('Add Showroom', 'news'),
    'add_new_item' => __('Add new item'),
    'edit_item' => __('Edit item'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_staff' => __('Showroom'),
    'not_found' =>  __('Not Found'),
    'not_found_in_trash' => __('Not found in trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
    'has_archive' => true
  );
  register_post_type('showroom',$args);
}

add_action('init', 'my_custom_retail');
function my_custom_retail()
{
  $labels = array(
    'name' => _x('Retailor', 'post type general name'),
    'singular_name' => _x('Retailor', 'post type singular name'),
    'add_new' => _x('Add Retailor', 'news'),
    'add_new_item' => __('Add new item'),
    'edit_item' => __('Edit item'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_staff' => __('Retailor'),
    'not_found' =>  __('Not Found'),
    'not_found_in_trash' => __('Not found in trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail'),
    'has_archive' => true
  );
  register_post_type('retail',$args);
}

add_action('init', 'my_custom_city');
function my_custom_city()
{
  $labels = array(
    'name' => _x('City', 'post type general name'),
    'singular_name' => _x('City', 'post type singular name'),
    'add_new' => _x('Add City', 'news'),
    'add_new_item' => __('Add new item'),
    'edit_item' => __('Edit item'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_staff' => __('City'),
    'not_found' =>  __('Not Found'),
    'not_found_in_trash' => __('Not found in trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title',),
    'has_archive' => true
  );
  register_post_type('city',$args);
}


