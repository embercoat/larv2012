<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Kohana_Controller{
	protected $attempt = false;
	protected $logged_in = false;

	public function before(){
		$this->session = Session::instance();
    	if($this->session->get('user') === NULL){
    		$this->session->set('user', user::instance());
    	}
    	$this->content = View::Factory('loginform');
	}
	public function action_login(){
		if(!empty($_POST)){
			$this->attempt = true;
			user::instance()->login_by_username_and_password($_POST['username'], $_POST['password']);
			if(user::instance()->logged_in()){
				Session::instance()->set('user', user::instance());
				$this->request->redirect(str_replace('_', '/', $_POST['redirect']));
			}
		}
	}
	public function action_logout(){
		Session::instance()->destroy();
		$this->request->redirect($_SERVER['HTTP_REFERER']);
	}
	public function action_index($arg1 = false, $arg2 = false)
	{
		if($arg1){
			if(method_exists($this, 'action_'.$arg1)){
				$method = 'action_'.$arg1;
				if($arg2)
					$this->$method($arg2);
				else
					$this->$method();
			}
		}
	}
	public function action_redirect($redirect = '') {
		$this->redirect = $redirect;
	}
	public function after(){
		$this->content->attempt = $this->attempt;
		if ($this->attempt)
			$this->content->username = $_POST['username'];
		if (isset($this->redirect))
			$this->content->redirect = $this->redirect;
		$this->response->body($this->content);
	}

} // End Welcome
