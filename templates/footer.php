<?php if ( ! is_single() ) { ?>
 <footer class="content-info" role="contentinfo">
  <div class="container">
    <div class="row">
      <?php dynamic_sidebar( 'sidebar-footer'); ?>
    </div>
  </div>
  <!-- COPYRIGHT -->
  <div class="copyright">

    <!-- CONTAINER -->
    <div class="container clearfix">
      <a class="copyright_logo" href="javascript:void(0);">Freedom</a>  <span> &copy; Copyright 2020</span>
    </div>
    <!-- //CONTAINER -->
  </div>
  <!-- //COPYRIGHT -->
</footer>
<?php } ?>

<?php wp_footer(); ?>
