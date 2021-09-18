<?php
  
  get_header();

  while(have_posts()) {
    the_post();
    pageBanner();
     ?>

    <div class="container mx-auto  bg-pink-100 text-black p-8 ">
      <div class="mb-2">
        <p><a class="font-bold" href="<?php echo get_post_type_archive_link('campus'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Campuses &gt;</a> <span class=""><?php the_title(); ?></span></p>
      </div>

      <div class="mb-2"><?php the_content(); ?></div>

      <!-- <?php 
        $mapLocation = get_field('map_location');
      ?> -->

      <!-- <div class="acf-map">
          <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
            <h3><?php the_title(); ?></h3>
            <?php echo $mapLocation['address']; ?>
          </div>
      </div> -->

      <?php 
        $relatedPrograms = new WP_Query(array(
          'posts_per_page' => -1,
          'post_type' => 'program',
          'orderby' => 'title',
          'order' => 'ASC',
          'meta_query' => array(
            array(
              'key' => 'related_campus',
              'compare' => 'LIKE',
              'value' => '"' . get_the_ID() . '"'
            )
          )
        ));

        if ($relatedPrograms->have_posts()) {
          echo '<hr class="">';
          echo '<h2 class="font-bold mb-2">Programs Available At This Campus</h2>';

          echo '<ul class="">';
          while($relatedPrograms->have_posts()) {
            $relatedPrograms->the_post(); ?>
            <li>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        <?php }
        echo '</ul>';
        }

        wp_reset_postdata();

      ?>

    </div>
    

    
  <?php }

  get_footer();

?>