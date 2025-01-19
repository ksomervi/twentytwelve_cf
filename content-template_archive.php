<?php
/**
 * The template for displaying archive content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-wrapper">
		<header class="entry-header">
      <div class="entry-excerpt">


		<div class="entry-content">
      <?php  the_content(); ?>

<?php /* Enabling the widget areas for the archive page. */ ?>
<?php if(is_active_sidebar('archives-left')) dynamic_sidebar('archives-left'); ?>
<?php if(is_active_sidebar('archives-right')) dynamic_sidebar('archives-right'); ?>
<div style="clear: both; margin-bottom: 30px;"></div><!-- clears the floating -->

<?php
/* Taxonomy
  global $wp_query;
  $taxonomy = $wp_query->query_vars['category'];
  $term = $wp_query->query_vars['testing'];
  $term_id = get_term_by( 'slug', $term, $taxonomy );
  $term_id = $term_id->term_id;
  $terms = get_term_children( $term_id, $taxonomy );
  if ( !empty( $terms ) ) {
    $terms = get_terms( $taxonomy, array( 'child_of' => $term_id ) );
    echo '<ul class="child-term-list">';
    foreach ( $terms as $term ) {
      echo '<li><a href="'.$term->term_id.'">'.$term->name.'</a></li>';
    }
    echo '</ul>';
  }
 */
?>

<?php
  $how_many_last_posts = intval(get_post_meta($post->ID, 'archived-posts-no', true));

/* Here, we're making sure that the number fetched is reasonable. In case it's
 * higher than 200 or lower than 2, we're just resetting it to the default
 * value of 15. */
if($how_many_last_posts > 200 || $how_many_last_posts < 2) {
  $how_many_last_posts = 7;
}

$my_query = new WP_Query('post_type=post&nopaging=1');
if($my_query->have_posts()) {
  echo '<h1 class="widget-title">Last '.$how_many_last_posts.' Posts <i class="fa fa-bullhorn" style="vertical-align: baseline;"></i></h1>&nbsp;';
  echo '<div class="archives-latest-section"><ol>';
  $counter = 1;
  while($my_query->have_posts() && $counter <= $how_many_last_posts) {
    $my_query->the_post(); 
?>
  <li><a href="<?php the_permalink() ?>" rel="bookmark"
         title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
    <?php
    $counter++;
  }//end while()
  echo '</ol></div>';
  wp_reset_postdata();
}
?>


  <h1 class="widget-title">Cottage Fix Authors<i class="fa fa-user"
style="vertical-align: baseline;"></i></h1>&nbsp;
  <div class="archives-authors-section">
    <ul>
      <?php wp_list_authors('exclude_admin=1&optioncount=1'); ?>
    </ul>
  </div>

  <h1 class="widget-title">By Month <i class="fa fa-calendar"
style="vertical-align: baseline;"></i></h1>&nbsp;
  <div class="archives-by-month-section">
    <p><?php wp_get_archives('type=monthly&format=custom&after= |'); ?></p>
  </div>



		</div><!-- .entry-content -->
</div> <!-- .entry-excerpt -->
		</header><!-- .entry-header -->

		<footer class="entry-meta">
			<?php twentytwelve_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php
						/** This filter is documented in author.php */
						$author_bio_avatar_size = apply_filters( 'twentytwelve_author_bio_avatar_size', 68 );
						echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
						?>
					</div><!-- .author-avatar -->
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
							</a>
						</div><!-- .author-link	-->
					</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
    </footer><!-- .entry-meta -->
</div> <!-- .entry-wrapper -->
	</article><!-- #post -->
