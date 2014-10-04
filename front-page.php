<!-- Recensioni -->
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
              'category__in'        => 8
      );

      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {
          while ( $the_query->have_posts() ) {
            $the_query->the_post();
			$rec_titolo       = get_post_meta($post->ID, "titolo", true);
			$rec_autore       = get_post_meta($post->ID, "autore", true);
			$rec_desc         = get_post_meta($post->ID, 'descrizione', true);
			$rec_frontespizi  = rwmb_meta( 'frontespizio', 'type=image_advanced&size=intro-cover', $post->ID );
		  	?>
             <div class="intro_item">
                <div class="col-sm-3 col-sm-offset-2">
                  <div class="img-wrap-a">
                    <span></span><a class="zoom" href="<?php the_permalink() ?>"></a>
                    <?php foreach ( $rec_frontespizi as $rec_frontespizio ) {
                    echo '<img class="img-responsive" data-lazy="'.$rec_frontespizio["url"].'" width="400" height="600">';
              } ?>
                  </div>
                </div>
                <div class="col-sm-5">
                  <h1>Recensione</h1>
                  <h2><?php echo $rec_titolo ?></h2>
                  <p><?php if ($rec_desc) { echo $rec_desc; } else { the_excerpt(); } ?></p>
                  <a href="<?php the_permalink() ?>" class="btn btn-border leave"><span class="fi fi-book2"></span> Leggi la recensione</a>
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
<!-- //Recensioni -->
<h3 class="title"><?php echo get_theme_mod( 'title1' ); ?></h3>

<!-- Un diario Verde -->
<section class="box">
  <div class="container">

      <div class="slide_carousel" data-animated="fadeIn">

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
                $the_query->the_post();
				$green_titolo   = get_post_meta($post->ID, "titolo", true);
				$green_img_id   = get_post_thumbnail_id($post->ID);
				$green_featured = wp_get_attachment_image_src( $green_img_id, 'homepage-thumb' );
		  ?>
        <div class="carousel_intro"><div class="img-wrap"><img class="lazy" data-lazy="<?php echo $green_featured[0] ?>" width="400"><span></span><a class="zoom" href="<?php the_permalink() ?>"></a></div><span class="c-title"><a class="leave" href="<?php the_permalink() ?>" alt="<?php echo $green_titolo ?>"><?php echo $green_titolo ?></a></span></div>
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
<!-- //Un diario Verde -->

<h3 class="title"><?php echo get_theme_mod( 'title2' ); ?></h3>

<!-- La Casa di Vetro -->
<section class="box">
  <div class="container">
    <div class="row">

      <?php
      $args = array(
          'post_type'               => 'post',
          'order'                   => 'DESC',
              'ignore_sticky_posts' => 1,
              'posts_per_page'      => 4,
              'category__in'        => 3
      );

      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {
          while ( $the_query->have_posts() ) {
            $the_query->the_post();
			$glass_titolo       = get_post_meta($post->ID, "titolo", true);
			$glass_autore       = get_post_meta($post->ID, "autore", true);
		?>
      <div class="col-lg-3 col-sm-6">
        <a class="b-wrapper leave" href="<?php the_permalink() ?>" data-animated="fadeIn">
          <div class="b-wrap fix-height">
            <span class="b-title"><?php echo $glass_titolo ?></span>
            <span class="b-author"><?php echo $glass_autore ?></span>
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
<!-- //La Casa di Vetro -->

<!-- L'arte di leggere e di non leggere -->
<section class="box full-width">
  <div class="container">
    <div class="row d-content">
      <h3 class="title white"><?php echo get_theme_mod( 'title3' ); ?></h3>
      <?php
      $args = array(
          'post_type'               => 'post',
          'order'                   => 'DESC',
              'ignore_sticky_posts' => 1,
              'posts_per_page'      => 3,
              'category__in'        => 11
      );

      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {
          while ( $the_query->have_posts() ) {
            $the_query->the_post();
			$read_titolo       = get_post_meta($post->ID, "titolo", true);
			$read_desc         = get_post_meta($post->ID, 'descrizione', true);
		?>
      <div class="col-lg-4">
        <div class="boxed" data-animated="fadeIn">
          <div class="fix-height">
            <h4><?php echo $read_titolo ?></h4>
            <p><?php if ($read_desc) { echo $read_desc; } else { the_excerpt(); } ?></p>
		  </div>
          <div><a class="btn btn-empty leave" href="<?php the_permalink() ?>"><span class="fi fi-book2"></span></a></div>
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
<!-- //L'arte di leggere e di non leggere -->

<!-- Amazon -->
<section class="box">
  <div class="container">
    <div class="row">

      <?php
      $args = array(
          'post_type'               => 'amazon',
          'order'                   => 'DESC',
              'ignore_sticky_posts' => 1,
              'posts_per_page'      => 4,
      );

      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {
          while ( $the_query->have_posts() ) {
              $the_query->the_post();
				//variables
				$amz_titolo   = get_post_meta($post->ID, "amz_title", true);
				$amz_autore   = get_post_meta($post->ID, "amz_author", true);
				$amz_url      = get_post_meta($post->ID, "amz_url", true);
				$amz_imgs     = rwmb_meta( 'amz_cover', 'type=image_advanced&size=amz-cover', $post->ID );
		?>
      <div class="col-lg-3 col-sm-6">
        <div class="product_item" data-animated="fadeIn">
            <div class="hover_img">
            <?php
            foreach ( $amz_imgs as $amz_img ) {
                echo '<img class="lazy" data-src="'.$amz_img["url"].'" alt="" width="100%" />';
            }
            ?>
            </div>
            <div class="item_btn_in center">
              <a class="tovar_open leave" href="<?php echo $amz_url ?>" alt="<?php echo $amz_titolo ?>" target="_blank">Scopri su Amazon</a>
            </div>
            <div class="project_descr">
                <a href="#" alt=""><?php echo $amz_autore ?></a>
                <span class="title"><?php echo $amz_titolo ?></span>
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
</section>
<!-- //Amazon -->
