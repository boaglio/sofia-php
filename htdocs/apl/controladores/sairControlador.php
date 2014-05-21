<?php include '../telas/variaveis-servidor.php'; ?>
<?php
class Sair extends Controlador {

	public function index_action() {

		debug(__FILE__.'['.__FUNCTION__.']');

		unset($_SESSION[ESTA_LOGADO_SOFIA]);
		unset($_SESSION[USUARIO_SOFIA]);

		session_destroy();

		header('location:/index.php?volte_sempre');

	}

}