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
		 <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      .enviandoo {
          height: 120px;
    width: 78px;
    /* position: absolute; */
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto;
}
.enviandoo::after {
           content: 'CARGANDO';
    color: rgb(61, 211, 129);
    font-weight: 600;
    font-family: "Work Sans";;
    font-size: 18px;
    /* position: absolute; */
    margin-top: 10px;
    margin-left: -32px;
}
.box {
    position:relative;
    height:50px;
    width:40px;
    animation: box 3s infinite linear;
}

.border {
    background:rgb(61, 211, 129);
    position:absolute;
}

.border.one {
    height:4px;
    top:0;
    left:0;
    animation: border-one 3s infinite linear;
}

.border.two {
    top:0;
    right:0;
    height:100%;
    width:4px;
    animation: border-two 3s infinite linear;
}

.border.three {
    bottom:0;
    right:0;
    height:4px;
    width:100%;
    animation: border-three 3s infinite linear;
}

.border.four {
    bottom:0;
    left:0;
    height:100%;
    width:4px;
    animation: border-four 3s infinite linear;
}

.line {
    height:4px;
    background:rgb(61, 211, 129);
    position:absolute;
    width:0%;
    left:25%;
}

.line.one {
    top:25%;
    width:0%;
    animation: line-one 3s infinite linear;
}

.line.two {
    top:45%;
    animation: line-two 3s infinite linear;
}

.line.three {
    top:65%;
    animation: line-three 3s infinite linear;
}

@keyframes border-one {
    0%   {width:0;}
    10%  {width:100%;}
    100% {width:100%;}
}

@keyframes border-two {
    0%   {height:0;}
    10%  {height:0%;}
    20%  {height:100%;}
    100% {height:100%;}
}

@keyframes border-three {
    0%   {width:0;}
    20%  {width:0%;}
    30%  {width:100%;}
    100% {width:100%;}
}

@keyframes border-four {
    0%   {height:0;}
    30%  {height:0%;}
    40%  {height:100%;}
    100% {height:100%;}
}

@keyframes line-one {
    0%   {left:25%;width:0;}
    40%  {left:25%;width:0%;}
    43%  {left:25%;width:50%;}
    52%  {left:25%;width:50%;}
    54%  {left:25%;width:0% }
    55%  {right:25%;left:auto;}
    63%  {width:10%;right:25%;left:auto;}
    100% {width:10%;right:25%;left:auto;}
}

@keyframes line-two {
    0%   {width:0;}
    42%  {width:0%;}
    45%  {width:50%;}
    53%  {width:50%;}
    54%  {width:0% }
    60%  {width:50%}
    100% {width:50%;}
}

@keyframes line-three {
    0%   {width:0;}
    45%  {width:0%;}
    48%  {width:50%;}
    51%  {width:50%;}
    52%  {width:0% }
    100% {width:0%;}
}

@keyframes box {
    0%   {opacity:1;margin-left:0px;height:50px;width:40px;}
    55%  {margin-left:0px;height:50px;width:40px;}
    60%  {margin-left:0px;height:35px;width:50px;}
    74%  {msthin-left:0;}
    80%  {margin-left:-50px;opacity:1;}
    90% {height:35px;width:50px;margin-left:50px;opacity:0;}
    100% {opacity:0;}
}
    </style>

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
			<div class="row copyright">
			<div class="container">
				<div class="col-md-12 center-align"><span class="linea-right">KentiaStudio 2017</span><span class="termino"><a href="#"> Términos y condiciones</a></span></div>
				<!-- Trigger the modal with a button -->
				



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <img src="http://kentiastudio.mx/wp-content/themes/twentyseventeen/assets/images/studio.svg" alt="logo kentia" class="logo-kentia">
      </div>
      <div class="modal-body center-align-c">
      	<img src="http://kentiastudio.mx/wp-content/themes/twentyseventeen/assets/images/iconomail.svg" alt="logo kentia" class="img-mk">
        <p class="sus">Gracias por tu mensaje. Este ha sido enviado.</p>
      </div>
      
    </div>

  </div>

 
</div>



<!-- Modal cargandooooo-->
<div id="myModaldos" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <img src="http://kentiastudio.mx/wp-content/themes/twentyseventeen/assets/images/studio.svg" alt="logo kentia" class="logo-kentia">
      </div>
      <div class="modal-body center-align-c">
      	 <div class="container enviandoo" >
      	 	<div style="height: 20px; width: 100%;"></div>

    <div class="box">
        <div class="border one"></div>
        <div class="border two"></div>
        <div class="border three"></div>
        <div class="border four"></div>

        <div class="line one"></div>
        <div class="line two"></div>
        <div class="line three"></div>
    </div>
</div>
      </div>
      
    </div>

  </div>

 
</div>
			</div>
			</div>
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
        margin-bottom: 22px;
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
