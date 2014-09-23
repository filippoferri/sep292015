<article <?php post_class( 'element col-lg-4'); ?>>
  <div class="entry-item">
   <div class="featured-img">
     <img class="lazy img-responsive" data-src="http://lorempixel.com/600/500/nature" alt="" width="100%">
   </div>
    <header>
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php // get_template_part( 'templates/entry-meta'); ?>
    </header>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div>
  </div>
</article>

