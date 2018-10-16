<?php
include_once 'valor.php';
include_once 'tipo.php';

$objValor = new Valor();
$objTipo = new Tipo();

$listaValor = $objValor->listaValores();
$listaTipos = $objTipo->listaTipos();

$tipo = $_POST['tipo'];
foreach ($listaTipos as $t) {
	if ($tipo==$t->getDescricao()) {
		$id_tipo = $t->getId();
	}
}
$per_noite = $_POST['per_noite'];
$diaria = $_POST['diaria'];
$valor = $_POST['valor'];
$id = $_POST['id_valor'];

var_dump($id);
$auxiliar = $objValor->editar ($id, $id_tipo, $per_noite, $diaria, $valor);
header('location: templateValores.php');
?>