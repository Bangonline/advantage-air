<?php
if (get_row_layout() == 'three_column_grid'):
    $title = get_sub_field('title');
    $subtitle = get_sub_field('subtitle');
    $grid_sections = get_sub_field('grid_section');
    $block_padding = get_sub_field('block_padding');
    $image_fitment = get_sub_field('image_fitment');

    $image_fit = '';
    switch ($image_fitment) {
        case 'contain':
            $image_fit = 'contain';
            break;
        case 'cover':
            $image_fit = 'cover';
            break;
    }

    $padding = '';
    switch ($block_padding) {
        case 'standard':
            $padding = '';
            break;
        case 'none':
            $padding = 'no-padding';
            break;
    }
    ?>
    <section class="three-column-grid <?php echo esc_attr($padding); ?>">
        <div class="container">
            <?php if ($title || $subtitle): ?>
                <div class="row">
                    <div class="single-column">
                        <h2><?php echo esc_html($title); ?></h2>
                        <p><?php echo esc_html($subtitle); ?></p>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <?php if ($grid_sections): ?>
                    <?php foreach ($grid_sections as $grid_section): ?>
                        <?php
                        $grid_image = $grid_section['grid_image'];
                        $grid_title = $grid_section['grid_title'];
                        $grid_content = $grid_section['grid_content'];
                        $grid_cta = $grid_section['grid_cta'];

                        if ($grid_image || $grid_title || $grid_content || $grid_cta): ?>
                            <div class="column">
                                <?php if ($grid_image): ?>
                                    <div class="grid-image-container <?php echo esc_attr($image_fit); ?>">
                                        <img class="<?php echo esc_attr($image_fit); ?>" src="<?php echo esc_url($grid_image['url']); ?>"
                                            alt="<?php echo esc_attr($grid_image['alt']); ?>">
                                        <div class="hover-overlay"></div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($grid_title): ?>
                                    <h6><?php echo esc_html($grid_title); ?></h6>
                                <?php endif; ?>
                                <?php if ($grid_content): ?>
                                    <p><?php echo esc_html($grid_content); ?></p>
                                <?php endif; ?>
                                <?php if ($grid_cta): ?>
                                    <?php 
                                    $cta_url = $grid_cta;
                                    // Check if this is an APK file and generate proper download URL
                                    if (pathinfo($cta_url, PATHINFO_EXTENSION) === 'apk') {
                                        $cta_url = get_apk_download_url($cta_url);
                                    }
                                    ?>
                                    <a href="<?php echo esc_url($cta_url); ?>" class="link-style-tertiary">Learn More</a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
endif;