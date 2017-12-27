<?php get_header(); ?>

  <div class="left-content">
    <div class="single-city-desc styled-block no-padding">
      <div class="top">
        <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
      </div>

      <div class="content">
        <?php $term = $wp_query->queried_object; $image = get_field('category_image', $term->taxonomy . '_' . $term->term_id);  ?>
        <div class="group-bg" style="background:url(<?php echo $image['url']; ?>)center center;background-size: cover;">
          <div class="right">
            <div class="page-title">
              <h1><?php the_category(', '); ?></h1>
              <div class="actions">
                <div class="posts">
                  <a class="tlp tooltipstered"> <i class="fa fa-newspaper-o"></i> <span class="number"><?php $category = get_the_category(); echo $category[0]->category_count;?></span> </a>
                </div>
              </div>
            </div>
            <div class="text-in">
             <?php echo category_description(); ?>
            </div>
          </div>
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
