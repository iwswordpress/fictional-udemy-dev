<?php

get_header();
 ?>

<div class="container mx-auto  bg-yellow-100 text-black p-8 ">


<ul class="ml-4 text-left">

<?php
  while(have_posts()) {
    the_post(); ?>
  
    <h5 class="font-bold text-4xl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
    <p><?php if (has_excerpt()) {
        echo get_the_excerpt();
      } else {
        echo wp_trim_words(get_the_content(), 18);
        } ?> <a href="<?php the_permalink(); ?>" class="text-blue-500">Learn more</a></p>

  <?php }
  echo paginate_links();
?>
</ul>



</div>

<?php get_footer();

?>