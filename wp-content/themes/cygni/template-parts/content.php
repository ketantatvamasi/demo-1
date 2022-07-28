<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cygni
 */



$option = false;
$post_sidebar = true;
$post_thumbnail = true;
$post_meta = true;
$single_post_nav = true;

if (class_exists('Redux')) {
    
    $option = get_option('pe-redux');
    
    $post_sidebar = $option['single-post-page-sidebar'];
    $post_thumbnail = $option['single-post-thumbnail'];
    $post_meta = $option['single-post-meta'];
    $single_post_nav = $option['single-post-nav'];
}

?>

<?php if ( is_singular() ) : ?>
<!-- Singluar -->

<div class="cygni-single-post <?php if ((is_active_sidebar('sidebar-1')) && ($post_sidebar != 'false') ): echo 'sidebar-active';  endif; ?> ">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header single-post-header section no-margin">
            
           <?php if((has_post_thumbnail()) && $post_thumbnail != false) : ?>
             <div class="wrapper-small no-margin">
             <?php else: ?>
                 <div class="wrapper no-margin">
             <?php endif; ?>
                <div class="c-col-12">
                    
                    <?php if ($post_meta != false) : ?>
                    <div data-scroll class="single-post-meta skew-up">
                        <p class="single-post-date">
                            <?php cygni_posted_on(); ?>
                        </p>
                        <p class="single-post-categories"><?php cygni_entry_footer(); ?></p>

                    </div><!-- .entry-meta -->
                    <?php endif; ?>
                    <div data-scroll data-delay="0.3" class="single-post-title has-animation skew-up">
                        <h1><?php echo get_the_title(); ?></h1>
                    </div>
                </div>

            </div>

            <?php if((has_post_thumbnail()) && $post_thumbnail != false) : ?>

            <div class="wrapper">
                <div class="c-col-12">
                    <div data-scroll data-delay="0.5" class="single-post-image has-animation fade-in-up">
                        <?php cygni_post_thumbnail(); ?>
                    </div>
                </div>
            </div>

            <?php endif; ?>



        </header><!-- .entry-header -->

        <?php if ((is_active_sidebar('sidebar-1')) && ($post_sidebar != false)): ?>

        <div class="wrapper">
            <div class="entry-content single-post-content c-col-8">

                <?php elseif ((has_post_thumbnail()) && $post_thumbnail != false) : ?>
                
                <div class="wrapper-small">
                    <div class="entry-content single-post-content c-col-12">
                        
                <?php elseif ((! has_post_thumbnail()) || $post_thumbnail != true) : ?>
                
                <div class="wrapper">
                    <div class="entry-content single-post-content c-col-12">

                        <?php endif; ?>

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

                        <div class="single-post-tags">
                            <?php the_tags( 'Tags: ', '', '<br />' ); ?> 
                        </div>



             

                        <?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cygni' ),
			'after'  => '</div>',
		) );
            
            // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>


                    </div><!-- .entry-content -->
                    
                    
                     <?php if ((is_active_sidebar('sidebar-1')) && ($post_sidebar != false)): ?>
                    <div class="c-col-4">
                        <?php get_sidebar(); ?>
                    </div>
        <?php endif; ?>
                    
                </div>
                
                        <?php if ($single_post_nav != false): 
                            $prev_post_text = esc_html('PREVIOUS POST', 'cygni');
                            $next_post_text = esc_html('NEXT POST', 'cygni');
                        
                        if ((class_exists("Redux")) && (!empty($option['prev-post-text']))) {
                            $prev_post_text = $option['prev-post-text'];
                        };
                         if ((class_exists("Redux")) && (!empty($option['next-post-text']))) {
                            $next_post_text = $option['next-post-text'];
                        }
                        
                        ?>
                    <div class="wrapper-full no-margin">
                        <div class="c-col-12 no-gap no-margin">
                        

                        <!-- Posts Navigation -->
                        <div class="pe-single-post-navigation">
                            
                        <?php $next_post = get_next_post(); 
                        $prev_post = get_previous_post(); ?>

                            <!-- Previous Post -->
                            <div class="pe-prev-post">
                                <a href="<?php echo get_the_permalink($prev_post) ?>">
                                    <div class="prev-post-title">
                                        <span class="np-p"><?php echo esc_html($prev_post_text) ?></span>
                                        <p class="np-title"><?php echo get_the_title($prev_post) ?> </p>
                                    </div>
                                </a>
                            </div>
                            <!--/ Previous Post -->

                            <!-- Next Post -->
                            <div class="pe-next-post">
                                <a href="<?php echo get_the_permalink($next_post) ?>">
                                    <div class="next-post-title">
                                        <span class="np-p"><?php echo esc_html($next_post_text) ?></span>
                                        <p class="np-title"><?php echo get_the_title($next_post) ?> </p>
                                    </div>
                                </a>
                            </div>
                            <!--/ Next Post -->

                        </div>
                        <!--/ Posts Navigation -->

                        
                        </div>
                    </div>
                        <?php endif; ?>

    </article><!-- #post-<?php the_ID(); ?> -->
</div>

<?php else: ?>
<!-- Archive Start-->

<div class="cygni-post">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <!--Post-->
        <div class="post">

            <?php if(has_post_thumbnail()) : ?>
            <!-- Post Image -->
            <div class="pe-post-featured">
                <a href="<?php echo get_the_permalink(); ?>">
                    <img alt="<?php echo get_the_title(); ?>" src="<?php echo get_the_post_thumbnail_url(); ?>">
                </a>
            </div>
            <!--/ Post Image -->
            <?php endif; ?>


            <!-- Post Meta -->
            <div class="post-meta">

                <!-- Post Category -->
                <div class="post-cat"><?php cygni_posted_on(); cygni_entry_footer(); ?></div>
                <!--/ Post Category -->

                <!-- Post Title -->
                <div class="post-title">
                    <a href="<?php echo get_the_permalink(); ?>">
                        <?php echo get_the_title(); ?>
                    </a>
                </div>
                <!--/ Post Title -->

                <div class="post-excerpt"><?php the_excerpt(); ?></div>

            </div>
            <!--/ Post Meta -->

            <div class="post-read-more">
                <a class="underline" href="<?php echo get_the_permalink(); ?>">Read More</a>
            </div>




        </div>
        <!--/Post-->

    </article><!-- #post-<?php the_ID(); ?> -->

</div>

<?php endif; ?>
