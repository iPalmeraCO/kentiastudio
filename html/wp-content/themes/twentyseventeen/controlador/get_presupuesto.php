<?php	
include("../class/combos.php");

if (isset($_POST['quenecesitas'])){
	$quenecesitas = $_POST['quenecesitas'];
}

if (isset($_POST['tipoproyecto'])){
	$tipoproyecto = $_POST['tipoproyecto'];
}

if (isset($_POST['servicios'])){
	$servicios = $_POST['servicios'];
}

if (isset($_POST['costos'])){
	$costos = $_POST['costos'];
}


$combos = new Combos();
		

$valor = $combos->consultar_precio($quenecesitas, $tipoproyecto, $servicios, $costos);
echo json_encode(array("preciomx"=>$valor[0]->preciomx,"precioeuro"=>$valor[0]->precioeuro));

	
?>