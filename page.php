<div class="container">
  <div class="row padtop padbot">
    <div class="col-lg-8 col-lg-offset-2">

      <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part( 'templates/page', 'header'); ?>
      <?php get_template_part( 'templates/content', 'page'); ?>
      <?php endwhile; ?>

    </div>
  </div>
</div>

