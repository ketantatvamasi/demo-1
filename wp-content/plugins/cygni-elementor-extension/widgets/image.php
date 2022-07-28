<?php
namespace ElementorCygni\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class CygniSingleImage extends Widget_Base {
 
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
    return 'cygnisingleimage';
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
    return __( 'Cygni Single Image', 'cygni-elementor' );
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
    return 'fa fa-picture-o';
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
        'label' => __( 'Single Image', 'cygni-elementor' ),
      ]
    );
		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
      
		$this->add_control(
			'lightbox',
			[
				'label' => __( 'Open on lightbox', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'cygni-elementor' ),
				'label_off' => __( 'No', 'cygni-elementor' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
      $this->add_control(
			'z_index',
			[
				'label' => __( 'Z Index', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -100,
				'max' => 999999,
				'step' => 1,
				'default' => 0,
			]
		);
        
    $this->end_controls_section();
      
        $this->start_controls_section(
         'text_box_animations',
         [
            'label' => __( 'Image Animation', 'cygni-elementor' ),
         ]
        );

		$this->add_control(
			'image_animation',
			[
				'label' => __( 'Image Animation', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none'  => __( 'None', 'cygni-elementor' ),
					'slide-top'  => __( 'Slide Top', 'cygni-elementor' ),
					'slide-bottom'  => __( 'Slide Bottom', 'cygni-elementor' ),
					'slide-left'  => __( 'Slide Left', 'cygni-elementor' ),
					'slide-right'  => __( 'Slide Right', 'cygni-elementor' ),
				],
			]
		);
		$this->add_control(
			'animdur',
			[
				'label' => __( 'Animation Duration(seconds)', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 0.1,
				'default' => '0.5',
			]
		);
      
    $this->add_control(
			'animdelay',
				[
				'label' => __( 'Animation Duration(seconds)', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 0.1,
				'default' => 0.5,
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
      
      $lightbox = "";
      if ( 'yes' === $settings['lightbox'] ) {
			 $lightbox = 'image-lightbox';
		};
      
      $anim_class = "";
      $anim_check = "";
      $anim_vars = "";
      $z_index = "";
      
           if (! ( 'none' === $settings['image_animation'] )) {
               
			 $anim_class = 'has-animation' . ' ' . $settings['image_animation'];
                $anim_check = 'data-scroll';
               
        $anim_delay = 'data-delay="' . $settings['animdelay'] . '"';
        $anim_duration = 'data-duration="' . $settings['animdur'] . '"';

               
            $anim_vars = $anim_delay . ' ' . $anim_duration;
		};
      
      $image_class = $lightbox . ' ' . $anim_class;
      
    ?>



<!-- Image Wrapper -->
<div <?php echo $anim_check . ' ' . $anim_vars ?> class="image-wrapper <?php echo $image_class ?>" style="z-index: <?php echo $settings['z_index'] ?>">
    <img src="<?php echo $settings['image']['url'] ?>" alt="Single Image">
</div>
<!--/ Image Wrapper -->

<?php

    ?>

<?php
  }

}
