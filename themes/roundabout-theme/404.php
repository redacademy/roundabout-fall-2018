<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


			<header class="page-header">
				<h1 class="page-title"><?php echo esc_html( 'Oops!' ); ?></h1>
			</header><!-- .page-header -->

			<article class="error-404 not-found">
				<div class="entry-content">
					<h1><?php echo esc_html( 'That page can&rsquo;t be found.' ); ?></h1>
					<p><?php echo esc_html( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</article><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
