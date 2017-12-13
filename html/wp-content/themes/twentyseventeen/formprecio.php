<?php /**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 * Template Name: formprecio
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
get_header(); 

require_once ("class/combos.php");
$combos = new Combos();
$quenecesitas = $combos->listarquenecesitas();
$servicios    = $combos->listarservicios();
$costos       = $combos->listarcostos();
?> 

<script type="text/javascript">

var base    = window.location.origin;
var tema    = "/wp-content/themes/twentyseventeen";
var baseurl = base + tema;

function listartipos() {  
  var quenecesitas = jQuery("#quenecesitas").val();
  
  if (quenecesitas != ""){
  jQuery.ajax({
        url: baseurl+"/controlador/get_tipos.php",
        type: 'POST',
        data: {quenecesitas : quenecesitas},
        context: document.body, 
        beforeSend:function(){
            
        },
         success:function(result){          
            jQuery('#tipoproyecto').html(result);  
        },
      });
}

}

function get_presupuesto( ){
	var quenecesitas = jQuery("#quenecesitas").val();
	var tipoproyecto = jQuery("#tipoproyecto").val();
	var servicios = jQuery("#servicios").val();
	var costos = jQuery("#costos").val();

	if (quenecesitas != "" && tipoproyecto != "" && servicios != "" && costos != ""){
		
		jQuery.ajax({
        url: baseurl+"/controlador/get_presupuesto.php",
        type: 'POST',
        data: {quenecesitas : quenecesitas, tipoproyecto:tipoproyecto, servicios:servicios, costos:costos},
        dataType:"json",
        context: document.body, 
        beforeSend:function(){
            
        },
         success:function(result){  
          jQuery(".valoresresultados").show();
          preciomx   = result['preciomx'];
          precioeuro = result['precioeuro'];
          jQuery("#r1").html(jQuery( "#costos option:selected" ).text());
          jQuery("#r2").html(jQuery( "#servicios option:selected" ).text());
          jQuery(".titpro").html(jQuery( "#tipoproyecto option:selected" ).text());
          jQuery(".nombpro").html(jQuery( "#quenecesitas option:selected" ).text());
          
          if (quenecesitas !="4" && quenecesitas != 6){
          	//var src="/wp-content/themes/twentyseventeen/assets/images/telefono.png"
          	var src = "/wp-content/uploads/2017/12/celular.png";
          	
          }else {
          	var src= "/wp-content/uploads/2017/12/compu.png";
          }
          jQuery("#imgresult").attr("src",src);	
          jQuery(".vacio").hide();
          jQuery("#res").html("$ "+formatNumber(preciomx) + " MXN ");
          jQuery(".slito").show();
          
        },
      });
	}
}

function formatNumber(num) {
    if (!num || num == 'NaN') return '-';
    if (num == 'Infinity') return '&#x221e;';
    num = num.toString().replace(/\$|\,/g, '');
    if (isNaN(num))
        num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num * 100 + 0.50000000001);
    cents = num % 100;
    num = Math.floor(num / 100).toString();
    if (cents < 10)
        cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3) ; i++)
        num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
    return (((sign) ? '' : '-') + num );
}
</script> 

<div class="formprecio">
	<h4 class="titulares-principales" style="text-align:center;">Calcula el precio aproximado sin compromiso</h4><br><br>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 contenidos">
 		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<label>Determina el tipo de Proyecto</label>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    	<select id="quenecesitas" name="quenecesitas" onchange="listartipos()" class="form-control">
                    		  <option value="" selected="true">Seleccione una opción</option>
                    		  	<?php foreach ($quenecesitas as $necesitas) { ?>
                    		  		<option value="<?php echo $necesitas->id; ?>"><?php echo $necesitas->valor; ?></option>
                    		  	<?php } ?>
							  
						
							</select>	
						
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<label> Elige la clase de Web o App</label>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<select id="tipoproyecto" name="tipoproyecto" onchange="get_presupuesto()" class="form-control">
				<option value="" selected="true">Seleccione una opción</option>
			</select>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<label>Escoge los servicios a contratar</label>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
           <select id="servicios" name="servicios" onchange="get_presupuesto()" class="form-control">
    		  <option value="" selected="true">Seleccione una opción</option>
    		  	<?php foreach ($servicios as $servicio) { ?>
    		  	<option value="<?php echo $servicio->id; ?>"><?php echo $servicio->nombre; ?></option>
    		  	<?php } ?>
			</select>	
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<label>Asigna el presupuesto</label>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			 <select id="costos" name="costos" onchange="get_presupuesto()" class="form-control">
    		  <option value="" selected="true">Seleccione una opción</option>
    		  	<?php foreach ($costos as $costo) { ?>
    		  	<option value="<?php echo $costo->id; ?>"><?php echo $costo->nombre; ?></option>
    		  	<?php } ?>
			</select>	
		</div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
		<div class="valoresresultados containerresultados" style="display: none">
  		<div class="fondonegro">
        <div class="rres">
  				<label class="titpro"></label>
  			</div>
  			<div class="rres">
  				<label class="nombpro"></label>	
  			</div>	
      </div>	
			<div class="resultados">
				<div class="textcenter contimg">
					<img id="imgresult">
				</div>
				        <div class="valorprecio textcenter">
					  <div class="row">
					  	<label id="res" class="label1"> </label>
					  </div>
					  <div class="row">
					  <label class="pres">Precio estimado</label>
					</div>
	                                </div>
          <div class="resulcom text-center">
  					<label class="resss">Sevicio Elegido: <span id="r1"></span></label>
  					<label class="resss">Presupuesto: <span id="r2"></span></label>
          </div>                       

				
			</div>
		</div>
    <div class="vacio"><img src="http://kentiastudio.mx/wp-content/uploads/2017/12/calculadora.png" alt=""></div>
    <a href="publicar-proyecto/" class="slito" style="display: none">Solicitar Presupuesto</a>

	</div>
</div>