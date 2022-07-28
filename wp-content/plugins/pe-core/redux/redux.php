<?php
if (!class_exists('Redux'))
{
    return;
}

$opt_name = 'pe-redux';

$theme = wp_get_theme(); // For use with some settings. Not necessary.
$args = array(
    'display_name' => $theme->get('Name') . ' Options' ,
    'display_version' => $theme->get('Version') ,
    'menu_title' => esc_html__('Cygni Options', 'pe-core') ,
    'customizer' => false,
    'dev_mode' => false,
    
);

Redux::setArgs($opt_name, $args);

Redux::setSection($opt_name, array(
    'title' => esc_html__('Global Options', 'pe-core') ,
    'id' => 'global_options',
    'icon' => 'el el-home',
    'fields' => array(
        array(
            'id' => 'site_layout',
            'type' => 'button_set',
            'title' => __('Site Layout', 'pe-core') ,
            'options' => array(
                'layout-light' => 'Light',
                'layout-dark' => 'Dark',
            ) ,
            'default' => 'layout-light',
            'desc' => __( 'Select a layout for whole web site.' , 'pe-core' ),
        ),
        array(
            'id' => 'header_layout',
            'type' => 'button_set',
            'title' => __('Header Layout', 'pe-core') ,
            'options' => array(
                'light' => 'Light',
                'dark' => 'Dark',
            ) ,
            'default' => 'dark',
            'desc' => __( 'Select header layout, this option will be effect menu and logos on header.' , 'pe-core' ),
        ),
        array(
            'id' => 'menu_style',
            'type' => 'button_set',
            'title' => __('Menu Style', 'pe-core') ,
            'options' => array(
                'full_screen' => 'Fullscreen',
                'classic' => 'Classic',
            ) ,
            'default' => 'classic',
            'desc' => __( 'Select your menu style.' , 'pe-core' ),
        ),
        array(
            'id' => 'menu_layout',
            'type' => 'button_set',
            'title' => __('Fullscreen Menu Layout', 'pe-core') ,
            'options' => array(
                'light' => 'Light',
                'dark' => 'Dark',
            ) ,
            'default' => 'dark',
            'desc' => __( 'Select a layout for fullscreen menu (this option will be no effect if you select "classic" menu style).' , 'pe-core' ),
        ),
        array(
            'id'       => 'logo_size',
            'type'     => 'dimensions',
            'units'    => array('em','px','%'),
            'title'    => __('Logo Size', 'pe-core'),
            'desc'     => __('Enter your logo dimensions', 'redux-framework-demo'),
            'default'  => array(
                'width'   => '110',
                'height' => '33'
            ),
            'output'    => array('.site-branding img'), // An array of CSS selectors

            ),

    )
));
Redux::setSection($opt_name, array(
    'title' => esc_html__('Fullscreen Menu', 'pe-core') ,
    'id' => 'fullscreen-menu',
    'icon' => 'el el-lines',
    'fields' => array(
        array(
            'id'       => 'sticky_menu',
            'type'     => 'switch', 
            'title'    => __('Sticky Menu', 'pe-core'),
            'on'       => __('Enable' , 'pe-core'),
            'off'       => __('Disable' , 'pe-core'),
            'default'  => false,
            'desc' => __( 'Switch "Yes" if you want to display a fixed menu toggle button.' , 'pe-core' ),
        ),
        array(
            'id'       => 'left-widget-title',
            'type'     => 'text', 
            'title'    => __('Left Widget Title', 'pe-core'),
            'desc' => __( 'Leave it empty if you dont want to display widget title' , 'pe-core' ),
            'default' => ''
        ),
        array(
            'id'       => 'left-widget-content',
            'type'     => 'editor', 
            'title'    => __('Left Widget Content', 'pe-core'),
            'desc' => __( 'Leave it empty if you dont want to display left widget content' , 'pe-core' ),
            'default' => 'sc'
        ),
        array(
            'id'       => 'scrolling-button-text',
            'type'     => 'text', 
            'title'    => __('Scrolling Button Text', 'pe-core'),
            'desc' => __( 'Leave it empty if you dont want to display scrolling button' , 'pe-core' ),
            'placeholder' => 'Eg: hello@pethemes.com',
            'default' => ''
        ),
        array(
            'id'       => 'scrolling-button-url',
            'type'     => 'text', 
            'title'    => __('Scrolling Button URL', 'pe-core'),
            'desc' => __( 'Leave it empty if you dont want to display scrolling button' , 'pe-core' ),
            'placeholder' => 'Eg: mailto:hello@pethemes.com',
            'default' => ''
        ),
        array(
            'id'       => 'right-widget-title',
            'type'     => 'text', 
            'title'    => __('Right Widget Title', 'pe-core'),
            'desc' => __( 'Leave it empty if you dont want to display widget title' , 'pe-core' ),
            'default' => ''
        ),
        array(
            'id'       => 'right-widget-content',
            'type'     => 'editor', 
            'title'    => __('Right Widget Content', 'pe-core'),
            'desc' => __( 'Leave it empty if you dont want to display left widget content' , 'pe-core' ),
            'default' => ''
        ),
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Portfolio', 'pe-core') ,
    'id' => 'portfolio',
    'icon' => 'el el-th',
    'fields' => array(
        array(
            'id'       => 'portfolio-slug',
            'type'     => 'text', 
            'title'    => __('Custom Portfolio Slug', 'pe-core'),
            'desc'    => __('Set your custom portfolio slug which will use for portfolio permalinks default is "project"', 'pe-core'),
            'subtitle'    => __('After you eter a slug type here, <br>you need to update WP permalinks once.', 'pe-core'),
        ),
        array(
            'id'       => 'next-project-cap',
            'type'     => 'text', 
            'title'    => __('Next Project Caption', 'pe-core'),
            'desc'    => __('Enter a custom text for "Next Project" caption.', 'pe-core'),
            'default' => 'NEXT PROJECT'
        ),


    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Page', 'pe-core') ,
    'id' => 'blog-settings',
    'icon' => 'el el-th-large',
));

Redux::setSection( $opt_name, array(
        'title'            => __( 'Posts Page', 'pe-core' ),
        'id'               => 'posts-page',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'blog-title-visible',
                'type'     => 'switch', 
                'title'    => __('Blog Page Title', 'pe-core'),
                'on'       => __('Show' , 'pe-core'),
                'off'       => __('Hide' , 'pe-core'),
                'default'  => false,
                'desc' => __( 'Switch "Hide" if you dont want to display blog page title.' , 'pe-core' ),
            ),
        
            array(
                'id'       => 'blog-page-title',
                'type'     => 'text', 
                'title'    => __('Blog Page Title', 'pe-core'),
                'desc' => __( 'Enter your blog page title here.' , 'pe-core' ),
                'default' => ''
            ),
        
            array(
                'id'       => 'blog-page-caption',
                'type'     => 'text', 
                'title'    => __('Blog Page Caption', 'pe-core'),
                'desc' => __( 'Enter your blog page caption here(will be displayed over page title).' , 'pe-core' ),
                'default' => ''
            ),
        
            array(
                'id'       => 'blog-back-text-visible',
                'type'     => 'switch', 
                'title'    => __('Blog Page Background Text', 'pe-core'),
                'on'       => __('Show' , 'pe-core'),
                'off'       => __('Hide' , 'pe-core'),
                'default'  => true,
                'desc' => __( 'Switch "Hide" if you dont want to display background text.' , 'pe-core' ),
            ),
        
            array(
                'id'       => 'blog-page-back-text',
                'type'     => 'text', 
                'title'    => __('Blog Page Background Text', 'pe-core'),
                'desc' => __( 'Enter background text here if you leave it empty page title will be displayed on background.' , 'pe-core' ),
                'default' => ''
            ),
        
            array(
                'id'       => 'blog-sidebar-visible',
                'type'     => 'switch', 
                'title'    => __('Blog Page Sidebar', 'pe-core'),
                'on'       => __('Show' , 'pe-core'),
                'off'       => __('Hide' , 'pe-core'),
                'default'  => true,
                'desc' => __( 'Switch "Hide" if you dont want to display sidebar on blog posts page.' , 'pe-core' ),
            ),
        )
    ) );

