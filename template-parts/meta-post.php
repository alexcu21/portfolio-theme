<p class="card-text"><small><?php the_time( get_option( 'date_format' ) ); ?></small></p>
<p class="card-text">
  Author:
  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>">
    <?php the_author(); ?>
  </a>
  <p class="card-text">
    <?php the_taxonomies();?>
  </p>
 </p>
