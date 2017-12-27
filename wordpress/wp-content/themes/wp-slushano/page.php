<?php get_header(); ?>

  <div class="left-content">
    <div class="reklama ads ads-1 styled-block"></div>

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

        <div class="content">
          <span itemprop="name"><?php the_author(); ?></span>
          <div class="article-body" itemprop="articleBody">
            <div class="page-title" itemprop="headline">
              <h1><?php the_title(); ?></h1>
            </div>
            <div class="post-date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' назад'; ?></div>
            <div class="text-in">
              <?php the_content(); ?>
              <?php edit_post_link(); ?>
            </div>
          </div>
        </div>

      </div>
    <?php endwhile; endif; ?>

  </div>

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
