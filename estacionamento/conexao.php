<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

class Conexao {
	
	private $conexao;
	
	public function getConexao() {
		try {
			$connection_string = "host=localhost ".
								"port=5432 ".
								"dbname=robersonveiculos ".
								"user=postgres ".
								"password=postgres";
			
			$this->conexao = pg_connect($connection_string);
			
			return $this->conexao;		
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function closeConexao() {
		$this->conexao = null;
	}
}