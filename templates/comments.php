<?php
  if (post_password_required()) {
    return;
  }
?>

<section id="comments" data-animated="fadeInUp">
  <?php if (have_comments()) : ?>
    <h4>Unisciti alla conversazione</h4>
    <h5><?php printf(_n('1 commento', '%1$s commenti', get_comments_number(), 'roots'), number_format_i18n(get_comments_number()), get_the_title()); ?></h5>

    <ol class="media-list">
      <?php wp_list_comments(array('walker' => new Roots_Walker_Comment)); ?>
    </ol>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
      <nav>
        <ul class="pager">
          <?php if (get_previous_comments_link()) : ?>
            <li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'roots')); ?></li>
          <?php endif; ?>
          <?php if (get_next_comments_link()) : ?>
            <li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'roots')); ?></li>
          <?php endif; ?>
        </ul>
      </nav>
    <?php endif; ?>

    <?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
      <div class="alert alert-warning">
        <?php _e('La discussione e" chiusa.', 'roots'); ?>
      </div>
    <?php endif; ?>
  <?php elseif(!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
    <div class="alert alert-warning">
      <?php _e('La discussione e" chiusa.', 'roots'); ?>
    </div>
  <?php endif; ?>
</section><!-- /#comments -->

<section id="respond" data-animated="fadeInUp">
  <?php if (comments_open()) : ?>
    <h4><?php comment_form_title(__('Lascia un commento', 'roots'), __('Lascia un commento a %s', 'roots')); ?></h4>
    <p class="cancel-comment-reply text-center"><?php cancel_comment_reply_link(); ?></p>
    <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
      <p><?php printf(__('Devi essere <a href="%s">registrato</a> per lasciare un commento.', 'roots'), wp_login_url(get_permalink())); ?></p>
    <?php else : ?>
      <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <?php if (is_user_logged_in()) : ?>
          <p class="text-center">
            <?php printf(__('Registrato come <a href="%s/wp-admin/profile.php">%s</a>.', 'roots'), get_option('siteurl'), $user_identity); ?>
            <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Esci dall\'account', 'roots'); ?>"><?php _e('Esci &raquo;', 'roots'); ?></a>
          </p>
        <?php else : ?>
          <div class="form-group">
            <input type="text" class="form-control pull-left simplebox" name="author" id="author" placeholder="<?php _e('Nome', 'roots'); if ($req) _e('*', 'roots'); ?>" value="<?php echo esc_attr($comment_author); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>

            <input type="email" class="form-control pull-center simplebox" name="email" id="email" placeholder="<?php _e('Email', 'roots'); if ($req) _e('*', 'roots'); ?>" value="<?php echo esc_attr($comment_author_email); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>

            <input type="url" class="form-control pull-right simplebox" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" placeholder="<?php _e('Website', 'roots'); ?>">
          </div>
        <?php endif; ?>
        <div class="form-group">
          <textarea name="comment" id="comment" class="form-control simplebox" rows="5" aria-required="true" placeholder="<?php _e('Commento', 'roots'); ?>"></textarea>
        </div>
        <p class="text-center"><button name="submit" class="btn btn-primary" type="submit" id="submit"><i class='fi fi-comment'></i> <?php _e('Invia il commento', 'roots'); ?></button></p>
        <?php comment_id_fields(); ?>
        <?php do_action('comment_form', $post->ID); ?>
      </form>
    <?php endif; ?>
  <?php endif; ?>
</section><!-- /#respond -->
