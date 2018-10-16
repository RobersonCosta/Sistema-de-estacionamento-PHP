<?php
include_once 'crud.php';

class Usuario extends Crud {
	
	private static $tabelaUsuario = 'usuario';
	
	private $login;
	private $senha;
	private $administrador;
	

	public function setLogin($login) {
		$this->login = $login;
	}
	
	public function getLogin() {
		return $this->login;
	}
	
	public function setSenha($senha) {
		$this->senha = $senha;
	}
	
	public function getSenha() {
		return $this->senha;
	}

	public function setAdministrador($administrador) {
		$this->administrador = $administrador;
	}
	
	public function getAdministrador() {
		return $this->administrador;
	}
	
	
	public function listaUsuarios() {
		parent::$tabela = self::$tabelaUsuario;
		
		$listaDeUsuarios = parent::readAll();
		$vet = array();
		if (count($listaDeUsuarios) > 0 ){
			foreach ($listaDeUsuarios as $user) {
				$usuario = new Usuario();
				$usuario->setLogin($user['login']);
				$usuario->setSenha($user['senha']);
				$usuario->setAdministrador($user['administrador']);
				$vet[] = $usuario;
			}
		}
		return $vet;
	}
	
	public function buscaUsuario($id) {
		parent::$tabela = self::$tabelaUsuario;
		
		$usuario = parent::read($id);
		
		return $usuario;
	}
}