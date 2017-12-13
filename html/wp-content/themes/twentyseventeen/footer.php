<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;

				get_template_part( 'template-parts/footer/site', 'info' );
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->

		<script type="text/javascript">

jQuery( document ).ready(function() {
    var elementPosition = jQuery('#masthead').offset();
    var home="<?php echo is_front_page(); ?>";

jQuery(window).scroll(function(){
        if(jQuery(window).scrollTop() > 20){
              jQuery('#masthead').addClass("menuflotante");
              if (!home){
              	jQuery('#masthead').removeClass('menuinicial');	
              }
              
        } else {
            jQuery('#masthead').removeClass('menuflotante');
            if (!home){
            jQuery('#masthead').addClass("menuinicial");
        	}
        }    
});

});

</script>
<style type="text/css">
	.tp-bullets{
		
	}

	.hephaistos .tp-bullet {
		width: initial !important;
	}
	@media only screen and (max-width: 768px) {
		.tp-bullets{ 
		display: block;
		}
		.tp-tab.selected{
			display: block !important;
		}
		.tp-tab {
			display: none;
		}
	}

	@media (min-width: 769px) {
		.tp-bullets {
			display: none;
		}
	}

	@media screen and (min-width: 48em){

.js .menu-toggle, .js .dropdown-toggle {
    display: block !important;
    float: right;
}


}
.top-menu {
	display: none;
}

#top-menu, .menu-toggle {
	/*background: red;*/
}

</style>

	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
