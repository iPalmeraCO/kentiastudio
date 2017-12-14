<?php
require_once("../class/MailM.php");
require_once("../class/combos.php");
/*
$foto = reset($_FILES); 	 	
$sourcePath = $foto['tmp_name'];       // Imagen temporal
$ext = pathinfo($foto['name'], PATHINFO_EXTENSION); // Extension imagen
$nombrearchivo = "archivo".date("H_i_s").".".$ext;   //Nombre dinamico 	
$targetPath = "../proyectos/".$nombrearchivo; // Target path where file is to be stored

	if (move_uploaded_file($sourcePath,$targetPath)){
		 $foto = $nombrearchivo;
		 echo "1";
		 $html = $_POST["descripcion"];
		 $mail = new MailM();
		 $mail->enviarmail($_POST["email"], "Usuario ", "Proyecto", $html, $foto);
	} else {
		 echo "-1";
	}

*/


$html  = "Tipo Proyecto: ".$_POST['tipoproyecto']."<br>";
$html .= "Clase de Web o App: ".$_POST["clase"]."<br>";
$html .= "Servicios: " . $_POST["servicios"]."<br>";
$html .= "Presupuesto: " . $_POST["presupuesto"]."<br>";
$html .= "Nombre: " . $_POST["nombre"]."<br>";
$html .= "Email: " . $_POST["email"]."<br>";
$html .= "Telefono: " . $_POST["telefono"]."<br>";
$mail = new MailM();

$combos = new Combos();
$combos->registar_solicitarpresupuesto($_POST['tipoproyecto'], $_POST['clase'], $_POST['servicios'], $_POST['presupuesto'], $_POST['nombre'], $_POST['email'],  $_POST['telefono']);

$precio = $combos->consultar_precio($_POST['c1'], $_POST['c2'], $_POST['c3'], $_POST['c4']);

/*Enviar Mail */

if ($_POST['c1'] == '4' || $_POST['c1'] == '6'){
	$img = "/wp-content/uploads/2017/12/compu.png";
}else {
	$img = "/wp-content/uploads/2017/12/celular.png";
}
$rutaimagen = site_url().$img;   

$postdata = http_build_query(
          array(
              'nombre' => $_POST['nombre'],
              'c1' => $_POST['tipoproyecto'],
              'c2' => $_POST['clase'],
              'c3' => $_POST['servicios'],
              'c4' => $_POST['presupuesto'],
              'precio' => "$ ".number_format($precio[0]->preciomx,'0', ',','.')." MXN",
              "rutaimagen" => $rutaimagen        
              )
          );

          $opts = array('http' =>
              array(
                  'method'  => 'POST',
                  'header'  => 'Content-type: application/x-www-form-urlencoded',
                  'content' => $postdata
              )
          );
      

$context  = stream_context_create($opts);
$htmluser = file_get_contents(get_template_directory_uri()."/correo_solicitarpresupuesto.php", false, $context);


/* */ 

//$mail->enviarmail("contacto@kentiastudio.mx", $_POST['nombre'], "Solicitud Presupuesto", $html, -1);
$mail->enviarmail("julian.escobar@ipalmera.co", $_POST['nombre'], "Solicitud Presupuesto", $html, -1);
$mail->enviarmail($_POST['email'], $_POST['nombre'], "Solicitud Presupuesto", $htmluser, -1);



?>