<?php
include_once 'crud.php';

class Veiculo extends Crud {
	
	private static $tabelaVeiculo = 'veiculo';

	private $id;
	private $tipo;
	private $cor;
	private $placa;
	private $marca;
	private $modelo;

	
	public function setId($id){
		$this->id=$id;
	}

	public function getId(){
		return $this->id;
	}
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}
	
	public function getTipo() {
		return $this->tipo;
	}
	
	public function setCor($cor) {
		$this->cor = $cor;
	}
	
	public function getCor() {
		return $this->cor;
	}

	public function setPlaca($placa) {
		$this->placa = $placa;
	}
	
	public function getPlaca() {
		return $this->placa;
	}
	
	public function setMarca($marca) {
		$this->marca = $marca;
	}
	
	public function getMarca() {
		return $this->marca;
	}

	public function setModelo($modelo) {
		$this->modelo = $modelo;
	}
	
	public function getModelo() {
		return $this->modelo;
	}

	public function listaVeiculos() {
		parent::$tabela = self::$tabelaVeiculo;
		
		$listaDeVeiculos = parent::readAll();

		$vet = array();
		if ($listaDeVeiculos && count($listaDeVeiculos) > 0 ){
			foreach ($listaDeVeiculos as $vei) {
				$veiculo = new Veiculo();
				$veiculo->setId($vei['id']);
				$veiculo->setTipo($vei['id_tipo']);
				$veiculo->setCor($vei['cor']);
				$veiculo->setPlaca($vei['placa']);
				$veiculo->setMarca($vei['marca']);
				$veiculo->setModelo($vei['modelo']);
				$vet[] = $veiculo;
			}
		}
		return $vet;
	}
	
	public function buscaVeiculo($id) {
		parent::$tabela = self::$tabelaVeiculo;
		
		$veiculoPesquisado = parent::read($id);
		$veiculo = new Veiculo();

		if ($veiculoPesquisado && count($veiculoPesquisado) > 0 ){
			foreach ($veiculoPesquisado as $vei) {				
				$veiculo->setId($vei['id']);
				$veiculo->setTipo($vei['id_tipo']);
				$veiculo->setCor($vei['cor']);
				$veiculo->setPlaca($vei['placa']);
				$veiculo->setMarca($vei['marca']);
				$veiculo->setModelo($vei['modelo']);
			}
		}
		return $veiculo;
	}

	public function buscaVeiculoPlaca ($placa){
		$conexao = new Conexao();
		$dbCon = $conexao->getConexao();
		$sql = "select * from veiculo where ".
					"placa = '$placa'";
		

		$result = pg_query($dbCon, $sql);
		$veiculoPesquisado = pg_fetch_all($result);
		$veiculo = new Veiculo();
		
		if ($veiculoPesquisado && count($veiculoPesquisado) > 0 ){
			foreach ($veiculoPesquisado as $vei) {				
				$veiculo->setId($vei['id']);
				$veiculo->setTipo($vei['id_tipo']);
				$veiculo->setCor($vei['cor']);
				$veiculo->setPlaca($vei['placa']);
				$veiculo->setMarca($vei['marca']);
				$veiculo->setModelo($vei['modelo']);
			}
		}
		return $veiculo;
	}

	public function inserir ($tipoParam, $corParam, $placa, $marca, $modelo){
		$conexao = new Conexao();
		$dbCon = $conexao->getConexao();

		$sql = "insert into veiculo (id_tipo, cor, placa, marca, modelo) values ($tipoParam, '$corParam', '$placa', '$marca', '$modelo')";
		
		$result = pg_query($dbCon, $sql);
		
		$conexao->closeConexao();
	}
}