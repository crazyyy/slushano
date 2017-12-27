<?php get_header(); ?>

  <div class="left-content">
    <div class="single-city-desc styled-block no-padding">
      <div class="top">
        <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
      </div>

      <div class="content">
        <div class="page-title">
          <h1>По запросу "<?php echo get_search_query(); ?>" найдено <?php echo sprintf( '%s ', $wp_query->found_posts ); ?> результатов</h1>
        </div>
      </div>
    </div>

    <?php $adrotate = adrotate_group(1); if (strpos($adrotate, 'Error') == false  ) { ?>
      <div class="styled-block">
        <?php echo $adrotate; ?>
      </div>
    <?php } ?>

    <div class="posts-list">
      <ul class="items-list">
        <?php get_template_part('loop'); ?>
      </ul>

      <?php get_template_part('pagination'); ?>

    </div>
  </div>

  <?php get_sidebar(); ?>
<?php get_footer(); ?>
