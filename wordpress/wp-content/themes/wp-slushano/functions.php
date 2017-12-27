<?php
/*
 *  Author: knaipa | @Saitobaza
 *  URL: saitobaza.ru
 *  Custom functions, support, custom post types and more.
 */

//  Enable styles for WP admin panel
add_action('admin_enqueue_scripts', 'wpeAdminThemeStyle');
function wpeAdminThemeStyle() {
  wp_enqueue_style('wpe-admin-style', get_template_directory_uri() . '/css/admin.css');
  wp_enqueue_style('wpe-admin-style', get_template_directory_uri() . '/css/editor-style.css');
  wp_register_script('wpe-admin-script', get_template_directory_uri() . '/js/admin.js');
  wp_enqueue_script( 'wpe-admin-script' );
}

//  Catch first image from post and display it
function catchFirstImage() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',
    $post->post_content, $matches);
  $first_img = $matches [1] [0];
  if(empty($first_img)){
    $first_img = get_template_directory_uri() . '/img/noimage.jpg'; }
    return $first_img;
}

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
  acf_update_setting('google_api_key', 'AIzaSyCZF31krTQH_5QnEpdIsEgmsBV-Iy884rE');
}

add_action('wp_enqueue_scripts', 'wpeStyles'); // Add Theme Stylesheet
function wpeStyles()  {
  wp_dequeue_style('fancybox');
  wp_dequeue_style('wp_dequeue_style');

  wp_register_style('wpeasy-style', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
  wp_enqueue_style('wpeasy-style'); // Enqueue it!
}

add_action('init', 'wpeHeaderScripts'); // Add Scripts to wp_head
function wpeHeaderScripts() {
  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4');
    wp_enqueue_script('jquery');

    wp_register_script('jquery-migrate', '//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js', array(), '3.0.0');
    wp_enqueue_script('jquery-migrate');

    wp_register_script('modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), '2.8.3');
    wp_enqueue_script('modernizr');

    wp_register_script('tooltipster', '//cdnjs.cloudflare.com/ajax/libs/tooltipster/3.3.0/js/jquery.tooltipster.min.js', array(), '3.3.0');
    wp_enqueue_script('tooltipster');

    wp_deregister_script( 'jquery-form' );

    //  Load footer scripts (footer.php)
    wp_register_script('wpeScripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);
    wp_enqueue_script('wpeScripts');

  }
}

//  Remove wp_head() injected Recent Comment styles
//  add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
function my_remove_recent_comments_style() {
  global $wp_widget_factory;
  remove_action('wp_head', array(
    $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
    'recent_comments_style'
  ));
}

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if (!isset($content_width)) {
  $content_width = 980;
}

if (function_exists('add_theme_support')) {
  // Add Menu Support
  add_theme_support('menus');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
  add_image_size('large', 1200, '', true); // Large Thumbnail
  add_image_size('medium', 600, '', true); // Medium Thumbnail
  add_image_size('small', 250, '', true); // Small Thumbnail
  add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

  // Enables post and comment RSS feed links to head
  add_theme_support('automatic-feed-links');

  // Localisation Support
  load_theme_textdomain('wpeasy', get_template_directory() . '/languages');
}

// WPE head navigation
function wpeHeadNav() {
  wp_nav_menu(
  array(
    'theme_location'  => 'header-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul id="menu-glavnoe-menyu" class="menu">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
    )
  );
}
// WPE footer navigation
function wpeFootNav() {
  wp_nav_menu(
  array(
    'theme_location'  => 'footer-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul class="footernav">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
    )
  );
}
// WPE sidebar navigation
function wpeSideNav() {
  wp_nav_menu(
  array(
    'theme_location'  => 'sidebar-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul class="sidebarnav">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
    )
  );
}
//  Register WPE Navigation
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
function register_html5_menu() {
  register_nav_menus(array(
    'header-menu' => __('Меню в шапке', 'wpeasy'),
    'sidebar-menu' => __('Меню в сайдбар', 'wpeasy'),
    'footer-menu' => __('Меню в подвал', 'wpeasy')
  ));
}
//  If Dynamic Sidebar Existsов
if (function_exists('register_sidebar')) {
  //  Define Sidebar Widget Area 1
  register_sidebar(array(
    'name' => __('Блок виджетов #1', 'wpeasy'),
    'description' => __('Description for this widget-area...', 'wpeasy'),
    'id' => 'widgetarea1',
    'before_widget' => '<div id="%1$s" class="styled-block no-padding widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="sb-title">',
    'after_title' => '</div'
  ));

  //  Define Sidebar Widget Area 2. If your want to display more widget - uncoment this
  register_sidebar(array(
    'name' => __('Виджеты подвала', 'wpeasy'),
    'description' => __('Description for this widget-area...', 'wpeasy'),
    'id' => 'widgetarea2',
    'before_widget' => '<div id="%1$s" class="block widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<span class="title">',
    'after_title' => '</span>'
  ));
}

//  Custom Excerpts
//  RU: Произвольное обрезание текста
function wpeExcerpt10($length) {
  return 10;
}
function wpeExcerpt20($length) {
  return 20;
}
function wpeExcerpt40($length) {
  return 40;
}
//  Create the Custom Excerpts callback
//  RU: Собственная обрезка контента
function wpeExcerpt($length_callback = '', $more_callback = '') {
  global $post;
  if (function_exists($length_callback)) {
      add_filter('excerpt_length', $length_callback);
  }
  if (function_exists($more_callback)) {
      add_filter('excerpt_more', $more_callback);
  }
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}

//  Custom View Article link to Post
//  RU: Добавляем "Читать дальше" к обрезанным записям
/*
function html5_blank_view_article($more) {
  global $post;
  return '... <!-- noindex --><a rel="nofollow" class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'wpeasy') . '</a><!-- /noindex -->';
}
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
*/
// Remove the <div> surrounding the dynamic navigation to cleanup markup
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
function my_wp_nav_menu_args($args = '') {
  $args['container'] = false;
  return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
function my_css_attributes_filter($var) {
  return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
function remove_category_rel_from_category_list($thelist) {
  return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
function add_slug_to_body_class($classes) {
  global $post;
  if (is_home()) {
    $key = array_search('blog', $classes);
    if ($key > -1) {
      unset($classes[$key]);
    }
  } elseif (is_page()) {
    $classes[] = sanitize_html_class($post->post_name);
  } elseif (is_singular()) {
    $classes[] = sanitize_html_class($post->post_name);
  }

  return $classes;
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
function html5wp_pagination() {
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
      'base' => str_replace($big, '%#%', get_pagenum_link($big)),
      'format' => '?paged=%#%',
      'current' => max(1, get_query_var('paged')),
      'prev_text' => __('« Previous'),
      'next_text' => __('Next »'),
      'total' => $wp_query->max_num_pages
    )
  );
}

// Remove Admin bar
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
function remove_admin_bar() {
  return false;
}

// Remove 'text/css' from our enqueued stylesheet
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
function html5_style_remove($tag) {
  return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
function remove_thumbnail_dimensions( $html ) {
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}

// Custom Gravatar in Settings > Discussion
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults) {
  $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
  $avatar_defaults[$myavatar] = "Custom Gravatar";
  return $avatar_defaults;
}

// Threaded Comments
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
function enable_threaded_comments() {
  if (!is_admin()) {
    if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script('comment-reply');
    }
  }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  extract($args, EXTR_SKIP);

  if ( 'div' == $args['style'] ) {
    $tag = 'div';
    $add_below = 'comment';
  } else {
    $tag = 'li';
    $add_below = 'div-comment';
  }
?>
  <!-- heads up: starting < for the html tag (li or div) in the next line: -->
  <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
  <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
      <div class="comment-author vcard">
        <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
        <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
        <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
        <br />
      <?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
      <?php printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' ); ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
      <?php if ( 'div' != $args['style'] ) : ?>
    </div>
  <?php endif; ?>
<?php }

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

 // Как отключить комментарии для Медиафайлов WordPress
 // http://wordpresso.org/hacks/kak-otklyuchit-kommentarii-dlya-mediafaylov-wordpress/
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );
function filter_media_comment_status( $open, $post_id ) {
  $post = get_post( $post_id );
  if( $post->post_type == 'attachment' ) {
    return false;
  }
  return $open;
}

 // Редирект записи, когда поисковый запрос выдает один результат
 // http://wordpresso.org/hacks/29-wordpress-tryukov-dlya-rabotyi-s-zapisyami-i-stranitsami/
add_action('template_redirect', 'single_result');
function single_result() {
  if (is_search()) {
    global $wp_query;
    if ($wp_query->post_count == 1) {
      wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
    }
  }
}

// хлебные крошки   http://dimox.name/wordpress-breadcrumbs-without-a-plugin/
/* <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?> */

function easy_breadcrumbs() {

  // Settings
  $separator          = ' &raquo; ';
  $breadcrums_id      = 'breadcrumbs';
  $breadcrums_class   = 'breadcrumbs';
  $home_title         = 'Главная';

  // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
  $custom_taxonomy    = 'categories';

  // Get the query & post information
  global $post,$wp_query;

  // Do not display on the homepage
  if ( !is_front_page() ) {

    // Build the breadcrums
    echo '<div id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

    // Home page
    echo '<span><span class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></span></span>';
    echo '<span class="separator separator-home"> ' . $separator . ' </span>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<span class="item-current item-archive"><span class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</span></span>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<span class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></span>';
                echo '<span class="separator"> ' . $separator . ' </span>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<span class="item-current item-archive"><span class="bread-current bread-archive">' . $custom_tax_name . '</span></span>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<span class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></span>';
                echo '<span class="separator"> ' . $separator . ' </span>';

            }

            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $last_category = end(array_values($category));

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<span class="item-cat">'.$parents.'</span>';
                    $cat_display .= '<span class="separator"> ' . $separator . ' </span>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<span class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></span>';

            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<span class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></span>';
                echo '<span class="separator"> ' . $separator . ' </span>';
                echo '<span class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></span>';

            } else {

                echo '<span class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</span></span>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<span class="item-current item-cat"><span class="bread-current bread-cat">' . single_cat_title('', false) . '</span></span>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<span class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></span>';
                    $parents .= '<span class="separator separator-' . $ancestor . '"> ' . $separator . ' </span>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<span class="item-current item-' . $post->ID . '"><span title="' . get_the_title() . '"> ' . get_the_title() . '</span></span>';

            } else {

                // Just display current page if not parents
                echo '<span class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</span></span>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<span class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><span class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</span></span>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<span class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></span>';
            echo '<span class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </span>';

            // Month link
            echo '<span class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></span>';
            echo '<span class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </span>';

            // Day display
            echo '<span class="item-current item-' . get_the_time('j') . '"><span class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</span></span>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<span class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></span>';
            echo '<span class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </span>';

            // Month display
            echo '<span class="item-month item-month-' . get_the_time('m') . '"><span class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</span></span>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<span class="item-current item-current-' . get_the_time('Y') . '"><span class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</span></span>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<span class="item-current item-current-' . $userdata->user_nicename . '"><span class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</span></span>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<span class="item-current item-current-' . get_query_var('paged') . '"><span class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</span></span>';

        } else if ( is_search() ) {

            // Search results page
            echo '<span class="item-current item-current-' . get_search_query() . '"><span class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</span></span>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<span>' . 'Error 404' . '</span>';
        }

        echo '</div>';

    }

}
// end easy_breadcrumbs()

