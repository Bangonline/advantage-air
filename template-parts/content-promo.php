<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bang_Digital
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item'); ?>>

    <div class="row">
        <div class="column">
            <?php bang_digital_post_thumbnail(); ?>
        </div>
        <div class="column">
            <header class="entry-header">
                <?php
                if (is_singular()):
                    the_title('<h6 class="entry-title">', '</h6>');
                else:
                    the_title('<h6 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h6>');
                endif; ?>
            </header><!-- .entry-header -->
            <div class="entry-content">
                <?php the_content(); // Post content ?>
            </div><!-- .entry-content -->
            <div class="promo-form">
                <h6>Get in touch</h6>
                <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->