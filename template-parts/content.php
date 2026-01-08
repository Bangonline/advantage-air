<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bang_Digital
 */
$suburb = get_field('suburb');
$blog_post = get_post_type() == 'post';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item'); ?>>

	<?php bang_digital_post_thumbnail(); ?>

	<header class="entry-header">
		<?php
		if (is_singular()):
			the_title('<h3 class="entry-title">', '</h3>');
		else:
			the_title('<h6 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h6>');
		endif; ?>
		<?php if ($blog_post): ?>
			<small><strong>Post published on: <?php echo get_the_date('M jS, Y'); ?></strong></small>
		<?php endif; ?>
		<?php if ($suburb): ?>
			<p><?php echo $suburb ?></p>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php if ($blog_post): ?>
			<?php the_content(); // Post content ?>
		<?php endif; ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->