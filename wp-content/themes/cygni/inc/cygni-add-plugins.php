<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Elegea for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'cygni_register_required_plugins' );

/**
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function cygni_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'         => esc_html__('Elementor' , 'cygni'), // The plugin name.
			'slug'         => 'elementor', // The plugin slug (typically the folder name).
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
		),
        array(
			'name'         => esc_html__('Redux Franework' , 'cygni'), // The plugin name.
			'slug'         => 'redux-framework', // The plugin slug (typically the folder name).
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
		),
        array(
			'name'         => esc_html__('Advanced Custom Fields' , 'cygni'), // The plugin name.
			'slug'         => 'advanced-custom-fields', // The plugin slug (typically the folder name).
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
		),
        array(
			'name'         => esc_html__('Contact Form 7' , 'cygni'), // The plugin name.
			'slug'         => 'contact-form-7', // The plugin slug (typically the folder name).
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
		),
        array(
			'name'         => esc_html__('One Click Demo İmport' , 'cygni'), // The plugin name.
			'slug'         => 'one-click-demo-import', // The plugin slug (typically the folder name).
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
		),
        array(
			'name'         => esc_html__('Pe Core' , 'cygni'), // The plugin name.
			'slug'         => 'pe-core', // The plugin slug (typically the folder name).
            'source'       => get_template_directory_uri() . '/plugins/pe-core.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
		),
        array(
			'name'         => esc_html__('Cygni Elementor Extension' , 'cygni'), // The plugin name.
			'slug'         => 'cygni-elementor-extension', // The plugin slug (typically the folder name).
            'source'       => get_template_directory_uri() . '/plugins/cygni-elementor-extension.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'cygni',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}
