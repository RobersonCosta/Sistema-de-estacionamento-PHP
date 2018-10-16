<?php
require 'conexao.php';

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

abstract class Crud {
	protected static $tabela;
	
	public function readAll() {
		$conexao = new Conexao();
		$dbCon = $conexao->getConexao();
		
		$sql = "select * from ".self::$tabela;
		
		$result = pg_query($dbCon, $sql);
		
		$conexao->closeConexao();
		
		return pg_fetch_all($result);		
	}
	
	public function read($id) {
		$conexao = new Conexao();
		$dbCon = $conexao->getConexao();
		
		$sql = "select * from ".self::$tabela." where ".
					"id = $id";
		
		$result = pg_query($dbCon, $sql) or die($sql);
		
		$conexao->closeConexao();
		
		return pg_fetch_all($result);		
	}
	public function delete($id) {
		$conexao = new Conexao();
		$dbCon = $conexao->getConexao();
		
		$sql = "delete from ".self::$tabela." where ".
					"id = $id";
		
		$result = pg_query($dbCon, $sql);
		
		$conexao->closeConexao();	
	}
	
}