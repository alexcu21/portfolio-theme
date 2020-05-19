
<?php get_header(); ?>

</header> <!-- end main header from homepage -->
<section class="blog">

		<div class="container">
			<h2 class="text-center">What's new </h2>
      <div class="row">
        <div class="col-md-8">
          <div class="row">
            <?php while(have_posts()): the_post(); ?>
    				<div class="col-md-6 col-12">
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
          <?php endwhile; ?>
            <ul class="pagination justify-content-center">
              <li class="page-item">
                <?php previous_posts_link(
                      '<span class="page-link" aria-hidden="true">&laquo;Prev</span>
                      <span class="sr-only">Prev</span>'
                 ); ?>
              </li>
              <li class="page-item">
                <?php next_posts_link(
                      '<span class="page-link" aria-hidden="true">Next&raquo;</span>
                      <span class="sr-only">Next</span>'
                 ); ?>
              </li>
            </ul>
    			</div>
        </div>
        <div class="col-md-4 col-12">
          <?php get_sidebar(); ?>
        </div>
      </div>


		</div>
	</section>
<?php get_footer(); ?>
