<?php
namespace ElementorCygni\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class CygniImageCarousel extends Widget_Base {
 
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
    return 'cygniimagecarousel';
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
    return __( 'Cygni Image Carousel', 'cygni-elementor' );
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
    return 'fa fa-file-image-o';
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
      'section_image_carousel',
      [
        'label' => __( 'Carousel Images', 'cygni-elementor' ),
      ]
    );

		$this->add_control(
			'carousel_images',
			[
				'label' => __( 'Add Images', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);
      

        
    $this->end_controls_section();
      
        $this->start_controls_section(
         'carousel_settings',
         [
            'label' => __( 'Carousel Settings', 'cygni-elementor' ),
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

<!-- Carousel -->
<div class="pe-carousel swiper-container">
    <div class="swiper-wrapper">
        
        <?php  foreach ( $settings['carousel_images'] as $image ) {?>
        <div class="pe-carousel-item swiper-slide">
            <img alt="Carousel Image" src="<?php echo $image['url'] ?>">
        </div>
        <?php  } ?>
    </div>
</div>
<!--/ Carousel -->


<?php

    ?>

<?php
  }

}
