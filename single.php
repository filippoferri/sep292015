<div class="container-fluid">
  <div class="row pad150">
    <div class="col-lg-8 col-lg-offset-3">
      <header class="entry-header padleft">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="entry-info hidden-lg">
          <span class="published" datetime="<?php echo get_the_time('c'); ?>"> <?php echo __('<i class="fi fi-calendar"></i>', 'roots') ?> <?php echo get_the_date(); ?></span> <span><i class="fi fi-archive"></i><?php the_category(' '); ?></span>
        </div>
      </header>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3 left visible-lg-block">
      <div class="left-img">
        <div class="entry-nav">
          <?php
            if(basename($_SERVER['PHP_SELF']) == 'index.php'){
              $url = " ";
            } else {
              $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
            }
            echo '<a class="btn btn-empty" href="'.$url.'">Indietro</a>';
          ?>
          <a class="zoom pull-right" href="#"><span class="fi fi-popup"></span></a>
        </div>
        <span class="overlay"></span>
        <img class="lazy" data-src="http://lorempixel.com/1000/1080/nature" alt="" width="1000" height="1000">

      </div>
    </div>
    <div class="col-lg-6 col-lg-offset-3">
      <?php get_template_part( 'templates/content', 'single'); ?>
    </div>
    <div class="col-lg-2">
      <div class="entry-meta ff-affix visible-lg-block">
        <?php get_template_part( 'templates/entry-meta'); ?>
      </div>
    </div>
  </div>
</div>


