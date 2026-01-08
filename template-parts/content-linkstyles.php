<?php
$cta_links = get_sub_field('cta_links');
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