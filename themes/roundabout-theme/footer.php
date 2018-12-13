<?php
/**
 * The template for displaying the footer.
 *
 * @package RED_Starter_Theme
 */

?>

            </div><!-- #content -->

            <footer id="colophon" class="site-footer" role="contentinfo">
				<div class="footer-container">
                	<div class="content">
                    	<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                    	<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
                    	<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
                    	<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
					</div>

					<div class="images-widget">
						<img class="badth-logo" src="<?php echo get_template_directory_uri() ?>/images/badth-logo-final.jpg" alt="">
						<img class="hcpc-logo" src="<?php echo get_template_directory_uri() ?>./images/HPC_reg-logo_CMYK.jpg" alt="">
					</div>
				</div>
				
                <div class="site-info">
                    <div class="copyright-container">COPYRIGHT © <?php echo date('Y');?> Roundabout</div>
                    <!-- <a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>"><?php printf( esc_html( 'Proudly powered by %s' ), 'WordPress' ); ?></a> -->
                </div><!-- .site-info -->

            </footer><!-- #colophon -->
        </div><!-- #page -->

        <?php wp_footer(); ?>

    </body>
</html>