  <?php

    if (!is_user_logged_in()) {
      wp_redirect(esc_url(site_url('/')));
      exit;
    }
    get_header();
    ?>
    
    <div class="container mx-auto  bg-gray-300 text-black p-8 ">
      <!--  Create Note Form -->
      <div class="create-note flex flex-col border-2 border-purple-500 p-2 mb-1 mt-1 max-w-lg">
        <h2 class="font-bold text-2xl mb-2 ">Create New Note</h2>
        <input class="new-note-title mb-2 w-auto" placeholder="Title">
        <textarea class="new-note-body mb-2 w-auto" placeholder="Your note here..."></textarea>
        <span class="submit-note bg-blue-500 p-2 text-white cursor-pointer w-48 text-center ">Create Note</span>
        <span class="note-limit-message hidden">Note limit reached: delete an existing note to make room for a new one.</span>
      </div><!-- create-note -->
      <?php
        while(have_posts()) {
          the_post();
      ?>
        <ul class="list-none" id="my-notes">
          <?php 
            $userNotes = new WP_Query(array(
              'post_type' => 'note',
              'posts_per_page' => -1,
              'author' => get_current_user_id()
            ));

            while($userNotes->have_posts()) {
              $userNotes->the_post(); ?>
            
                <li data-id="<?php the_ID();  ?>">
                  <div class="a-note border-2 border-purple-500 p-2 mb-1 mt-1 max-w-lg">
                    <div class="input-fields ">
                      <div class="mt-2">
                        <input readonly class="note-title-field" size="41" value="<?php echo str_replace('Private: ', '', esc_attr(get_the_title())); ?>">
                      </div>
                      <div class=" mt-2">
                        <textarea readonly cols="41" class="note-body-field"><?php echo esc_textarea(get_the_content()); ?></textarea>
                      </div>

                    </div><!-- input-fields --><br>
                    <div class="buttons mb-2 w-auto">
                      <span class="update-note bg-green-500 p-2  text-white cursor-pointer"><i class="fa fa-arrow-right" aria-hidden="true"></i> Save</span>
                        <span class="edit-note bg-pink-500 p-2 text-white cursor-pointer"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</span>
                      <span class="delete-note bg-red-500  p-2 text-white cursor-pointer"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</span>
                    </div><!--  buttons -->
                  </div><!--  notes-list-output -->
                </li>
            
            <?php }
          ?>
        </ul>
      </div><!-- container -->
      
    <?php }
      get_footer();
    ?>