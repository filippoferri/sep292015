<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('padleft'); ?>>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer class="entry-footer">
      <span class="author hidden-lg"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"><i class="fi fi-pencil"></i> <?php echo get_the_author(); ?></a></span>
      <?php wp_link_pages(array('before' => '<div class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></div>')); ?>
    <div class="entry-newsletter" data-animated="fadeInUp">
      <h4>Iscriviti all newsletter</h4>
      <p>Iscriviti per ricevere aggiornamenti, novita' e iniziative direttamente nella tua casella di posta. </p>
     <?php gravity_form(1, false, false, false, '', true, false); ?>
    </div>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
