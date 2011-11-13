<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_User extends Controller_Admin_SuperController {

	public function action_index()
	{
		$this->content = View::factory('admin/user/main');
		$this->content->users = 
			DB::select('*')
				->from('user')
				->order_by('user.lname', 'ASC')
				->order_by('user.fname', 'ASC')
				->execute()
				->as_array();
	}
	public function action_crew(){
		$this->content = View::factory('admin/user/crew');
		$this->content->crew = 
			DB::select('*')
				->from('crew')
				->join('user')
				->on('crew.userid', '=', 'user.user_id')
				->order_by('crew.role', 'ASC')
				->order_by('user.lname', 'ASC')
				->order_by('user.fname', 'ASC')
				->order_by('crew.date', 'DESC')
				->execute()
				->as_array();
	}
	public function action_crewDetail($id){
		$this->content = View::factory('admin/user/crewDetail');
		list($this->content->crew) = 
			DB::select('*')
				->from('crew')
				->join('user')
				->on('crew.userid', '=', 'user.user_id')
				->where('crew.id', '=', $id)
				->execute()
				->as_array();
	}
	public function action_detail($id){
		if(isset($_POST) && !empty($_POST)){
			unset($_POST['submit']);
			user::change_user_details($id, $_POST);
		}
		$this->content = View::factory('admin/user/details');
		list($this->content->user) = 
			DB::select('*')
				->from('user')
				->where('user_id', '=', $id)
				->execute()
				->as_array();
	}

} // End Welcome
