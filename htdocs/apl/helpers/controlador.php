<?php
require_once HELPERS.'sistema.php';

class Controlador extends Sistema {

	protected function view($nome, $vars = null) {

		debug(__FILE__);
		if (is_array ( $vars ) && count ( $vars ) > 0)
			extract ( $vars, EXTR_PREFIX_ALL, 'telas' );

		debugDentro(' >> carregando: '.TELAS . $nome . '.phtml');

		require_once (TELAS . $nome . '.phtml');

	}

	public function init() {}
}