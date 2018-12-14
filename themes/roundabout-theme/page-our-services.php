<?php
/**
 * Created by PhpStorm.
 * User: agataswistowska
 * Date: 05/12/2018
 * Time: 11:19
 */
get_header(); ?>

	<div id="primary" class="content-area content-services">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>