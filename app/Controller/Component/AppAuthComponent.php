<?php

	App::import('Component', 'Auth');

	App::import('Component', 'Session');

	class AppAuthComponent extends AuthComponent {

		

		function identify($user = null, $conditions = null) {

			

			//echo $this->AppAuth->authenticate($this->params['data']['User']['password']);

			//echo $this->params['data']['User']['password'] = Security::hash($this->params['data']['User']['password'], NULL ,TRUE);

			

	        $models = array('User');

	        foreach ($models as $model) {

	            $this->userModel = $model; // switch model

	            $this->params["data"][$model] = $this->params["data"]["User"]; // switch model in params/data too

	            

	            $session = new SessionComponent();	            

	            if(!isset($this->params["data"][$model])){	            	

	            	$this->params["data"][$model] = $session->read('User');

	            }

	            

	            $result = parent::identify($this->params["data"][$model], $conditions); // let cake do its thing

	            if ($result) {

	            	$this->autoRedirect = false;

	            	if($model == 'User'){

	            		$this->loginRedirect = array('controller' => 'Users', 'action' => 'summary');

	            		$session->write('UserType', 0);

//	            		if($session->read('Auth.redirect')){

//	            			$this->redirect($session->read('Auth.redirect'));

//	            		}else{

//	            			$this->redirect(array('controller' => 'Users', 'action' => 'summary'));

//	            		}

	            	}elseif ($model == 'Translator'){

	            		$this->loginRedirect = array('controller' => 'Translators', 'action' => 'redirectUponState');

	            		$session->write('UserType', 1);

	            		//$this->redirect($this->loginRedirect);	            		

	            	}

	            	$session->delete('Auth.Admin');

	            	return $result; // login success

	            }

	        }

	        return null; // login failure

	    }

		

	}

?>