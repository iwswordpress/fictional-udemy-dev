<?php
  
  get_header();

  while(have_posts()) {
    the_post();
    $job_id = get_the_ID();
    // echo $job_id;
    ?>
   
    <div class="container mx-auto  bg-pink-100 text-black p-8 ">
      <div class="font-bold text-4xl"><?php the_title(); ?></div>
      <div class=""><?php the_content(); ?></div>

 
    <div id="job" >
      <button id="btnJob" jobid="<?php echo $job_id;?>" data-id="<?php echo $job_id;?>"  class="job-class bg-blue-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded mt-2">
          BOOK <?php echo $job_id;?>
      </button>
    </div>
  </div>
 
  <?php }

  get_footer();

?>