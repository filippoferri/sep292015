<?php
//variables
$titolo   = get_post_meta($post->ID, "titolo", true);
$autore   = get_post_meta($post->ID, "autore", true);
$desc     = get_post_meta($post->ID, 'descrizione', true);
$img_id   = get_post_thumbnail_id();
$image_attributes = wp_get_attachment_image_src( $img_id, 'archive-thumb' );
?>


 <article <?php post_class( 'element col-lg-4'); ?>>
  <div class="entry-item">
   <div class="featured-img">
      <?php
      if ( has_post_thumbnail() ) {
        echo '<img class="img-responsive lazy" data-src="'.$image_attributes[0].'" width="100%">';
      }
      ?>
   </div>
    <header>
      <h2 class="entry-title"><a class="leave" href="<?php the_permalink(); ?>"><?php if ($titolo) { echo $titolo; } else { the_title(); } ?></a></h2>
      <?php // get_template_part( 'templates/entry-meta'); ?>
    </header>
    <div class="entry-summary">
      <?php if ($desc) { echo $desc; } else { the_excerpt(); } ?>

      <?php if ($autore) { ?>
        <span class="cat-author"><?php echo $autore ?></span>
      <?php } ?>
    </div>
  </div>
</article>

