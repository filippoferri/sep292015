<?php
//variables
$titolo       = get_post_meta($post->ID, "titolo", true);
$autore       = get_post_meta($post->ID, "autore", true);
$desc         = get_post_meta($post->ID, 'descrizione', true);
$frontespizi  = rwmb_meta( 'frontespizio', 'type=image&size=intro-cover', $post->ID );
$amz_titolo   = get_post_meta($post->ID, "amz_titolo", true);
$amz_autore   = get_post_meta($post->ID, "amz_autore", true);
$amz_url      = get_post_meta($post->ID, "amz_url", true);
$amz_imgs     = rwmb_meta( 'amz_cover', 'type=image&size=amz-cover', $post->ID );
?>


<!-- Intro Header -->
<section class="intro">
  <div class="intro-body">

    <div class="container">
      <div class="row review">
      <div class="slide_intro">

      <?php
      $args = array(
          'post_type'               => 'post',
          'order'                   => 'DESC',
              'ignore_sticky_posts' => 1,
              'posts_per_page'      => 4,
              'category__in'        => 51
      );

      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {
          while ( $the_query->have_posts() ) {
              $the_query->the_post(); ?>
             <div class="intro_item" data-animated="fadeIn">
                <div class="col-lg-3 col-lg-offset-1">
                  <div class="img-wrap-a">
                    <span></span><a class="zoom" href="<?php the_permalink() ?>"></a>
                    <?php foreach ( $frontespizi as $frontespizio ) {
                    echo '<img class="img-responsive" data-lazy="{$frontespizio["url"]}" width="400" height="600">';
              } ?>
                  </div>
                </div>
                <div class="col-lg-7">
                  <h1>Recensione di <?php echo $autore ?></h1>
                  <h2><?php echo $titolo ?></h2>
                  <p><?php if ($desc) { echo $desc; } else { the_excerpt(); } ?></p>
                  <a href="<?php the_permalink() ?>" class="btn btn-border"><span class="fi fi-book2"></span> Leggi la recensione</a>
                </div>
              </div>
      <?php   }
      } else {
          // no posts found
      }
      /* Restore original Post Data */
      wp_reset_postdata();
      ?>
      </div>
      </div>
    </div>

  </div>
</section>

<h3 class="title"><span></span>Un diario verde<span></span></h3>

<section class="box">
  <div class="container">

      <div class="slide_carousel" data-animated="fadeInUp">

      <?php
        $args = array(
            'post_type'               => 'post',
            'order'                   => 'DESC',
                'ignore_sticky_posts' => 1,
                'posts_per_page'      => 4,
                'category__in'        => 66
        );

        $the_query = new WP_Query( $args );

        // The Loop
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
                $the_query->the_post(); ?>
        <div class="carousel_intro"><div class="img-wrap"><img data-lazy="<?php wp_get_attachment_image( 1, 'homepage-thumb', null, null ); ?>" alt=""><span></span><a class="zoom" href="<?php the_permalink() ?>"></a></div><span class="c-title"><a href="<?php the_permalink() ?>" alt="<?php echo $titolo ?>"><?php echo $titolo ?></a></span></div>
        <?php   }
        } else {
            // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        ?>

      </div> <!-- // End Carousel -->

  </div> <!-- // End Container -->

</section>

<h3 class="title"><span></span>La casa di vetro<span></span></h3>

<section class="box">
  <div class="container">
    <div class="row">

      <?php
      $args = array(
          'post_type'               => 'post',
          'order'                   => 'DESC',
              'ignore_sticky_posts' => 1,
              'posts_per_page'      => 4,
              'category__in'        => 4
      );

      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {
          while ( $the_query->have_posts() ) {
              $the_query->the_post(); ?>
      <div class="col-lg-3">
        <a class="b-wrapper" href="<?php the_permalink() ?>" data-animated="fadeInUp">
          <div class="b-wrap fix-height">
            <span class="b-title"><?php echo $titolo ?></span>
            <span class="b-author"><?php echo $autore ?></span>
          </div>
          <div class="b-read">leggi</div>
        </a>
      </div>
      <?php   }
      } else {
          // no posts found
      }
      /* Restore original Post Data */
      wp_reset_postdata();
      ?>

    </div>
  </div>
</section>

<section class="box full-width">
  <div class="container">
    <div class="row d-content">
      <h3 class="title white"><span></span>L'arte di leggere e di non leggere<span></span></h3>
      <?php
      $args = array(
          'post_type'               => 'post',
          'order'                   => 'DESC',
              'ignore_sticky_posts' => 1,
              'posts_per_page'      => 3,
              'category__in'        => 10
      );

      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {
          while ( $the_query->have_posts() ) {
              $the_query->the_post(); ?>
      <div class="col-lg-4">
        <div class="boxed" data-animated="fadeInUp">
          <h4><?php echo $titolo ?></h4>
          <p><?php if ($desc) { echo $desc; } else { the_excerpt(); } ?></p>
          <div><a class="btn btn-empty" href="#"><span class="fi fi-book2"></span> Leggi</a></div>
        </div>
      </div>
      <?php   }
      } else {
          // no posts found
      }
      /* Restore original Post Data */
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>

<h3 class="title"><span></span>Buona Lettura<span></span></h3>

<div class="box">
  <div class="container">
    <div class="row">

      <?php
      $args = array(
          'post_type'               => 'amazon',
          'order'                   => 'DESC',
              'ignore_sticky_posts' => 1,
              'posts_per_page'      => 3,
      );

      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {
          while ( $the_query->have_posts() ) {
              $the_query->the_post(); ?>
      <div class="col-lg-3">
        <div class="product_item" data-animated="fadeInUp">
            <div class="hover_img">
            <?php
            foreach ( $amz_imgs as $amz_img ) {
                echo '<img class="lazy" data-src="{$image["url"]}" alt="" width="100%" />';
            }
            ?>
            </div>
            <div class="item_btn_in center">
              <a class="tovar_open" href="<?php echo $amz_url ?>" alt="<?php echo $amz_title ?>" target="_blank">Scopri su Amazon</a>
            </div>
            <div class="project_descr">
                <a href="#" alt=""><?php echo $amz_author ?></a>
                <span class="title"><?php echo $amz_title ?></span>
            </div>
        </div>
      </div>
      <?php   }
      } else {
          // no posts found
      }
      /* Restore original Post Data */
      wp_reset_postdata();
      ?>
    </div>
  </div>
</div>
