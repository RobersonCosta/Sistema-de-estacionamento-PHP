<?php
include_once 'crud.php';

class Vaga extends Crud {
	
	private static $tabelaVaga = 'vaga';
	

	private $id;
	private $andar;
	private $status;
	
	public function setId($id){
		$this->id = $id;
	}

	public function getId (){
		return $this->id;
	}
	public function setAndar($andar) {
		$this->andar = $andar;
	}
	
	public function getAndar() {
		return $this->andar;
	}
	
	public function setStatus($status) {
		$this->status = $status;
	}
	
	public function getStatus() {
		return $this->status;
	}
	
	
	public function listaVagas() {
		parent::$tabela = self::$tabelaVaga;
		
		$listaDeVagas = parent::readAll();

		$vet = array();
		if (count($listaDeVagas) > 0 ){
			foreach ($listaDeVagas as $v) {
				$vaga = new Vaga();
				$vaga->setId($v['id']);
				$vaga->setAndar($v['andar']);
				$vaga->setStatus($v['status']);				
				$vet[] = $vaga;
			}
		}
		return $vet;
	}
	
	public function buscaVaga($id) {
		parent::$tabela = self::$tabelaVaga;
		
		$vagaPesquisada = parent::read($id);
		$vaga = new Vaga();

		if (count($vagaPesquisada) > 0 ){
			foreach ($vagaPesquisada as $v) {
				$vaga = new Vaga();
				$vaga->setId($v['id']);
				$vaga->setAndar($v['andar']);
				$vaga->setStatus($v['status']);	
			}
		}
		return $vaga;
	}

	public function status ($condicao){
		$conexao = new Conexao();
		$dbCon = $conexao->getConexao();

		$sql = "update vaga set status = '$condicao' where id = ".$this->getId();
		
		$result = pg_query($dbCon, $sql);
		
		$conexao->closeConexao();
	}
}