<?php
/**
 * Template part for displaying posts.
 *
 * @package RED_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="card-container">
    <div class="card">
      <div class="side">
	  	<header class="entry-header">
			<figure>
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'large' ); ?>
				<?php endif; ?>
			</figure>

			<h2 class="entry-title"><?php the_title() ?></h2>

		</header>
	  </div>
      <div class="side back">
			<h3 class="title"><?php the_title(); ?></h3>
			<span class="text"><?php the_content(); ?></span>
	  </div>
    </div>
  </div>
</article>

