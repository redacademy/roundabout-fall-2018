<?php
/**
 * Template part for displaying posts.
 *
 * @package RED_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="inner">
		<header class="entry-header">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'large' ); ?>
			<?php endif; ?>

			<h2 class="entry-title"><?php the_title() ?></h2>

		</header><!-- .entry-header -->

		
		<div class="info">
			<h3 class="title"><?php the_title(); ?></h3>
			<span class="text"><?php the_content(); ?></span>
		</div>
	</div>
	

</article><!-- #post-## -->

