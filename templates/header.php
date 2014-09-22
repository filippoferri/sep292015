<header class="banner navbar navbar-pages navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <span class="fi fi-search navbar-text search-open btn btn-primary hidden-lg"></span>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
      <span class="fi fi-bookmarks"></span> <?php bloginfo('name'); ?>
      </a>
    </div>

    <nav class="collapse navbar-collapse navbar-right" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
      <span class="fi fi-search search-open navbar-text navbar-right visible-lg-inline-block"></span>
    </nav>
  </div>
</header>
