<?php
include_once 'crud.php';

class Ocupacao extends Crud {
	
	private static $tabelaOcupacao = 'ocupacao';
	
	private $id;
	private $vaga;
	private $veiculo;
	private $data_entrada;
	private $data_saida;
	private $hora_entrada;	
	private $hora_saida;	
	private $valor;
	
	public function setId($id){
		$this->id=$id;
	}

	public function getId(){
		return $this->id;
	}
	public function setVaga($vaga) {
		$this->vaga = $vaga;
	}
	
	public function getVaga() {
		return $this->vaga;
	}

	public function setVeiculo($veiculo) {
		$this->veiculo = $veiculo;
	}
	
	public function getVeiculo() {
		return $this->veiculo;
	}
	
	public function setData_entrada($data_entrada) {
		$this->data_entrada = $data_entrada;
	}
	
	public function getData_entrada() {
		return $this->data_entrada;
	}

	public function setData_saida($data_saida) {
		$this->data_saida = $data_saida;
	}
	
	public function getData_saida() {
		return $this->data_saida;
	}

	public function setHora_entrada($hora_entrada) {
		$this->hora_entrada = $hora_entrada;
	}
	
	public function getHora_entrada() {
		return $this->hora_entrada;
	}

	public function setHora_saida($hora_saida) {
		$this->hora_saida = $hora_saida;
	}
	
	public function getHora_saida() {
		return $this->hora_saida;
	}
	
	public function setValor($valor) {
		$this->valor = $valor;
	}
	
	public function getValor() {
		return $this->valor;
	}
	
	public function listaOcupacoes() {
		parent::$tabela = self::$tabelaOcupacao;
		
		$listaDeOcupacoes = parent::readAll();
		$vet = array();

		if ($listaDeOcupacoes && count($listaDeOcupacoes)>0){
			foreach ($listaDeOcupacoes as $ocup) {
				$ocupacao = new Ocupacao();
				$ocupacao->setId($ocup['id']);
				$ocupacao->setVaga ($ocup['id_vaga']);
				$ocupacao->setVeiculo ($ocup['id_veiculo']);
				$ocupacao->setData_entrada ($ocup['data_entrada']);
				$ocupacao->setData_saida ($ocup['data_saida']);
				$ocupacao->setHora_entrada ($ocup['hora_entrada']);
				$ocupacao->setHora_saida ($ocup['hora_saida']);
				$ocupacao->setValor ($ocup['valor']);
				$vet[] = $ocupacao;
			}
		}

		return $vet;
	}
	
	public function buscaOcupacao($id) {
		parent::$tabela = self::$tabelaOcupacao;
		
		$ocupacao = parent::read($id);
		
		return $ocupacao;
	}

	public function saidaHora_e_Data ($ocupacao, $hora, $data){
		$conexao = new Conexao();
		$dbCon = $conexao->getConexao();
		
		$sql = "update ocupacao set hora_saida= '$hora', data_saida= '$data'  where id = ".$ocupacao->getId();
		
		$result = pg_query($dbCon, $sql);
		
		$conexao->closeConexao();
	}

	public function sair($ocupacao, $vagaParam){
		$conexao = new Conexao();
		$dbCon = $conexao->getConexao();
		
		$sql = "select vaga.id from vaga join ocupacao on $ocupacao->getVaga() = ".$vagaParam->getId();
		$result = pg_query($dbCon, $sql);

		$id = pg_fetch_all($result);
		$sql = "update vaga set status = false where id = ".$id['id'];		
		$result = pg_query($dbCon, $sql);

		$sql = "select ocupacao.id from ocupacao join vaga on $ocupacao->getVaga() = ".$vagaParam->getId();
		$result = pg_query($dbCon, $sql);

		$id = pg_fetch_all($result);
		$sql = "update ocupacao set id_vaga = null where id = ".$id['id'];		
		$result = pg_query($dbCon, $sql);
		
		$conexao->closeConexao();
	}

	public function entrar($ocupacao, $idVaga){
		$conexao = new Conexao();
		$dbCon = $conexao->getConexao();
		
		$sql = "select vaga.id from vaga join ocupacao on $ocupacao->getVaga() = $idVaga";
		$result = pg_query($dbCon, $sql);

		$id = pg_fetch_all($result);

		$sql = "update vaga set status = true where id = ".$id['id'];
		
		$result = pg_query($dbCon, $sql);
		
		$conexao->closeConexao();
	}

	public function valor ($valor_a_pagar){
		$conexao = new Conexao();
		$dbCon = $conexao->getConexao();

		$sql = "update ocupacao set valor = '$valor_a_pagar' where id = ".$this->getId();
		
		$result = pg_query($dbCon, $sql);
		
		$conexao->closeConexao();
	}

	public function inserir ($idVaga, $idVeiculo, $hora_entrada, $data_entrada){
		$conexao = new Conexao();
		$dbCon = $conexao->getConexao();

		$sql = "insert into ocupacao (id_vaga, id_veiculo, hora_entrada, data_entrada) values ($idVaga, $idVeiculo, '$hora_entrada', '$data_entrada')";
		
		$result = pg_query($dbCon, $sql);
		
		$conexao->closeConexao();
	}
}