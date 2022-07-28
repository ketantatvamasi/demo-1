<?php
namespace ElementorCygni\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class CygniEmbedVideo extends Widget_Base {
 
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
    return 'cygniembedvideo';
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
    return __( 'Cygni Embed Video', 'cygni-elementor' );
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
    return 'fa fa-play';
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
        'label' => __( 'Video Player', 'cygni-elementor' ),
      ]
    );
      
		$this->add_control(
			'player_style',
			[
				'label' => __( 'Player Style', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'classic',
				'options' => [
					'autoplay'  => __( 'Autoplay', 'cygni-elementor' ),
					'classic' => __( 'Classic', 'cygni-elementor' ),
				],
			]
		);
      
        $this->add_control(
			'video_provider',
			[
				'label' => __( 'Video Provider', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'youtube',
				'options' => [
					'youtube'  => __( 'YouTube', 'cygni-elementor' ),
					'vimeo' => __( 'Vimeo', 'cygni-elementor' ),
				],
			]
		);
      
      $this->add_control(
			'video_id',
			[
				'label' => __( 'Video ID', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __('Eg: LcSevy6HUQc' , 'cygni-elementor')
		
			]
		);
      
      
		$this->add_control(
			'cover_image',
			[
				'label' => __( 'Cover Image', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                'description' => __('This image will be used for "classic" player style.' , 'cygni-elementor')
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

<?php if (($settings['player_style'] === 'autoplay')) : ?>

<!-- Embed Video -->
<div class="pe-embed-video">
    <div class="pe-video" data-plyr-provider="<?php echo $settings['video_provider'] ?>" data-plyr-embed-id="<?php echo $settings['video_id'] ?>"></div>
</div>

<?php elseif (($settings['player_style'] === 'classic')) : ?>

<div class="pe-video-style-2">
    <div class="video-control">
        <i class="icon-play"></i>
        <img class="video-cover-image" src="<?php echo $settings['cover_image']['url'] ?>" alt="Video Cover Image">
    </div>
    <div class="pe-video-2" data-plyr-provider="<?php echo $settings['video_provider'] ?>" data-plyr-embed-id="<?php echo $settings['video_id'] ?>"></div>
</div>
<?php endif; ?>


<!--/ Embed Video -->
<?php

    ?>

<?php
  }

}
