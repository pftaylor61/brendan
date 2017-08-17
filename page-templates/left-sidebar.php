<?php
/**
 * Template Name: Left Sidebar Page Template
 *
 * Description: Displays a page with a left hand sidebar.
 *
 * @package Brendan
 * @since Brendan 0.0.1
 */

get_header(); ?>

	<div id="primary" class="site-content row" role="main">

		<?php get_sidebar(); ?>
		<div class="col grid_8_of_12">

			<?php if ( have_posts() ) : ?>

				<?php // Start the Loop ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
				<?php endwhile; ?>

				<?php brendan_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results' ); // Include the template that displays a message that posts cannot be found ?>

			<?php endif; // end have_posts() check ?>

		</div> <!-- /.col.grid_8_of_12 -->

	</div> <!-- /#primary.site-content.row -->

<?php get_footer(); ?>