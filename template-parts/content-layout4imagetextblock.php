<?php
//Text and 4 Image Block
if (get_row_layout() == 'text_image_masonry_block'):
    $image1 = get_sub_field('image_1');
    $image2 = get_sub_field('image_2');
    $image3 = get_sub_field('image_3');
    $image4 = get_sub_field('image_4');
    $hashtagtitle = get_sub_field('hashtag_title');
    $title = get_sub_field('title');
    $text = get_sub_field('text');
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
        case 'lightblue':
            $background = 'lightblue-bg';
            break;
    }
    ?>
    <section class="text-image-masonry-block <?php echo esc_attr($background); ?>">
        <div class="container">
            <div class="row <?php echo esc_attr($alignment); ?>">
                <div class="column masonry-grid">
                    <div class="img-grid-1">
                        <img src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>">
                        <img src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>">
                    </div>
                    <div class="img-grid-2">
                        <img src="<?php echo esc_url($image3['url']); ?>" alt="<?php echo esc_attr($image3['alt']); ?>">
                        <img src="<?php echo esc_url($image4['url']); ?>" alt="<?php echo esc_attr($image4['alt']); ?>">
                    </div>
                </div>
                <div class="column">
                    <h3><?php echo esc_html($hashtagtitle); ?></h3>
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