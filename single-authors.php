<?php
//variables
$img_id   = get_post_thumbnail_id();
$profile = wp_get_attachment_image_src( $img_id, 'thumbnail' );
?>

 <div class="container">
  <div class="row padtop padbot">
    <div class="col-lg-8 col-lg-offset-2">

      <?php
      if ( has_post_thumbnail() ) {
        echo '<div class="profile-img">';
        echo '<img class="img-responsive lazy img-circle" data-src="'.$profile[0].'" width="200" height="200">';
        echo '</div>';
      }
      ?>
      <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part( 'templates/page', 'header'); ?>
      <?php get_template_part( 'templates/content', 'page'); ?>
      <?php endwhile; ?>

      <h3 class="title"><span></span>Leggi i suoi articoli su Filobus66<span></span></h3>

      <?php
      $args = array(
          'post_type'            => 'post',
          'order'                => 'DESC',
          'ignore_sticky_posts'  => 1,
          'posts_per_page'       => -1,
          'meta_key'             => 'author',
          'meta_value'           =>  $post->ID,
      );
      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {
          echo '<ul class="article-list">';
          while ( $the_query->have_posts() ) {
            $the_query->the_post();
            echo '<li>';
            echo '<a class="leave" href="'.get_permalink().'" alt="">' . get_the_title() . '</a>';
            echo '<a class="leave" href="'.get_permalink().'" alt="">';
            echo '<span class="pull-right"><span class="fi fi-book2"> Leggi</span></span>';
            echo '</a>';
            echo '</li>';
          }
          echo '</ul>';
      } else {
          // no posts found
      }
      /* Restore original Post Data */
      wp_reset_postdata();
      ?>

    </div>
  </div>
</div>

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

<?php wp_footer(); ?>
