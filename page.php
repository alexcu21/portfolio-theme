<?php get_header(); ?>
</header> <!-- end main header from homepage -->
  <?php
      while(have_posts()): the_post();

          get_template_part('template-parts/content', 'pages');

      endwhile;
?>

<?php get_footer(); ?>
