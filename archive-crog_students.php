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
			<div class='all-students'>
			<?php
			$args = array(
			'post_type'      => 'crog_students',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order'   => 'ASC',
				);

				$query = new WP_Query( $args );
				
				if ( $query -> have_posts() ){
					while ( $query -> have_posts() ) {
						$query -> the_post();
						?>
						<article class='single-student'>
						<h2><?php the_title(); ?> </h2>
						<?php the_post_thumbnail('portrait-thumbnail'); 
						the_excerpt(); 
						?>
						<p>Specialty: <?php the_terms( $post->ID, 'crog_student_type' ) ?></p>
						</article>
						<?php
					}
					wp_reset_postdata();
				}

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
			</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
