<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cygni
 */

get_header();

$option = get_option('pe-redux');

$blog_back_text_vis = false;
$blog_title_visible = false;
$blog_sidebar_vis = true;

if (class_exists('Redux')) {
    $blog_back_text_vis = $option['blog-back-text-visible'];
    $blog_title_visible = $option['blog-title-visible'];
    $blog_sidebar_vis =$option['blog-sidebar-visible'];
}

?>

<?php if(is_built_with_elementor()) { $elementor_check = 'elementor-page'; } else { $elementor_check = "non-elementor"; } ?>
<main id="primary" class="site-main <?php echo esc_attr($elementor_check) ?>" data-barba="container" data-barba-namespace="cako">

    <!-- Journal -->
    <div class="pe-journal section">

        <?php if ($blog_back_text_vis != false) : ?>
        <!-- Background Text -->
        <div class="j-back"><?php echo esc_html($option['blog-page-back-text']) ?></div>
        <!--/ Background Text -->
        <?php endif; ?>

        <?php if ($blog_title_visible == true) : ?>
        <div class="section">
            <div class="wrapper-small">
                <div class="c-col-6">
                    <!-- Blog Page Title -->
                    <div class="pe-blog-stamp">
                        <div data-scroll class="caption has-animation skew-up"><?php echo esc_html($option['blog-page-caption']) ?></div>
                        <div data-scroll class="blog-page-title has-animation skew-up"><?php echo esc_html($option['blog-page-title']) ?></div>
                    </div>
                    <!-- Blog Page Title -->
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- Blog Posts -->
        <div class="pe-blog-posts wrapper">

            <div class="<?php cygni_sidebar_visibility(); ?>">

                <?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>
                <?php
			endif;

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
            <?php if ((is_active_sidebar('sidebar-1')) && ($blog_sidebar_vis != false)) : ?>
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