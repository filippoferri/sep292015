<?php echo get_avatar($comment, $size='64' ); ?>
<div class="media-body">
 <header class="media-heading">
  <span><?php echo get_comment_author_link(); ?></span>
  <time datetime="<?php echo get_comment_date('c'); ?>">
    <?php printf(__( '%1$s', 'roots'), get_comment_date(), get_comment_time()); ?>
  </time>
</header>

  <?php if ($comment->comment_approved == '0') : ?>
  <div class="alert alert-info">
    <?php _e( 'Your comment is awaiting moderation.', 'roots'); ?>
  </div>
  <?php endif; ?>

  <?php comment_text(); ?>


  <div class="media-right">
<?php comment_reply_link(array( 'reply_text' => '<span class="fi fi-reply"></span> Rispondi', 'depth'=>$depth, 'max_depth' => $args['max_depth'])); ?><?php edit_comment_link(__( ' | <span class="fi fi-pencil"></span> Modifica', 'roots'), '', ''); ?>
  </div>
