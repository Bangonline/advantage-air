<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 * Template Name: Dealer Search
 * @package WordPress
 */

get_header();

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
// Check if the 'region' and 'fwp_categories' keys exist in the $_GET array
$region = isset($_GET['region']) ? $_GET['region'] : null;
$product = isset($_GET['fwp_categories']) ? $_GET['fwp_categories'] : null;

if (($product != "mylights" && $product != "myplace") && ($region == "qld" || $region == "nsw")) {
    // Check if the 'postcode' key exists in the $_GET array
    $postcode = isset($_GET['postcode']) ? $_GET['postcode'] : false;
} else {
    $postcode = false;
}

?>

<div id="primary" class="content-area specialist-content-area">
    <main id="main" class="site-main" role="main">
        <?php
        $specialist_bg = get_field('specialist_bg');
        $specialist_bg_url = wp_get_attachment_image_src($specialist_bg, 'full')[0];
        $specialist_bg_height = wp_get_attachment_image_src($specialist_bg, 'full')[2];
        $page_heading = get_field('page_heading');
        $page_subheading = get_field('page_subheading');
        ?>
        <section class="specialist dealer-search with-overlay"
            style="background-image: url(<?php echo $specialist_bg_url; ?>);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="column">
                        <h1><?php echo esc_html($page_heading); ?></h1>
                        <p><?php echo esc_html($page_subheading); ?></p>
                    </div>
                    <div class="column">
                        <div id="dealer-search" class="floating-form">
                            <p>Select your product and state and we’ll find the right specialists in your location.</p>
                            <form method="get" id="dealer-search-form" action="/specialist">
                                <div class="form-group">
                                    <label class="control-label h2" for="category-filter">
                                        Which product do you need?
                                    </label>
                                    <select class="select form-control" id="category-filter" name="fwp_categories"
                                        required>
                                        <option value="">Please select an option</option>
                                        <?php
                                        if (!empty($specialist_categories) && is_array($specialist_categories)) {
                                            foreach ($specialist_categories as $category) {
                                                if (is_object($category)) {
                                                    echo '<option value="' . esc_attr($category->slug) . '"';
                                                    if ($category->slug == $product) {
                                                        echo ' selected';
                                                    }
                                                    echo '>';
                                                    echo esc_html($category->name);
                                                    echo '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label h2" for="region-filter">
                                        Which state do you live in?
                                    </label>
                                    <select class="select form-control" id="region-filter" name="region" required>
                                        <option value="">Please select an option</option>
                                        <?php
                                        if (!empty($specialist_region) && is_array($specialist_region)) {
                                            foreach ($specialist_region as $the_region) {
                                                if (is_object($the_region)) {
                                                    echo '<option value="' . esc_attr($the_region->slug) . '"';
                                                    if ($the_region->slug == $region) {
                                                        echo ' selected';
                                                    }
                                                    echo '>';
                                                    echo esc_html($the_region->name) . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group" id="postcode-search" data-hide-effect="hide" <?php if (($region != 'qld') || ($region != 'wa') || ($region != 'nsw')) { ?>style="display:none" <?php } ?>>
                                    <label for="postcode">
                                        Postcode
                                    </label>

                                    <input type="text" name="postcode" class="form-control" size='5'
                                        value="<?php echo esc_attr($postcode); ?>">
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button name="submit" id="specialist-btn" type="submit"
                                            class="btn darkblue-bg white-txt">
                                            Find a Specialist
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- .site-main -->
</div><!-- .content-area -->


<?php get_footer(); ?>