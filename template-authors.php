<?php
/*
Template Name:  Autori
*/
?>
<div class="wrap container padtop padbot" role="document">

  <div class="row">
    <div class="col-lg-12">
      <?php get_template_part( 'templates/page', 'header'); ?>
    </div>
  </div>

  <div class="content row">
      <div class="col-lg-8 col-lg-offset-2">
        <ul class="authors-list">
        <?php
        $args = array(
            'post_type'           => 'authors',
            'order'               => 'title',
            'ignore_sticky_posts' => 1,
            'posts_per_page'      => -1,
        );
        $the_query = new WP_Query( $args );

        // The Loop
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post();

          //Variables
          $auth_desc = get_post_meta($post->ID, "auth_desc", true);
          $img_id    = get_post_thumbnail_id();
          $img       = wp_get_attachment_image_src( $img_id, 'archive-thumb' );
          ?>
          <li>
          <?php
          if ( has_post_thumbnail() ) {
            echo '<img class="img-circle lazy alignleft" data-src="'.$img[0].'" width="100">';
          }
          ?>
            <a class="leave" href="<?php the_permalink()?>" alt="<?php echo get_the_title() ?>"><?php echo get_the_title() ?></a>
          <p><?php echo $auth_desc ?></p>
            <a href="<?php the_permalink()?>" alt="<?php echo get_the_title() ?>" class="leave"><span class="fi fi-forward"></span></a>
          </li>
        <?php  }
        } else {
            // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>
        </ul>
      </div>
  </div>


</div>

