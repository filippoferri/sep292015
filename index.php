<div class="wrap container" role="document">

      <div class="row pad150">
        <div class="col-lg-12">
          <?php get_template_part( 'templates/page', 'header'); ?>
        </div>
      </div>

      <div class="content row">
        <main class="main" role="main">

          <?php if (!have_posts()) : ?>
          <div class="alert alert-warning">
            <?php _e( 'Sorry, no results were found.', 'roots'); ?>
          </div>
          <?php get_search_form(); ?>
          <?php endif; ?>

          <div class="article_block">
            <?php
            while (have_posts()) : the_post(); ?>
            <?php get_template_part( 'templates/content', get_post_format()); ?>
            <?php
            endwhile; ?>
            </div>
        </main>
      </div>

        <div class="col-lg-12">

        <?php if ($wp_query->max_num_pages > 1) : ?>

        <div class="row">
          <div class="col-lg-12">
          <div class="pagination">
            <?php next_posts_link(__( '&larr; Visualizza altri articoli', 'roots')); ?>
          </div>
        </div>

        <?php endif; ?>

        </div>
      </div>

</div>

