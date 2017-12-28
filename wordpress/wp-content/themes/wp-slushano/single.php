<?php get_header(); ?>

  <div class="left-content">

    <?php $adrotate = adrotate_group(1); if (strpos($adrotate, 'Error') == false  ) { ?>
      <div class="styled-block">
        <?php echo $adrotate; ?>
      </div>
    <?php } ?>

    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class('info-block styled-block no-padding single-post'); ?>>

        <div class="top">
          <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
        </div>

        <div class="content" itemscope="" itemtype="http://schema.org/BlogPosting">
          <div class="article-body" itemprop="articleBody">

            <div class="page-title" itemprop="headline">
              <h1><?php the_title(); ?></h1></div>
            <div class="post-date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' назад'; ?></div>
            <div class="text-in">
              <?php the_content(); ?>
            </div>

          </div>

          <div class="post-tags">
            <?php the_tags( ' ', ' ', '<br>'); // Separated by commas with a line break at the end ?>
          </div>

        </div>

        <div class="post-bottom item" data-post-id="<?php the_ID(); ?>">
          <?php echo getPostLikeLink(get_the_ID()); ?>

          <a class="comments" href="#post-comments"> <i class="fa icon"></i> <span class="title hide-on-mobile">Комментарии</span> <span class="title title-m show-on-mobile">Коммент.</span> <span class="number"><?php comments_number( '0', '1', '%' ); ?></span> </a>

          <a class="more goback back-icon" href="#"> <i class="fa icon"></i> <span class="title hide-on-mobile">Вернуться назад</span> <span class="title title-m show-on-mobile">Назад</span> </a>
        </div>
      </div>
    <?php endwhile; endif; ?>

    <?php related_posts(); ?>

    <?php $adrotate = adrotate_group(1); if (strpos($adrotate, 'Error') == false  ) { ?>
      <div class="styled-block">
        <?php echo $adrotate; ?>
      </div>
    <?php } ?>

    <?php comments_template(); ?>

  </div>

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
