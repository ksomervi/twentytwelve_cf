<?php
function cottagefix_setup() {
  add_theme_support( 'featured-content', array(
    'featured_content_filter' => 'cf_get_featured_content',
  ));
  update_option('image_default_align', 'center' );
  // Have the images link to the attachment page and not the file.
  update_option('image_default_link_type', 'post' );
  update_option('image_default_size', 'large' );
}

add_theme_support( 'title-tag' );

add_action(
  'after_setup_theme',
  function() {
    add_theme_support( 'html5', [ 'script', 'style' ] );
  }
);

add_action( 'after_setup_theme', 'cottagefix_setup' );

function cf_get_featured_content( $num = 1 ) {
  global $featured;
  $featured = apply_filters( 'cf_featured_content', array());

  if ( is_array( $featured ) || $num >= count( $featured ) )
    return true;

  return false;
}

add_image_size( 'cf-featured-thumb', 320, 320, true );

function custom_excerpt_length( $length ) {
    return 80;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*
function new_excerpt_more( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) .
      '">' . __('Read More...', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
 */

/* From:
 * https://www.smashingmagazine.com/2015/04/building-custom-wordpress-archive-page/
 * Enable this new archives-page-functions.php file by adding this line at the
 * very end of the current theme’s functions.php file.
 */
//require get_template_directory() . '/archives-page-functions.php';
//This goofs up  the widget area
//require 'archives-page-functions.php';
?>
