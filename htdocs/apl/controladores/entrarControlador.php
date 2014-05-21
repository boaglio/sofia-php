<?php
class Entrar extends Controlador {

	public function index_action() {

		debug(__FILE__.'['.__FUNCTION__.']');

		$this->view ( 'entrar'  );
	}

	public function entrou() {

		debug(__FILE__.'['.__FUNCTION__.']');

		$getLength=count($_GET);
		debug(__FILE__.'['.__FUNCTION__.'] GET['.$getLength.']');

	    foreach ($_POST as $key => $value) {
          	$this->_params[$key]=$value;
           	debug(__FILE__.'['.__FUNCTION__.'] parametro POST ['.$key.']='.$value);
         }

		$usuario= $this->getParam('username');
		$password= $this->getParam('password');

		debug('usuario='.$usuario.' - senha='.$password);

		set_usuario_logado($usuario);

		$this->view ( 'entrarComSucesso'  );
	}


}