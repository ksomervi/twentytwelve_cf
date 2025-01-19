<?php
/* This is broken */
if(!function_exists('archives_page_widgets_init')) :
function archives_page_widgets_init() {
  /* First archive page widget, displayed to the LEFT. */
  register_sidebar(array(
    'name' => __('Archives page widget LEFT-ismo', 'cf_theme'),
    'description' => __('This widget will be shown on the left side of your archive page.', 'cf_theme'),
    'id' => 'archives-left',
    'before_widget' => '<div class="archives-widget-left">',
    'after_widget' => '</div>',
    'before_title' => '<h1 class="widget-title">',
    'after_title' => '</h1>',
  ));

  /* Second archive page widget, displayed to the RIGHT. */
  register_sidebar(array(
    'name' => __('Archives page widget RIGHT', 'cf_theme'),
    'description' => __('This widget will be shown on the right side of your archive page.', 'cf_theme'),
    'id' => 'archives-right',
    'before_widget' => '<div class="archives-widget-right">',
    'after_widget' => '</div>',
    'before_title' => '<h1 class="widget-title">',
    'after_title' => '</h1>',
  ));
}
endif;
add_action('widgets_init', 'archives_page_widgets_init');

/* This is a conditional enqueue operation. It will run only if the visitor
 * is browsing the archive page.
 */
if(!function_exists('archives_page_styles')) :
function archives_page_styles() {
  if(is_page_template('template_archives.php')) {
    wp_enqueue_style('archives-page-style', get_template_directory_uri() . '/archives-page-style.css'); // standard way of adding style sheets in WP.
  }
}
endif;
add_action('wp_enqueue_scripts', 'archives_page_styles');
?>
