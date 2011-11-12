<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Kohana_Controller{

	public function before(){
		$this->session = Session::instance();
    	if($this->session->get('user') === NULL){
    		$this->session->set('user', user::instance());
    	}
	}
	public function action_login(){
		if(!empty($_POST)){
			user::instance()->login_by_username_and_password($_POST['username'], $_POST['password']);
			if(user::instance()->logged_in()){
				Session::instance()->set('user', user::instance());
				$this->request->redirect(str_replace('_', '/', $_POST['redirect']));
			} else {
				if(!empty($_POST['redirect'])){
					$this->request->redirect('/login/redirect/'.$_POST['redirect']);
				} else {
					$this->request->redirect('/login/');
				}
			}
		}
	}
	public function action_logout(){
		Session::instance()->destroy();
		$this->request->redirect('/');
	}
	public function action_index($arg1 = false, $arg2 = false)
	{
		if($arg1){
			if(method_exists($this, 'action_'.$arg1)){
				$method = 'action_'.$arg1;
				
				$this->$method();
				//call_user_method('action_'.$arg1, $this, $arg2);
			}
		}
	}
	public function action_redirect($redirect) {
		$this->redirect = $redirect;
	}
	public function after(){
		$view = View::Factory('loginform');
		if(isset($this->redirect))
			$view->redirect = $this->redirect;
		$this->response->body($view);
	}

} // End Welcome
