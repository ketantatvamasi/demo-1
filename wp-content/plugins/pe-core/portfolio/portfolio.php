<?php




// Our custom post type function
function create_posttype() {
    
    $port_slug = 'project';
    
    if (class_exists('Redux')) {
        
         $option = get_option('pe-redux');
        
        if (! empty ($option['portfolio-slug'])) {
        
        $port_slug = $option['portfolio-slug'];
    }
        
        
    }
    
    register_post_type( 'portfolios',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Portfolios' ),
                'singular_name' => __( 'Portfolio' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => $port_slug),
            'show_in_rest' => true,
 
        )
    );
}

// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Portfolios', 'Post Type General Name', 'pe-core' ),
        'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'pe-core' ),
        'menu_name'           => __( 'Portfolios', 'pe-core' ),
        'parent_item_colon'   => __( 'Parent Portfolio', 'pe-core' ),
        'all_items'           => __( 'All Portfolios', 'pe-core' ),
        'view_item'           => __( 'View Portfolio', 'pe-core' ),
        'add_new_item'        => __( 'Add New Portfolio', 'pe-core' ),
        'add_new'             => __( 'Add New', 'pe-core' ),
        'edit_item'           => __( 'Edit Portfolio', 'pe-core' ),
        'update_item'         => __( 'Update Portfolio', 'pe-core' ),
        'search_items'        => __( 'Search Portfolio', 'pe-core' ),
        'not_found'           => __( 'Not Found', 'pe-core' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'pe-core' ),
  
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'portfolios', 'pe-core' ),
        'description'         => __( 'Portfolio news and reviews', 'pe-core' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'work-types' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,         
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'portfolios', $args );

}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );



 
//create a custom taxonomy name it "type" for your posts
function crunchify_create_deals_custom_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Work Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Work Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Types' ),
    'all_items' => __( 'All Work Types' ),
    'parent_item' => __( 'Parent Work Type' ),
    'parent_item_colon' => __( 'Parent Work Type:' ),
    'edit_item' => __( 'Edit Work Type' ), 
    'update_item' => __( 'Update Work Type' ),
    'add_new_item' => __( 'Add New Work Type' ),
    'new_item_name' => __( 'New Work Type Name' ),
    'menu_name' => __( 'Work Types' ),
  ); 	
 
  register_taxonomy('work-types',array('portfolios'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
      'show_in_rest'      => true, // Needed for tax to appear in Gutenberg editor.
    'query_var' => true,
    'rewrite' => array( 'slug' => 'work-type' ),
  ));
}

// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'crunchify_create_deals_custom_taxonomy', 0 );


function cygni_add_cpt_support() {
    
    //if exists, assign to $cpt_support var
	$cpt_support = get_option( 'elementor_cpt_support' );
	
	//check if option DOESN'T exist in db
	if( ! $cpt_support ) {
	    $cpt_support = [ 'page', 'post', 'portfolios' ]; //create array of our default supported post types
	    update_option( 'elementor_cpt_support', $cpt_support ); //write it to the database
	}
	
	//if it DOES exist, but portfolio is NOT defined
	else if( ! in_array( 'portfolios', $cpt_support ) ) {
	    $cpt_support[] = 'portfolios'; //append to array
	    update_option( 'elementor_cpt_support', $cpt_support ); //update database
	}
	
	//otherwise do nothing, portfolio already exists in elementor_cpt_support option
}
add_action( 'after_switch_theme', 'cygni_add_cpt_support' );
