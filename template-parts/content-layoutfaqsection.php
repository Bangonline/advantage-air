<?php
if (get_row_layout() == 'faq_section'):
    $section_title = get_sub_field('section_title');
    $section_subtitle = get_sub_field('section_subtitle');
    $faq_linker = get_sub_field('faq_linker');
    ?>
    <section class="faq-section">
        <div class="container">
            <div class="row">
                <div class="single-column text-center">
                    <h2><?php echo esc_html($section_title); ?></h2>
                    <p><?php echo esc_html($section_subtitle); ?></p>
                </div>
            </div>
            <div class="faq" id="faq-accordion">
                <?php if ($faq_linker): ?>
                    <?php foreach ($faq_linker as $index => $faq_post): ?>
                        <?php
                        // Fetching the new fields 'faq_question' and 'faq_answer' for the 'faq' post type
                        $faq_question = get_field('faq_question', $faq_post->ID);
                        $faq_answer = get_field('faq_answer', $faq_post->ID);
                        $cta_links = get_field('cta_links', $faq_post->ID);
                        ?>
                        <div class="faq-item">
                            <h2 class="faq-header" id="faq-heading-<?php echo $index; ?>">
                                <button class="faq-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-<?php echo $index; ?>" aria-expanded="true"
                                    aria-controls="collapse-<?php echo $index; ?>">
                                    <?php echo esc_html($faq_question); ?>
                                    <img class="down-arrow" src="<?php echo get_template_directory_uri(); ?>/images/down.png"
                                        width="30px">
                                </button>

                            </h2>
                            <div id="faq-collapse-<?php echo $index; ?>" class="panel"
                                aria-labelledby="faq-heading-<?php echo $index; ?>" data-bs-parent="#faqExample">
                                <div class="faq-body">
                                    <div class="row">
                                        <div class="single-column">
                                            <div class="content">
                                                <?php echo $faq_answer; ?>
                                            </div>
                                            <div class="cta-links">
                                                <?php if ($cta_links): ?>
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
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
endif;