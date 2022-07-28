<?php 



/*
Register Google Fonts
*/

function cygni_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'cygni' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Archivo:400,500,600,700&display=swap' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}



/**
 * Enqueue scripts and styles.
 */
function cygni_scripts() {
    
    wp_enqueue_style( 'entypo' , get_template_directory_uri() . '/css/entypo.css');
    
    wp_enqueue_style( 'locomotive-scroll' , get_template_directory_uri() . '/css/locomotive-scroll.min.css');
    
    wp_enqueue_style( 'magnific-popup' , get_template_directory_uri() . '/css/magnific-popup.min.css');
    
    wp_enqueue_style( 'plyr' , get_template_directory_uri() . '/css/plyr.min.css');
    
    wp_enqueue_style( 'swiper-bundle' , get_template_directory_uri() . '/css/swiper-bundle.min.css');
    
	wp_enqueue_style( 'cygni-style', get_stylesheet_uri(), array(), VERSION );
    
	wp_style_add_data( 'cygni-style', 'rtl', 'replace' );
    
    wp_enqueue_script( 'macy', get_template_directory_uri() . '/js/macy.js', array('jquery'), VERSION, true );
    
    wp_enqueue_script( 'anime', get_template_directory_uri() . '/js/anime.min.js', array('jquery'), VERSION, true );
    
    wp_enqueue_script( 'plyr', get_template_directory_uri() . '/js/plyr.min.js', array('jquery'), VERSION, true );

    wp_enqueue_script( 'smooth-scrollbar', get_template_directory_uri() . '/js/smooth-scrollbar.js', array('jquery'), VERSION, true );

    wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), VERSION, true );
    
    wp_enqueue_script( 'jquery-marquee', get_template_directory_uri() . '/js/jquery.marquee.min.js', array('jquery'), VERSION, true );

    wp_enqueue_script('masonry');

     wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', array('jquery'), VERSION, true );
    
    wp_enqueue_script( 'jquery-splitlines', get_template_directory_uri() . '/js/jquery.splitlines.js', array('jquery'), VERSION, true );
    
    wp_enqueue_script( 'barba', get_template_directory_uri() . '/js/barba.umd.js', array('jquery'), VERSION, true );
    
    wp_enqueue_script( 'locomotive-scroll', get_template_directory_uri() . '/js/locomotive-scroll.min.js', array('jquery'), VERSION, true );
    
	wp_enqueue_script( 'cygni-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cygni_scripts', 99  );




?>
