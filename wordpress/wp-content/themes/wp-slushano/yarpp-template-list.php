<?php
/*
YARPP Template: List
Description: This template returns the related posts as a comma-separated list.
Author: mitcho (Michael Yoshitaka Erlewine)
*/
?>
  <div class="related-posts styled-block">
    <div class="title">Похожие записи</div>
    <ul>

      <?php if (have_posts()): $postsArray = array(); while (have_posts()) : the_post(); ?>
        <li>
          <a href="<?php echo get_permalink(); ?>">
            <div class="name"><?php echo get_the_title(); ?></div>
            <div class="for"><?php wpeExcerpt('wpeExcerpt20'); ?></div>
          </a>
        </li>
      <?php endwhile; ?>

    </ul>
  </div>
<?php else: ?>
  <p>No related posts.</p>
<?php endif; ?>


