<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->


  <div id="preloader"> <!-- Preloader -->
    <div id="status" data-animated="fadeIn">
      <?php
        if ( is_front_page() ){ ?>
          <h4><span class="fi fi-bookmarks"></span> <?php bloginfo('name'); ?></h4>
          <h5><?php bloginfo('description'); ?></h5>
        <?php } else { ?>
          <h4>Buona lettura</h4>
      <?php } ?>

      <div id="loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div> <!-- //Preloader -->

  <?php
    if ( is_front_page() ){
      do_action('get_header');
      get_template_part('templates/header', 'home');
    } else {
      do_action('get_header');
      get_template_part('templates/header');
    }
  ?>
  <?php if ( !is_front_page() ) { ?>
  <div class="wrap container" role="document">
    <div class="content row">
      <main class="main" role="main">
  <?php } ?>
        <?php include roots_template_path(); ?>
  <?php if ( !is_front_page() ) { ?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->
  <?php } ?>

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
