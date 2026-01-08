<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bang_Digital
 */

get_header();
?>

<main id="single-post-template" class="site-main single-post">
	<div class="main-container">
		<div class="row">
			<div class="single-column">
				<h6><a href="<?php echo site_url(); ?>">Home</a> >
					<?php
					$categories = get_the_category();
					if (!empty($categories)) {
						$category_link = get_category_link($categories[0]->term_id);
						echo '<a href="' . esc_url($category_link) . '">' . esc_html($categories[0]->name) . '</a> > ';
					}
					?>
					<?php the_title(); ?>
				</h6>
			</div>
		</div>
		<div class="row">
			<?php
			while (have_posts()):
				the_post();

				get_template_part('template-parts/content', get_post_type());

				?>
				<hr>
				<?php
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'bang-digital') . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'bang-digital') . '</span> <span class="nav-title">%title</span>',
					)
				);

			endwhile; // End of the loop.
			?>
		</div>

	</div>



</main><!-- #main -->

<?php
get_sidebar();
get_footer();
