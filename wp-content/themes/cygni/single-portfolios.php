<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cygni
 */

get_header();

$option = get_option('pe-redux');

$image_check = "";


?>

<main id="primary" class="site-main elementor-page" data-barba="container" data-barba-namespace="cako">

    <?php
		while ( have_posts() ) :
    
            function is_first() {
            global $post;
            $loop = get_posts( 'numberposts=1&order=ASC' );
            $first = $loop[0]->ID; 
            return ( $post->ID == $first ) ? true : false;
            }
    
			the_post();
    ?>

    <!-- Single Project -->
    <div class="single-project">

        <!-- Project Header -->
        <div class="project-header">

            <?php if ((get_field('header_image_type') !== 'none')): 
            
            $overlays = '';
            if (get_field('header_overlays') == false) {
                $overlays = 'no-overlays ';
            }
            ?>

            <!-- Project Image -->
            <div class="project-image <?php echo esc_attr($overlays) ?> <?php esc_attr(the_field('header_image_size'))  ?>">
                
                <span class="pi-ov pi-ov-1"></span>
                <span class="pi-ov pi-ov-2"></span>
                <span class="pi-ov pi-ov-3"></span>
                <span class="pi-ov pi-ov-4"></span>

                <?php if ((get_field('header_image_type') === 'image')): ?>
                    <?php if ((get_field('custom_header_image'))) : ?>
                        
                 <img src="<?php echo the_field('custom_header_image') ?>" alt="Project Header Image">
                
                    <?php else: ?>
                
                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Project Header Image">
                
                    <?php endif; ?>
              

                <?php elseif ((get_field('header_image_type') === 'video')): ?>
                <video autoplay muted loop playsinline>
                    <source src="<?php the_field('video_url') ?>">
                </video>
                <?php endif; ?>
            </div>
            <!--/ Project Image -->


            <?php endif; ?>

            <div class="project-top">

                <!-- Project Category -->
                <div style="color:<?php the_field('project_category_color') ?>;" data-scroll data-delay=".2" class="project-work has-animation skew-down">
                    <?php 
                        $terms = get_the_terms( $post->ID, 'work-types' ); 
                    
                    if ($terms) {
                        foreach($terms as $term) {
                            echo '<span class="s-proejct-cat">' . esc_html($term->name) . ' </span>';
                        }
                    }
                    ?>
                </div>
                <!-- Project Category -->

                <!-- Project Title -->
                
      
                
                <h1 style="color:<?php the_field('project_title_color') ?>;" data-scroll class="project-title has-animation skew-up">
                    <?php echo get_the_title(); ?>
                </h1>
                <!-- Project Title -->

            </div>

            <!-- Project Metas -->
            <div class="project-meta">

                <div data-scroll data-delay=".7" class="has-animation skew-up"><span class="pm-tit"><?php the_field('meta_1_title'); ?> </span><?php the_field('meta_1_content'); ?></div>

                <div data-scroll data-delay=".8" class="has-animation skew-up"><span class="pm-tit"><?php the_field('meta_2_title'); ?> </span><?php the_field('meta_2_content'); ?></div>

                <div data-scroll data-delay=".9" class="has-animation skew-up"><span class="pm-tit"><?php the_field('meta_3_title'); ?> </span><?php the_field('meta_3_content'); ?></div>

            </div>
            <!-- Project Metas -->

            <?php if (get_field('summary')): ?>
            <!-- Project Summary -->
            <div data-scroll data-delay="1" class="project-summary has-animation lines-up">
                <?php the_field('summary') ?>
            </div>
            <!-- Project Summary -->
            <?php endif; ?>
        </div>
        <!--/ Project Header -->

        <!-- Project Content -->
        <div class="project-content">

            <?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cygni' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) ); ?>

        </div>
        <!-- Project Content -->

        <!-- Next Project Setion -->
        <div class="projects-nav">

            <span class="np-ov"></span>
            <span class="np-ov"></span>
            <span class="np-ov"></span>
            <span class="np-ov"></span>

            <?php $next_post = get_next_post(); 
            
            
            
            if ($next_post) {
            $next_post_title = get_the_title($next_post);
            $next_post_url = get_the_permalink($next_post);
            $next_post_image = get_the_post_thumbnail_url($next_post);
            $next_post_id = $next_post -> ID;
                
            }

            $selected_next = get_field('next_project');
           
            if ($selected_next) {
                $next_post_url = get_the_permalink($selected_next);
                 $next_post_title = get_the_title( $selected_next );
                 $next_post_id = $selected_next -> ID;
                $next_post_image = get_the_post_thumbnail_url($selected_next);
            };
            $next_post_cap = $option['next-project-cap']
        ?>

            <div class="next-project">
                <!-- Next Project URL -->
                <a href="<?php echo esc_url($next_post_url) ?>">
                    <div class="next-project-wrapper">
                        <span data-scroll class="next-project-span has-animation skew-up"><?php echo esc_html( $next_post_cap) ?></span>

                        <!-- Next Project Title -->
                        <h1 data-scroll class="next-project-title has-animation skew-up"><?php echo esc_html($next_post_title) ?></h1>
                        <!--/ Next Project Title -->
                    </div>

                    <!-- Next Project Image -->
                    <div class="next-project-image-wrapper">
                        <?php if( get_field('video_url', $next_post_id) ): ?>

                        <video autoplay muted loop playsinline>
                            <source src="<?php the_field('video_url', $next_post_id); ?>">
                        </video>

                        <?php else : ?>

                        <img src="<?php echo esc_attr($next_post_image) ?>" alt="Next Project Image">

                        <?php endif; ?>


                    </div>
                    <!--/ Next Project Image -->

                </a>
                <!--/ Next Project URL -->
            </div>


        </div>
        <!--/ Next Project Setion -->

    </div>
    <!--/ Single Project -->


    <?php
		endwhile; // End of the loop.
		?>
</main><!-- #main -->
  <?php get_footer(); ?>