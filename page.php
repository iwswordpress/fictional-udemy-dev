<?php

  get_header();

  while(have_posts()) {
    the_post();
    // pageBanner();
     ?>
    
    

    <div class="container mx-auto">
    
    <?php
      $theParent = wp_get_post_parent_id(get_the_ID());
      if ($theParent) { ?>metabox metabox--position-up metabox--with-home-link">
      <p><a class="" href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?></a> <span class=""><?php the_title(); ?></span></p>
    </div>
      <?php }
    ?>

    
    
    <?php 
    $testArray = get_pages(array(
      'child_of' => get_the_ID()
    ));

    if ($theParent or $testArray) { ?>
    <div class="">
      <h2 class="font-bold"><a href="<?php echo get_permalink($theParent); ?>"><?php echo get_the_title($theParent); ?></a></h2>
      <p class="text-sm mt-2">Child pages:</p>
      <div class="ml-2">
        <ul class="text-sm" >
          <?php
            if ($theParent) {
              $findChildrenOf = $theParent;
            } else {
              $findChildrenOf = get_the_ID();
            }

            wp_list_pages(array(
              'title_li' => NULL,
              'child_of' => $findChildrenOf,
              'sort_column' => 'menu_order'
            ));
          ?>
      </ul>
      </div>
    </div>
    <?php } ?>
    

    <div class="generic-content">
      <?php the_content(); ?>
    </div>

  </div>
    
  <?php }

  get_footer();

?>