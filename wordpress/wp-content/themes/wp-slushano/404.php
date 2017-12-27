<?php get_header(); ?>

  <div class="left-content">
    <div id="post-<?php the_ID(); ?>" <?php post_class('info-block styled-block no-padding single-post'); ?>>

      <div class="top">
        <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
      </div>

      <div class="content">
        <div class="article-body" itemprop="articleBody">
          <div class="page-title" itemprop="headline">
            <h1><?php _e( 'Page not found', 'wpeasy' ); ?></h1>
          </div>
          <div class="text-in">
            <h2><a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'wpeasy' ); ?></a></h2>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
