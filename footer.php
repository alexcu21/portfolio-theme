<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-12">
					<h3 class="text-center">Work togetther?</h3>
					<?php
					$options = get_option( 'ap_theme_options' );

					?>
					<p class="text-center">
						<i class="fas fa-map-marker-alt"></i>
						<?php echo $options['country_city']; ?>
					</p>
					<p class="text-center">
						<i class="fas fa-mobile-alt"></i>
						<?php echo $options['phone']; ?>
					</p>
					<p class="text-center">
						<i class="fas fa-at"></i>
						<?php echo $options['email']; ?>
					</p>

				</div>
				<div class="col-md-6 col-12">
					<div class="social">

						<?php if(isset($options['link_github'])): ?>
							<a href="<?php echo $options['link_github']; ?>" target="_blank"><i class="fab fa-github"></i></a>
						<?php else: ?>
							<a href="#" class="d-none"></a>
						<?php endif; ?>

						<?php if(isset($options['link_gitlab'])): ?>
							<a href="<?php echo $options['link_gitlab']; ?>" target="_blank"><i class="fab fa-gitlab"></i></a>
						<?php else: ?>
							<a href="#" class="d-none"></i></a>
						<?php endif; ?>

						<?php if(isset($options['link_codepen'])): ?>
							<a href="<?php echo $options['link_codepen']; ?>" target="_blank"><i class="fab fa-codepen"></i></a>
						<?php else: ?>
							<a href="#" class="d-none"></i></a>
						<?php endif; ?>

						<?php if(isset($options['link_wordpress'])): ?>
							<a href="<?php echo $options['link_wordpress']; ?>" target="_blank"><i class="fab fa-wordpress"></i></a>
						<?php else: ?>
							<a href="#" class="d-none"></i></a>
						<?php endif; ?>

						<?php if(isset($options['link_linkedin'])): ?>
							<a href="<?php echo $options['link_linkedin']; ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
						<?php else: ?>
							<a href="#" class="d-none"></i></a>
						<?php endif; ?>

						<?php if(isset($options['link_twitter'])): ?>
							<a href="<?php echo $options['link_twitter']; ?>" target="_blank"><i class="fab fa-twitter"></i></a>
						<?php else: ?>
							<a href="#" class="d-none"></i></a>
						<?php endif; ?>


					</div>
          
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
