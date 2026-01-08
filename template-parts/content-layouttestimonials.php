<?php
if (get_row_layout() == 'testimonial_section'):
    $section_title = get_sub_field('section_title');
    ?>
    <section class="testimonial-section">
        <div class="container">
            <div class="row title">
                <div class="single-column">
                    <h4><?php echo esc_html($section_title); ?></h4>
                </div>
            </div>
            <div class="testimonial-container">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php
                        $testimonial_query = new WP_Query(
                            array(
                                'post_type' => 'testimonial',
                                'posts_per_page' => -1,
                                'orderby' => 'date',
                                'order' => 'ASC'
                            )
                        );
                        if ($testimonial_query->have_posts()):
                            while ($testimonial_query->have_posts()):
                                $testimonial_query->the_post();
                                ?>
                                <div class="swiper-slide">
                                    <p><?php the_content(); ?></p>
                                    <h6><?php the_title(); ?></h6>
                                    <img class="stars" src="<?php echo get_template_directory_uri(); ?>/images/star.png">
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else:
                            ?>
                            <div class="swiper-slide">
                                <p>No testimonials found.</p>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>

            <div class="row navigation">
                <button class="swiper-button-prev"></button>
                <button class="swiper-button-next"></button>
            </div>
        </div>
    </section>
    <?php
endif;