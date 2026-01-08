<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 * Template Name: Status Codes
 * @package WordPress
 */

get_header();

?>

<div id="status-codes" class="content-area status-codes">
    <main id="main" class="main-container" role="main">

        <div class="container">
            <div class="row">
                <div class="single-column padding40h">
                    <h2 class="status-codes-page-title text-center">
                        <?php the_title(); ?>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="single-column padding40h">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="single-column">
                    <div class="status-code-search">
                        <p><strong>Please enter the status code that is appearing on your phone or wall mounted
                                touchscreen.</strong></p>
                        <p>If the code is correct and no match is found please contact our MyTeam Tech Support Line on
                            1300 850 191.</p>
                        <input type="text" id="search-filter" placeholder="Enter the status code you see on your unit">
                    </div>
                </div>
            </div>
        </div>

        <?php
        // status code listing
        if (have_rows('status_code_item')):
            ?>
            <div class="status-code">
                <div class="container">
                    <div class="row">
                        <?php
                        while (have_rows('status_code_item')):
                            the_row();
                            $status_code = get_sub_field('status_code');
                            $status_code_description = get_sub_field('status_code_description');
                            ?>
                            <div class="single-column">
                                <div class="status-code-item" id="<?php echo $status_code; ?>">
                                    <h4><strong>Status Code <?php echo $status_code; ?></strong></h4>
                                    <?php echo $status_code_description; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <div class="single-column">
                            <div id="search-noresult">
                                <p>No results found... </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->


<?php get_footer(); ?>