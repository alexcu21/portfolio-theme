<?php get_header(); ?>
<?php while(have_posts()): the_post(); ?>
<section class="hero">
<div class="container-fluid">
  <div class="row">
    <div class="copy-cont col-md-6 col-sm-6 col-12">
      <?php echo get_post_meta(get_the_ID(), 'ap_homepage_hero_text', true);  ?>
    </div>
    <div class="col-md-6 col-sm-6 col-12 photohero" style="background-image:url(<?php echo get_post_meta( get_the_ID(), 'ap_homepage_hero_image', true); ?>);">


    </div>
  </div>
</div>

</section> <!-- end section hero -->
</header> <!-- end main header from homepage -->

<!-- start section blog -->
<section class="blog">
		<h2 class="text-center">Latest Posts </h2>
		<div class="container">
			<div class="row">
				<?php
          $options = get_option( 'ap_theme_options' );

          if(isset($options["number_post"])){
            $number_post = (int)$options["number_post"];
          } else{
            $number_post = 3;
          }

            ap_query_posts($number_post);
          ?>

			</div>
		</div>
    </section>
	<!-- </section> end section blog -->
  <!-- <section> portfolio -->

  <section class="portfolio">
		<h2 class="text-center">Portfolio (featured projects)</h2>
		<div class="container">

			<?php

      if(isset($options['number_projects'])){
        $number_projects = (int)$options['number_projects'];
      } else{
        $number_projects = 3;
      }
      ap_query_projects($number_projects); ?>

		</div>

	</section>
  <!-- </section> end section porfolio -->
<!-- <section> events -->
  <section class="event">
		<h2 class="text-center">Events</h2>
		<div class="container">
			<div class="row">

				<?php
        if(isset($options['number_events'])){

          $number_events = (int)$options['number_events'];

        } else{
          $number_events = 3;
        }

        ap_query_events($number_events); ?>
			</div>
		</div>
	</section>
<!-- </section> end section events -->
<!-- start about me and skills -->
<section class="skills">
  <h2 class="text-center">Me</h2>
		<div class="container">
			<div class="row me my-3">
				<div class="skills1 col-md-4 col-12 skills">
          <?php

          $skills = get_post_meta(get_the_ID(), 'ap_homepage_skills', true);
          foreach ($skills as $skill) {
            echo '<p class="badge badge-primary">';
              echo $skill;
            echo '</p>';
          }
           ?>
				</div>
				<div class="col-md-4 col-12 ">
					<img src="<?php echo get_post_meta(get_the_ID(), 'ap_homepage_about_image', true); ?>" alt="me" class="img-fluid">
				</div>
				<div class="skills2 col-md-4 col-12 services">

          <?php

          $services = get_post_meta(get_the_ID(), 'ap_homepage_services', true);
          foreach ($services as $service) {
            echo '<p class="badge badge-primary">';
              echo $service;
            echo '</p>';
          }
           ?>
				</div>
			</div>
		</div>
	</section> <!-- end about me and skills -->
<?php endwhile; ?>
<?php get_footer(); ?>
