<?php
namespace ElementorCygni\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class SectionBarsBackground extends Widget_Base {
 
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
    return 'sectionbarsbackground';
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
    return __( 'Section Bars Background', 'cygni-elementor' );
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
    return 'fa fa-caret-up';
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
      'section_background_bars',
      [
        'label' => __( 'Background', 'cygni-elementor' ),
      ]
    );

      $this->add_control(
			'bg_color',
			[
				'label' => __( 'Background Color', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
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
    
      $bgColor = $settings['bg_color'] ;

      $sec_id = 'sec-bg-' . uniqid();
    ?>

<div class="section-bars <?php echo esc_attr($sec_id) ?>">
        <span class="sec-bg-ov"></span>
        <span class="sec-bg-ov"></span>
        <span class="sec-bg-ov"></span>
        <span class="sec-bg-ov"></span>
</div>

<style>
    
    <?php echo '.' . $sec_id . ' .sec-bg-ov' ?> {background-color: <?php echo $bgColor ?>}

</style>

<?php
    ?>

<?php
  }



    
}
