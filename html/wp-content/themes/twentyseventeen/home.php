<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 * Template Name: Home
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>


<?php ?>
<!-- <?php
if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
}
?> -->
	<div  class="container">
    <?php
            // echo do_shortcode("[metaslider id=22]"); 
            
            while ( have_posts() ) : the_post();

               the_content();

            endwhile; // End of the loop.
            ?>

   </div>
 <!--End movil -->
<?php //get_sidebar(); ?>
<?php get_footer();   
?>