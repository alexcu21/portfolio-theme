<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Alex Cuadra</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="images/favicon.png">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<nav class="container-fluid navbar navbar-expand-lg fixed-top">
            <div class="container wrapper-nav">
            <a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>">

								<?php
									$options = get_option( 'ap_theme_options' );
									if(isset($options['logo'])):
								 	?>
									<img src="<?php echo $options['logo'] ?>" alt="logo">
								<?php else: ?>
									<?php bloginfo('name'); ?>
								<?php endif; ?>

						</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                <i class="fas fa-bars"></i>
              </span>
            </button>
                <?php
                    $args = array(
                       'menu_class' => 'navbar-nav',
                       'container_id' => 'navbarNav',
                       'container_class' => 'collapse navbar-collapse',
                       'theme_location' => 'main_menu',
                       'add_li_class' => 'nav-item'


                      );
                      wp_nav_menu($args);
                ?>

            </div>
          </nav>
