<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Cygni
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cygni_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
    
    $footer_vis = '';
    if (class_exists('ACF')) {
        if (get_field('page_settings')) {

        $page_settings = get_field('page_settings'); 
        
        if ($page_settings['footer_style'] === 'none') {
            $footer_vis = 'no-footer';
            $classes[] = $footer_vis;
        }
        };
    };
    
   
	return $classes;
}
add_filter( 'body_class', 'cygni_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cygni_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'cygni_pingback_header' );


/**
 * Change the Tag Cloud's Font Sizes.
 */

function cygni_tag_cloud_font_sizes( array $args ) {
    $args['smallest'] = '12';
    $args['largest'] = '12';
    $args['unit'] = 'px';

    return $args;
};

add_filter( 'widget_tag_cloud_args', 'cygni_tag_cloud_font_sizes');


/**
 * Comments
 */

if (!function_exists('cygni_comments')) {
    
function cygni_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
    $is_pingback_comment = $comment->comment_type == 'pingback';
    $comment_class = 'comment';
    if ( $is_pingback_comment ) {
        $comment_class .= ' pingback-comment';
    }
	?>

<li>
    <div class="<?php echo esc_attr($comment_class); ?>">
        <div class="comment-meta">
            <?php if ( ! $is_pingback_comment ) { ?>
            <div class="image"> <?php echo get_avatar($comment, 100); ?> </div>
            <?php } ?>

            <h5 class="name"><?php if ( $is_pingback_comment ) { esc_html_e( 'Pingback:', 'cygni' ); } ?><?php echo get_comment_author_link(); ?></h5>
            <span class="comment_date"><?php comment_date(); ?></span>
        </div>

        <div class="text_holder" id="comment-<?php echo comment_ID(); ?>">
            <?php comment_text(); ?>
        </div>

        <?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) ); ?>

    </div>

    <?php if ($comment->comment_approved == '0') : ?>
    <p><em><?php esc_html_e('Your comment is awaiting moderation.', 'cygni'); ?></em></p>
    <?php endif; ?>
    <?php 
}
}


// Modify comments header text in comments
add_filter( 'cygni_title_comments', 'child_title_comments');
function cygni_child_title_comments() {
    return esc_html__e(comments_number( '<h3>No Responses</h3>', '<h3>1 Response</h3>', '<h3>% Responses...</h3>' ), 'cygni');
}
 
// Add placeholder for Name and Email
function cygni_comment_form_fields($fields){
    
    
    $commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$label     = $req ? '*' : ' ' . __( '(optional)', 'cygni' );
	$aria_req  = $req ? "aria-required='true'" : '';
    

    
    $fields['author'] = '<div class="field-wrap"><label>Name*</label>' . '<input id="author" placeholder="'. esc_attr__('Who are you?' , 'cygni').'" name="author" type="text" value="' .
                esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.' </div>';
    
    $fields['email'] = '<div class="field-wrap"><label>E-mail*</label>' . '<input id="email" placeholder="'. esc_attr__('Promise we will not disturb' , 'cygni').'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' />'.'</div>';
    
    
    $fields['url'] = '<div class="field-wrap"><label>Website</label>' .
             '<input id="url" name="url" placeholder="'. esc_attr__('Website' , 'cygni').'" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' . '</div>';

    
    return $fields;
}
add_filter('comment_form_default_fields','cygni_comment_form_fields'); 
                
function cygni_comment_field( $comment_field ) {


  $comment_field =
    '<div class="message-wrap comment-wrap"><label>Your Comment</label>
            <textarea required id="comment" name="comment" placeholder="' . esc_attr__( "Your comment...", "cygni" ) . '" cols="45" rows="4" aria-required="true"></textarea>'. '</div>';

  return $comment_field;
}
add_filter( 'comment_form_field_comment', 'cygni_comment_field' ); 

/**
 * Check if the current post/page
 * is built using Elementor
 *
 * @param string $post_id
 * @return bool
 */
function is_built_with_elementor( $post_id = null ) {

	if ( ! class_exists( '\Elementor\Plugin' ) ) {
		return false;
	}

	if ( $post_id == null ) {
		$post_id = get_the_ID();
	}

	if ( is_singular() && \Elementor\Plugin::$instance->db->is_built_with_elementor( $post_id ) ) {
		return true;
	}

	return false;
}

/**
 * Check if Elementor editor
 * is active
 *
 * @return bool
 */
function is_elementor_editor_active() {
	if (class_exists( '\Elementor\Plugin' ) && \Elementor\Plugin::$instance->preview->is_preview_mode()) {
		return true;
	}
	return false;
}

 
function register_footer_menu() {
    register_nav_menu( 'footer-menu', __( 'Footer Menu', 'cygni' ) );
}
add_action( 'after_setup_theme', 'register_footer_menu' );


function cygni_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __( 'Search for:' , 'cygni' ) . '</label>
    <label class="cygni-search">
    <input class="search-input" placeholder="'. esc_attr__( 'Search..' , 'cygni' ) . '" type="search" value="' . get_search_query() . '" name="s" id="s" />
    <button type="submit" id="searchsubmit"/><i class="icon-search"></i></button>
    </label>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'cygni_search_form', 100 );
