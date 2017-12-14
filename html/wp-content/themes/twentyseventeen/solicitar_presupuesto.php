<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 * Template Name: Solicitar presupuesto
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>


<?php
require_once ("class/combos.php");
$combos = new Combos();

if (!isset($_REQUEST['c1'])){ ?>
<script type="text/javascript">
           window.location = "<?php echo site_url(); ?>"; 
</script>
<?php      
}else 

$quene = $combos->get_quenecesitas($_REQUEST['c1']);
$tipo  = $combos->get_tipoproyecto($_REQUEST['c2']);
$serv  = $combos->get_servicios($_REQUEST['c3']);
$cost  = $combos->get_costos($_REQUEST['c4']);


 ?>

<!-- <?php
if ( function_exists('yoast_breadcrumb') ) {
yoast_breadcrumb('<p id="breadcrumbs">','</p>');
}
?> -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<style type="text/css">
	.form2{
		display: none;
	}

</style>

<script type="text/javascript">

	var base    = window.location.origin;
	var tema    = "/wp-content/themes/twentyseventeen";
	var baseurl = base + tema;


	function continuar(){
		
		var valid= jQuery(".group1.has-success").length;
		if (valid == 3){
			jQuery(".form1").hide();
			jQuery(".form2").show();
		} else {
			
		}

	}
	jQuery( document ).ready(function() {    
	
	
	
	jQuery('#presupuesto').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        /*feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },*/
        fields: {
           
              nombre: {
                validators: {
                    
                    notEmpty: {
                        message: 'Por favor ingresa el nombre'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Por favor ingresa el correo'
                    },
                    emailAddress: {
                        message: 'El correo ingresado no es valido'
                    } 
                }
            },
            telefono: {
                validators: {
                    notEmpty: {
                        message: 'Por favor ingresa el número de teléfono'
                    },
                    integer: {                        
                        message: 'El teléfono ingresado no es válido'
                    }
                }
            },
              
           
           

            }
        })
        .on('success.form.bv', function(e) {
            jQuery('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
              e.preventDefault();
              enviarformulario();
            
        }) .on('submit', function(e) {
           

        });

        function enviarformulario(){
        	var url = baseurl+"/controlador/solicitar_presupuesto.php"; // the script where you handle the form input.
    
     		//getting form into Jquery Wrapper Instance to enable JQuery Functions on form                    
            var form = jQuery("#presupuesto");

            //Serializing all For Input Values (not files!) in an Array Collection so that we can iterate this collection later.
            var params = form.serializeArray();

            //Declaring new Form Data Instance  
            var formData = new FormData();
          
            //Now Looping the parameters for all form input fields and assigning them as Name Value pairs. 
            jQuery(params).each(function (index, element) {
                formData.append(element.name, element.value);
            });
            

    		jQuery.ajax({
	           type: "POST",
	           url: url,
	           data:formData, // serializes the form's elements.
	           contentType: false,
	           processData: false,
	            beforeSend:function(){
	            jQuery("#myModaldos").modal("show");
	           },
	           success: function(data)
	           {
	           	   jQuery("#myModaldos").modal("hide");	               
	               if (data== -1){
	                alert ("Nose pudo enviar el requerimiento");
	               } else {
	                jQuery("#myModal").modal('show');
                    setTimeout("location.href = '"+base+"';",2000);
	                
	               }
	           }
	           
	         });
        }
});

</script>
<?php
    while ( have_posts() ) : the_post();

             the_content();

            endwhile; // End of the loop.
            

?>
<div class="fondo2">
	<div  class="container">
		<form  enctype="multipart/form-data" id="presupuesto" action="/eds" method="post" class="presupuesto" data-toggle="validator">
			<div class="row form1">
				
                <div class="col-lg-8 col-md-8 co-sm-8 col-xs-12">
				<div class="pr_form">
					<div class="rowcamposcon row group1 boxform form-group">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<span class="control-label">Tipo de Proyecto</span>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<input type="text" class="form-control" name="tipoproyecto" id="tipoproyecto" value="<?php echo $quene[0]->valor; ?>" readonly>	
							<input type="hidden" value="<?php echo $_REQUEST['c1']; ?>" name="c1">			
							<input type="hidden" value="<?php echo $_REQUEST['c2']; ?>" name="c2">			
							<input type="hidden" value="<?php echo $_REQUEST['c3']; ?>" name="c3">			
							<input type="hidden" value="<?php echo $_REQUEST['c4']; ?>" name="c4">			
						</div>
					</div>
					<div class="rowcamposcon row group1 boxform form-group">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<span class="control-label">Clase de Web o App</span>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<input type="text" class="form-control" name="clase" id="clase" value="<?php echo $tipo[0]->nombre; ?>" readonly>				
						</div>
					</div>
					<div class="rowcamposcon row group1 boxform form-group">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<span class="control-label">Servicios</span>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<input type="text" class="form-control" name="servicios" id="servicios" value="<?php echo $serv[0]->nombre; ?>" readonly>				
						</div>
					</div>
					<div class="rowcamposcon row group1 boxform form-group">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<span class="control-label">Presupuesto</span>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<input type="text" class="form-control" name="presupuesto" id="presupuesto" value="<?php echo $cost[0]->nombre; ?>" readonly>				
						</div>
					</div>
					<div class="rowcamposcon row group1 boxform form-group">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<span class="control-label">Nombre</span>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<input type="text" class="form-control" name="nombre">
						</div>
					</div>
					<div class="rowcamposcon row group1 boxform form-group">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<span class="control-label">Email</span>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<input type="text" class="form-control" name="email">
						</div>
					</div>
					<div class="rowcamposcon row group1 boxform form-group">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<span class="control-label">Teléfono</span>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<input type="text" class="form-control" name="telefono">
						</div>
					</div>
                    <div class="btnen textcenter col-lg-8 col-lg-offset-4 col-md-offset-4 col-md-8 col-sm-12 col-xs-12">
					   <input type="submit" name="enviar" class="button button-primary"  value="Enviar">
                    </div>
                </div>
				</div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 textcenter ton"><img class="presupuestos" src="http://kentiastudio.mx/wp-content/uploads/2017/12/icono-presupuesto.svg" /></div>
			
			</div>

				<div class="row form2">
				
			

		</form>
    <?php
            // echo do_shortcode("[metaslider id=22]"); 
            
            while ( have_posts() ) : the_post();

               the_content();

            endwhile; // End of the loop.
            ?>

   </div>
</div> 
 <!--End movil -->
<?php //get_sidebar(); ?>
<?php get_footer();   
?>