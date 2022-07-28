<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cygni
 */

?>

<section class="no-results not-found section">
	<header class="page-header wrapper">
        <div class="c-col-12">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'cygni' ); ?></h1>
            </div>
	</header><!-- .page-header -->

	<div class="page-content wrapper">
        
        <div class="c-col-8">
        		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'cygni' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cygni' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cygni' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
        
        </div>
        
        <div class="c-col-4">
        
        <?php get_sidebar(); ?>
        
        </div>

	</div><!-- .page-content -->
</section><!-- .no-results -->
