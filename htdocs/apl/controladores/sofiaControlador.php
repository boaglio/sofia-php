<?php
class Sofia extends Controlador {

	public function index_action() {

		debug(__FILE__.'['.__FUNCTION__.']');

		$this->view ( 'sofia' );

	}

}