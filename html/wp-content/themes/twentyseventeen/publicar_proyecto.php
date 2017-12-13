<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 * Template Name: Publicar Proyecto
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
              descripcion: {
                validators: {
                     stringLength: {
                        message: 'La información del proyecto no puede superar los 500 caracteres',
                        max: function (value, validator, $field) {
                            return 500 - (value.match(/\r/g) || []).length;
                        }
                    },
                    notEmpty: {
                        message: 'Por favor ingresa la Descripción del proyecto'
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
              files: {
                
                validators: {
                    notEmpty: {
                        message: 'Selecciona un archivo'
                    },
                    file: {
                        extension: 'doc,pdf',
                        type: 'application/msword,application/pdf',
                        maxSize: 20000000,   // 2048 * 1024
                        message: 'El archivo seleccionado es inválido'
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
        	var url = baseurl+"/controlador/publicar_proyecto.php"; // the script where you handle the form input.
    
     		//getting form into Jquery Wrapper Instance to enable JQuery Functions on form                    
            var form = jQuery("#presupuesto");

            //Serializing all For Input Values (not files!) in an Array Collection so that we can iterate this collection later.
            var params = form.serializeArray();

            //Getting Files Collection
            var files = jQuery("#files")[0].files;

            //Declaring new Form Data Instance  
            var formData = new FormData();

            //Looping through uploaded files collection in case there is a Multi File Upload. This also works for single i.e simply remove MULTIPLE attribute from file control in HTML.  
            for (var i = 0; i < files.length; i++) {
                formData.append(files[i].name, files[i]);
            }
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
	           success: function(data)
	           {
	           		
	               
	               if (data== -1){
	                alert ("Nose pudo enviar el requerimiento");
	               } else {
	                alert ("Se envio correctamente");
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
							<span class="control-label">¿Qué necesitas?</span>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<select id="quenecesitas" name="quenecesitas" class="form-control">
							    <option value="" selected="true">Seleccione una opción</option>							  
                                <option value="App Android">App Android</option>
                                <option value="App iOS">App iOS</option>
                                <option value="App iOS + Android">App iOS + Android</option>
                                <option value="Sitio WEB">Sitio WEB</option>
                                <option value="Juego para móviles">Juego para móviles</option>
                                <option value="Otros">Otros</option>

							</select>					
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
							<span class="control-label">Telefono</span>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<input type="text" class="form-control" name="telefono">
						</div>
					</div>
                    <div class="btnes textcenter col-lg-8 col-lg-offset-4 col-md-offset-4 col-md-8 col-sm-12 col-xs-12">
					   <button type="button" class="button button-primary btnprin" onclick="continuar()">Continuar</button>
                    </div>
                </div>
				</div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 textcenter ton"><img class="" src="http://kentiastudio.mx/wp-content/uploads/2017/12/pre.png" /></div>
			
			</div>

				<div class="row form2">
				
				<div class="pr_form">
					<div class="rowcamposcon row group2 boxform form-group">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<span class="control-label">Descripción del Proyecto</span>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<textarea name="descripcion" id="descripcion" class="form-control"> </textarea>			
						</div>
					</div>
					<div class="rowcamposcon row group2 boxform form-group">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<span class="control-label">Archivo</span>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
							<input type="file" id="files" name="files" class="form-control">
						</div>
					</div>
					<div class="rowcamposcon row group1 boxform form-group btnen">
						<input type="submit" name="enviar" class="button button-primary"  value="Enviar">
					</div>
			
			</div>

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