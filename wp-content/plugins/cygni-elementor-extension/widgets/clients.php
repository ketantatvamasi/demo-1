<?php
namespace ElementorCygni\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class CygniClients extends Widget_Base {
 
  /**
   * Retrieve the widget name.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget name.
   */
  public function get_name() {
    return 'cygniclients';
  }
 
  /**
   * Retrieve the widget title.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget title.
   */
  public function get_title() {
    return __( 'Cygni Clients', 'cygni-elementor' );
  }
 
  /**
   * Retrieve the widget icon.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget icon.
   */
  public function get_icon() {
    return 'fa fa-users';
  }
 
  /**
   * Retrieve the list of categories the widget belongs to.
   *
   * Used to determine where to display the widget in the editor.
   *
   * Note that currently Elementor supports only one category.
   * When multiple categories passed, Elementor uses the first one.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return array Widget categories.
   */
  public function get_categories() {
    return [ 'cygni-content' ];
  }


  /**
   * Register the widget controls.
   *
   * Adds different input fields to allow the user to change and customize the widget settings.
   *
   * @since 1.1.0
   *
   * @access protected
   */
  protected function register_controls() {
	
      
    $this->start_controls_section(
      'section_clients',
      [
        'label' => __( 'Clients', 'cygni-elementor' ),
      ]
    );

		$this->add_control(
			'columns',
			[
				'label' => __( 'Clients Columns', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'columns-4',
				'options' => [
					'columns-1'  => __( '1', 'cygni-elementor' ),
					'columns-2'  => __( '2', 'cygni-elementor' ),
					'columns-3'  => __( '3', 'cygni-elementor' ),
					'columns-4'  => __( '4', 'cygni-elementor' ),
				],
			]
		);

      
      $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'logo',
			[
				'label' => __( 'Client Logo', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'url', [
				'label' => __( 'Client URL', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,

			]
		);

		$this->add_control(
			'clients',
			[
				'label' => __( 'Add Clients', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'url' => __( 'http://pethemes.com', 'cygni-elementor' ),
					],
				],
				'title_field' => '{{{ url }}}',
			]
		);
        
    $this->end_controls_section();
 
      
     
  }
 
  /**
   * Render the widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.1.0
   *
   * @access protected
   */
  protected function render() {
    $settings = $this->get_settings_for_display();
      
    ?>
<!-- Clients -->
<div class="c-clients <?php echo $settings['columns'] ?>">
    <?php if ( $settings['clients'] ) {
	
		foreach (  $settings['clients'] as $client ) { ?>

    <a target="_blank" href="<?php echo $client['url'] ?>" class="c-client">
        <img src="<?php echo $client['logo']['url'] ?>" alt="Client Logo">
    </a>
    <?php	}
	
		} ?>

</div>
<!--/ Clients -->



<?php

    ?>

<?php
  }

}
