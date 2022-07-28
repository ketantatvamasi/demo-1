<?php
namespace ElementorCygni\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class CygniAccordion extends Widget_Base {
 
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
    return 'cygniaccordion';
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
    return __( 'Cygni Accordion', 'cygni-elementor' );
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
    return 'fa fa-list-ol';
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
      'section_ac_content',
      [
        'label' => __( 'Accordion Content', 'cygni-elementor' ),
      ]
    );


      
      $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'accordion_title', [
				'label' => __( 'Title', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'List Title' , 'cygni-elementor' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'accordion_content', [
				'label' => __( 'Content', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __( 'List Content' , 'cygni-elementor' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'accordion',
			[
				'label' => __( 'Accordion Items', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'accordion_title' => __( 'Title #1', 'cygni-elementor' ),
						'accordion_content' => __( 'Item content. Click the edit button to change this text.', 'cygni-elementor' ),
					],
				],
				'title_field' => '{{{ accordion_title }}}',
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
				'label' => __( 'Text Box Animation', 'cygni-elementor' ),
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
		$this->add_control(
			'animdur',
			[
				'label' => __( 'Animation Duration (seconds)', 'cygni-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'second' ],
				'range' => [
					'second' => [
						'min' => 0,
						'max' => 10,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'second',
					'size' => 0.5,
				],
				'selectors' => [
					'{{WRAPPER}} .box' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
      
    $this->add_control(
			'animdelay',
			[
				'label' => __( 'Animation Duration (seconds)', 'cygni-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'second' ],
				'range' => [
					'second' => [
						'min' => 0,
						'max' => 10,
						'step' => 0.1,
					],
				],
				'default' => [
					'unit' => 'second',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .box' => 'width: {{SIZE}}{{UNIT}};',
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

    ?>



<!-- Accordion -->
<div class="c-accordion">
    <div class="accordion-list">
        <ul>

        </ul>

        <?php 	if ( $settings['accordion'] ) {
	
			foreach (  $settings['accordion'] as $item ) { ?>

        <li data-scroll class="accordion-title"><?php echo  $item['accordion_title'] ?>
            <p class="accordion-content">
                <?php echo  $item['accordion_content'] ?></p>
        </li>

        <?php	}
	
		} ?>


    </div>
</div>
<!--/ Accordion -->


<?php

    ?>

<?php
  }

}
