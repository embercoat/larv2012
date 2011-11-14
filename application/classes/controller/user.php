<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_SuperController {
	public function action_details(){
		if(isset($_POST) && !empty($_POST)){
			unset($_POST['submit']);
			user::change_user_details($_SESSION['user']->getId(), $_POST);
		}
		$this->content = View::factory('userDetails');
		$this->content->user = user::get_user_data($_SESSION['user']->getId());
	}
	public function action_crew(){
		$this->content = View::factory('userCrew');
		$this->content->crew = DB::select('*')
								->from('crew')
								->where('userid', '=', $_SESSION['user']->getId())
								->execute()
								->as_array();
	}
	

} // End Welcome
