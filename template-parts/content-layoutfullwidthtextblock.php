<?php
if (get_row_layout() == 'full_width_text_section'):
    // Code for full_width_text_section
    $title = get_sub_field('title');
    $content = get_sub_field('content');
    $cta_links = get_sub_field('cta_links');
    $background_colour = get_sub_field('background_colour');
    $background_image = get_sub_field('background_image');
    $page_padding = get_sub_field('page_padding');

    $padding_classes = array(
        'full_container' => 'full-container',
        'small_container' => 'small-container'
    );

    // Map background colours to class names
    $background_classes = array(
        'white' => 'white-bg',
        'black' => 'black-bg',
        'lightgrey' => 'lightgrey-bg',
        'textblack' => 'textblack-bg',
        'textgrey' => 'textgrey-bg',
        'primaryblue' => 'primaryblue-bg',
        'secondaryblue' => 'secondaryblue-bg'
    );


    // Determine the padding class
    $padding_class = isset($padding_classes[$page_padding]) ? $padding_classes[$page_padding] : '';

    // Determine the section class
    $section_class = isset($background_classes[$background_colour]) ? $background_classes[$background_colour] : '';

    // Add background image style if exists
    $background_style = !empty($background_image) ? 'style="background-image: url(\'' . esc_url($background_image['url']) . '\');"' : '';
    ?>
    <section class="full-width-text-section <?php echo esc_attr($padding_class); ?> <?php echo esc_attr($section_class); ?>"
        <?php echo $background_style; ?>>
        <?php if ($background_image): ?>
            <div class="overlay"></div>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="single-column">
                    <h2><?php echo esc_html($title); ?></h2>
                    <div class="content">
                        <?php echo $content; ?>
                    </div>
                    <div class="cta-links">
                        <?php
                        get_template_part('template-parts/content', 'linkstyles');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
endif;