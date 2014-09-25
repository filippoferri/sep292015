<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <!-- Preloader -->
  <div id="preloader">
         <!-- Searcher -->
      <div id="searcher">
        <span class="search-close">CHIUDI <i class="fi fi-cross"></i></span>
        <div class="search-box">
          <?php get_search_form(); ?>
        </div>
      </div>
      <!-- //Searcher -->
    <div id="status">
     <div id="msg-loading">
        <?php if ( is_front_page() ) { ?>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="">
            <h4><?php bloginfo('name'); ?></h4>
            <h5><?php bloginfo('description'); ?></h5>
        <?php } else if ( is_archive() || is_category() ) { ?>
            <h4>Archivio in preparazione</h4>
        <?php } else if ( is_404() ) { ?>
            <h4>Stiamo incontrando qualche problema...</h4>
        <?php } else { ?>
            <h4>Solo qualche istante...</h4>
        <?php } ?>
      </div>
      <div id="loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- //Preloader -->

  <!-- Header -->
  <?php
    if ( is_front_page() ){
      do_action('get_header');
      get_template_part('templates/header', 'home');
    } else {
      do_action('get_header');
      get_template_part('templates/header');
    }
  ?>
  <!-- //Header -->

  <?php include roots_template_path(); ?>

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
