<?php
/**
 * Bang Digital functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bang_Digital
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

//Custom login screen Logo
function my_login_logo_one()
{
	?>
	<style type="text/css">
		body.login div#login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/bangdigital_logo.png);
			padding-bottom: 0px;
			width: 180px;
			background-size: contain;
		}
	</style>
	<?php
}
add_action('login_enqueue_scripts', 'my_login_logo_one');

function bang_digital_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bang Digital, use a find and replace
	 * to change 'bang-digital' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('bang-digital', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'bang-digital'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'bang_digital_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'bang_digital_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bang_digital_content_width()
{
	$GLOBALS['content_width'] = apply_filters('bang_digital_content_width', 1400);
}
add_action('after_setup_theme', 'bang_digital_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bang_digital_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'bang-digital'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'bang-digital'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'bang_digital_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function bang_digital_scripts()
{
	wp_enqueue_style('bang-digital-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('bang-digital-style', 'rtl', 'replace');


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'bang_digital_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Register Custom Menu
function register_my_menus()
{
	register_nav_menus(
		array(
			'top-menu' => __('Top Menu'),
			'smart-aircon-menu' => __('Smart Aircon Menu'),
			'support-menu' => __('Support Menu'),
			'legal-menu' => __('Legal Menu')
		)
	);
}
add_action('init', 'register_my_menus');

//Accordion script
function accordion_script()
{
	wp_enqueue_script('registered-accordion-script', get_template_directory_uri() . '/js/accordion.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'accordion_script');

//Tab script
function tab_script()
{
	wp_enqueue_script('registered-tab-script', get_template_directory_uri() . '/js/tabs.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'tab_script');

// Swiper script
function swiper_script()
{
	wp_enqueue_script('registered-swiper-script', get_template_directory_uri() . '/js/swiper.js', array('jquery'), '1.5', true);
}
add_action('wp_enqueue_scripts', 'swiper_script');

// Google Maps API script
function enqueue_google_maps_script()
{
	// Enqueue your custom JS first
	wp_enqueue_script('registered-functions-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '2.0', true);

	// Get Google Maps API key from ACF options
	$google_maps_key = get_field('google_maps_api_key', 'option');

	// Localize script to pass API key to JavaScript
	wp_localize_script('registered-functions-script', 'advantageAirConfig', array(
		'googleMapsApiKey' => $google_maps_key ? $google_maps_key : ''
	));

	// Add initMap to window object before loading Google Maps
	wp_add_inline_script('registered-functions-script', 'window.initMap = function() {};', 'before');

	// Now enqueue Google Maps API
	if ($google_maps_key) {
		wp_enqueue_script('google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=' . esc_attr($google_maps_key) . '&callback=initMap', array('registered-functions-script'), null, true);
	}
}
add_action('wp_enqueue_scripts', 'enqueue_google_maps_script');


// Navigation script
function navigation_script()
{
	wp_enqueue_script('registered-navigation-script', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '1.2', true);
}
add_action('wp_enqueue_scripts', 'navigation_script');

// Geodatastore
add_filter('sc_geodatastore_meta_keys', 'dealer_geodata');
function dealer_geodata($keys)
{
	$keys[] = "latlong";
	return $keys;
}

// Dealer Search
function get_the_dealers($dealer_query, $product, $region)
{

	$dealer_query_results = new WP_Query($dealer_query);


	// DEBUUG
	// echo "<div class='col-12'>[DEBUG - THE QUERY RETURNED ".$dealer_query_results->post_count. " RESULTS]</div>";

	if ($dealer_query_results->have_posts()):

		while ($dealer_query_results->have_posts()):

			$dealer_query_results->the_post();

			get_template_part('template-parts/content', 'dealer-thumb');


		endwhile;

		wp_reset_postdata();

	else:
		echo noResults($product, $region, false);
	endif;
}

function get_dealer_by_postcode($postcode, $product, $region, $use_postcode)
{

	if ($postcode) {

		// Get Google Maps API key from ACF options (same key used for Geocoding API)
		$google_maps_key = get_field('google_maps_api_key', 'option');

		if (!$google_maps_key) {
			return; // Exit if no API key configured
		}

		//Get lat/long data for postcode
		$google_map_url = 'https://maps.google.com/maps/api/geocode/json?key=' . esc_attr($google_maps_key) . '&components=postal_code:' . $postcode . '|country:AU&region=AU';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $google_map_url);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$coordinates = curl_exec($ch);

		if (!curl_errno($ch)) {
			$coordinates = json_decode($coordinates);
			curl_close($ch);
		} else {
			$coordinates = false;
		}
		//Check if lookup results in coordinates that include WA, NSW or QLD in state field
		if ($coordinates && (stateMatchCheck($coordinates->results[0]->address_components, "NSW") || stateMatchCheck($coordinates->results[0]->address_components, "QLD") || stateMatchCheck($coordinates->results[0]->address_components, "WA"))) {

			$sc_gds = new sc_GeoDataStore();

			// Radius check
			// If we are regional WA we use 100km
			// If it's not we use 20km

			$GLOBALS['radius'] = 20; // km

			if ($region == "wa" && ($postcode < 6000 || $postcode > 6215)) {
				$GLOBALS['radius'] = 100; // km
			}

			if ($region == "wa" && ($postcode == 6168)) {
				$GLOBALS['radius'] = 35; // km
			}

			if ($region == "nsw" && ($postcode < 2000 || $postcode > 2234)) {
				$GLOBALS['radius'] = 100; // km
			}

			if ($region == "nsw" && ($postcode < 2233)) {
				$GLOBALS['radius'] = 25; // km
			}

			// Get ID's of dealers within that radius
			$ids = (array) $sc_gds->getPostIDsOfInRange('dealer', $GLOBALS['radius'] / 1.6, $coordinates->results[0]->geometry->location->lat, $coordinates->results[0]->geometry->location->lng, 'ASC');

			if (count($ids) != 0) {

				$the_query = array(
					'post__in' => $ids,
					'post_type' => 'dealer',
					'orderby' => 'post__in',
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'products',
							'field' => 'slug',
							'terms' => $product
						)
					)
				);

				// The Query
				get_the_dealers($the_query, $product, $region);
			} else {
				echo noResults($product, $region, $use_postcode);
			}
		} else {
			?>
			<div class="col-12 text-center">
				<p>
					<strong>Error:</strong>
					Postcode is not in <em><?php echo strtoupper($region) ?></em> or is invalid - please re-enter your postcode or
					select another state.
				</p>
			</div>
			<?php
		}
	}
}


function searchBox($product, $region, $postcode, $use_postcode)
{

	$specialist_categories = get_terms(
		array(
			'taxonomy' => 'products',
			'hide_empty' => false,
			'parent' => 0
		)
	);

	$specialist_region = get_terms(
		array(
			'taxonomy' => 'regions',
			'hide_empty' => false,
			'parent' => 0
		)
	);
	?>
	<form method="get" class="" id="dealer-search-inline" action="/specialist">
		<h3 class="text-center">Would you like to search again?</h3>
		<div class="row">
			<div class="form-group col-12 col-md-6 col-lg-3">
				<h6>Search Results</h6>
			</div>
			<div class="form-group col-12 col-md-6 col-lg-3">
				<select class="select form-control" id="category-filter" name="fwp_categories" required>
					<option value="">Please select an option</option>
					<?php
					foreach ($specialist_categories as $category) {
						echo '<option value="' . $category->slug . '"';
						if ($category->slug == $product) {
							echo "selected";
						}
						echo '>';
						echo $category->name;
						echo '</option>';
					}
					?>
				</select>
			</div>
			<div class="form-group region-filter col-12 col-md-6 col-lg-3">
				<select class="select form-control" id="region-filter" name="region" required>
					<option value="">Select an option</option>
					<?php
					foreach ($specialist_region as $the_region) {
						echo '<option value="' . $the_region->slug . '"';
						if ($the_region->slug == $region) {
							echo "selected";
						}
						echo '>';
						echo $the_region->name . '</option>';
					}
					?>
				</select>
			</div>
			<div class="form-group col-md-6 col-lg-3 col-12" id="postcode-search" data-hide-effect="disable">
				<input type="text" name="postcode" class="form-control" size='5' placeholder="Postcode"
					value="<?php echo $postcode ?>" <?php if (!$use_postcode) { ?>disabled<?php } ?>>
			</div>
			<div class="form-group col-md-6 col-lg-3 col-12">
				<div>
					<button name="submit" type="submit" class="btn darkblue-bg white-txt">
						Update Search
					</button>
				</div>
			</div>
		</div>
	</form>

	<?php
}


function noResults($product, $region, $use_postcode)
{
	if ($product != "" && $region != "") {
		$output = "";

		// Grab the pretty name
		$productname = prettyName($product);
		if ($use_postcode) {
			$output = "Sorry, no <strong>" . $productname . "</strong> specialists were found within " . $GLOBALS['radius'] . "km of your location.";
		} else {
			$output = "Sorry, no <strong>" . $productname . "</strong> specialists were found in <strong>" . strtoupper($region) . "</strong>";
		}
		return "<p class='search-results-error' style='text-align:center; width:300%;'>" . $output . "</p>";
	}
}

function stateMatchCheck($query, $check)
{
	$trigger = false; // Initialize variable to prevent undefined variable warning

	if ($query && $check) {
		foreach ($query as $key => $address_result) {
			if ($address_result->short_name == $check) {
				$trigger = true;
			}
		}
	}
	if ($trigger) {
		return true;
	} else {
		return false;
	}
}

function prettyName($product)
{

	//Use slug to find pretty name of category

	$productArray = get_term_by('slug', $product, 'products');
	$productname = $productArray->name;

	return $productname;
}

function createSearchHeading($product, $region, $postcode)
{

	if ($product != '' && $region != '') {

		if ($postcode) {
			$postcode = " (" . $postcode . ")";
		}

		echo '<div class="content-heading"><h2>Your <strong>' . prettyName($product) . '</strong> specialists in <strong>' . strtoupper($region) . $postcode . '</strong></h2>
        </div>';
	}
}


function get_dealers_by_category($product, $region)
{

	$the_query = array(
		'post_type' => 'dealer',
		'orderby' => 'rand',
		'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'products',
				'field' => 'slug',
				'terms' => $product
			),
			array(
				'taxonomy' => 'regions',
				'field' => 'slug',
				'terms' => $region
			)
		)
	);

	// The Query
	get_the_dealers($the_query, $product, $region);
}

// Woocommerce
function mytheme_add_woocommerce_support()
{
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

/**
 * Check if WooCommerce is activated
 */
