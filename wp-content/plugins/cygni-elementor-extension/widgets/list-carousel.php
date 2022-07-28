<?php
namespace ElementorCygni\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class ListCarousel extends Widget_Base {
 
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
    return 'listcarousel';
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
    return __( 'List Carousel', 'cygni-elementor' );
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
    return 'fa fa-list';
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
			'show_metas',
			[
				'label' => __( 'Metas', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'cygni-elementor' ),
				'label_off' => __( 'Hide', 'cygni-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
      
        $this->add_control(
			'select_metas',
			[
				'label' => __( 'Select Metas', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => [
					'meta_1'  => __( 'Meta 1', 'cygni-elementor' ),
					'meta_2'  => __( 'Meta 2', 'cygni-elementor' ),
					'meta_3'  => __( 'Meta 3', 'cygni-elementor' ),
				],
				'default' => [ 'meta_1', 'meta_2' ,'meta_3' ],
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
      
      $excluded = $settings['exclude_projects'];
      $exclude_ids = explode(',', $excluded);
      
    $args = array(  
        'post_type' => 'portfolios',
        'post_status' => 'publish',
        'posts_per_page' => $max_slides,
     	'meta_key' => 'list_order',
	    'orderby' => $order_by,
        'order' => $order,
        'post__not_in' =>  $exclude_ids,
        'meta_type' => 'NUMERIC'


    );

    $loop = new \WP_Query( $args ); 
    wp_reset_postdata(); 


    ?>

<!--Portfolio List Carousel-->
<div class="fullscreen portfolio-showcase list-carousel">
    <!-- Titles (Don't Touch) -->
    <div class="list-titles"></div>
    <!-- Titles (Don't Touch) -->

    <!-- List Projects -->
    <div class="list-images">
        <div class="swiper-wrapper">
            <?php while ( $loop->have_posts() ) : $loop->the_post();  ?>
            <!-- Project -->
            <div class="list-image swiper-slide">

                <!-- Project URL -->
                <a href="<?php echo get_the_permalink(); ?>"></a>
                <!--/ Project URL -->

                <!-- Project Title -->
                <div class="list-p-title"><?php echo get_the_title() ?></div>
                <!--/ Project Title -->
                <?php if ( 'yes' === $settings['show_metas'] ) { ?>
                <!-- Project Metas -->
                <div class="list-titles-meta">

                    
                <?php 	foreach ( $settings['select_metas'] as $element ) : ?>

                <?php  if ($element === 'meta_1') { ?>
                    <span> <?php the_field('meta_1_content') ?></span>
                <?php } ?>

                <?php  if ($element === 'meta_2') { ?>
                    <span> <?php the_field('meta_2_content') ?></span>
                <?php } ?>


                <?php  if ($element === 'meta_3') { ?>
                    <span> <?php the_field('meta_3_content') ?></span>
                <?php } ?>

                <?php   endforeach; ?>

                    
                </div>
                <!--/ Project Metas -->
                <?php } ?>
                <!-- Project image -->
                <div class="list-image-wrapper">
               <?php  $spesific = get_field('list_carousel'); ?>
                
                <?php if ($spesific['enable'] == false) : ?>
                    
                    <?php if (get_field('video_url')) : ?>
                
                        <video autoplay muted loop playsinline>
                            <source src="<?php the_field('video_url') ?>">
                        </video>

                    <?php else : ?>
                
                         <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="List Project Image">
                
                    <?php endif; ?>
                
                <?php else: ?>
                
                    <?php if ($spesific['video']) : ?>
                        <video autoplay muted loop playsinline>
                            <source src="<?php echo $spesific['video'] ?>">
                        </video>
                    <?php elseif ($spesific['image']['url']): ?>       
                
                        <img src="<?php echo $spesific['image']['url'] ?>" alt="List Project Image">
                
                    <?php endif; ?>
                
                <?php endif; ?>
                </div>
                <!--/ Project Image -->

            </div>
            <!--/ Project -->
            <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
    <!--/ List Projects -->
    <?php 	if ( 'yes' === $settings['show_numbers'] ) { ?>
    <!-- Page Elements -->
    <div class="list-titles-fraction">
        <span class="lt-current"></span>
        <span class="lt-total"></span>
    </div>
        <?php	} ?>
       <?php 	if ( 'yes' === $settings['show_arrows'] ) { ?>
    <div class="list-carousel-pagination">
        <div class="lc-next"><i class="icon-right-open-big"></i></div>
        <div class="lc-prev"><i class="icon-left-open-big"></i></div>
    </div>
    <!--/ Page Elements -->
  <?php	} ?>

</div>
<!--/Portfolio List Carousel-->


<?php



    ?>

<?php
  }



    
}
