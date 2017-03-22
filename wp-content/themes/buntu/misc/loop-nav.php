<?php
/**
 * Template part for loop navigation.
 *
 * @package Buntu
 */

?>
<?php if ( is_singular( 'post' ) ) : // If viewing a single post page. ?>

	<div class="loop-nav">
		<?php previous_post_link( '<div class="prev">%link</div>', '%title' ); ?>
		<?php next_post_link( '<div class="next">%link</div>', '%title' ); ?>
	</div><!-- .loop-nav -->

<?php elseif ( is_home() || is_archive() || is_search() ) : // If viewing the blog, an archive, or search results. ?>

	<?php the_posts_pagination(
	array(
			'prev_text' => _x( '&larr; Previous', 'posts navigation', 'buntu' ),
			'next_text' => _x( 'Next &rarr;',     'posts navigation', 'buntu' ),
		)
); ?>

<?php endif; // End check for type of page being viewed. ?>
