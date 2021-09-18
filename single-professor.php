<?php
  
  get_header();

  while(have_posts()) {
    the_post();
    pageBanner();
     ?>
    

      <div class="container mx-auto  bg-pink-100 text-black p-8 ">
        <div class="mb-2">
          <p><a class="font-bold" href="<?php echo get_post_type_archive_link('campus'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Professor &gt;</a> <span class=""><?php the_title(); ?></span></p>
        </div>

        <div class="mb-2"><?php the_content(); ?></div>

        

      <?php

        $relatedPrograms = get_field('related_programs');

        if ($relatedPrograms) {
          echo '<h2 class="font-bold">Subject(s) Taught</h2>';
          echo '<ul class="link-list min-list">';
          foreach($relatedPrograms as $program) { ?>
            <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
          <?php }
          echo '</ul>';
        }

      ?>

    </div>
    
  <?php }

  get_footer();

?>