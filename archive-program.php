<?php

get_header();
 ?>

<div class="container mx-auto mt-4 bg-yellow-100 text-black p-8 r">

<ul class="ml-4 text-left">

<?php
  while(have_posts()) {
    the_post(); ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
  <?php }
  echo paginate_links();
?>
</ul>



</div>

<?php get_footer();

?>