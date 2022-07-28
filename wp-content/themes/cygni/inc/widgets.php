<?php

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cygni_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cygni' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cygni' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<span class="widget-title">',
			'after_title'   => '</span>',
		)
	);
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Left', 'cygni' ),
			'id'            => 'footer-widget-left',
			'description'   => esc_html__( 'Add widgets here.', 'cygni' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="caption">',
			'after_title'   => '</div>',
		)
	);
    
    register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Right', 'cygni' ),
			'id'            => 'footer-widget-right',
			'description'   => esc_html__( 'Add widgets here.', 'cygni' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="caption">',
			'after_title'   => '</div>',
		)
	);
}
add_action( 'widgets_init', 'cygni_widgets_init' );