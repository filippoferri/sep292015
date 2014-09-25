<header class="banner navbar navbar-custom navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
        <span class="fi fi-logo"></span>
        <?php bloginfo( 'name'); ?>
      </a>
    </div>

    <nav class="collapse navbar-collapse navbar-right" role="navigation">
      <?php if (has_nav_menu( 'primary_navigation')) : wp_nav_menu(array( 'theme_location'=>'primary_navigation', 'menu_class' => 'nav navbar-nav')); endif; ?>
      <form role="search" method="get" class="search-form form-inline hidden-lg" action="<?php echo esc_url(home_url('/')); ?>">
        <input type="search" value="<?php echo get_search_query(); ?>" name="s" class="search-field form-control" placeholder="<?php _e('Cerca', 'roots'); ?>">
      </form>
      <span class="fi fi-search search-open navbar-text navbar-right visible-lg-inline-block"></span>
    </nav>
  </div>
</header>