// to remove the /./ from links, use this filter
// https://stackoverflow.com/questions/17798815/remove-category-tag-base-from-wordpress-url-without-a-plugin
add_filter( 'term_link', function($termlink){
  return str_replace('/./', '/', $termlink);
}, 10, 1 );


add_action( 'init', 'disable_wp_emojicons' );
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

// enqueue_scripts: make sure to include ajaxurl, so we know where to send the post request
// https://github.com/tokmak/wp-load-more-ajax
function dt_add_main_js(){
  wp_localize_script( 'wpeScripts', 'headJS', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'templateurl' => get_template_directory_uri(), 'posts_per_page' => get_option('posts_per_page') ) );
}
add_action( 'wp_enqueue_scripts', 'dt_add_main_js', 90);

add_action( "wp_ajax_load_more", "load_more_func" ); // when logged in
add_action( "wp_ajax_nopriv_load_more", "load_more_func" );//when logged out
//function return new posts based on offset and posts per page value
function load_more_func() {
  //verifying nonce here
  if ( !wp_verify_nonce( $_REQUEST['nonce'], "load_posts" ) ) {
    exit("No naughty business please");
  }
  $offset = isset($_REQUEST['offset'])?intval($_REQUEST['offset']):0;
  $posts_per_page = isset($_REQUEST['posts_per_page'])?intval($_REQUEST['posts_per_page']):10;
  //optional, if post type is not defined use regular post type
  $post_type = isset($_REQUEST['post_type'])?$_REQUEST['post_type']:'post';

  ob_start(); // buffer output instead of echoing it
  $args = array(
    'post_type'=>$post_type,
    'offset' => $offset,
    'posts_per_page' => $posts_per_page,
    'orderby' => 'date',
    'order' => 'DESC'
  );
  $posts_query = new WP_Query( $args );


  if ($posts_query->have_posts()) {
    //if we have posts:
      $result['have_posts'] = true; //set result array item "have_posts" to true

      while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
        <li id="post-<?php the_ID(); ?>" <?php post_class('item styled-block'); ?> data-post-id="<?php the_ID(); ?>">
          <div class="top">
            <a class="post-link" href="<?php the_permalink(); ?>" rel="nofollow"><?php the_title(); ?></a>
            <span class="date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' назад'; ?></span>
          </div>
          <div class="content">
            <div class="text-in">
              <?php wpeExcerpt('wpeExcerpt40'); ?>
              <div class="twoe_vk_gp_images_galery items1">
                <div class="twoe_vk_gp_images_galery_item item_1">
                  <div class="twoe_vk_gp_images_galery_item_in">
                    <a rel="nofollow" class="feature-img" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                      <?php if ( has_post_thumbnail()) { ?>
                        <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                      <?php } else { ?>
                        <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                      <?php } ?>
                    </a><!-- /post thumbnail -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="post-bottom">
            <a class="likes"><i class="fa icon"></i><span class="title hide-on-mobile">Нравится</span><span class="title title-m show-on-mobile">Нрав.</span> <span class="number">0</span> </a>
            <a class="comments" href="<?php the_permalink(); ?>/#post-comments"> <i class="fa icon"></i> <span class="title hide-on-mobile">Комментарии</span> <span class="title title-m show-on-mobile">Коммент.</span> <span class="number"><?php comments_number( '0', '1', '%' ); ?></span> </a>
            <a class="more" href="<?php the_permalink(); ?>"> <i class="fa icon"></i> <span class="title hide-on-mobile">Подробнее</span> <span class="title title-m show-on-mobile">Подробнее</span> </a>
          </div>
        </li>

      <?php endwhile;
    $result['html'] = ob_get_clean(); // put alloutput data into "html" item
  } else {
    //no posts found
    $result['have_posts'] = false; // return that there is no posts found
  }

  if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $result = json_encode($result); // encode result array into json feed
    echo $result; // by echo we return JSON feed on POST request sent via AJAX
  }
  else {
    header("Location: ".$_SERVER["HTTP_REFERER"]);
  }
  die();
}

