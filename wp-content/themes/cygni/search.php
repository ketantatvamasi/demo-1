<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Cygni
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>


    <div class="section search-res">
        <header class="page-header wrapper no-margin">

            <div class="c-col-12">
                <h3 class="page-title">
                    <?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'cygni' ), '<span>' . get_search_query() . '</span>' );
					?>
                </h3>

            </div>

        </header><!-- .page-header -->

        <div class="wrapper">
            <div class="<?php cygni_sidebar_visibility(); ?>">

                <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

            </div>

            <?php if (is_active_sidebar('sidebar-1')) : ?>
            <div class="c-col-4">
                <?php get_sidebar(); ?>

            </div>
            <?php endif; ?>

        </div>
        <div class="posts-nav">
            <?php cygni_posts_nav() ?>
        </div>


    </div>
</main><!-- #main -->
<?php get_footer(); ?>
