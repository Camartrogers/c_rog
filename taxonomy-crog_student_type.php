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
				single_term_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class='taxonomy-students'>
			<?php
				while ( have_posts() ) :
				the_post();
				?>
				<article class='taxonomy-student'>
					<a class='alignleft name-link wp-post-image' href="<?php the_permalink()?>">
						<h2><?php the_title() ?></h2> 
					</a>
					<?php the_post_thumbnail('portrait-thumbnail' ) ?>
					<?php the_content();?>
				</article>
			<?php
			endwhile;
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
