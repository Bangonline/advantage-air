<?php
if (get_row_layout() == 'full_width_accordion_section'):
    $section_title = get_sub_field('section_title');
    $section_subtitle = get_sub_field('section_subtitle');
    $accordion_fields = get_sub_field('accordion_fields');
    ?>
    <section class="full-width-accordion-section">
        <div class="container">
            <div class="row">
                <div class="single-column text-center">
                    <h2><?php echo esc_html($section_title); ?></h2>
                    <p><?php echo esc_html($section_subtitle); ?></p>
                </div>
            </div>
            <div class="accordion" id="full-width-accordion">
                <?php if ($accordion_fields): ?>
                    <?php foreach ($accordion_fields as $index => $accordion_field): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-<?php echo $index; ?>">
                                <?php if (!empty($accordion_field['accordion_icon'])): ?>
                                    <img src="<?php echo esc_url($accordion_field['accordion_icon']['url']); ?>"
                                        alt="<?php echo esc_attr($accordion_field['accordion_icon']['alt']); ?>">
                                <?php endif; ?>
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-<?php echo $index; ?>" aria-expanded="true"
                                    aria-controls="collapse-<?php echo $index; ?>">
                                    <?php echo esc_html($accordion_field['accordion_title']); ?>
                                    <img class="down-arrow" src="<?php echo get_template_directory_uri(); ?>/images/down.png"
                                        width="30px">
                                </button>
                            </h2>
                            <div id="collapse-<?php echo $index; ?>" class="panel" aria-labelledby="heading-<?php echo $index; ?>"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <?php
                                        $column_1_type = $accordion_field['column_1_type'];
                                        if ($column_1_type == 'image' && !empty($accordion_field['accordion_image'])): ?>
                                            <div class="column">
                                                <img src="<?php echo esc_url($accordion_field['accordion_image']['url']); ?>"
                                                    alt="<?php echo esc_attr($accordion_field['accordion_image']['alt']); ?>">
                                            </div>
                                        <?php elseif ($column_1_type == 'map' && !empty($accordion_field['map_address'])): ?>
                                            <div class="column width50">
                                                <div class="acf-map" data-zoom="16">
                                                    <div class="marker"
                                                        data-lat="<?php echo esc_attr($accordion_field['map_address']['lat']); ?>"
                                                        data-lng="<?php echo esc_attr($accordion_field['map_address']['lng']); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="column">
                                            <h5><?php echo esc_html($accordion_field['accordion_content_title']); ?></h5>
                                            <div class="content">
                                                <?php echo $accordion_field['accordion_content']; ?>
                                            </div>
                                            <div class="cta-links">
                                                <?php
                                                $cta_links = $accordion_field['cta_links'];
                                                if ($cta_links): ?>
                                                    <?php foreach ($cta_links as $link): ?>
                                                        <?php
                                                        $link_type = $link['link_type'];
                                                        $link_url = $link['link_url'];
                                                        $link_phone = $link['phone_number'];
                                                        $link_email = $link['email_address'];
                                                        $link_text = $link['link_text'];
                                                        $link_style = $link['link_style'];
                                                        $class = '';

                                                        switch ($link_style) {
                                                            case 'primary':
                                                                $class = 'link-style-primary';
                                                                break;
                                                            case 'secondary':
                                                                $class = 'link-style-secondary';
                                                                break;
                                                            case 'tertiary':
                                                                $class = 'link-style-tertiary';
                                                                break;
                                                            case 'alternate':
                                                                $class = 'link-style-alternate';
                                                                break;
                                                            case 'text':
                                                                $class = 'link-style-text';
                                                                break;
                                                        }

                                                        switch ($link_type) {
                                                            case 'phone':
                                                                $href = 'tel:' . esc_attr($link_phone);
                                                                break;
                                                            case 'email':
                                                                $href = 'mailto:' . esc_attr($link_email);
                                                                break;
                                                            default:
                                                                $href = esc_url($link_url);
                                                                break;
                                                        }
                                                        ?>
                                                        <a href="<?php echo $href; ?>" class="<?php echo esc_attr($class); ?>">
                                                            <?php echo esc_html($link_text); ?>
                                                        </a>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>