Redux::setSection( $opt_name, array(
        'title'            => __( 'Single Post Page', 'pe-core' ),
        'id'               => 'single-posts-page',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'single-post-page-sidebar',
                'type'     => 'switch', 
                'title'    => __('Sidebar', 'pe-core'),
                'on'       => __('Show' , 'pe-core'),
                'off'       => __('Hide' , 'pe-core'),
                'default'  => true,
                'desc' => __( 'Switch "Hide" if you dont want to display sidebar.' , 'pe-core' ),
            ),
            array(
                'id'       => 'single-post-thumbnail',
                'type'     => 'switch', 
                'title'    => __('Post Thumbnail', 'pe-core'),
                'on'       => __('Show' , 'pe-core'),
                'off'       => __('Hide' , 'pe-core'),
                'default'  => true,
                'desc' => __( 'Switch "Hide" if you dont want to display post thumbnail.' , 'pe-core' ),
            ),
            array(
                'id'       => 'single-post-meta',
                'type'     => 'switch', 
                'title'    => __('Post Meta', 'pe-core'),
                'on'       => __('Show' , 'pe-core'),
                'off'       => __('Hide' , 'pe-core'),
                'default'  => true,
                'desc' => __( 'Switch "Hide" if you dont want to display post meta.' , 'pe-core' ),
            ),
            array(
                'id'       => 'single-post-nav',
                'type'     => 'switch', 
                'title'    => __('Posts Navigation', 'pe-core'),
                'on'       => __('Show' , 'pe-core'),
                'off'       => __('Hide' , 'pe-core'),
                'default'  => true,
                'desc' => __( 'Switch "Hide" if you dont want to display prev/next post area.' , 'pe-core' ),
            ),
            array(
                'id'       => 'prev-post-text',
                'type'     => 'text', 
                'title'    => __('Prev Post Text', 'pe-core'),
                'desc' => __( 'Replace "Previous Post" text here.' , 'pe-core' ),
                'default' => ''
            ),
            array(
                'id'       => 'next-post-text',
                'type'     => 'text', 
                'title'    => __('Next Post Text', 'pe-core'),
                'desc' => __( 'Replace "Next Post" text here.' , 'pe-core' ),
                'default' => ''
            ),
        
           
        )
    ) );

