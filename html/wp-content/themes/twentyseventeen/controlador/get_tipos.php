<?php	
include("../class/combos.php");

if (isset($_POST['quenecesitas'])){
	$quenecesitas = $_POST['quenecesitas'];
}


$combos = new Combos();
		echo "<option value=0>Seleccione ...</option>";	

foreach ($combos->consultar_tipos($quenecesitas) as $tipo) {
		
		echo "<option value='$tipo->idtipo' ".$class."> $tipo->nombre </option>";
 }
	
?>