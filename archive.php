<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bang_Digital
 */

get_header();
$blog_post = get_post_type() == 'post';
?>

<main id="archive-template" class="site-main">

	<div class="main-container">

		<div class="row">
			<div class="single-column">
				<?php
				$categories = get_the_category();
				if (!empty($categories)) {
					$category_link = get_category_link($categories[0]->term_id);
					echo '<h2>' . esc_html($categories[0]->name) . '</h2>';
				}
				?>
			</div>
		</div>
		<?php if (have_posts()): ?>
			<header class="page-header">
				<h1><?php echo single_post_title(); ?></h1>
			</header><!-- .page-header -->
			<div class="news-grid">
				<?php
				/* Start the Loop */
				while (have_posts()):
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php bang_digital_post_thumbnail(); ?>
						<header class="entry-header">
							<h6 class="entry-title">
								<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h6>

							<?php if ($blog_post): ?>
								<small><strong><?php echo get_the_date('M jS, Y'); ?></strong></small>
							<?php endif; ?>
						</header><!-- .entry-header -->

						<div class="entry-summary">
							<?php echo wp_trim_words(get_the_excerpt(), 30); // Limit to 30 words ?>
						</div><!-- .entry-summary -->

						<a class="news-read-more link-style-secondary" href="<?php the_permalink(); ?>">Read More</a>
					</article><!-- #post-<?php the_ID(); ?> -->
					<?php
				endwhile;


		else:

			get_template_part('template-parts/content', 'none');

		endif;

		?>
		</div>
		<hr>
		<?php
		the_posts_navigation(); ?>
	</div>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
