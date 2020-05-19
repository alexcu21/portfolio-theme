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
                $start_date = get_post_meta( get_the_ID(),'start_date', true );
                $end_date = get_post_meta( get_the_ID(),'end_date', true );
                $url = get_post_meta( get_the_ID(),'url', true );
                $tech = get_post_meta( get_the_ID(),'ap_project_tech', true );
              ?>
              <p class="post-text"><strong>Technologies:</strong>  <?php echo $tech; ?></p>
              <p class="post-text"><strong>Start date:</strong> <?php echo $start_date ?></p>
              <p class="post-text"><strong>End date:</strong> <?php echo $end_date ?></p>
              <a class="btn btn-primary" href="<?php echo $url ?>">Respository / Demo</a>

          </div>
     </div><!--.row-->
</main>
