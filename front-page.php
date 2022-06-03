<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package C_Rog
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		the_content();
		?>
		<section class='crog-features'>
			<?php
			//diplay 3 most recent news posts
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => 3,
			);
			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
				?>
				
				<h2>Featured Works</h2>
				<div>
				<?php
				while( $query->have_posts() ) {
					$query->the_post();
					?>
					<article>
						<a href=" <?php get_permalink() ?> ">
							<?php the_post_thumbnail('thumbnail') ?>
							<h3> <?php the_title() ?></h3>
						</a>
					</article>
					<?php
				}
				wp_reset_postdata();
				?>
				</div>
				<?php
			} 
			?>
		</section>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
