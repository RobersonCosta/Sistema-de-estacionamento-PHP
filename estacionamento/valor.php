<?php
include_once 'crud.php';

class Valor extends Crud {
	
	private static $tabelaValor = 'valor';
	
	private $id;
	private $tipo;
	private $per_noite;
	private $diaria;
	private $valor;
	
	public function setId($id){
		$this->id = $id;
	}

	public function getId (){
		return $this->id;
	}
	public function setTipo($tipo) {
		$this->tipo = $tipo;
	}
	
	public function getTipo() {
		return $this->tipo;
	}
	
	public function setPer_noite($per_noite) {
		$this->per_noite = $per_noite;
	}
	
	public function getPer_noite() {
		return $this->per_noite;
	}

	public function setDiaria($diaria) {
		$this->diaria = $diaria;
	}
	
	public function getDiaria() {
		return $this->diaria;
	}
	
	public function setValor($valor) {
		$this->valor = $valor;
	}
	
	public function getValor() {
		return $this->valor;
	}
	
	public function listaValores() {
		parent::$tabela = self::$tabelaValor;
		
		$listaDeValors = parent::readAll();

		$vet = array();
		if (count($listaDeValors) > 0 ){
			foreach ($listaDeValors as $val) {
				$valor = new Valor();
				$valor->setId($val['id']);
				$valor->setTipo($val['id_tipo']);
				$valor->setPer_noite($val['per_noite']);
				$valor->setDiaria($val['diaria']);
				$valor->setValor($val['valor']);
				$vet[] = $valor;
			}
		}
		return $vet;
	}
	
	public function buscaValor($id) {
		parent::$tabela = self::$tabelaValor;
		
		$valor = parent::read($id);
		
		return $valor;
	}

	public function deletarValor ($id){		
		parent::$tabela = self::$tabelaValor;
		
		$valor = parent::delete($id);
	}

	public function inserir ($tipoParam, $per_noite, $diaria, $valor){
		$conexao = new Conexao();
		$dbCon = $conexao->getConexao();

		$sql = "insert into valor (id_tipo, per_noite, diaria, valor) values ($tipoParam, $per_noite, $diaria, $valor)";
		
		$result = pg_query($dbCon, $sql);
		
		$conexao->closeConexao();
	}

	public function editar($id, $tipoParam, $per_noite, $diaria, $valor){
		$conexao = new Conexao();
		$dbCon = $conexao->getConexao();

		$sql = "update valor set id_tipo = $tipoParam, per_noite = $per_noite, diaria = $diaria, valor = $valor where id = $id";
		
		$result = pg_query($dbCon, $sql);
		
		$conexao->closeConexao();
	}
}