Redux::setSection($opt_name, array(
    'title' => esc_html__('Loader/Transitions', 'pe-core') ,
    'id' => 'loader-transitions',
    'icon' => 'el el-stackoverflow',
));


Redux::setSection( $opt_name, array(
        'title'            => __( 'Page Loader', 'pe-core' ),
        'id'               => 'page-loader',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'page_loader',
                'type'     => 'switch', 
                'title'    => __('Page Loader', 'pe-core'),
                'on'       => __('Enable' , 'pe-core'),
                'off'       => __('Disable' , 'pe-core'),
                'default'  => false,
                'desc' => __( 'Switch "No" if you dont want to animate lines on page load.' , 'pe-core' ),
            ),
            
            array(
                'id'       => 'page_loader_duration',
                'type'     => 'text', 
                'title'    => __('Page Loader Duration', 'pe-core'),
                'desc' => __( 'You can enter a custom duration for page loader here. (1000 = 1 seccond)' , 'pe-core' ),
                'default' => '3000'
            ),
            
            array(
                'id'          => 'typog-counter',
                'type'        => 'typography', 
                'title'       => __('Counter Font Size', 'pe-core'),
                'google'      => true, 
                'font-backup' => true,
                'output'      => array('.cygni-loader .counter'),
                'units'       =>'px',
                'font-family' => false,
                'font-weight' => false,
                'font-style' => false,
                'text-align' => false,
                'line-height' => false,
                'color' => false
            ),

        )
    ) );

Redux::setSection( $opt_name, array(
        'title'            => __( 'Page Transitions', 'pe-core' ),
        'id'               => 'page-transitions',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'ajax-transitions',
                'type'     => 'switch', 
                'title'    => __('AJAX Transitions', 'pe-core'),
                'on'       => __('Yes' , 'pe-core'),
                'off'       => __('No' , 'pe-core'),
                'default'  => false,
                'desc' => __( 'Switch "No" if you dont want to use AJAX ransitons on page change. <br>If you set this settings "No" other settings below will not be effect anything on whole website.' , 'pe-core' ),
            ),
            
            array(
                'id'       => 'transition-layout',
                'type'     => 'switch', 
                'title'    => __('Transition Layout', 'pe-core'),
                'on'       => __('Light' , 'pe-core'),
                'off'       => __('Dark' , 'pe-core'),
                'default'  => true,
                'desc' => __( 'When you select site layout from "Global Settings" tab, transition will be set a layout it self automaticly but you can select a spesific layout here for that.' , 'pe-core' ),
            ),
            
            array(
                'id' => 'loading-text',
                'type' => 'text',
                'title' => __('Loading Text' , 'pe-core'),
                'default' => 'LOADING'
            
            ),
            array(
                'id'          => 'typog-loading',
                'type'        => 'typography', 
                'title'       => __('Loading Text Font Size', 'pe-core'),
                'google'      => true, 
                'font-backup' => true,
                'output'      => array('.loading-text'),
                'units'       =>'px',
                'font-family' => false,
                'font-weight' => false,
                'font-style' => false,
                'text-align' => false,
                'line-height' => false,
                'color' => false
            ),

        )
    ));



