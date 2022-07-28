<?php
namespace ElementorCygni;
 
/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.0.0
 */
class Plugin {
 
  /**
   * Instance
   *
   * @since 1.0.0
   * @access private
   * @static
   *
   * @var Plugin The single instance of the class.
   */
  private static $_instance = null;
 
  /**
   * Instance
   *
   * Ensures only one instance of the class is loaded or can be loaded.
   *
   * @since 1.2.0
   * @access public
   *
   * @return Plugin An instance of the class.
   */
  public static function instance() {
    if ( is_null( self::$_instance ) ) {
      self::$_instance = new self();
    }
           
    return self::$_instance;
  }
 
  /**
   * widget_scripts
   *
   * Load required plugin core files.
   *
   * @since 1.2.0
   * @access public
   */
  public function widget_scripts() {
    wp_register_script( 'elementor-cygna', plugins_url( '/assets/js/file.js', __FILE__ ), [ 'jquery' ], false, true );
  }
    
    	/**
	 * Register Custom Widget Categories
	 *
	 * @return void
	 */
	public function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'cygni-showcase',
			[
				'title' => esc_html__( 'Cygni Showcase Layouts', 'cygni' ),
				'icon'  => 'eicon-plug',
			]
		);

		$elements_manager->add_category(
			'cygni-content',
			[
				'title' => esc_html__( 'Cygni Content Elements', 'cygni-elementor' ),
				'icon'  => 'eicon-sitemap',
			]
		);

	}
    
 
  /**
   * Include Widgets files
   *
   * Load widgets files
   *
   * @since 1.2.0
   * @access private
   */
  private function include_widgets_files() {
    require_once( __DIR__ . '/widgets/big-slider.php' );
    require_once( __DIR__ . '/widgets/detailed.php' );
    require_once( __DIR__ . '/widgets/grid.php' );
    require_once( __DIR__ . '/widgets/wall.php' );
    require_once( __DIR__ . '/widgets/list-v2.php' );
    require_once( __DIR__ . '/widgets/horizontal.php' );
    require_once( __DIR__ . '/widgets/list-carousel.php' );
    require_once( __DIR__ . '/widgets/vertical.php' );
    require_once( __DIR__ . '/widgets/text-box.php' );
    require_once( __DIR__ . '/widgets/accordion.php' );
    require_once( __DIR__ . '/widgets/image.php' );
    require_once( __DIR__ . '/widgets/team-member.php' );
    require_once( __DIR__ . '/widgets/clients.php' );
    require_once( __DIR__ . '/widgets/embed-video.php' );
    require_once( __DIR__ . '/widgets/image-carousel.php' );
    require_once( __DIR__ . '/widgets/page-button.php' );
    require_once( __DIR__ . '/widgets/section-bars-background.php' );
  }
 
  /**
   * Register Widgets
   *
   * Register new Elementor widgets.
   *
   * @since 1.2.0
   * @access public
   */
  public function register_widgets() {
    // Its is now safe to include Widgets files
    $this->include_widgets_files();
 
    // Register Widgets
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\BigSlider() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Wall() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ListV2() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Horizontal() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ListCarousel() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Vertical() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Detailed() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CygniGrid() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CygniTextBox() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CygniAccordion() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CygniSingleImage() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CygniTeamMember() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CygniClients() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CygniEmbedVideo() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CygniImageCarousel() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CygniPageButton() );
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\SectionBarsBackground() );
  }
 
  /**
   *  Plugin class constructor
   *
   * Register plugin action hooks and filters
   *
   * @since 1.2.0
   * @access public
   */
  public function __construct() {
 
    // Register widget scripts
    add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
 
    // Register widgets
    add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
      
       // Register widget categories
      add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );
  }
    
    
}
 
// Instantiate Plugin Class
Plugin::instance();