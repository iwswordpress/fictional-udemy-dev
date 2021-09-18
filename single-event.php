<?php
  
  get_header();

  while(have_posts()) {
    the_post();
  
     ?>

   <div class="container mx-auto  bg-pink-100 text-black p-8 ">

      <div class=""><?php the_content(); ?></div>

      <?php

        $relatedPrograms = get_field('related_programs');

        if ($relatedPrograms) {
          echo '<hr class="section-break">';
          echo '<h2 class="">Related Program(s)</h2>';
          echo '<ul class="">';
          foreach($relatedPrograms as $program) { ?>
            <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
          <?php }
          echo '</ul>';
        }

      ?>

    </div>
    

      </div> 
  <?php }

  get_footer();

?>