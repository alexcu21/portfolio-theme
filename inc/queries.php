<?php

/*
* function for projects queries
 */

function ap_query_projects($cant = -1){
  $args = array(
    'post_type' => 'featured_projects',
    'posts_per_page' => $cant
  );

  $projects = new WP_Query($args);

  while($projects->have_posts()): $projects->the_post();
    $start_date = get_post_meta( get_the_ID(),'start_date', true );
    $end_date = get_post_meta( get_the_ID(),'end_date', true );
    $url = get_post_meta( get_the_ID(),'url', true );
    $tech = get_post_meta( get_the_ID(),'ap_project_tech', true );
?>
  <article class="card">
    <div class="row">
      <div class="col-md-6 col-12">
        <div class="card-body">
        <a href="<?php echo get_permalink() ?>"><h3 class="card-title"><?php the_title(); ?></h3></a>
        <span class="badge badge-secondary"> <?php echo $tech; ?></span>
        <p class="card-text"><small><strong>Start date:</strong> <?php echo $start_date ?></small></p>
        <p class="card-text"><small><strong>End date:</strong> <?php echo $end_date ?></small></p>
        <a class="btn btn-primary" href="<?php echo $url ?>">Respository / Demo</a>
        <p class="card-text"><?php the_taxonomies();?></p>
        <p class="card-text"><?php the_content(); ?></p>
      </div>
      </div>
      <div class="col-md-6 col-12">

        <?php the_post_thumbnail( $size = 'post-thumbnail', $attr = 'class=img-fluid card-img-top' ) ?>
      </div>

    </div>
  </article>


  <?php
endwhile; wp_reset_postdata();
}
?>
<?php
/*
* function for posts queries
 */

function ap_query_posts($cant = -1){
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => $cant
  );

  $posts = new WP_Query($args);?>
  <?php while($posts->have_posts()): $posts->the_post(); ?>
  <div class="col-md-4 col-12">
    <article class="card">
      <div class="card-body">
        <a href="<?php echo get_permalink() ?>"><h3 class="card-title"><?php the_title(); ?></h3></a>
        <?php get_template_part('template-parts/meta', 'post'); ?>
        <p class="card-text"><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink() ?>" class="btn btn-secondary">Read more...</a>
      </div>

      <?php the_post_thumbnail( $size = 'medium', $attr = 'class=img-fluid card-img-top' ); ?>
    </article>
  </div>
<?php endwhile; wp_reset_postdata();
}?>

<?php
/*
* function for events queries
 */

function ap_query_events($cant = -1){
  $args = array(
    'post_type' => 'featured_events',
    'posts_per_page' => $cant
  );

  $events = new WP_Query($args);

  while($events->have_posts()): $events->the_post();
    $date = get_post_meta( get_the_ID(),'event_date', true );
    $url_resource = get_post_meta( get_the_ID(),'ap_project_url_resource', true );
    $place = get_post_meta( get_the_ID(),'ap_project_place', true );

?>
<div class="col-md-6 col-12">
  <article class="card">
    <figure>
      <?php the_post_thumbnail( $size = 'post-thumbnail', $attr = 'class=img-fluid card-img-top' ) ?>
    </figure>
    <a href="<?php echo get_permalink() ?>"><h3 class="card-title"><?php the_title(); ?></h3></a>
    <p class="card-text"><?php the_content(); ?></p>
    <p class="card-text">Place: <?php echo $place; ?></p>
    <p class="card-text">Date: <?php echo $date; ?></p>
    <p class="card-text"><?php the_taxonomies();?></p>
    <a class="btn btn-primary" href="<?php echo $url_resource; ?>">Resources</a>
  </article>
</div>

  <?php
endwhile; wp_reset_postdata();
}
?>
