<?php

class Tabela {

	protected $db;

	public $_tabela;

	public function __construct() {
		debug(__FILE__.'['.__FUNCTION__.']');
		$this->db = new PDO (URL_DO_BANCO, USUARIO_DO_BANCO, SENHA_DO_BANCO);
	}

	public function insert(Array $dados) {
		debug(__FILE__.'['.__FUNCTION__.']');
		$campos = implode ( ", ", array_keys($dados));
		$valores = "'" . implode ( "', '", array_values($dados)) . "'";

		return $this->db->query ( "INSERT INTO $this->tabela ({$campos}) VALUES ({$valores})" );
	}
	public function read($where = null, $limit = null, $offset = null, $orderby = null) {
		debug(__FILE__.'['.__FUNCTION__.']');

		debugDentro(' >> tabela >> '.$this->_tabela);

        $limit = ($limit != null ? "LIMIT {$limit}" : "");
        $offset = ($offset != null ? "OFFSET {$offset}" : "");
        $orderby = ($orderby != null ? "ORDER BY {$orderby}" : "");
        //$q = $this->db->query("SELECT * FROM {$this->_tabela} {$where} ");
        $sql="SELECT * FROM {$this->_tabela} {$where} {$orderby} {$limit} {$offset}";

        debugDentro($sql);

        $q = $this->db->query($sql );
		$q->setFetchMode(PDO::FETCH_ASSOC);
		return $q->fetchAll ();
	}
	public function update(Array $dados, $where) {
		debug(__FILE__.'['.__FUNCTION__.']');
		foreach ( $dados as $inds => $vals  ) {
		  $campos [] = "$inds= '{$vals}'";

		}
		$campos = implode(",",$campos);
		$sql = "UPDATE {$this->tabela} SET ";

		$this->db->query("UPDATE $this->tabela SET {$campos}  WHERE {$where}");

		return $campos;
	}
	public function delete($where) {
		debug(__FILE__.'['.__FUNCTION__.']');
		$this->db->query("DELETE FROM $this->tabela WHERE {$where}");
	}
}