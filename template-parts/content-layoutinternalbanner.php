<?php
//Internal Banner Layout
if (get_row_layout() == 'banner_internal_layout'):
    $background_image = get_sub_field('banner_internal_background_image');
    $heading = get_sub_field('banner_internal_heading');
    $subheading = get_sub_field('banner_internal_subheading');
    $form_id = get_sub_field('banner_internal_form_id');
    $form_heading = get_sub_field('form_heading');
    $form_description = get_sub_field('form_description');
    $toggle_overlay = get_sub_field('toggle_overlay');
    $unique_id = get_sub_field('unique_id');
    $row_class = ($heading || $subheading) ? 'row' : 'row row-reverse';
    ?>
    <section <?php if ($unique_id): ?>id="<?php echo esc_html($unique_id); ?>" <?php endif; ?>
        class="internal-banner-layout with-overlay"
        style="background-image: url('<?php echo esc_url($background_image['url']); ?>');">
        <?php if ($toggle_overlay): ?>
            <div class="overlay"></div>
        <?php endif; ?>
        <div class="container">
            <div class="<?php echo esc_attr($row_class); ?>">
                <?php if ($heading || $subheading): ?>
                    <div class="column">
                        <?php if ($heading): ?>
                            <h1><?php echo esc_html($heading); ?></h1>
                        <?php endif; ?>
                        <?php if ($subheading): ?>
                            <p><?php echo esc_html($subheading); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="column">
                    <div class="floating-form">
                        <?php if ($form_heading): ?>
                            <h2><?php echo esc_html($form_heading); ?></h2>
                        <?php endif; ?>
                        <?php if ($form_description): ?>
                            <p><?php echo esc_html($form_description); ?></p>
                        <?php endif; ?>
                        <?php echo do_shortcode('[gravityform id="' . intval($form_id) . '" title="false" description="false" ajax="true"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
endif;