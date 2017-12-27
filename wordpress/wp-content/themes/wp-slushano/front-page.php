<?php /* Template Name: Home Page */ get_header(); ?>

  <div class="left-content">
    <div class="welcome-block styled-block">
      <div class="text-in">
        <?php the_field('seo_description'); ?>
      </div>
    </div>

    <?php $adrotate = adrotate_group(1); if (strpos($adrotate, 'Error') == false  ) { ?>
      <div class="styled-block">
        <?php echo $adrotate; ?>
      </div>
    <?php } ?>

    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class('styled-block'); ?>>
        <div class="content">
          <div class="article-body" itemprop="articleBody">
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
