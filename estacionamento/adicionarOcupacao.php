<?php
include_once 'ocupacao.php';
include_once 'veiculo.php';
include_once 'vaga.php';
include_once 'tipo.php';

$objVaga = new Vaga();
$objTipo = new Tipo();
$objVeiculo = new Veiculo();
$objOcupacao = new Ocupacao();

$listaTipos = $objTipo->listaTipos();
$listaVeiculos = $objVeiculo->listaVeiculos();
$listaVagas = $objVaga->listaVagas();

$entrada = $_GET['entrada'];

if ($entrada == "ja_cadastrado"){
	$placa = $_POST['placa'];
	$hora = $_POST['hora_entrada'];
	$data = $_POST['data_entrada'];

	foreach ($listaVeiculos as $veiculo) {
		if ($veiculo == $veiculo->buscaVeiculoPlaca($placa)){
			$veiculoAux = $veiculo;
		}
	}

	foreach ($listaVagas as $vaga) {
		if ($vaga->getStatus()=="f"){
			$vagaAux = $vaga;			
		}
	}
	$preencherVaga = $vagaAux->status(TRUE);
	$auxiliar = $objOcupacao->inserir($vagaAux->getId(), $veiculoAux->getId(), $hora, $data);
	$andar = $vagaAux->getAndar();
	$numero = $vagaAux->getId();

    header("location: veiculoEstacionado.php?hora=$hora&data=$data&placa=$placa&vaga=$andar&vagaNum=$numero");	

} elseif ($entrada == "nao_cadastrado"){	
	$placa = $_POST['placa'];
	$hora = $_POST['hora_entrada'];
	$data = $_POST['data_entrada'];
	$tipo = $_POST['tipo'];
	$cor = $_POST['cor'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];

    foreach ($listaTipos as $t) {
        if ($tipo==$t->getDescricao()) {
            $id = $t->getId();
        }
    }
	foreach ($listaVagas as $vaga) {
		if ($vaga->getStatus()=="f"){
			$vagaAux = $vaga;		
		}
	}

	$preencherVaga = $vagaAux->status(TRUE);
	$auxiliar = $objVeiculo->inserir ($id, $cor, $placa, $marca, $modelo);


	$listaVeiculos = $objVeiculo->listaVeiculos();

	
	foreach ($listaVeiculos as $veiculo) {
		if ($veiculo == $veiculo->buscaVeiculoPlaca($placa)){
			$veiculoAux = $veiculo;
		}
	}

	$inserirOcupacao = $objOcupacao->inserir($vagaAux->getId(), $veiculoAux->getId(), $hora, $data);

	$andar = $vagaAux->getAndar();
	$numero = $vagaAux->getId();
	
    header("location: veiculoEstacionado.php?hora=$hora&data=$data&placa=$placa&vaga=$andar&vagaNum=$numero");	
}
?>