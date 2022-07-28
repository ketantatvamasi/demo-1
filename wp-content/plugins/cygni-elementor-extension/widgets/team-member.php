<?php
namespace ElementorCygni\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class CygniTeamMember extends Widget_Base {
 
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
    return 'cygniteammember';
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
    return __( 'Cygni Team Member', 'cygni-elementor' );
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
    return 'fa fa-user';
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
      'section_team_member',
      [
        'label' => __( 'Team Member Details', 'cygni-elementor' ),
      ]
    );
		$this->add_control(
			'image',
			[
				'label' => __( 'Team Member Image', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'name', [
				'label' => __( 'Team Member Name', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,

			]
		);
        $this->add_control(
			'position', [
				'label' => __( 'Team Member Position', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,

			]
		);
      

        
    $this->end_controls_section();
      
        $this->start_controls_section(
         'socials',
         [
            'label' => __( 'Team Member Socials', 'cygni-elementor' ),
         ]
        );

      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'default' => 'fa fa-facebook',
			]
		);

		$repeater->add_control(
			'color',
			[
				'label' => __( 'Icon Color', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .title' => 'color: {{VALUE}}',
				],
			]
		);
      
        $repeater->add_control(
			'url', [
				'label' => __( 'URL', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,

			]
		);

		$this->add_control(
			'member_socials',
			[
				'label' => __( 'Team Member Socials', 'cygni-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'icon' => 'fa fa-facebook',
						'url' => 'http://facebook.com',
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



<!-- Team Member -->
<div class="team-member">

    <!-- Team Member Image -->
    <div class="team-member-image">
        <img src="<?php echo $settings['image']['url'] ?>" alt="Team Member Image">
    </div>
    <!--/ Team Member Image -->

    <div class="team-member-details">

        <!-- Team Member Name -->
        <div class="team-member-name">
            <?php echo $settings['name'] ?>
        </div>
        <!--/ Team Member Name -->

        <!-- Team Member Position -->
        <span class="team-member-pos">
            <?php echo $settings['position'] ?>
        </span>
        <!--/ Team Member Position -->

    </div>

    <ul class="member-socials">

        <?php 	if ( $settings['member_socials'] ) {
	
			foreach (  $settings['member_socials'] as $msocial ) { ?>

    <li><a style="color:<?php echo  $msocial['color'] ?>" target="_blank" href="<?php echo esc_url($msocial['url']) ?>"><i class="<?php echo $msocial['icon'] ?>"></i></a></li>


        <?php	}
	
		} ?>
    </ul>

    <!-- Team Member Socials-->


    <!--/ Team Member Socials-->

</div>
<!--/ Team Member -->
<?php

    ?>

<?php
  }

}
