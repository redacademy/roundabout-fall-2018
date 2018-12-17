<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area content-about">
    <main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'page' ); ?>

		<?php endwhile; // End of the loop. ?>

        <section class="team-members">

<!-- Calling team member part -->
<?php //declare $terms for members slugs
$terms = get_terms( array(
	'taxonomy' => 'member-type',
	'hide_empty' => false,
	"orderby" => "date",
	"order" => 'ASC'
));
?>

<!-- // the query -->
<?php $members = new WP_Query(array('post_type'=>'member', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

        <header class="page-header">
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
			<?php while ( $members->have_posts() ) : $members->the_post(); ?>

				<?php
				get_template_part( 'template-parts/content-member' );
				?>

			<?php endwhile; ?>
        </div><!-- .content-profiles -->
    </section>
    </main><!-- #main -->
</div><!-- #primary -->


<?php wp_reset_postdata();?>


<?php get_footer(); ?>