// https://code.tutsplus.com/articles/how-to-create-a-simple-post-rating-system-with-wordpress-and-jquery--wp-24474
add_action('wp_ajax_nopriv_post-like', 'post_like');
add_action('wp_ajax_post-like', 'post_like');

function post_like() {
    // Check for nonce security
    $nonce = $_POST['nonce'];

    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Busted!');

    if(isset($_POST['post_like']))
    {
        // Retrieve user IP address
        $ip = $_SERVER['REMOTE_ADDR'];
        $post_id = $_POST['post_id'];

        // Get voters'IPs for the current post
        $meta_IP = get_post_meta($post_id, "voted_IP");
        $voted_IP = $meta_IP[0];

        if(!is_array($voted_IP))
            $voted_IP = array();

        // Get votes count for the current post
        $meta_count = get_post_meta($post_id, "votes_count", true);

        // Use has already voted ?
        if(!hasAlreadyVoted($post_id))
        {
            $voted_IP[$ip] = time();

            // Save IP and increase votes count
            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "votes_count", ++$meta_count);

            // Display count (ie jQuery return value)
            echo $meta_count;
        }
        else
          echo "already";
    }
    exit;
}

function hasAlreadyVoted($post_id) {
    global $timebeforerevote;

    // Retrieve post votes IPs
    $meta_IP = get_post_meta($post_id, "voted_IP");
    $voted_IP = $meta_IP[0];

    if(!is_array($voted_IP))
        $voted_IP = array();

    // Retrieve current user IP
    $ip = $_SERVER['REMOTE_ADDR'];

    // If user has already voted
    if(in_array($ip, array_keys($voted_IP)))
    {
        $time = $voted_IP[$ip];
        $now = time();

        // Compare between current time and vote time
        if(round(($now - $time) / 60) > $timebeforerevote)
            return false;

        return true;
    }

    return false;
}
function getPostLikeLink($post_id) {
  $vote_count = get_post_meta($post_id, "votes_count", true);

  if(hasAlreadyVoted($post_id)) {
    $output .= '<a class="likes voted" data-nonce="'. wp_create_nonce("ajax-nonce") .'" data-post_id="'. get_the_ID() .'" ><i class="fa icon"></i><span class="title hide-on-mobile">Нравится</span><span class="title title-m show-on-mobile">Нрав.</span> <span class="number">'. $vote_count .'</span> </a>';
  } else {
    $output .= '<a class="likes" data-nonce="'. wp_create_nonce("ajax-nonce") .'" data-post_id="'. get_the_ID() .'" ><i class="fa icon"></i><span class="title hide-on-mobile">Нравится</span><span class="title title-m show-on-mobile">Нрав.</span> <span class="number">0</span> </a>';
  }

  return $output;
}


?>
