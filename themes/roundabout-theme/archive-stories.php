<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
			<header class="page-header">
				<?php the_archive_title( '<h1 class="page-title">', '</h1>' );?>
			</header><!-- .page-header -->
		
	
<?php // custom loop to have the first story open ?>

<?php $args = array (
	'order' => 'DESC',
	'posts_per_page' => 1,
	'post_type' => 'stories'
);

$stories = new WP_Query($args);

?>

<?php while ($stories->have_posts() ): $stories->the_post(); ?>
<?php get_template_part( 'template-parts/content', 'single-stories' ); ?>

<?php endwhile; wp_reset_postdata(); ?>


<?php // Default Loop to show content from stories ?>
		<?php if ( have_posts() ) : ?>
	
			<?php /* Start the Loop */ ?>
			<div class="stories-wrapper hidden">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="stories-container">
						<?php
							get_template_part( 'template-parts/content', 'stories' );
						?>
					</div>
				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
			</div>
			<div class="button-content">
				<button class="load-button">Load More</button>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
