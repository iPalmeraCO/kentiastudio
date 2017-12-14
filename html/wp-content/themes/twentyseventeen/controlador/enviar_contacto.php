<?php
require_once("../class/MailM.php");
require_once("../class/combos.php");

$combos = new Combos();
$quene = $combos->get_quenecesitas($_POST['quenecesitas']);

$combos->registrar_contacto($_POST['nombre'], $quene[0]->valor, $_POST['email'], $_POST['telefono'], $_POST['mensaje']);
$html  = "Proyecto: ".$quene[0]->valor."<br>";
$html .= "Nombre: " .$_POST["nombre"]."<br>";
$html .= "Mensaje: ".$_POST["mensaje"]."<br>";
$html .= "Correo: " . $_POST["email"]."<br>";
$html .= "Telefono: " . $_POST["telefono"]."<br>";
$mail = new MailM();
//$mail->enviarmail("julian.escobar@ipalmera.co", "Usuario ", "Formulario de Contacto", $html, -1);
$mail->enviarmail("contacto@kentiastudio.mx", "Usuario ", "Formulario de Contacto", $html, -1);

?>