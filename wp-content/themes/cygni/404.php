<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Cygni
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found section not-found-page">
			<header class="page-header wrapper">
                <div class="c-col-12 align-center no-margin">
                    <div class="not-404"><?php echo esc_html('404' , 'cygni') ?></div>
                		<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'cygni' ); ?></h1>
                </div>
		
			</header><!-- .page-header -->

			<div class="page-content wrapper">
                
                <div class="c-col-12 align-center">
                
                                
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'cygni' ); ?></p>

					<?php
					get_search_form();

					?>
                
                </div>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->
        
</main><!-- #main -->
  <?php get_footer(); ?>