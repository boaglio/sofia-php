<?php

function sair() {

	unset($_SESSION[ESTA_LOGADO_SOFIA]);
	unset($_SESSION[USUARIO_SOFIA]);
	session_destroy();
	header('location:../index.php');

}

function bem_vindo() {

	if(isset ($_SESSION[USUARIO_SOFIA]) == true) {
		echo 'Ol&aacute; '.get_usuario_logado();
	}

}

function esta_logado() {

 return isset($_SESSION[USUARIO_SOFIA]);

}

function get_usuario_logado() {

return $_SESSION[USUARIO_SOFIA];

}


function set_usuario_logado($p_login_do_usuario) {

	$_SESSION[USUARIO_SOFIA]=$p_login_do_usuario;

}

