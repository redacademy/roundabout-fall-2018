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

		<div class="title-tags">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<span class="author-title">by <?php the_author(); ?></span>
		</div>

		<div class="news-tags">
			<?php echo the_terms($post->ID,'news-tags','<button>', '</button><button>', '</button>') ;?>
		</div>

	</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php red_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
