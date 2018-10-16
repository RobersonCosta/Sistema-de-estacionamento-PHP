<?php
include("Template.php");
include 'cabecalho.php';
include_once 'valor.php';
include_once 'tipo.php';
use raelgc\view\Template;

$objValor = new Valor();
$objTipo = new Tipo();
/*
 * Parametro é o .html onde vamos mostrar a apresentação
 * relacionada a lógica do index.php
 */
$template = new Template("templateValores.html");

// $template->NOME = $nome;
// $template->TIME = $time;

// Simulando produtos cadastrados no banco de dados
$listaValores = $objValor->listaValores();

foreach ($listaValores as $v) {
	$auxiliar = $objTipo->buscaTipo((int)$v->getTipo());
	$template->TIPO = $auxiliar->getDescricao();
	if ($v->getPer_noite()=="f"){		
		$template->PER_NOITE = "sem per noite";	
	} else{
		$template->PER_NOITE = "com per noite";	
	}
	if ($v->getDiaria()=="f"){		
		$template->DIARIA = "sem diária";	
	} else{
		$template->DIARIA = "com diária";	
	}	
	$template->VALOR = $v->getValor();
	$template->ID_VALOR = $v->getId();

	$template->block("BLOCK_VALOR");
}

$template->show();
?>