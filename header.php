<?php
global $cuda_options;
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	$custom_logo = $cuda_options['cuda-logo']['url'];
	?>

	<header>
		<div class="wrapper">
			<div class="top_line">
				<?php if ($custom_logo) { ?>
					<a href="<?php echo home_url("/"); ?> " title="logo">
						<img src="<?php echo $custom_logo;	 ?>" alt="logo" />
					</a>
				<?php } ?>

				<nav class="header_nav">
					<?php 
					wp_nav_menu( array(
						'theme_location' 	=> 'menu-1',
						'menu_id' 			=> 'primary-menu',
						'container' 		=> 'ul',
					));
					?>
				</nav>
			</div>

			<!-- <div class="bottom_line">
				<p>
					Hi there! We are the new kids on the block <br />
					we build awesome websites and mobile apps.
				</p>
				<a href="http://google.com" class="button">WORK WITH US!</a>
			</div> -->
		</div>
	</header>