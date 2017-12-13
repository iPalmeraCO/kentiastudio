<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<style type="text/css">
	.content404{
		background: url("../wp-content/themes/twentyseventeen/assets/images/fondo404.png");
	     background-size: 100% 100%;
	}
</style>
<div class="content404">
	<div class="textcenter c4">
		<img src="/wp-content/themes/twentyseventeen/assets/images/arrowd.png"><h1 class="tit1">404</h1>
		<img src="/wp-content/themes/twentyseventeen/assets/images/arrowi.png">
	</div>
	<div class="row c5 textcenter">
		<h2>Página no </h2>
		<h2>encontrada</h2>
		<img class="x" src="/wp-content/themes/twentyseventeen/assets/images/x.png">		
	</div>
	<div class="row textcenter margindiez marginbottom">
		<a href="<?php echo site_url(); ?>"><button type="button" class="button button-primary btnprin2" ">Ir a inicio</button></a>
	</div>



</div>
<?php get_footer();
