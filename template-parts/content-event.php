<div class="border-2 border-red-300 p-2 mt-2 rounded">
  <a class=""><?php
      $eventDate = new DateTime(get_field('event_date'));
      echo $eventDate->format('M')
    ?></span>
    <span class=""><?php echo $eventDate->format('d') ?></span>  
  </a>
  <div class="">
    <h5 class="font-bold text-4xl"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
    <p><?php if (has_excerpt()) {
        echo get_the_excerpt();
      } else {
        echo wp_trim_words(get_the_content(), 18);
        } ?> <a href="<?php the_permalink(); ?>" class="text-blue-500">Learn more</a></p>
  </div>
</div>