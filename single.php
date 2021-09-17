<?php
  
  get_header();

  while(have_posts()) {
    the_post();
   
     ?>

    <div class="container mx-auto">
      <div class="">
        <p><a class="" href="<?php echo site_url('/blog'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a> <span class="">Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', '); ?></span></p>
      </div>

      <div class=""><?php the_content(); ?></div>

    </div>
    

    
  <?php }

  get_footer();

?>