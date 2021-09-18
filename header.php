<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
 <body  <?php body_class(); ?> style="font-family: 'Raleway', sans-serif;	font-size: 22px;
	line-height: 1.4;	font-family: 'Raleway', sans-serif;">
    <header >
    <div class="container mx-auto mt-4 bg-gray-600 text-white" >
      <h1 class=""><a href="<?php echo site_url() ?>"><strong>FINALUNIV</strong> ficitonal-udemy-dev</a></h1>
     
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
        <nav class="">
          <ul style="display:flex; justify-content: space-around; align-items: center">
           <li <?php if (is_page('/')) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/') ?>">Home</a></li>
            <li <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 16) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
            <li <?php if (get_post_type() == 'program') echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('program') ?>">Programs</a></li>
            <li <?php if (get_post_type() == 'event' OR is_page('past-events')) echo 'class="current-menu-item"';  ?>><a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>
             <li <?php if (get_post_type() == 'job' OR is_page('past-jobs')) echo 'class="current-menu-item"';  ?>><a href="<?php echo get_post_type_archive_link('job'); ?>">Jobs</a></li>
            <li <?php if (get_post_type() == 'campus') echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('campus'); ?>">Campuses</a></li>
            <li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/blog'); ?>">Blog</a></li>
            <?php if(is_user_logged_in()) { ?>
              <a href="<?php echo esc_url(site_url('/my-notes')); ?>" class="">My Notes</a>
              <a class="flex items-center bg-red-400 p-1 rounded" href="<?php echo wp_logout_url();  ?>" class="">
                <span class=""><?php echo get_avatar(get_current_user_id(), 15); ?></span>
                <span class="ml-2">Log Out</span>
              </a>
            <?php } else { ?>
              <a href="<?php echo wp_login_url(); ?>" class="">Login</a>
              <a href="<?php echo wp_registration_url(); ?>" class="">Sign Up</a> 
             <?php } ?>
          
        
          </ul>
        </nav>
     
       
      
      </div>
    </div>
  </header>
  
