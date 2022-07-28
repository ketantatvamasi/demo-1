<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cygni
 */


$page_layout = 'layout-light';
$header_style = 'dark';
$menu_style = 'classic';
$menu_layout = 'dark';
$ajax_active = false;
$bg_color = "";
$page_loader = false;
$left_widget_title = "";
$left_widget_content = "";
$right_widget_title = "";
$right_widget_content = "";
$scrolling_button_text = "";
$scrolling_button_url = "";
$sticky_menu = false;
$loading_text = "";
$loading_dur = 3000;

if (class_exists('Redux')) {
    
    $option = get_option( 'pe-redux' );
    
    $page_layout = $option['site_layout'];
    $header_style = $option['header_layout'];
    $menu_style = $option['menu_style'];
    $menu_layout = $option['menu_layout'];
    $bakcground = $option['site_layout'];
    $ajax_active = $option['ajax-transitions'];
    $page_loader = $option['page_loader'];
    $sticky_menu = $option['sticky_menu'];
    
    $loading_text = $option['loading-text'];
    
    $left_widget_title = $option['left-widget-title'];
    $left_widget_content = $option['left-widget-content'];
    $right_widget_title = $option['right-widget-title'];
    $right_widget_content = $option['right-widget-content'];
    $scrolling_button_text = $option['scrolling-button-text'];
    $scrolling_button_url =$option['scrolling-button-url'];
    $loading_dur =$option['page_loader_duration'];
    
};

if (class_exists('ACF')) {


if (get_field('page_settings')) {
    
    $page_settings = get_field('page_settings'); 

    if ($page_settings['background_color'] != 'default') {
        $bg_color = $page_settings['background_color_select'];
    };
    
}
    };

if ($ajax_active == false) {
    
    $ajax_check = 'ajax-disabled';
    
} else {
    $ajax_check = 'ajax-enabled';
}

if (! ($page_loader)) {
    $page_loader_check = 'page-loader-disabled';
} else {
    $page_loader_check = "";
}

if (! ($sticky_menu)) {
    $sticky_menu = '';
} else {
    $sticky_menu = 'sticky_nav_menu';
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?> data-background="<?php echo esc_attr($bg_color) ?>" data-layout="<?php echo esc_attr($page_layout) ?>">

    <?php wp_body_open(); ?>
	
    <div id="page" class="site <?php echo esc_attr($ajax_check . ' ' . $page_loader_check) ?>" data-barba="wrapper">
		
        <!-- Loading Text -->
        <div data-duration="<?php echo esc_attr($loading_dur) ?>" class="loading-text"><?php echo esc_html($loading_text) ?></div>
        <!-- Loading Text -->

        <!-- Lines (Don't Touch) -->
        <div class="lines">
            <span class="line line-1"></span>
            <span class="line line-2"></span>
            <span class="line line-3"></span>
        </div>
        <!-- /Lines -->

        <?php if ($page_loader) : ?>
        <!-- Page Loader -->
        <div class="cygni-loader">
            <div class="counter" data-count="99">00</div>
        </div>
        <!-- /Page Loader -->
        <?php endif; ?>
        <!-- Overlays (Don't Touch) -->
        <div class="overlays">
            <span class="overlay overlay-1 ov-ready"></span>
            <span class="overlay overlay-2 ov-ready"></span>
            <span class="overlay overlay-3 ov-ready"></span>
            <span class="overlay overlay-4 ov-ready"></span>
        </div>
        <!-- /Overlays -->

        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'cygni' ); ?></a>

        <header id="masthead" class="site-header <?php echo esc_attr($header_style . ' ' . $sticky_menu) ?>">
            <div class="site-branding">
                <!--Site Branding -->
                <?php	
                if (has_custom_logo()) : ?>
                <div class="site-logo">
                    <div class="dark-logo">
                        <?php the_custom_logo(); ?>
                    </div>

                    <div class="light-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img alt="<?php echo esc_attr('Light Logo' , 'cygni') ?>" src="<?php echo esc_url( get_theme_mod( 'light_logo' ) ); ?>">
                        </a>
                    </div>
                </div>
                <?php else : ?>
                <div class="site-meta">
                    <div class="dark-logo">
                           <h4 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h4>
                    <p class="site-description"><?php echo get_bloginfo( 'description', 'display' ); /* WPCS: xss ok. */ ?></p>
                    </div>
                    
                    <div class="light-logo">
                                         <h4 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h4>
                    <p class="site-description"><?php echo get_bloginfo( 'description', 'display' ); /* WPCS: xss ok. */ ?></p>
                    </div>
             
                </div>
                <?php endif; ?>
            </div>

            <nav id="site-navigation" class="site-navigation <?php echo esc_attr($menu_style . ' ' . $menu_layout) ?>">

                <span class="menu-ov menu-ov-1"></span>
                <span class="menu-ov menu-ov-2"></span>
                <span class="menu-ov menu-ov-3"></span>
                <span class="menu-ov menu-ov-4"></span>

                <!-- Menu Toggle (Don't Touch) -->
                <div class="menu-toggle">
                    <span class="toggle-line toggle-line-1"></span>
                    <span class="toggle-line toggle-line-2"></span>
                </div>
                <!-- /Menu Toggle -->

                <div class="menu-wrapper">

                    <?php
                        if (has_nav_menu('menu-1')) {
			                 wp_nav_menu(
				                    array(
					                   'theme_location' => 'menu-1',
					                   'menu_id'        => 'primary-menu',
				                    )
			                 );
                        }
			         ?>
                </div>

                <!-- Menu Widget (Left) -->
                <div class="menu-widget-wrapper mww-1">
                    <div class="menu-widget">
                        <div class="menu-widget-title">
                            <?php echo esc_html($left_widget_title) ?>
                        </div>
                        <?php echo do_shortcode($left_widget_content) ?>

                    </div>
                </div>
                <!--/ Menu Widget (Left) -->

                <!-- Menu Widget (Middle) -->
                <div class="menu-widget-wrapper mww-2">
                    <div class="scrolling-button">
                        <a href="<?php echo esc_url($scrolling_button_url) ?>"><?php echo esc_html($scrolling_button_text) ?></a>
                    </div>
                </div>
                <!--/ Menu Widget (Middle) -->

                <!-- Menu Widget (Right -->
                <div class="menu-widget-wrapper mww-3">
                    <div class="menu-widget">
                        <div class="menu-widget-title">
                            <?php echo esc_html($right_widget_title) ?>
                        </div>
                        <?php echo do_shortcode($right_widget_content) ?>
                    </div>
                </div>
                <!--/ Menu Widget (Right) -->

            </nav><!-- #site-navigation -->

        </header><!-- #masthead -->
