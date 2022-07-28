<?php
namespace ElementorCygni\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class Horizontal extends Widget_Base {
 
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
    return 'horizontal';
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
    return __( 'Horizontal', 'cygni-elementor' );
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
    return 'fa fa-arrows-h';
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
    return [ 'cygni-showcase' ];
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
      'section_portfolios',
      [
        'label' => __( 'Portfolios', 'cygni-elementor' ),
      ]
    );

		$this->add_control(
			'exclude_projects',
			[
				'label' => __( 'Exclude Projects', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'description' => __( 'Enter proejct IDs which you dont want to display.', 'cygni-elementor' ),
				'placeholder' => __( 'Example: 1235,4785,5632', 'cygni-elementor' ),
			]
		);

		$this->add_control(
			'max_num',
			[
				'label' => __( 'Max Number of Slides', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 50,
				'step' => 1,
				'default' => 10,
			]
		);
      
		$this->add_control(
			'slide_order_by',
			[
				'label' => __( 'Order By', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'title'  => __( 'Title', 'cygni-elementor' ),
					'ID' => __( 'ID', 'cygni-elementor' ),
					'date' => __( 'Date', 'cygni-elementor' ),
					'modified' => __( 'Modify', 'cygni-elementor' ),
					'meta_value' => __( 'Custom', 'cygni-elementor' ),
				],
			]
		);
      
		$this->add_control(
			'slide_order',
			[
				'label' => __( 'Order', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC'  => __( 'Ascending', 'cygni-elementor' ),
					'DESC' => __( 'Descending', 'cygni-elementor' ),
				],
			]
		);

        
    $this->end_controls_section();
      
        $this->start_controls_section(
         'project_elements',
         [
            'label' => __( 'Project Elements', 'cygni-elementor' ),
         ]
        );

		$this->add_control(
			'show_year',
			[
				'label' => __( 'Year', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'cygni-elementor' ),
				'label_off' => __( 'Hide', 'cygni-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

      
        $this->end_controls_section();
      
      $this->start_controls_section(
         'section_slider',
         [
            'label' => __( 'Slider Settings', 'cygni-elementor' ),
         ]
        );
       $this->add_control(
			'show_arrows',
			[
				'label' => __( 'Arrows', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'cygni-elementor' ),
				'label_off' => __( 'Hide', 'cygni-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
       $this->add_control(
			'show_numbers',
			[
				'label' => __( 'Numbers', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'cygni-elementor' ),
				'label_off' => __( 'Hide', 'cygni-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'project_button',
			[
				'label' => __( 'Project Button text', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Discover Project', 'cygni-elementor' ),
				'placeholder' => __( 'Type your text here', 'cygni-elementor' ),
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
      
      $max_slides = $settings['max_num'];
      $order_by = $settings['slide_order_by'];
      $order = $settings['slide_order'];
      
      $project_button = $settings['project_button'];
      
      $excluded = $settings['exclude_projects'];
      $exclude_ids = explode(',', $excluded);
      
    $args = array(  
        'post_type' => 'portfolios',
        'post_status' => 'publish',
        'posts_per_page' => $max_slides,
     	'meta_key' => 'horizontal_order',
	    'orderby' => $order_by,
        'order' => $order,
        'post__not_in' =>  $exclude_ids,
        'meta_type' => 'NUMERIC'
    );

    $loop = new \WP_Query( $args ); 
    wp_reset_postdata(); 


    ?>
<!-- Horizontal Projects -->
<div class="fullscreen portfolio-showcase cygni-horizontal">

    <div class="cygni-horizontal-titles">
        <div class="horizontal-wrapper">

            <?php while ( $loop->have_posts() ) : $loop->the_post();  ?>
            <!-- Project -->
            <div class="horizontal-item">

                <!-- Project Image -->
                <div class="horizontal-image">
               <?php  $spesific = get_field('horizontal'); ?>
                
                <?php if ($spesific['enable'] == false) : ?>
                    
                    <?php if (get_field('video_url')) : ?>
                
                        <video autoplay muted loop playsinline>
                            <source src="<?php the_field('video_url') ?>">
                        </video>

                    <?php else : ?>
                
                         <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="Horizontal Project Image">
                
                    <?php endif; ?>
                
                <?php else: ?>
                
                    <?php if ($spesific['video']) : ?>
                        <video autoplay muted loop playsinline>
                            <source src="<?php echo $spesific['video'] ?>">
                        </video>
                    <?php elseif ($spesific['image']['url']): ?>       
                
                        <img src="<?php echo $spesific['image']['url'] ?>" alt="Horizontal Project Image">
                
                    <?php endif; ?>
                
                <?php endif; ?>
                </div>
                <!--/ Project Image -->

                <!-- Project Title -->
                <div class="title"><?php echo get_the_title() ?></div>
                <!--/ Project Title -->
                <?php 	if ( 'yes' === $settings['show_year'] ) { ?>
                <!-- Project Year -->
                <div class="year"><?php the_field('year') ?></div>
                <!--/ Project Year -->
                <?php	} ?>
                <!--/ Project URL -->
                <a class="project-url" href="<?php echo get_the_permalink(); ?>"></a>
                <!--/ Project URL -->

            </div>
            <!--/ Project -->
            <?php endwhile; wp_reset_query(); ?>

        </div>
    </div>

    <!-- Discover Project Button -->
    <div class="horizontal-project-link">
        <a href="#"><?php echo $project_button ?></a>
    </div>
    <!--/ Discover Project Button -->

    <!-- Showcase Elements -->
    <div class="cygni-horizontal-images"></div>
    
    <?php 	if ( 'yes' === $settings['show_arrows'] ) { ?>
    <div class="horizontal-pagination">
        <div class="horizontal-prev"><i class="icon-left-dir"></i></div>
        <div class="horizontal-next"><i class="icon-right-dir"></i></div>
    </div>
      <?php	} ?>
    
    <?php 	if ( 'yes' === $settings['show_numbers'] ) { ?>
    <div class="horizontal-fraction">
        <div class="horizontal-progress"></div>
    </div>
    <!--/ Showcase Elements -->
  <?php	} ?>
    
</div>
<!--/ Horizontal Projects -->


<?php

    ?>

<?php
  }

}
