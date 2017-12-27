<?php /* ?>
<div class="pagination">
  <!-- noindex --><?php html5wp_pagination(); ?><!-- /noindex -->
</div><!-- /pagination -->
<?php */ ?>
<a class="load-more styled-block" data-nonce="<?php echo wp_create_nonce('load_posts') ?>" data-current-page-type="<?php $category = get_the_category(); echo $category[0]->slug;?>" data-id="<?php echo $category[0]->cat_ID;?>" data-showposts="10" data-offset="10" data-all-posts-count="<?php echo $category[0]->category_count;?>"> <span class="title">Загрузить еще</span> </a>
