<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

// get_header(); ?>

<?php //declare $terms for product slugs
$terms = get_terms( array(
	'taxonomy' => 'member-type',
	'hide_empty' => false,
	"orderby" => "date",
    "order" => 'ASC'
));

// the query
$members = new WP_Query(array('post_type'=>'member', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>



	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<!-- <header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header> -->
			<!-- .page-header -->

			<header class="page-header">
				<h1 class="page-title">Team Members</h1>
				<ul class="profile-type-list">
					<?php foreach ( $terms as $term ) : ?> 
					<li>
						<p><a class="<?php echo $term->name; ?>" href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?> </a></p>
					</li>
					<?php endforeach; wp_reset_postdata(); ?>
				</ul>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			
			<div class="content-profiles">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						get_template_part( 'template-parts/content-member' );
					?>

				<?php endwhile; ?>
			</div><!-- .content-profiles -->

			<!-- <?php the_posts_navigation(); ?> -->

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
