<?php
namespace ElementorCygni\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class CygniTextBox extends Widget_Base {
 
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
    return 'cygnitextbox';
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
    return __( 'Cygni Text Box', 'cygni-elementor' );
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
    return 'fa fa-font';
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
      'section_text_box',
      [
        'label' => __( 'Text Box Settings', 'cygni-elementor' ),
      ]
    );
      
      $this->add_control(
			'text_box_caption',
			[
				'label' => __( 'Caption', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 1,
				'placeholder' => __( 'Enter your caption here.', 'cygni-elementor' ),
			]
		);
		$this->add_control(
			'text_box_content',
			[
				'label' => __( 'Content', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'placeholder' => __( 'Enter your content here(HTML Tags Allowed).', 'cygni-elementor' ),
			]
		);
        
      
        $this->add_control(
			'text_box_align',
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
				'default' => 'align-left',
				'toggle' => true,
			]
		);

		$this->add_control(
			'text_box_size',
			[
				'label' => __( 'Font Size', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'h1',
				'options' => [
					'p'  => __( 'Paragraph', 'cygni-elementor' ),
					'h1'  => __( 'H1', 'cygni-elementor' ),
					'h2' => __( 'H2', 'cygni-elementor' ),
					'h3' => __( 'H3', 'cygni-elementor' ),
					'h4' => __( 'H4', 'cygni-elementor' ),
					'h5' => __( 'H5', 'cygni-elementor' ),
					'h6' => __( 'H6', 'cygni-elementor' ),
					'custom' => __( 'Custom', 'cygni-elementor' ),
				],
			]
		);
      
    $this->add_control(
			'text_box_custom_size',
			[
				'label' => __( 'Custom Font Size (px)', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 1,
				'default' => 60,
			]
		);
      $this->add_control(
			'text_box_custom_lineheight',
			[
				'label' => __( 'Custom Line Height (px)', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 1,
				'default' => 70,
			]
		);
      
		$this->add_control(
			'text_box_weight',
			[
				'label' => __( 'Font Weight', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '500',
				'options' => [
					'400'  => __( 'Thin', 'cygni-elementor' ),
					'500' => __( 'Regular', 'cygni-elementor' ),
					'600' => __( 'Bold', 'cygni-elementor' ),
					'700' => __( 'Black', 'cygni-elementor' ),
				],
			]
		);
      
		$this->add_control(
			'text_box_style',
			[
				'label' => __( 'Font Style', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'normal',
				'options' => [
					'normal'  => __( 'Normal', 'cygni-elementor' ),
					'italic' => __( 'Italic', 'cygni-elementor' ),
				],
			]
		);
      
      $this->add_control(
			'text_color',
			[
				'label' => __( 'Content Color', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
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
			'animdelay',
			[
				'label' => __( 'Animation Delay (seconds)', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 0.1,
				'default' => 0,
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
      $animation_class = '';
      $animation_delay = '';
      $data_delay = '';
      $alignment = $settings['text_box_align'];
      
      $htype = "";
      $hweight = 'font-weight:' . $settings['text_box_weight'] . ';';
      $hstyle = 'font-style:' . $settings['text_box_style'] . ';';
      $lineHeight = "";
      $hsize = "";
      $hcolor = "";
       if (! empty ($settings['text_color'])) {
          $hcolor ='color:' . $settings['text_color'] . ';'; 
       }
      
      
      
      if (($settings['text_box_size'] === 'custom')) {
          $htype = 'div';
          $htypeClose = 'div';
          $hsize = 'font-size:' . $settings['text_box_custom_size'] . 'px;';
            $lineHeight = 'line-height:' . $settings['text_box_custom_lineheight'] . 'px;';
          
      } else {
          $htype = $settings['text_box_size'];
        
      }
      
      if ($animation !== 'none') {
            $animation_class = 'has-animation ' . $animation;
            $has_anim = 'data-scroll';
            $data_delay = 'data-delay="' . $settings['animdelay'] . '" ';
      };
      

      $text_box_style = $hweight . $hstyle . $hcolor . $hsize . $lineHeight;
      
      $text_box_shorcode = '<' . $htype . ' ' . $has_anim . ' ' . $data_delay . ' class="' . $animation_class . ' ' . $alignment . '" style="' . $text_box_style . '">'; 
      

    ?>
<!-- Heading Wrapper -->
<div class="text-wrapper">
    
    <?php echo '<div ' . $data_delay . 'style="' . $hcolor .'" class="caption ' . $alignment . ' ' . $animation_class .'" ' . $has_anim . '>' . $settings['text_box_caption'] . '</div>' ?>

  <?php echo  $text_box_shorcode . $settings['text_box_content'] . '</' . $htype . '>' ?>
   

</div>
<!--/ Heading Wrapper -->


<?php

    ?>

<?php
  }
    


}
