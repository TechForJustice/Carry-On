<?php
/**
 * Footer template.
 *
 * @package Buntu
 */

?>
				<?php hybrid_get_sidebar( 'primary' ); // Loads the sidebar/primary.php template. ?>

			</div><!-- #main -->

			<?php hybrid_get_sidebar( 'subsidiary' ); // Loads the sidebar/subsidiary.php template. ?>

		</div><!-- .wrap -->

		<footer <?php hybrid_attr( 'footer' ); ?>>

			<div class="wrap">

                <p class="credit">
                    <?php
						printf(
							__( 'Copyright &#169; %1$s %2$s.', 'buntu' ),
							date_i18n( 'Y' ),
							hybrid_get_site_link()
						);
						printf(
							' ' . __( '%1$s by %2$s.', 'buntu' ),
							__( 'Buntu', 'buntu' ),
							'<a href="' . esc_url( 'http://nilambar.net' ) . '" target="_blank">'. __( 'Nilambar', 'buntu' ) . '</a>'
						);
					?>
                </p><!-- .credit -->
                <?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'container'      => 'nav',
					'container_id'   => 'footer-navigation',
					'depth'          => 1,
					'fallback_cb'    => false,
					) );
				?>

			</div><!-- .wrap -->

		</footer><!-- #footer -->

	</div><!-- #container -->

	<?php wp_footer(); // WordPress hook for loading JavaScript, toolbar, and other things in the footer. ?>

</body>
</html>
