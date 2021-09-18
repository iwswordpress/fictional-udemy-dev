<?php get_header(); ?>

  <div class="container mx-auto mt-4 bg-gray-200 p-2">

        <div class="full-width-split__inner">
          <h2 class="font-bold text-4xl mb-4 text-center">HOME</h2>
          <h2 class="font-bold text-2xl">Upcoming Events</h2>

          <?php 
            $today = date('Ymd');
            $homepageEvents = new WP_Query(array(
              'posts_per_page' => 2,
              'post_type' => 'event',
              'meta_key' => 'event_date',
              'orderby' => 'meta_value_num',
              'order' => 'ASC',
              'meta_query' => array(
                array(
                  'key' => 'event_date',
                  'compare' => '>=',
                  'value' => $today,
                  'type' => 'numeric'
                )
              )
            ));

            while($homepageEvents->have_posts()) {
              $homepageEvents->the_post();
              get_template_part('template-parts/content', 'event');
            }
          ?>
          
          <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event') ?>" class="btn btn--blue">View All Events</a></p>

        </div>
      </div>
    
        <div class="container mx-auto mt-4 bg-gray-200 p-2">
          <h2 class="font-bold text-2xl">From Our Blogs</h2>
          <?php
            $homepagePosts = new WP_Query(array(
              'posts_per_page' => 2
            ));

            while ($homepagePosts->have_posts()) {
              $homepagePosts->the_post(); ?>
              <div class="border-2 border-purple-600 p-2 mt-2 rounded">
                <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                  <span class="event-summary__month"><?php the_time('M'); ?></span>
                  <span class="event-summary__day"><?php the_time('d'); ?></span>  
                </a>
                <div class="event-summary__content">
                  <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                  <p><?php if (has_excerpt()) {
                      echo get_the_excerpt();
                    } else {
                      echo wp_trim_words(get_the_content(), 18);
                      } ?> <a href="<?php the_permalink(); ?>" class="nu gray">Read more</a></p>
                </div>
              </div>
            <?php } wp_reset_postdata();
          ?> 

          
          
          
          <p class=""><a href="<?php echo site_url('/blog'); ?>" class="btn btn--yellow">View All Blog Posts</a></p>
        </div>
      </div>
    </div>

   
  </div>
  <?php get_footer();

?>