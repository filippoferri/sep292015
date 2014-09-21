<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('padleft'); ?>>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <div class="entry-newsletter">
      <h4>Iscriviti all newsletter</h4>
      <p>Iscriviti per ricevere aggiornamenti, novita' e iniziative direttamente nella tua casella di posta. </p>
     <?php gravity_form(1, false, false, false, '', true, false); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<div class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></div>')); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
