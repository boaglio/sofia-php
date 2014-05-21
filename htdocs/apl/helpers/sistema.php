<?php
    class Sistema {

        private $_url;
        private $_explode;
        public $_controller;
        public $_action;
        public $_params;

        public function __construct() {
        	debug(__FILE__.'['.__FUNCTION__.']');
            $this->setUrl();
            $this->setExplode();
            $this->setController();
            $this->setAction();
            $this->setParams();
        }

        private function setUrl() {
        	debug(__FILE__.'['.__FUNCTION__.']');
            $_GET['url'] = (isset($_GET['url']) ? $_GET['url'] : 'index/index_action');
            $this->_url = $_GET['url'];
        }

        private function setExplode() {
        	debug(__FILE__.'['.__FUNCTION__.']');
            $this->_explode = explode('/', $this->_url );
        }

        private function setController() {
        	debug(__FILE__.'['.__FUNCTION__.']');
            $this->_controller = $this->_explode[0];
        }

        private function setAction() {
        	debug(__FILE__.'['.__FUNCTION__.']');
            $ac = (!isset($this->_explode[1]) || $this->_explode[1] == NULL || $this->_explode[1] == 'index' ? 'index_action' : $this->_explode[1]);
            $this->_action = $ac;
        }

        private function setParams() {
        	debug(__FILE__.'['.__FUNCTION__.']');
            unset($this->_explode[0]);
            unset($this->_explode[1]);

            if (end($this->_explode) == null )
                array_pop($this->_explode);

            $i = 0;
            if (!empty($this->_explode)) {
                foreach ($this->_explode as $val) {
                   if($i % 2 == 0) {  // %= indice de 2
                       $ind[] = $val;
                   } else {
                       $value[] = $val;
                   }
                   $i++;
                }
            } else {
                $ind = array();
                $value = array();
            }
            $getLength=count($_GET);
            debug(__FILE__.'['.__FUNCTION__.'] GET['.$getLength.']');
            foreach ($_GET as $key => $value) {
            	$this->_params[$key]=$value;
            	debug(__FILE__.'['.__FUNCTION__.'] parametro GET ['.$key.']='.$value);
            }

            $postLength=count($_POST);
            debug(__FILE__.'['.__FUNCTION__.'] POST['.$postLength.']');
            foreach ($_POST as $key => $value) {
            	$this->_params[$key]=$value;
            	debug(__FILE__.'['.__FUNCTION__.'] parametro POST ['.$key.']='.$value);
            }

            if(count($ind) == count($value) && !empty($ind) && !empty($value)) {
                $this->_params = array_combine ($ind, $value);
                debug(__FILE__.'['.__FUNCTION__.'] total de parametros:'.count($ind));
            }
            else {
                $this->_params = array();
                debug(__FILE__.'['.__FUNCTION__.'] total de parametros: nenhum!');
            }


            }


            public function getParam($name = null) {
            	debug(__FILE__.'['.__FUNCTION__.']');
                if($name != null)
                    return $this->_params[$name];
                else
                    return $this->_params;
            }

            public function run(){

            	debug(__FILE__.'['.__FUNCTION__.']');

                $controller_path = CONTROLADORES . $this->_controller . 'Controlador.php';
                if(!file_exists($controller_path))
                  die('Houve um erro. O controlador ['.$controller_path. '] n&atilde;o existe.    =( ');

                require_once($controller_path);
                $app = new $this->_controller();

                debugDentro('>> carregando controller: ['. $this->_controller . ']');

                if(!method_exists($app, $this->_action))
                  die('Houve um erro. A a&ccedil;&atilde;o ['.$this->_action. '] n&atilde;o existe.   =( ');


                debugDentro('>> carregando controller: ['.CONTROLADORES .$this->_controller . 'Controlador.php]');
                $action = $this->_action;

                debugDentro('>> carregando init da action: ['.$this->_action.']');
                $app->init();

                debugDentro('>> carregando action: ['.$this->_controller.".".$this->_action.']');
                $app->$action();

               	debugDentro('>> carregando: '.CONTROLADORES .$this->_controller . 'Controlador.php');


            }
    }
?>