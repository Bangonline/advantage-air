<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bang_Digital
 */

get_header();
?>

<main id="single-promo-template" class="site-main single-promo">
    <div class="container">
        <div class="row">
            <?php
            while (have_posts()):
                the_post();

                get_template_part('template-parts/content-page', get_post_type());

                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'bang-digital') . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'bang-digital') . '</span> <span class="nav-title">%title</span>',
                    )
                );

            endwhile; // End of the loop.
            ?>
        </div>

    </div>



</main><!-- #main -->

<?php
get_sidebar();
get_footer();
