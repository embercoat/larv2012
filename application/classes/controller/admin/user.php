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
	public function action_companyUsers(){
	    $this->content = View::factory('admin/user/main');
		$this->content->users = 
			DB::select('*')
				->from('user')
				->order_by('user.lname', 'ASC')
				->order_by('user.fname', 'ASC')
				->where('usertype', '=', 2)
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
	public function action_userCompany(){
	    if(isset($_POST) && !empty($_POST)){
	        DB::delete('lt_user_company')->execute();
	        $insert = DB::insert('lt_user_company', array('company_id', 'user_id'));
	        foreach($_POST['link'] as $cid => $uid){
	            if($uid != 0)
	                $insert->values(array($cid, $uid));
	        }
	        $insert->execute();
	    }
	    $uc = DB::select('lt_user_company.*')
	                ->from('lt_user_company')
	                ->join('user')
	                ->on('lt_user_company.user_id', '=', 'user.user_id')
	                ->execute()
	                ->as_array();
	    $userCompany = array();
	    foreach($uc as $u){ 
	        $userCompany[$u['company_id']] = $u['user_id'];
	    }
	    $users = DB::select('*')
	                ->from('user')
	                ->where('usertype', '=', 2)
	                ->order_by('fname', 'asc')
	                ->order_by('lname', 'asc')
	                ->execute()
	                ->as_array();
	    $formattedUsers = array();
	    $formattedUsers[0] = 'Ingen Länk';
	    foreach($users as $u){
	        $formattedUsers[$u['user_id']] = $u['username'];
	    }
	    $companies = DB::select('*')
	                    ->from('company')
	                    ->where('company_id', 'in',
	                        DB::select('company_id')
	                            ->from('company_data')
	                            ->where('field', '=', 'interview_offer')
	                            ->where('data', '=', 'Ja, Yes')
	                    )
	                    ->order_by('name', 'asc')
	                    ->execute()
	                    ->as_array();
	    $this->content = View::factory('/admin/user/userCompany');
	    $this->content->users = $formattedUsers;
	    $this->content->userCompany = $userCompany;
	    $this->content->companies = $companies;
	                    
	}
	public function action_detail($id){
		$this->css[] = '/css/admin/user.css';
		if(isset($_POST) && !empty($_POST)){
			unset($_POST['submit']);
			user::change_user_details($id, $_POST);
			$_SESSION['message']['success'][] = 'Uppgifterna har uppdaterats.';
		}
		$this->content = View::factory('admin/user/details');
		list($this->content->user) = 
			DB::select('*')
				->from('user')
				->where('user_id', '=', $id)
				->execute()
				->as_array();
		$this->content->crew = DB::select('*')
								->from('crew')
								->where('userid', '=', $id)
								->execute()
								->as_array();
	}
	public function action_create(){
	    if(isset($_POST) && !empty($_POST)){
	        user::create_user('', '', $_POST['username'], $_POST['password'], '', '', '', '');
	        
	    }
	    $this->content = View::factory('/admin/user/createUser');
	}
	public function action_changePassword(){
		if($_POST['newPassword'] == $_POST['newPassword2']) {
			if(strlen($_POST['newPassword']) > 6){
				user::change_password($_POST['userid'], $_POST['newPassword']);
				$_SESSION['message']['success'][] = 'Lösenordet har uppdaterats.';
			} else {
				$_SESSION['message']['fail'][] = 'Lösenordet är för kort. Minst 6 tecken.';
			}
		} else {
			$_SESSION['message']['fail'][] = 'Lösenorden matchar inte. Försök igen.';
		}
		$this->request->redirect('/admin/user/detail/'.$_POST['userid']);
	}

} // End Welcome
