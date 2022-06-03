<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package C_Rog
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class='student-page'>
		<?php
		get_template_part( 'template-parts/content', get_post_type() );
		?>
		
		<?php
		$terms = get_the_terms( $post->ID, 'crog_student_type' );
		$exclude_id = array($post->ID);
		?>
		<h3>Meet other students in the program</h3>
		<ul class='other-students-links'>
		<?php
		foreach ($terms as $term) {
		// Nav to other students in same taxonomy

		$args = array(
			'post_type'      => 'crog_students',
			'posts_per_page' => -1,
			'post__not_in' => $exclude_id,
			'tax_query'      => array(
				array(
					'taxonomy' => 'crog_student_type',
					'field'    => 'slug',
					'terms'    => $term,
				),
			),
		);
		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while( $query->have_posts() ) {
				$query->the_post();
				?>
				<li><a href=<?php the_permalink(); ?>><?php the_title();?></a></li>
				<?php;
			}
			wp_reset_postdata();
		} 
	}
		?>
		</ul>
		</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
