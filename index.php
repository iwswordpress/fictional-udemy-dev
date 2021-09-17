<?php

get_header();

 ?>
<div class="container mx-auto bg-pink-200 p-4">
<?php
  while(have_posts()) {
    the_post(); ?>
    <div class="m-4 p-4 border-2 border-gray-500 rounded">
      <h2 class="font-bold text-2xl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      
      <div class="text-sm">
        <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', '); ?></p>
      </div>

      <div class="mt-2">
        <?php the_excerpt(); ?>
        <p><a class="bg-red-500 text-white" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
      </div>

    </div>
  <?php }
  echo paginate_links();
?>
</div>

<?php get_footer();

?>