<?php
/**
 * Template part for displaying single posts.
 *
 * @package RED_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>
		
		<?php if ( is_single() ) : ?>

			<div class="quote-content">
				<i class="fa fa-quote-left"></i>
				<p class="quote">
					<?php echo CFS() ->get('stories-quote'); ?>
				</p>
			</div>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>

		</div><!-- .entry-content -->

		<?php elseif (! is_single() ) : ?>


			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		
		<div class="quote-content">
				<i class="fa fa-quote-left"></i>
				<p class="quote">
					<?php echo CFS() ->get('stories-quote'); ?>
				</p>
			</div>

		<?php endif; ?>



	<footer class="entry-footer">
		<?php red_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
