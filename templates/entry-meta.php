<?php
//variables
$profiles = rwmb_meta( 'immagine', 'type=image&size=thumbnail', $post->ID );
?>
<p class="byline author vcard">
<?php foreach ( $profiles as $profile ) {
  echo '<img class="img-circle lazy" data-src="{$profile["url"]}" width="100%">';
} ?>

 <br>
  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn">
    <?php echo get_the_author(); ?>
  </a>
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
