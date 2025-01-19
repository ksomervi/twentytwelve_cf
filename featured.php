<?php
  /**^M
   * The template for featured content^M
   *^M
   **/
?>
<div class="featured-post clearfix">  
    <div class="post-entry">  
        <h3 class="post-title"><a href="<?php the_permalink(); ?>"
        title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>  
    <figure class="post-thumbnail">  
        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail('cf-featured-thumb'); } ?>  
    </figure>  
        <?php the_excerpt(); ?>  
    </div>  
</div> 
