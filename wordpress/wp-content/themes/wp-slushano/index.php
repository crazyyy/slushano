<?php get_header(); ?>

  <div class="left-content">
    <div class="single-city-desc styled-block no-padding">
      <div class="top">
        <?php _e( 'Latest Posts', 'wpeasy' ); ?>
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
