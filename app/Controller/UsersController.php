<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {




public $uses = array('User');
   
	var $components = array('Mailer','FileUpload', 'Session','Cookie');

	





	function index() {


		$this->User->recursive = 0;


		$this->set('users', $this->paginate());


	}





	function view($id = null) {


		if (!$id) {


			$this->Session->setFlash(__('Invalid user', true));


			$this->redirect(array('action' => 'index'));


		}


		$this->set('user', $this->User->read(null, $id));


	}






function register() {
	
	if (!empty($this->data)) {


			$this->User->create();


			//$this->data = $this->AppAuth->hashPasswords($this->data);


			if ($this->User->save($this->data)) {


				$msg = 'Guru Translator says: welcome!<br/>' . $this->data['User']['first_name'] . ' ' . $this->data['User']['last_name'];


				$this->sendEmail($this->data['User']['username'], $this->data['User']['first_name'] . ' ' . $this->data['User']['last_name'], 'Transcree Translator registration', $msg);


				$this->Session->setFlash(__('Registration completed successfully, please check your email', true));


				$this->redirect(array('controller'=>'pages','action' => 'home'));


				$this->AppAuth->login();


				


				$this->Session->write('fullName', $this->data['User']['first_name'] . ' ' . $this->data['User']['last_name']);


				//$this->redirect('/pages/home');


				$idx = strpos(strtolower($this->here), '/users/add');


				echo '<script type="text/javascript">window.location = "' . substr($this->here, 0, $idx+1) . 'pages/home"</script>';


			} else {


				$this->Session->setFlash(__("Registration process couldn't be completed. Please, try again.", true));


			}


		}


		///*$countries = $this->User->Country->find('list', array('fields' => array('Country.id', 'Country.country_name')));


		$tmp = array(null => '-- Please select --');


		$countries = $tmp;


		$this->set(compact('countries'));
	
     }

}


?>