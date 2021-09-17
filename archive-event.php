<?php

get_header();

 ?>

<div class="container mx-auto  bg-green-100 text-black p-8 ">

<?php
  
  while(have_posts()) {
    the_post(); 
    get_template_part('template-parts/content-event');
   }
  echo paginate_links();
?>


<p>Looking for a recap of past events? <a class="font-bold text-blue-500 hover:text-red-500" href="<?php echo site_url('/past-events') ?>">Check out our past events archive</a>.</p>

</div>

<?php get_footer();

?>