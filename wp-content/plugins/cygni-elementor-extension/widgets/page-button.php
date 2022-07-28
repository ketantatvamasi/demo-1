<?php
namespace ElementorCygni\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class CygniPageButton extends Widget_Base {
 
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
    return 'cygnipagebutton';
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
    return __( 'Cygni Page Button', 'cygni-elementor' );
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
    return 'fa fa-link';
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
      'section_page_button',
      [
        'label' => __( 'Page Button', 'cygni-elementor' ),
      ]
    );
		$this->add_control(
			'button_title',
			[
				'label' => __( 'Button Title', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
		$this->add_control(
			'button_caption',
			[
				'label' => __( 'Caption', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
        $this->add_control(
			'button_url',
			[
				'label' => __( 'URL', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
      
        $this->add_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'align-left' => [
						'title' => __( 'Left', 'cygni-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'align-center' => [
						'title' => __( 'Center', 'cygni-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'align-right' => [
						'title' => __( 'Right', 'cygni-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'align-center',
				'toggle' => true,
			]
		);
      
        $this->add_control(
			'new_window',
			[
				'label' => __( 'Open on New Window?', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'cygni-elementor' ),
				'label_off' => __( 'No', 'cygni-elementor' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        
    $this->end_controls_section();
      
        $this->start_controls_section(
         'text_box_animations',
         [
            'label' => __( 'Text Box Animation', 'cygni-elementor' ),
         ]
        );

		$this->add_control(
			'text_box_animation',
			[
				'label' => __( 'Button Animation', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none'  => __( 'None', 'cygni-elementor' ),
					'lines-up'  => __( 'Lines Up', 'cygni-elementor' ),
					'lines-down'  => __( 'Lines Down', 'cygni-elementor' ),
					'lines-fade-up'  => __( 'Lines Fade Up', 'cygni-elementor' ),
					'lines-fade-down'  => __( 'Lines Fade Down', 'cygni-elementor' ),
					'skew-up'  => __( 'Skew Up', 'cygni-elementor' ),
					'skew-down'  => __( 'Skew Down', 'cygni-elementor' ),
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
    $animation = $settings['text_box_animation'];
    $has_anim = '';
    $target = "";
    $alignment = $settings['text_align'];
      $animation_class = '';
      if ($animation !== 'none') {
            $animation_class = 'has-animation ' . $animation;
            $has_anim = 'data-scroll';
  
      };
      
      	if ( 'yes' === $settings['new_window'] ) {
			$target = 'target="_blank"';
		};
    ?>



<!-- Page Button -->
<div class="page-button <?php echo $alignment ?>">
    <div <?php echo $has_anim ?> class="caption <?php echo $animation_class ?> "><?php echo $settings['button_caption'] ?></div>
    <h1 <?php echo $has_anim ?> class="big-title <?php echo $animation_class ?> "><a <?php echo $target ?> href="<?php echo $settings['button_url'] ?>" class="underline"><?php echo $settings['button_title'] ?></a></h1>
</div>
<!--/ Page Button -->

<?php

    ?>

<?php
  }

}
