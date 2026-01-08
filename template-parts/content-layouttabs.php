<?php
if (get_row_layout() == 'tabbed_section'):
    $tab_section_title = get_sub_field('tab_section_title');
    $tab_section_subtitle = get_sub_field('tab_section_subtitle');
    $tab_fields = get_sub_field('tab_fields');
    ?>
    <section class="tab-section">
        <div class="container">
            <div class="row">
                <div class="single-column text-center">
                    <h2><?php echo esc_html($tab_section_title); ?></h2>
                    <p><?php echo esc_html($tab_section_subtitle); ?></p>
                </div>
            </div>
            <div class="tab-container">
                <ul class="tab-list">
                    <?php if ($tab_fields): ?>
                        <?php foreach ($tab_fields as $index => $tab_field): ?>
                            <li class="tab <?php echo $index === 0 ? 'active' : ''; ?>" data-tab="tab<?php echo $index; ?>">
                                <?php echo esc_html($tab_field['tab_title']); ?>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
                <div class="tab-item">
                    <?php if ($tab_fields): ?>
                        <?php foreach ($tab_fields as $index => $tab_field): ?>
                            <div id="tab<?php echo $index; ?>" class="tab-panel <?php echo $index === 0 ? 'active' : ''; ?>">
                                <?php if (!empty($tab_field['tab_image'])): ?>
                                    <img src="<?php echo esc_url($tab_field['tab_image']['url']); ?>"
                                        alt="<?php echo esc_attr($tab_field['tab_image']['alt']); ?>">
                                <?php endif; ?>

                                <div class="tab-content">
                                    <h4 class="tab-content-title"><?php echo esc_html($tab_field['tab_content_title']); ?></h4>
                                    <?php echo wp_kses_post($tab_field['tab_content']); ?>
                                    <div class="cta-links">
                                        <?php
                                        $cta_links = $tab_field['cta_links'];
                                        if ($cta_links): ?>
                                            <?php foreach ($cta_links as $link): ?>
                                                <?php
                                                $link_url = $link['link_url'];
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
                                                ?>
                                                <a href="<?php echo esc_url($link_url); ?>"
                                                    class="<?php echo esc_attr($class); ?>"><?php echo esc_html($link_text); ?></a>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
endif;