<?php 

function ocdi_import_files() {
  return array(
    array(
      'import_file_name'           => 'Cygni Light',
      'import_file_url'            => 'http://pethemes.com/cygni-demos/light/cygni-light.xml',
      'import_widget_file_url'     => 'http://pethemes.com/cygni-demos/light/cygni-light-widgets.wie',
      'import_customizer_file_url' => 'http://pethemes.com/cygni-demos/light/cygni-light-customizer.dat',
        
              'import_redux'               => array(
        array(
     'file_url'    => 'http://pethemes.com/cygni-demos/light/cygni-redux-light.json',
          'option_name' => 'pe-redux',
        ),
      ),

      'import_preview_image_url'   => 'http://pethemes.com/cygni-demos/light/ss.png',
      'preview_url'                => 'http://cygniwp-light.pethemes.com/',
    ),
    array(
      'import_file_name'           => 'Cygni Dark',
      'import_file_url'            => 'http://pethemes.com/cygni-demos/dark/cygni-dark.xml',
      'import_widget_file_url'     => 'http://pethemes.com/cygni-demos/dark/cygni-dark-widgets.wie',
      'import_customizer_file_url' => 'http://pethemes.com/cygni-demos/dark/cygni-dark-customizer.dat',
        
              'import_redux'               => array(
        array(
     'file_url'    => 'http://pethemes.com/cygni-demos/dark/cygni-redux-dark.json',
          'option_name' => 'pe-redux',
        ),
      ),

      'import_preview_image_url'   => 'http://pethemes.com/cygni-demos/dark/ss.png',
      'preview_url'                => 'http://cygniwp-dark.pethemes.com/',
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'ocdi_import_files' );

function ocdi_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
    $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'menu-1' => $main_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
            'footer-menu' => $footer_menu->term_id, // replace 'main-menu' here with the menu location identifier from register_nav_menu() function
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Big Slider' );
    $blog_page_id  = get_page_by_title( 'Journal' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );


add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );