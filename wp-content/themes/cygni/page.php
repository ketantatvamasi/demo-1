<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cygni
 */

get_header();


$page_class = '';
$page_settings = false;

if (class_exists('ACF')) {
    $page_settings = get_field('page_settings');
}

if ($page_settings) {
    if ($page_settings['fullscreen_page'] == 'true') {
    $page_class = 'fullscreen';
};

}

?>

<?php if(is_built_with_elementor()) { $elementor_check = 'elementor-page'; } else { $elementor_check = "non-elementor"; } ?>
<main id="primary" class="site-main <?php echo esc_attr($elementor_check . ' ' . $page_class) ?>" data-barba="container" data-barba-namespace="cako" >

    <?php if ( ! is_built_with_elementor()) : ?>
    <div class="page-sec section">
        <div class="wrapper">
            <div class="c-col-12">

                <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
            </div>
        </div>
    </div>

    <?php else : ?>

    <?php
		while ( have_posts() ) :
			the_post();

		the_content();

		endwhile; // End of the loop.
		?>


    <?php endif; ?>

</main><!-- #main -->
  <?php get_footer(); ?>

