<?php
define ('HELPERS','apl/helpers/' );
require_once HELPERS.'constantes.php';
require_once HELPERS.'debug.php';
require_once HELPERS.'sistema.php';
require_once HELPERS.'sessao.php';
require_once HELPERS.'controlador.php';
require_once HELPERS.'tabela.php';

function __autoload($file) {

	$sem="";
	$encontrouUm=FALSE;

	if (file_exists (TABELAS . $file . '.php') ) {
		 debugDentro('> carregando tabela: '.TABELAS .$file . '.php');
		 $encontrouUm=TRUE;
		 require_once (TABELAS . $file . '.php');
	}
	else {
		 $sem="Tabela ";
	}

	if (file_exists (HELPERS . $file . '.php') ) {
		debugDentro('> carregando helper: '.HELPERS .$file . '.php');
		$encontrouUm=TRUE;
		require_once (HELPERS . $file . '.php');
	} else {
		$sem="Helper ";
	}


    if (! $encontrouUm && $sem <>"") {
	  die($sem."n&atilde;o encontrado! ".$file.'.php');
    }
}

session_start();

debug($_SERVER['PHP_SELF']);
$start = new Sistema ();
$start->run ();

