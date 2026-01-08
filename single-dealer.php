<?php
get_header();
$latlong = get_field('latlong');
$staff = get_field('staff');
$phone = get_field('phone');
$email = get_field('email');
$website = get_field('website');
$main_description = get_field('column_one');
$secondary_text = get_field('column_two');
$video_code = get_field('video_code');
$image_gallery = get_field('info_images_repeater');
$street_address = get_field('street_address');
$suburb = get_field('suburb');
$state = get_field('state');
$postcode = get_field('postcode');
$map_address = get_field('map_address');

if (have_posts()):
    while (have_posts()):
        the_post(); ?>

        <div id="dealer-listing" class="main-container">
            <div class="row">
                <div class="single-column">
                    <h6><a href="<?php echo site_url(); ?>">Home</a> > <a
                            href="<?php echo site_url(); ?>/specialist-search/">Specialists</a> >
                        <?php the_title(); ?>
                    </h6>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <h3><?php the_title(); ?></h3>

                    <?php if ($video_code): ?>
                        <div class="dealer-video">
                            <?php echo $video_code ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($main_description): ?>
                        <?php echo $main_description ?>
                    <?php endif; ?>

                    <?php if ($secondary_text): ?>
                        <?php echo $secondary_text ?>
                    <?php endif; ?>

                    <?php if (have_rows('info_images_repeater')): ?>
                        <div class="dealer-gallery">
                            <?php while (have_rows('info_images_repeater')):
                                the_row(); ?>
                                <?php $image = get_sub_field('image'); ?>
                                <a href="<?php echo esc_url($image['url']); ?>" rel="lightbox">
                                    <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>"
                                        alt="<?php echo esc_attr($image['alt']); ?>">
                                </a>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                </div>

                <div class="column">
                    <div class="form-wrapper padding40">
                        <h5>Contact this specialist</h5>
                        <p>Fill in the form below to send your enquiry.</p>
                        <?php echo do_shortcode('[gravityform id="4" title="false" description="false" ajax="true"]'); ?>
                    </div>

                    <div class="dealer-contact">
                        <?php if ($phone): ?>
                            <div class="dealer-phone">
                                <span class="phone-icon"></span>
                                Call this specialist: <a href="tel:<?php echo $phone ?>"><?php echo $phone ?></a>
                            </div>
                        <?php endif; ?>

                        <?php if ($email): ?>
                            <div class="dealer-email">
                                <span class="email-icon"></span>
                                Email: <a href="mailto:<?php echo $email ?>"><?php echo $email ?></a>
                            </div>
                        <?php endif; ?>

                        <?php if ($website): ?>
                            <div class="dealer-website">
                                <span class="website-icon"></span>
                                Website: <a href="<?php echo $website ?>" target="_blank"><?php echo $website ?></a>
                            </div>
                        <?php endif; ?>
                    </div>


                    <h5>Our location</h5>
                    <div class="dealer-address">
                        <?php $address = explode(",", $map_address['address']);
                        echo $address[0] . ', '; //street number
                        echo $address[1] . ',' . $address[2]; //city, state + zip
                        ?>
                    </div>

                    <div class="acf-map" data-zoom="16">
                        <div class="marker" data-lat="<?php echo esc_attr($map_address['lat']); ?>"
                            data-lng="<?php echo esc_attr($map_address['lng']); ?>">
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <?php endwhile; endif;

get_footer();
