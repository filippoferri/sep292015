  <?php if ( is_category() || is_page() ) { ?>
  <div class="wrap container" role="document">
    <div class="content row">
      <main class="main" role="main">
  <?php } else {} ?>
        <?php include roots_template_path(); ?>
  <?php if ( is_category() || is_page() ) { ?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->
  <?php } else {} ?>
