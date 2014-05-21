<?php
$GLOBALS['contador']=1;

function debug($pagina) {

	if (DEBUG and $GLOBALS['contador']==1) {
	 echo '<hr/>';
	 echo '<h2> Debug! </h2>';
	}

    if (DEBUG)
	echo ' '.$GLOBALS['contador'].' - '.basename( $pagina ).'<br/> ';

    $GLOBALS['contador']++;
}

function debugDentro($texto) {

	if (DEBUG)
		echo '<p align=left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $texto .'</p> ';

}