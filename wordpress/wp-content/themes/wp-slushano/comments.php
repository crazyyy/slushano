  <?php if (post_password_required()) : ?>
    <div class="post-comments styled-block" id="post-comments">
      <p><?php _e( 'Post is password protected. Enter the password to view any comments.', 'wpeasy' ); ?></p>
    </div><!-- comments -->
  <?php return; endif; ?>

  <?php if (have_comments()) { ?>
    <div class="post-comments styled-block" id="post-comments">
      <h3 id="comments"><?php comments_number(); ?></h3>
      <ol class="commentlist">
        <?php wp_list_comments('type=comment&callback=html5blankcomments'); // Custom callback in functions.php ?>
      </ol>
      <?php comment_form(); ?>
    </div><!-- comments -->
  <?php } ?>
