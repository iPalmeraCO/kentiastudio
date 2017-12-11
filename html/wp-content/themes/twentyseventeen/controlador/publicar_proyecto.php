<?php
require_once("../class/MailM.php");
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

$foto = reset($_FILES);
$html = $_POST["descripcion"];
$mail = new MailM();
$mail->enviarmail($_POST["email"], "Usuario ", "Proyecto", $html, $foto);



?>