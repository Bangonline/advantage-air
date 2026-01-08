<?php
if (get_row_layout() == 'text_image_block_full_width'):
    $image = get_sub_field('image');
    $title = get_sub_field('title');
    $text = get_sub_field('text');
    $cta_links = get_sub_field('cta_links');
    $text_alignment = get_sub_field('text_alignment');
    $background_colour = get_sub_field('background_colour');
    $alignment = '';
    switch ($text_alignment) {
        case 'left':
            $alignment = 'left-aligned';
            break;
        case 'right':
            $alignment = 'right-aligned';
            break;
    }
    $background = '';
    switch ($background_colour) {
        case 'white':
            $background = 'white-bg';
            break;
        case 'black':
            $background = 'black-bg';
            break;
        case 'lightgrey':
            $background = 'lightgrey-bg';
            break;
        case 'textblack':
            $background = 'textblack-bg';
            break;
        case 'textgrey':
            $background = 'textgrey-bg';
            break;
        case 'primaryblue':
            $background = 'primaryblue-bg';
            break;
        case 'secondaryblue':
            $background = 'secondaryblue-bg';
            break;
    }
    ?>
    <section class="text-image-block-full-width <?php echo esc_attr($background); ?>">
        <div class="container">
            <div class="row <?php echo esc_attr($alignment); ?>">
                <div class="column fullwidth-image-column">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
                <div class="column text-column">
                    <h2><?php echo esc_html($title); ?></h2>
                    <div class="content">
                        <?php echo $text; ?>
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