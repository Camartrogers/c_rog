<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package C_Rog
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				post_type_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<?php
			/* Start the Loop */
			$terms = get_terms( 
				array(
					'taxonomy' => 'crog_staff_type',
				) 
			);
			if ( $terms && ! is_wp_error( $terms ) ) {
				foreach ( $terms as $term ) {

					$args = array(
								'post_type'      => 'crog_staff',
								'posts_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => 'crog_staff_type', 
										'field'    => 'slug',
										'terms'    => $term->slug
									)
								)
							);	
					
				$query = new WP_Query( $args );
				?>
				<section class='staff-taxonomy'>
				<h2><?php echo $term->name ?></h2>

				<?php
				if ( $query -> have_posts() ){
					while ( $query -> have_posts() ) {
						$query -> the_post();
						?>
						<article class='single-staff'>
						<h3><?php echo the_title() ?></h3>
						<p><?php echo the_field('biography') ?></p>
						<?php if ($term-> slug === 'faculty') { ?>
							<h4>Courses taught:</h4>
							<p><?php echo the_field('courses')?></p>
							<p>For more information about this instructor check out their website: 
								<a href="<?php echo the_field('website')?>"><?php echo the_field('website')?></a>!
							</p>
						<?php }
						echo "</article>";
						}	
					}
					wp_reset_postdata();
					?>
				</section>
					<?php
				}
			}
			the_posts_navigation();
		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
