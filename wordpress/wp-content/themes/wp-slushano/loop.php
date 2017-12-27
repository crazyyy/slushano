<?php if (have_posts()): while (have_posts()) : the_post(); ?>

  <li id="post-<?php the_ID(); ?>" <?php post_class('item styled-block'); ?> data-post-id="<?php the_ID(); ?>">
    <div class="top">
      <a class="post-link" href="<?php the_permalink(); ?>" rel="nofollow"><?php the_title(); ?></a>
      <span class="date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' назад'; ?></span>
    </div>
    <div class="content">
      <div class="text-in">
        <?php wpeExcerpt('wpeExcerpt40'); ?>
        <div class="twoe_vk_gp_images_galery items1">
          <div class="twoe_vk_gp_images_galery_item item_1">
            <div class="twoe_vk_gp_images_galery_item_in">
              <a rel="nofollow" class="feature-img" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php if ( has_post_thumbnail()) { ?>
                  <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                <?php } else { ?>
                  <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                <?php } ?>
              </a><!-- /post thumbnail -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="post-bottom">

      <?php echo getPostLikeLink(get_the_ID());?>

      <a class="comments" href="<?php the_permalink(); ?>/#post-comments"> <i class="fa icon"></i> <span class="title hide-on-mobile">Комментарии</span> <span class="title title-m show-on-mobile">Коммент.</span> <span class="number"><?php comments_number( '0', '1', '%' ); ?></span> </a>

      <a class="more" href="<?php the_permalink(); ?>"> <i class="fa icon"></i> <span class="title hide-on-mobile">Подробнее</span> <span class="title title-m show-on-mobile">Подробнее</span> </a>

    </div>
  </li>

<?php endwhile; endif; ?>
