<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bang_Digital
 */

?>

<footer id="colophon" class="site-footer">
	<section class="top-footer">
		<div class="container">
			<div class="row">
				<div class="column">
					<div class="site-logo">
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
					</div>
				</div>
				<div class="column">
					<nav id="smart-aircon-navigation" class="smart-aircon-navigation">
						<button class="footer-menu-button" aria-controls="smart-aircon-menu" aria-expanded="false">
							<h6>Smart Aircon</h6>
						</button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'smart-aircon-menu', // Set this to the registered location for the menu
								'menu_id' => 'smart-aircon-menu', // Set a unique ID for this menu
							)
						);
						?>
					</nav>
				</div>
				<div class="column">
					<nav id="support-navigation" class="support-navigation">
						<button class="footer-menu-button" aria-controls="support-menu" aria-expanded="false">
							<h6>Support</h6>
						</button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'support-menu', // Set this to the registered location for the menu
								'menu_id' => 'support-menu', // Set a unique ID for this menu
							)
						);
						?>
					</nav>
				</div>
				<div class="column">
					<?php echo do_shortcode('[gravityform id="2" title="true" description="true" ajax="true"]'); ?>
				</div>
			</div>
		</div>
	</section>

	<?php
	$phone = get_field('phone', 'option');
	if ($phone) {
		?>
		<section class="mid-footer">
			<div class="container">
				<p>Tech Support: Call <a target="_blank" href="tel:<?php echo $phone ?>"><?php echo $phone ?></a></p>
			</div>
		</section>
	<?php }
	?>

	<section class="bottom-footer">
		<div class="footer-menu">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'legal-menu',
					'menu_id' => 'legal-menu',
					'container' => 'nav', // You can change this to any HTML element you prefer
					'container_class' => 'legal-menu-class', // Add your custom class if needed
					'menu_class' => 'legal-menu', // Add your custom menu class if needed
				)
			);
			?>
			<p>Website by <a href="https://bangdigital.com.au" target="_blank">Bang Digital</a></p>
		</div>
		<div class="footer-text">
			<p>© Copyright <?php echo date("Y"); ?> Advantage Air. All Rights Reserved<br>WA EC: 14674 QLD Electrical
				Contractor License:
				87763</p>
		</div>
		<div class="footer-socials">
			<div>Follow us</div>
			<?php
			$instagram = get_field('instagram', 'option');
			$facebook = get_field('facebook', 'option');
			$youtube = get_field('youtube', 'option');
			if ($instagram) {
				?>
				<a href="<?php echo $instagram ?>" target="_blank">
					<span>
						<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M7.07857 0.767294C7.48905 0.765719 7.89953 0.769844 8.30989 0.779669L8.41901 0.783606C8.54501 0.788106 8.66932 0.793731 8.81951 0.800481C9.41801 0.828606 9.82639 0.923106 10.1847 1.06204C10.5559 1.20492 10.8687 1.39842 11.1814 1.71117C11.4674 1.9922 11.6887 2.33214 11.83 2.70736C11.969 3.06567 12.0635 3.47461 12.0916 4.07311C12.0983 4.22273 12.1039 4.34761 12.1084 4.47361L12.1118 4.58273C12.1218 4.9929 12.1261 5.40319 12.1248 5.81348L12.1253 6.23311V6.96998C12.1267 7.38046 12.1224 7.79094 12.1124 8.20129L12.109 8.31042C12.1045 8.43642 12.0989 8.56073 12.0921 8.71092C12.064 9.30942 11.9684 9.71779 11.83 10.0761C11.6892 10.4517 11.4678 10.7919 11.1814 11.0729C10.9002 11.3588 10.5601 11.5801 10.1847 11.7214C9.82639 11.8604 9.41801 11.9549 8.81951 11.983C8.66932 11.9897 8.54501 11.9954 8.41901 11.9999L8.30989 12.0032C7.89953 12.0132 7.48905 12.0175 7.07857 12.0162L6.65895 12.0167H5.92264C5.51216 12.0181 5.10168 12.0138 4.69132 12.0038L4.5822 12.0004C4.44867 11.9956 4.31517 11.99 4.1817 11.9835C3.5832 11.9554 3.17482 11.8598 2.81595 11.7214C2.44058 11.5804 2.10058 11.3591 1.81976 11.0729C1.53348 10.7918 1.31195 10.4516 1.17064 10.0761C1.0317 9.71779 0.9372 9.30942 0.909075 8.71092C0.90281 8.57745 0.897185 8.44395 0.8922 8.31042L0.889387 8.20129C0.879017 7.79094 0.874329 7.38046 0.875325 6.96998V5.81348C0.873755 5.40319 0.87788 4.9929 0.8877 4.58273L0.891637 4.47361C0.896137 4.34761 0.901762 4.22273 0.908512 4.07311C0.936637 3.47404 1.03114 3.06623 1.17007 2.70736C1.31147 2.33195 1.53343 1.99211 1.82032 1.71173C2.10095 1.42528 2.44074 1.20355 2.81595 1.06204C3.17482 0.923106 3.58264 0.828606 4.1817 0.800481L4.5822 0.783606L4.69132 0.780794C5.10149 0.770428 5.51178 0.76574 5.92207 0.766731L7.07857 0.767294ZM6.50032 3.57979C6.12767 3.57452 5.75769 3.64337 5.41187 3.78233C5.06606 3.92129 4.75131 4.1276 4.48592 4.38926C4.22054 4.65092 4.0098 4.96272 3.86596 5.30654C3.72212 5.65035 3.64805 6.01932 3.64805 6.39201C3.64805 6.7647 3.72212 7.13368 3.86596 7.47749C4.0098 7.8213 4.22054 8.1331 4.48592 8.39476C4.75131 8.65642 5.06606 8.86273 5.41187 9.00169C5.75769 9.14066 6.12767 9.2095 6.50032 9.20423C7.24625 9.20423 7.96162 8.90792 8.48906 8.38047C9.01651 7.85302 9.31282 7.13765 9.31282 6.39173C9.31282 5.64581 9.01651 4.93044 8.48906 4.40299C7.96162 3.87555 7.24625 3.57979 6.50032 3.57979ZM6.50032 4.70479C6.72448 4.70066 6.94722 4.74124 7.15552 4.82416C7.36382 4.90708 7.55351 5.03067 7.71351 5.18773C7.87351 5.34478 8.00061 5.53214 8.08739 5.73886C8.17416 5.94558 8.21887 6.16753 8.21891 6.39173C8.21895 6.61592 8.17431 6.83788 8.0876 7.04464C8.0009 7.25139 7.87386 7.43879 7.71391 7.5959C7.55397 7.753 7.36432 7.87666 7.15604 7.95965C6.94777 8.04263 6.72505 8.08329 6.50089 8.07923C6.05333 8.07923 5.62411 7.90144 5.30764 7.58497C4.99118 7.26851 4.81339 6.83928 4.81339 6.39173C4.81339 5.94418 4.99118 5.51496 5.30764 5.19849C5.62411 4.88202 6.05333 4.70423 6.50089 4.70423L6.50032 4.70479ZM9.45345 2.73604C9.27198 2.74331 9.10036 2.8205 8.97454 2.95147C8.84872 3.08243 8.77844 3.25699 8.77844 3.43861C8.77844 3.62022 8.84872 3.79479 8.97454 3.92575C9.10036 4.05671 9.27198 4.13391 9.45345 4.14117C9.63993 4.14117 9.81877 4.06709 9.95063 3.93523C10.0825 3.80337 10.1566 3.62452 10.1566 3.43804C10.1566 3.25156 10.0825 3.07272 9.95063 2.94086C9.81877 2.809 9.63993 2.73492 9.45345 2.73492V2.73604Z"
								fill="white" />
						</svg>
					</span>
				</a>
			<?php }
			if ($facebook) {
				?>
				<a href="<?php echo $facebook ?>" target="_blank">
					<span>
						<svg width="15" height="15" viewBox="0 0 10 15" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M6.70233 7.77034H4.88081V13.2106H2.45211V7.77034H0.460582V5.53594H2.45211V3.81157C2.45211 1.86861 3.61788 0.7757 5.39083 0.7757C6.24087 0.7757 7.13949 0.945708 7.13949 0.945708V2.86438H6.14373C5.17225 2.86438 4.88081 3.44726 4.88081 4.07872V5.53594H7.04234L6.70233 7.77034Z"
								fill="white" />
						</svg>
					</span>
				</a>
			<?php }
			if ($youtube) {
				?>
				<a href="<?php echo $youtube ?>" target="_blank">
					<span>
						<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M13.9473 2.11731C14.2526 3.18592 14.2526 5.47581 14.2526 5.47581C14.2526 5.47581 14.2526 7.74025 13.9473 8.8343C13.7946 9.44494 13.3112 9.90292 12.726 10.0556C11.632 10.3354 7.30663 10.3354 7.30663 10.3354C7.30663 10.3354 2.95585 10.3354 1.8618 10.0556C1.2766 9.90292 0.793185 9.44494 0.640526 8.8343C0.335208 7.74025 0.335208 5.47581 0.335208 5.47581C0.335208 5.47581 0.335208 3.18592 0.640526 2.11731C0.793185 1.50667 1.2766 1.02325 1.8618 0.870595C2.95585 0.565277 7.30663 0.565277 7.30663 0.565277C7.30663 0.565277 11.632 0.565277 12.726 0.870595C13.3112 1.02325 13.7946 1.50667 13.9473 2.11731ZM5.88182 7.5367L9.49474 5.47581L5.88182 3.41491V7.5367Z"
								fill="white" />
						</svg>
					</span>
				</a>
			<?php }
			?>
		</div>
	</section>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>