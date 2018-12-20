<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'page' ); ?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<!-- Calling supporters members part -->
<?php //declare $terms for supporters slugs
$terms = get_terms( array(
	'taxonomy' => 'supporters-type',
	'hide_empty' => false,
	"orderby" => "date",
    "order" => 'ASC'
));
?>

<!-- // the query -->
<?php $supporters = new WP_Query(array('post_type'=>'supporter', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

<div id="primary-teams" class="post-type-archive">
	<main id="main" class="site-main" role="main">

		<header class="page-header">
			<h1 class="page-title">Inspirational Supporters and Patrons</h1>
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
			<?php while ( $supporters->have_posts() ) : $supporters->the_post(); ?>

				<?php
					get_template_part( 'template-parts/content-member' );
				?>

			<?php endwhile; ?>
		</div><!-- .content-profiles -->


	</main><!-- #main -->
</div><!-- #primary -->

<?php wp_reset_postdata();?>

<!-- Calling wp-logo-showcase-responsive-slider by shortcode -->
<?php echo do_shortcode('[logoshowcase]'); ?>


<?php get_footer(); ?>
