<?php
/**
 * This is the home page template file. 
 * Template Name: Home Page
 *
 * 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Themetacular
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php  $options=get_option('ah_options_settings');?> 
       
            <!-- display the greeting text selected in Theme Options page -->
            
            <div class="greetingtext"> 
                
                <h2>
                    <?php echo $options ['ah_combo_field']; ?>
         </h2>
            </div>
            
            <!-- content for the home page -->
            <div class="homecontent">
            
                	<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
                
                
            </div>
    <!-- recent posts query--> 
            
    <div class="recentposts">
           
        <h3> Recent Posts</h3>
        
        <?php
            $args = array('showposts'=> 4, 'category_name'=>'Works', 'order'=>'ASC');
            $my_query= new WP_Query($args);?>
            
        <?php 
            if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
        
        <?php 
            if (has_post_thumbnail()){
                the_post_thumbnail();}
            the_excerpt(); ?>
        <?php endwhile; endif; wp_reset_query(); ?>
            
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
