<?php if( !is_single() ) { ?>
<footer class="content-info" role="contentinfo">
  <div class="container">
    <div class="row">
      <?php dynamic_sidebar( 'sidebar-footer'); ?>
    </div>
  </div>

  <!-- CONTAINER -->
  <div class="bottom container clearfix">
   <div class="row">
      <!-- COPYRIGHT -->
      <div class="brand col-lg-4">
         <a class="copyright_logo" href="<?php bloginfo('url'); ?>" alt=""><span class="fi fi-logo"></span><?php bloginfo( 'name'); ?> </a>
      </div>
      <!-- //COPYRIGHT -->
      <!-- BRAND -->
      <div class="copyright col-lg-8">
          <?php
          $copy = get_theme_mod( 'copy' );
          echo comicpress_copyright();
          if ($copy) { echo $copy; } else {  echo ' Tutti i diritti riservati'; } ?>
      </div>
      <!-- //BRAND -->
    </div>
  </div>
  <!-- //CONTAINER -->

</footer>
<?php } ?>

<?php wp_footer(); ?>
