<?php $html = ap_featured_image( get_the_ID() );
     // $html[0] retorna el HTML
     // $html[1] retornar si la imagen existe
     echo $html[0];
?>

<main class="container">
     <div class="row justify-content-center">
          <div class="py-3 px-5 main-content bg-light <?php echo $html[1] ? 'col-md-8 featured' : 'col-md-12 no-featured';  ?>">


               <h1 class="text-center my-5 separator"><?php the_title(); ?></h1>
               <p><?php the_taxonomies();?></p>
               <?php the_content(); ?>
              <?php
                $date = get_post_meta( get_the_ID(),'event_date', true );
                $url_resource = get_post_meta( get_the_ID(),'ap_project_url_resource', true );
                $place = get_post_meta( get_the_ID(),'ap_project_place', true );
              ?>
              <p class="post-text"><strong>Place: <?php echo $place; ?></p>
              <p class="post-text"><strong>Date: <?php echo $date; ?></p>
              <a class="btn btn-primary" href="<?php echo $url_resource; ?>">Resources</a>

          </div>
     </div><!--.row-->
</main>
