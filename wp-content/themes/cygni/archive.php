<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cygni
 */

get_header();
?>

<main id="primary" class="site-main" data-barba="container" data-barba-namespace="cako">

    <?php if ( have_posts() ) : ?>

    <div class="section archive">

        <header class="page-header archive-header wrapper">

            <div class="c-col-12">

                <?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
            </div>
        </header><!-- .page-header -->

        <div class="wrapper">

            <div class="<?php cygni_sidebar_visibility(); ?>">

                <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
        
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
            </div>
            <div class="c-col-4">
                <?php get_sidebar(); ?>

            </div>

        </div>
        
                            
            <div class="posts-nav">
            <?php 			cygni_posts_nav() ?>
            </div>
        
    </div>
</main><!-- #main -->
  <?php get_footer(); ?>

