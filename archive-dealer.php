<?php
/* * *
 * Archive Dealer Template
 */

get_header();

$region = $_GET['region'];
$product = $_GET['fwp_categories'];

// Use this to define which combinations should use the postcode search
if ((($region == "wa" || $region == 'qld' || $region == 'nsw') && $product != 'mylights' && $product != 'myplace')) {
    $use_postcode = true;
} else {
}

//Only define a postcode when state is QLD, NSW or WA and is not a my lights or my place search
if ($use_postcode) {
    $postcode = $_GET['postcode'];
} else {
    $postcode = false;
}

static $radius = 20;

/*****
 * START OUTPUT OF DEALER SEARCH
 */
?>


<div class="content main-container padding-top">
    <div class="container">
        <div class="row">
            <div class="single-column">
                <?php

                echo createSearchHeading($product, $region, $postcode);
                searchBox($product, $region, $postcode, $use_postcode);

                ?>

                <div class="row" id='specialist-search-results-output'>
                    <?php
                    if ($use_postcode) {

                        // Output dealers by postcode
                        // Applies to QLD, And WA when the category is not "myLights"
                    
                        get_dealer_by_postcode($postcode, $product, $region, $use_postcode);

                    } else {

                        // Output dealers by region & product
                        get_dealers_by_category($product, $region);

                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- content -->

<?php get_footer(); ?>