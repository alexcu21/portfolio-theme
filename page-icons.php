<?php

/*
* Template Name: Page with Icons
 */

 get_header(); ?>
 </header> <!-- end main header from homepage -->
   <?php
       while(have_posts()): the_post();

           get_template_part('template-parts/content', 'pages');
           get_template_part('template', 'parts/icons');

            ?>



       <?php endwhile; ?>

 <?php get_footer(); ?>
