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
		while ( have_posts() ) :
			the_post();
			
			get_template_part( 'template-parts/content', 'page' );
		endwhile; // End of the loop.
		?>
		<table class='schedule'>
			<caption>Weekly Schedule</caption>
		<thead>
			<th>Date</th>
			<th>Course</th>
			<th>Instructor</th>
		</thead>
		<tbody>
			<?php 
				if( have_rows('schedule') ):
					?>
					
					<?php
				// Loop through rows.
				while( have_rows('schedule') ) : the_row();
					// Load sub field value.
					?>
					<tr>
						<td><?php the_sub_field('date'); ?></td>
						<td><?php the_sub_field('course'); ?></td>
						<td><?php the_sub_field('instructor'); ?></td>
					</tr>
					<?php
				// End loop.
				endwhile;
			endif;
			?>
		</tbody>
		</table>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
