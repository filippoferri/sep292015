<?php
//variables
$details  = rwmb_meta( 'author', 'type=post', $post->ID );
$autore   = get_post_meta($post->ID, "autore", true);
?>
<p class="byline author vcard">
<?php
if ($details) {
  $args = array(
    'post_type'  => 'authors',
	  'p' => $details,
  );
   $the_query = new WP_Query( $args );

    // The Loop
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
      $img_id   = get_post_thumbnail_id();
      $profile = wp_get_attachment_image_src( $img_id, 'thumbnail' );
      echo '<img class="img-circle lazy" data-src="'.$profile[0].'" width="100%"><br>';
  ?>
    <a class="leave" href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
      <?php  }
    } else {
      echo $autore;
    }
    /* Restore original Post Data */
    wp_reset_postdata();
}
?>
</p>
<time class="published" datetime="<?php echo get_the_time('c'); ?>">
  <span><?php echo __('Pubblicato il:', 'roots') ?></span><br>
  <?php echo get_the_date(); ?>
</time>
<div class="entry-category">
  <?php the_category(' '); ?>
</div>
<div class="entry-sharing">
  <h5>Condividi</h5>
  <!-- Facebook -->
  <a class="social facebook-share" href="#" title="<?php echo __('Condividi', 'roots') ?>"> <i class="fi fi-facebook"></i></a>
  <!-- Twitter -->
  <a class="social twitter-share" href="#" title="<?php echo __('Condividi', 'roots') ?>"> <i class='fi fi-twitter'></i></a>
  <!-- Google -->
  <a class="social google-plus-share" href="#" title="<?php echo __('Condividi', 'roots') ?>"> <i class='fi fi-googleplus'></i></a>
</div>