Redux::setSection( $opt_name, array(
    'title' => esc_html__('Footer', 'pe-core') ,
    'id' => 'footer',
    'icon' => 'el el-minus',
        'fields' => array(
            array(
                'id'       => 'footer_ovs',
                'type'     => 'switch', 
                'title'    => __('Top Bars', 'pe-core'),
                'on'       => __('Show', 'pe-core'),
                'off'       => __('Hide', 'pe-core'),
                'default'  => true,
            ),
            array(
                'id'       => 'footer_layout',
                'type'     => 'switch', 
                'title'    => __('Footer Layout', 'pe-core'),
                'on'       => __('Light', 'pe-core'),
                'off'       => __('Dark', 'pe-core'),
                'default'  => true,
            ),
            array(
                'id'       => 'footer_bg_color',
                'type'     => 'color', 
                'title'    => __('Footer Background Color', 'pe-core'),
                'output'    => array('background-color' => '.footer-ov, .site-footer')
            ),
            array(
                'id' => 'footer-headline',
                'type' => 'textarea',
                'title' => __('Headline Text', 'pe-core'),
                'desc' => __( 'Enter your headline text here (HTML allowed)' , 'pe-core' ),
                'default' => ''
            ),
            array(
                'id' => 'footer-copyright',
                'type' => 'text',
                'title' => __('Copyright Text', 'pe-core'),
                'desc' => __( 'Enter your copyright text here (HTML allowed)' , 'pe-core' ),
                'default' => ''
            ),
        

        )
    ));


Redux::setSection($opt_name, array(
    'title' => esc_html__('Typography', 'pe-core') ,
    'id' => 'typography',
    'icon' => 'el el-font',
    'fields' => array(
        array(
                'id'          => 'typog-body',
                'type'        => 'typography', 
                'title'       => __('Body', 'pe-core'),
                'google'      => true, 
                'font-backup' => true,
                'output'      => array('body'),
                'units'       =>'px',
                'font-weight' => false,
                'font-style' => false,
                'font-size' => false,
                'text-align' => false,
                'line-height' => false,
                'color' => false
            ),
        array(
            'id'          => 'typog-p',
            'type'        => 'typography', 
            'title'       => __('Paragraph', 'pe-core'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('p'),
            'units'       =>'px',

        ),
        array(
            'id'          => 'typog-h1',
            'type'        => 'typography', 
            'title'       => __('H1', 'pe-core'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('h1'),
            'units'       =>'px',

        ),
        array(
            'id'          => 'typog-h2',
            'type'        => 'typography', 
            'title'       => __('H2', 'pe-core'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('h2'),
            'units'       =>'px',

        ),
        array(
            'id'          => 'typog-h3',
            'type'        => 'typography', 
            'title'       => __('H3', 'pe-core'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('h3'),
            'units'       =>'px',


        ),
        array(
            'id'          => 'typog-h4',
            'type'        => 'typography', 
            'title'       => __('H4', 'pe-core'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('h4'),
            'units'       =>'px',


        ),
        array(
            'id'          => 'typog-h5',
            'type'        => 'typography', 
            'title'       => __('H5', 'pe-core'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('h5'),
            'units'       =>'px',


        ),
        array(
            'id'          => 'typog-h6',
            'type'        => 'typography', 
            'title'       => __('H6', 'pe-core'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('h6'),
            'units'       =>'px',


        ),
        array(
            'id'          => 'typog-a',
            'type'        => 'typography', 
            'title'       => __('Links(a)', 'pe-core'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('a'),
            'units'       =>'px',


        ),
        array(
            'id'          => 'typog-a-hover',
            'type'        => 'typography', 
            'title'       => __('Links Hover(a)', 'pe-core'),
            'google'      => true, 
            'font-backup' => true,
            'output'      => array('a:hover'),
            'units'       =>'px',


        ),
        
    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Colors', 'pe-core') ,
    'id' => 'colors',
    'icon' => 'el el-brush',
    'fields' => array(
        array(
            'id'       => 'body-bg',
            'type'     => 'color',
            'title'    => __('Body Background Color', 'pe-core'), 
            'output'    => array('background-color' => 'body')
        ),
        array(
            'id'       => 'header-bg',
            'type'     => 'color',
            'title'    => __('Header Background Color', 'pe-core'), 
            'output'    => array('background-color' => '.site-header')
        ),
        array(
            'id'       => 'footer-bg',
            'type'     => 'color',
            'title'    => __('Footer Background Color', 'pe-core'), 
            'output'    => array('background-color' => '.footer-ov')
        ),
        array(
            'id'       => 'lines-color',
            'type'     => 'color',
            'title'    => __('Lines Color', 'pe-core'), 
            'output'    => array('background-color' => '.line')
        ),

    )
));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Custom CSS/JS', 'pe-core') ,
    'id' => 'fullscreen-foasasddoter',
    'icon' => 'el el-css',
    'fields' => array(
        array(
            'id'       => 'css_editor',
            'type'     => 'ace_editor',
            'title'    => __('CSS', 'pe-core'),
            'subtitle' => __('Write your custom CSS code here.', 'pe-core'),
            'mode'     => 'css',
            'theme'    => 'monokai',
        ),
        array(
            'id'       => 'js_editor',
            'type'     => 'ace_editor',
            'title'    => __('JavaScript', 'pe-core'),
            'subtitle' => __('Write your custom JS code here.', 'pe-core'),
            'mode'     => 'javascript',
            'theme'    => 'chrome',
        ),
        
    )
));
