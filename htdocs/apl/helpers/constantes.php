<?php

# liga/desliga debug
#define ('DEBUG',true);
define ('DEBUG',false);

# versão
define('VERSAO_SOFIA', '0.1');

# constantes de sessao

define('ESTA_LOGADO_SOFIA', 'esta_logado_SOFIA');
define('USUARIO_SOFIA', 'usuario_SOFIA');

# constantes de banco

define ('URL_DO_BANCO','mysql:host=localhost;dbname=sofiaphp' );
define ('USUARIO_DO_BANCO','root' );
define ('SENHA_DO_BANCO','' );

# constantes internas

define ('CONTROLADORES', 'apl/controladores/' );
define ('TABELAS',       'apl/tabelas/' );
define ('TELAS',         'apl/telas/' );
