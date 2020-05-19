<?php
/*
* Template Name: Featured Events
 */

get_header();
?>
</header> <!-- end main header from homepage -->
<section class="event">
	<h2 class="text-center">
		<?php while (have_posts()): the_post();
				the_title();
			endwhile;
		?>
	</h2>
	<div class="container">
		<div class="row">

			<?php ap_query_events(); ?>
		</div>
	</div>
	<ul class="pagination justify-content-center my-3">
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
</section>

<?php get_footer(); ?>
