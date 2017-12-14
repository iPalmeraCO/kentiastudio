<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 * Template Name: formcontacto
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */




require_once ("class/combos.php");
$combos = new Combos();
$quenecesitas = $combos->listarquenecesitas();


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
	
	
	
	jQuery('#contacto').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        /*feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },*/
        fields: {
           	   quenecesitas: {
                validators: {
                       callback: {
                        
                        callback: function(value, validator, $field) {
                        	
                          
                           if (value == ""){
                              return {
                              valid:false,
                              message: "Seleccione una opción"                                                      
                              }
                           }
                          return true;
                      },

                     notEmpty: {
                        message: 'Por favor Seleccione el campo'
                    }
                }
            }
          },
              nombre: {
                validators: {
                    
                    notEmpty: {
                        message: 'Por favor ingresa el nombre'
                    }
                }
            },
              mensaje: {
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
        	var url = baseurl+"/controlador/enviar_contacto.php"; // the script where you handle the form input.
    
     		//getting form into Jquery Wrapper Instance to enable JQuery Functions on form                    
            var form = jQuery("#contacto");

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


		<form  enctype="multipart/form-data" id="contacto" action="/eds" method="post" class="contacto" data-toggle="validator">
			<div class="row form1">
				
                <div class="col-lg-12 col-md-12 co-sm-12 col-xs-12">
				<div class="pr_form">
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
							<span class="control-label">Que necesitas?</span>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<select id="quenecesitas" name="quenecesitas"  class="form-control">
                    		  <option value="" selected="true">Seleccione una opción</option>
                    		  	<?php foreach ($quenecesitas as $necesitas) { ?>
                    		  		<option value="<?php echo $necesitas->id; ?>"><?php echo $necesitas->valor; ?></option>
                    		  	<?php } ?>
							  
						
							</select>				
						</div>
					</div>	
					<div class="rowcamposcon row group1 boxform form-group">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<span class="control-label">Mensaje</span>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<textarea id="mensaje" name="mensaje" class="form-control"></textarea>
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
           
			
			</div>

				
				
			

		</form>

