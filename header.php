<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
 <body  <?php body_class(); ?> style="font-family: 'Raleway', sans-serif;	font-size: 22px;
	line-height: 1.4;	font-family: 'Raleway', sans-serif;">
  
	<nav class="flex items-center justify-between flex-wrap bg-gray-800 p-6 fixed w-full z-10 top-0 mb-12">
		<div class="flex items-center flex-shrink-0 text-white mr-6">
			<a class="text-white no-underline hover:text-white hover:no-underline" href="#">
				<span class="text-2xl pl-2"><i class="em em-grinning"></i> Brand McBrandface</span>
			</a>
		</div>

		<div class="block lg:hidden mt-12" > <!-- mt-12 for when admin bar -->
			<button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-white hover:border-white">
				<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
			</button>
		</div>

		<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block pt-6 lg:pt-0 " id="nav-content">
			<ul class="list-reset lg:flex justify-end flex-1 items-center">
				<li class="mr-3">
					<a class="inline-block py-2 px-4 text-white no-underline" href="#">Home</a>
				</li>
				<li class="mr-3">
					<a class="inline-block py-2 px-4 text-white no-underline" href="#">About Us</a>
				</li>
				<li class="mr-3">
					<a class="inline-block py-2 px-4 text-white no-underline <?php if (get_post_type() == 'program') echo 'text-blue-500' ?>" href="<?php echo get_post_type_archive_link('program') ?>">Programs</a>
				</li>
				<li class="mr-3">
					<a class="inline-block py-2 px-4 text-white no-underline <?php if (get_post_type() == 'event') echo 'text-blue-500' ?>" href="<?php echo get_post_type_archive_link('event') ?>">Events</a>
				</li>
				<li class="mr-3">
					<a class="inline-block py-2 px-4 text-white no-underline <?php if (get_post_type() == 'job') echo 'text-blue-500' ?>" href="<?php echo get_post_type_archive_link('job') ?>">Jobs</a>
				</li>
				<li class="mr-3">
					<a class="inline-block py-2 px-4 text-white no-underline <?php if (get_post_type() == 'professor') echo 'text-blue-500' ?>" href="<?php echo get_post_type_archive_link('professor'); ?>">Professors</a>
				</li>
				<li class="mr-3">
					<a class="inline-block py-2 px-4 text-white no-underline <?php if (get_post_type() == 'campus') echo 'text-blue-500' ?>" href="<?php echo get_post_type_archive_link('campus'); ?>">Campuses</a>
				</li>
        <li class="mr-3">
					<a class="inline-block py-2 px-4 text-white no-underline <?php if (is_page('my-notes')) echo 'text-blue-500' ?>" href="<?php echo esc_url(site_url('/my-notes')); ?>">My Notes</a>
				</li>
				<li class="mr-3">
					<a class="inline-block py-2 px-4 text-white no-underline <?php if (get_post_type() == 'post') echo 'text-blue-500' ?>" href="<?php echo get_post_type_archive_link('post'); ?>">Blog</a>
				</li>
		
			
        <?php if (!is_user_logged_in()) { ?>
          <li class="mr-3">
            <a class="inline-block text-yellow-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">LOGGED IN</a>
          </li>
        <?php
        } else {
          ?>  <li class="mr-3">
            <a class="inline-block text-yellow-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">NOT</a>
          </li> <?php
        }
        ?>
			
			</ul>
		</div>
	</nav>
<div class="mb-12" style="height:80px"></div>
	<script>
		//Javascript to toggle the menu
		document.getElementById('nav-toggle').onclick = function(){
			document.getElementById("nav-content").classList.toggle("hidden");
		}
	</script>

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
            
             <li <?php if (get_post_type() == 'professor' ) echo 'class="current-menu-item"';  ?>><a href="<?php echo get_post_type_archive_link('professor'); ?>">Professors</a></li>

          
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
  
