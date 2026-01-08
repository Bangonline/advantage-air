<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bang_Digital
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="overlay" style="display:none;"></div>
    <section class="main-container home-intro">
        <div class="home-banner">
            <?php
            $custom_heading = get_field('heading');

            if ($custom_heading) {
                echo '<h1>' . esc_html($custom_heading) . '</h1>';
            }

            if (have_rows('home_banner_links')):
                echo '<ul class="home-banner-links">';

                while (have_rows('home_banner_links')):
                    the_row();
                    $link = get_sub_field('link');

                    if ($link):
                        static $number = 0;
                        echo '<li><a class="link' . $number++ + 1 . '" href="' . esc_url($link['url']) . '" target="' . esc_attr($link['target']) . '">' . esc_html($link['title']) . '</a></li>';
                    endif;
                endwhile;

                echo '</ul>';
            endif;
            ?>

        </div>
    </section>

    <section class="home-images">
        <?php
        if (have_rows('banner_images')):
            echo '<div class="banner-images-row">';
            while (have_rows('banner_images')):
                the_row();
                $image_id = get_sub_field('home_banner_image');
                if ($image_id):
                    $image = wp_get_attachment_image($image_id, 'large'); // 'full' can be replaced with any image size you want
                    if ($image):
                        echo '<div class="banner-image">' . $image . '</div>';
                    endif;
                endif;
            endwhile;
            echo '</div>';
        else:
            echo '<p>No banner images available.</p>';
        endif;
        ?>
    </section>

    <?php
    if (have_rows('layout_options')):
        while (have_rows('layout_options')):
            the_row();

            //Internal Banner Layout
            get_template_part('template-parts/content', 'layoutinternalbanner');

            //Text and Image Block
            get_template_part('template-parts/content', 'layouttextimageblock');

            //3 column grid layout
            get_template_part('template-parts/content', 'layout3columngrid');

            //Full Width Accordion Section
            get_template_part('template-parts/content', 'layoutfullwidthaccordion');

            //Full Width Text Section
            get_template_part('template-parts/content', 'layoutfullwidthtextblock');

            // FAQ Section
            get_template_part('template-parts/content', 'layoutfaqsection');

            // Text and 4 Image Block
            get_template_part('template-parts/content', 'layout4imagetextblock');

            // Testimonial Section
            get_template_part('template-parts/content', 'layouttestimonials');

            // Tabbed Section
            get_template_part('template-parts/content', 'layouttabs');

        endwhile;
    endif;
    ?>

</main>

<?php
get_sidebar();
get_footer();
