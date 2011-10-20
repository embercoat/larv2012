<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Register extends Controller_SuperController {

	public function after()
	{
		parent::after();
//		Session::instance()->destroy();
	}
	public function action_index()
	{
		$this->content = View::factory('register');
		$this->content->register_success = false;
		if(isset($_POST) && !empty($_POST))
		{
			$error = array();
			if($_POST['password'] != $_POST['password2'])
			{
				$error[] = 'Lösenorden stämmer inte.';
			}
			if(!user::free_username($_POST['username']))
			{
				$error[] = 'Användarnamnet används redan';
			}
			if(count($error) == 0){
				$userid = user::create_user(
					$_POST['fname'],
					$_POST['lname'],
					$_POST['username'],
					$_POST['password'],
					$_POST['email'],
					$_POST['program'],
					$_POST['telephone']
				);
				Session::instance()->set('user' ,Session::instance()->get('user')->login_by_user_id(array_shift($userid)));
				$this->content->register_success = true;
				$this->content->name = $_POST['fname'].' '.$_POST['lname'];
			} else {
				$this->content->error = $error;
			}
		}
	}
} // End Welcome
