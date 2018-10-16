<?php
include_once 'crud.php';

class Tipo extends Crud {
	
	private static $tabelaTipo = 'tipo';
	
	private $id;
	private $descricao;


	public function setId($id){
		$this->id=$id;
	}

	public function getId(){
		return $this->id;
	}
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
	
	public function getDescricao() {
		return $this->descricao;
	}
	
	
	public function listaTipos() {
		parent::$tabela = self::$tabelaTipo;
		
		$listaDeTipos = parent::readAll();

		$vet = array();
		if (count($listaDeTipos) > 0 ){
			foreach ($listaDeTipos as $t) {
				$tipo = new Tipo();
				$tipo->setId($t['id']);
				$tipo->setDescricao($t['descricao']);
				$vet[] = $tipo;
			}
		}
		return $vet;
	}
	
	public function buscaTipo($id) {
		parent::$tabela = self::$tabelaTipo;
		$tipo = parent::read($id);
		$tipo_obj = new Tipo();
		$tipo_obj->setDescricao($tipo[0]['descricao']);
		return $tipo_obj;
	}
}