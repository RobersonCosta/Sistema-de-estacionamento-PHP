<?php
include_once 'valor.php';

$objValor = new Valor();
$listaValor = $objValor->listaValores();

$id_valor = $_GET['id_valor'];

    $auxiliar = $objValor->deletarValor($id_valor);
    header('location: templateValores.php');
?>