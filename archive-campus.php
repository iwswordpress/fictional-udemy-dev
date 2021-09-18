<?php

get_header();

 ?>


<div class="container mx-auto  bg-red-100 text-black p-8 ">



<?php
  while(have_posts()) {
    the_post();
   ?>
    <div>
      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
   
    </div>
  <?php } ?>
</div>



</div>

<?php get_footer();

?>