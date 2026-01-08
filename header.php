<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bang_Digital
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

	<?php
	wp_register_style('layout', get_template_directory_uri() . '/css/layout.css', array(), rand(111, 9999), 'all');
	?>

	<!-- Swiper JS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="overlay"></div>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<header id="masthead" class="site-header">
			<div class="top-nav-wrapper">
				<div class="main-container">
					<?php
					get_template_part('template-parts/content', 'topnav');
					?>
				</div>
			</div>
			<div class="bottom-nav-wrapper">
				<div class="main-container">
					<div class="main-header-wrapper">
						<div class="site-logo">
							<a href="<?php echo get_site_url() ?>">
								<?php
								$logo_id = get_field('logo', 'option'); // 'option' refers to the options page
								
								// Check if the logo ID exists
								if ($logo_id) {
									// Get the image HTML
									$logo_img = wp_get_attachment_image($logo_id, 'medium'); // 'full' can be replaced with any image size you want
									if ($logo_img) {
										echo $logo_img; // Output the image HTML
									}
								} else {
									// Optional: Provide a fallback if no logo is set
									echo '<img src="' . get_template_directory_uri() . '/path/to/default-logo.png" alt="Default Logo">';
								}
								?>
							</a>
						</div>
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle dashicons dashicons-menu" aria-controls="primary-menu"
								aria-expanded="false"></button>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id' => 'primary-menu',
								)
							);
							?>
						</nav><!-- #site-navigation -->
						<div class="menu-cta">
							<a class="rounded-cta link-style-tertiary"
								href="<?php echo get_site_url() ?>/specialist-search/">Find A
								Specialist</a>
						</div>
					</div>
				</div>
			</div>
		</header><!-- #masthead -->