if (!function_exists('is_woocommerce_activated')) {
	function is_woocommerce_activated()
	{
		if (class_exists('woocommerce')) {
			return true;
		} else {
			return false;
		}
	}
}

add_filter('woocommerce_background_image_regeneration', '__return_false');
add_filter('woocommerce_resize_images', '__return_false');

// Remove meto from single page
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

//Remove archive title context
add_filter('get_the_archive_title_prefix', '__return_empty_string');

/** Move the form to the top */
function formtop()
{
	echo "<div class='formtop'></div>";
}
add_action('woocommerce_single_product_summary', 'formtop', 10);

//Dashicons
function ww_load_dashicons()
{
	wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ww_load_dashicons', 999);

//WooCommerce Tabs
add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

function woo_remove_product_tabs($tabs)
{
	unset($tabs['reviews']);          // Remove the reviews tab
	unset($tabs['additional_information']);   // Remove the additional information tab
	return $tabs;
}


// 1. Remove the description product tab
add_filter('woocommerce_product_tabs', 'remove_descrip_product_tab', 98);
function remove_descrip_product_tab($tabs)
{
	// Remove the description tab
	unset($tabs['description']);

	return $tabs;
}

// 2. Add the product description after the product short description
add_action('woocommerce_single_product_summary', 'my_custom_action', 25);
function my_custom_action()
{
	global $post;

	// Product description output
	echo '<div class="product-post-content">' . get_the_content() . '</div>';
}

/**
 * Hide shipping rates when free shipping is available.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function my_hide_shipping_when_free_is_available($rates)
{
	$free = array();
	foreach ($rates as $rate_id => $rate) {
		if ('free_shipping' === $rate->method_id) {
			$free[$rate_id] = $rate;
			break;
		}
	}
	return !empty($free) ? $free : $rates;
}
add_filter('woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100);

//Free Shipping Notice
function woocommerce_add_topbar()
{
	?>
	<div id="woocommerce-notice-bar">
		<div class="content">
			<p class="text-center"><span class="cart-icon"></span> <strong>Free shipping</strong> on all orders over
				$100.</p>
		</div>
	</div>
	<?php
}
add_action('woocommerce_after_add_to_cart_form', 'woocommerce_add_topbar', 1);

//Custom Shipping and Refunds text
// Add content after the add to cart section
//add_action('woocommerce_after_add_to_cart_form', 'add_custom_tabs_section');
// Add content before the related products section
add_action('woocommerce_after_single_product_summary', 'add_custom_tabs_section');

function add_custom_tabs_section()
{
	$shipping_information = get_field('shipping_information', 'option');
	$refunds_returns = get_field('refunds_and_returns', 'option');
	$specifications = get_field('specifications');
	?>
	<section class="tab-section">
		<div class="container">
			<div class="tab-container">
				<ul class="tab-list">
					<li class="tab active" data-tab="tab0">Shipping information</li>
					<li class="tab" data-tab="tab1">Refunds and returns</li>
					<?php if ($specifications): ?>
						<li class="tab" data-tab="tab2">Specifications</li>
					<?php endif; ?>
				</ul>
				<div class="tab-item">
					<div id="tab0" class="tab-panel active">
						<div class="tab-content">
							<?php echo wp_kses_post($shipping_information); ?>
						</div>
					</div>
					<div id="tab1" class="tab-panel">
						<div class="tab-content">
							<?php echo wp_kses_post($refunds_returns); ?>
						</div>
					</div>
					<?php if ($specifications): ?>
						<div id="tab2" class="tab-panel">
							<div class="tab-content">
								<?php echo wp_kses_post($specifications); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
	<?php
}

//Allow uploads for the apk file
add_filter('upload_mimes', 'allow_custom_mimes');

function allow_custom_mimes($existing_mimes = array())
{
	// ' with mime type 'application/vnd.android.package-archive'
	$existing_mimes['apk'] = 'application/vnd.android.package-archive';
	return $existing_mimes;
}

// APK Download Handler
add_action('wp_ajax_download_apk', 'handle_apk_download');
add_action('wp_ajax_nopriv_download_apk', 'handle_apk_download');

function handle_apk_download() {
	$file = isset($_GET['file']) ? sanitize_text_field($_GET['file']) : '';
	
	if (empty($file)) {
		wp_die('No file specified');
	}

	// Validate the file exists and is an APK
	$upload_dir = wp_upload_dir();
	$file_path = $upload_dir['basedir'] . '/' . $file;

	if (!file_exists($file_path) || pathinfo($file_path, PATHINFO_EXTENSION) !== 'apk') {
		wp_die('File not found or invalid file type');
	}

	// Get file info
	$file_name = basename($file_path);
	$file_size = filesize($file_path);

	// Set proper headers for APK download
	header('Content-Type: application/vnd.android.package-archive');
	header('Content-Disposition: attachment; filename="' . $file_name . '"');
	header('Content-Length: ' . $file_size);
	header('Content-Transfer-Encoding: binary');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	header('Expires: 0');

	// Clean output buffer
	if (ob_get_level()) {
		ob_end_clean();
	}

	// Read and output the file
	readfile($file_path);
	exit;
}

// Function to generate proper APK download URL
function get_apk_download_url($apk_url) {
	// Extract the file path from the URL
	$upload_dir = wp_upload_dir();
	$upload_url = $upload_dir['baseurl'];
	
	if (strpos($apk_url, $upload_url) === 0) {
		$file_path = str_replace($upload_url . '/', '', $apk_url);
		return admin_url('admin-ajax.php?action=download_apk&file=' . urlencode($file_path));
	}
	
	return $apk_url; // Return original URL if not in uploads directory
}

//ACF Google Maps API

add_filter('acf/settings/google_api_key', function () {
	$google_maps_key = get_field('google_maps_api_key', 'option');
	return $google_maps_key ? $google_maps_key : '';
});

//Send dealer contact form to dealers
add_filter('gform_field_value_specialist_email', 'populate_specialist_email');
function populate_specialist_email($value)
{
	if (is_singular('dealer')) {
		// Get the specialist's email from the ACF field
		$specialist_email = get_field('email', get_the_ID());
		return $specialist_email ? $specialist_email : '';
	}
	return $value;
}
