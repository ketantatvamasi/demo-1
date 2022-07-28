<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cygni
 */


$ovs_vis = "";
$footer_layout = "";
$footer_ovs = true;
$footer_layout = true;
$footer_headline = "";
$footer_copyright = "";

if (class_exists('Redux')) {
    
    $option = get_option('pe-redux');
    
    $footer_ovs = $option['footer_ovs'];
    $footer_layout = $option['footer_layout'];
    $footer_headline = $option['footer-headline'];
    $footer_copyright = $option['footer-copyright'];
}

if ( $footer_ovs != true)
{
    $ovs_vis = 'no-ovs';
}

if ( $footer_layout == true)
{
    $footer_layout = 'footer-light layout-light';
}
else
{
    $footer_layout = 'footer-dark layout-dark';
}

$footer_class = $ovs_vis . ' ' . $footer_layout;

?>


<?php if ( is_active_sidebar( 'footer-widget-right' )  ||  is_active_sidebar('footer-widget-left') || (! empty($footer_headline)) || (! empty($footer_copyright)) || (has_nav_menu('footer-menu'))) : ?>

<footer class="site-footer <?php echo esc_attr($footer_class) ?>">
    <span class="footer-ov"></span>
    <span class="footer-ov"></span>
    <span class="footer-ov"></span>
    <span class="footer-ov"></span>
    
    <?php if (! empty($footer_headline)) : ?>
    
    <!-- Fullwidth Wrapper -->
    <div class="wrapper">

        <!-- Column -->
        <div class="c-col-12 no-gap">
            <?php echo do_shortcode($footer_headline) ?>

        </div>
        <!--/ Column -->

    </div>
    <!-- Fullwidth Wrapper -->
    
    <?php endif ?>

    <?php if ( is_active_sidebar( 'footer-widget-right' )  ||  is_active_sidebar('footer-widget-left')) : ?>
    <!-- Fullwidth Wrapper -->
    <div style="margin-bottom: 75px" class="wrapper-full">

        <div class="c-col-6 hide-mobile"></div>

        <!-- Column -->
        <div class="c-col-3 no-gap">
            <?php if (is_active_sidebar('footer-widget-left')):
                    dynamic_sidebar('footer-widget-left');
                endif; ?>
        </div>
        <!--/ Column -->

        <!-- Column -->
        <div class="c-col-3 no-gap">
            <?php if (is_active_sidebar('footer-widget-right')):
                    dynamic_sidebar('footer-widget-right');
                endif; ?>
        </div>
        <!--/ Column -->

    </div>
    <!-- Fullwidth Wrapper -->
    <?php endif; ?>
    <!-- Wrapper -->
    <div style="margin-bottom: 0" class="wrapper">

        <!-- Column -->
        <div class="c-col-6">

            <!-- Footer Menu -->
            <?php
                 wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'menu_id' => 'footer-menu',
                    'menu_class' => 'footer-menu'
                ));
            ?>
            <!--/ Footer Menu -->

        </div>
        <!-- Column -->

        <!-- Column -->
        <div class="c-col-6 align-right">
            <p class="copyright-text"><?php echo esc_html($footer_copyright) ?></p>
        </div>
        <!-- Column -->

    </div>
    <!-- Wrapper -->

</footer>

<?php

endif; ?>

</div><!-- #page -->


<?php wp_footer(); ?>
<!-- <script src="https://unpkg.com/magic-snowflakes/dist/snowflakes.min.js"></script>
<script>
    var sf = new Snowflakes({
        color: "#ffffff",
        count: 25,
        minOpacity: 0,
        minSize: 5,
        maxSize: 15
    });
</script> -->
</body>

</html>
