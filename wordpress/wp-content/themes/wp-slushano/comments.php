<div class="post-comments styled-block" id="post-comments">


  <?php if (post_password_required()) : ?>
    <p><?php _e( 'Post is password protected. Enter the password to view any comments.', 'wpeasy' ); ?></p>
  <?php return; endif; ?>

  <?php if (have_comments()) : ?>

    <h3 id="comments"><?php comments_number(); ?></h3>
    <ol class="commentlist">
      <?php wp_list_comments('type=comment&callback=html5blankcomments'); // Custom callback in functions.php ?>
    </ol>

  <?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

    <p><?php _e( 'Comments are closed here.', 'wpeasy' ); ?></p>

  <?php endif; ?>

  <?php comment_form(); ?>

</div><!-- comments -->
