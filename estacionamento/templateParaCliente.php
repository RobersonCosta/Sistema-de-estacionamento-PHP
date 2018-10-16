<?php
 include 'cabecalho.php';
 
 include("Template.php");
include_once 'vaga.php';
include_once 'ocupacao.php';
include_once 'veiculo.php';

use raelgc\view\Template;

$objVaga = new Vaga();
/*
 * Parametro é o .html onde vamos mostrar a apresentação
 * relacionada a lógica do index.php
 */
$template = new Template("templateVagas.html");

// $template->NOME = $nome;
// $template->TIME = $time;

// Simulando produtos cadastrados no banco de dados
$listaVagas = $objVaga->listaVagas();

foreach ($listaVagas as $v) {

	if ($v->getStatus() == "f"){
		$template->ANDAR = $v->getAndar();	
		$template->NUMERO = $v->getId();
		
		$template->block("BLOCK_VAGA");
	}
	

	
}
$template1 = $template->parse();

$objOcupacao = new Ocupacao();

/*
 * Parametro é o .html onde vamos mostrar a apresentação
 * relacionada a lógica do index.php
 */
$template = new Template("templateOcupacao.html");


// Simulando produtos cadastrados no banco de dados
$listaVagas = $objVaga->listaVagas();
$listaOcupacoes = $objOcupacao->listaOcupacoes();

$objVeiculo = new Veiculo();



foreach ($listaOcupacoes as $ocupacao) {
	$vaga = $objVaga->buscaVaga($ocupacao->getVaga());	
		if ($ocupacao->getHora_saida() == null && $ocupacao->getData_saida() == null) { 
			$veiculo = $objVeiculo->buscaVeiculo($ocupacao->getVeiculo());
			$template->VEICULO_PLACA = $veiculo->getPlaca();
			$template->VAGA_ANDAR = $vaga->getAndar();	
			$template->VAGA_NUMERO = $vaga->getId();

			$template->block("BLOCK_OCUPACAO");
		}
	

	
}
$template2 = $template->parse();

echo $template1.$template2;

?>