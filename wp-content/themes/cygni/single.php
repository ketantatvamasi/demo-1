<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cygni
 */

get_header();
$id = get_the_ID();

$page_settings = false;
$page_class = '';

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

    <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>
</main><!-- #main -->
  <?php get_footer(); ?>