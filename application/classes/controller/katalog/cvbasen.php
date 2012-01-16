<?php defined('SYSPATH') or die('No direct script access.');

class Controller_katalog_cvbasen extends Controller_Katalog_SuperController {
	
    public function before(){
        parent::before();
        
        if(!$_SESSION['user']->is_company_user()) {
    		$this->request->redirect('/login/redirect/'.str_replace('/', '_', $this->request->uri()));
    	}
    }
    public function after(){
        $content = $this->content;
        $this->content = View::factory('/katalog/cvbasen/main');
        $this->content->content = $content;
        $this->css[] = '/css/katalog/cvbasen.css';
        parent::after();
    }
    
	public function action_index() {
	    $this->content = View::factory('/katalog/cvbasen/welcome');
	}
	public function action_interest(){
	    $this->css[] = '/css/katalog/ps.css';
	    $this->content = View::factory('/katalog/cvbasen/interest');
	    $cid = $_SESSION['user']->get_company_link();
	    $this->content->programs = Model::factory('data')->format_for_select(Model::factory('data')->get_program());
	    $this->content->users = 
	        DB::select_array(array('user.fname', 'user.lname', 'user.programId', 'user.user_id', 'interview_interest.company_request'))
	            ->from('user')
	            ->join('interview_interest')
	            ->on('user.user_id', '=', 'interview_interest.user')
	            ->where('interview_interest.company', '=', $cid)
	            ->execute()
	            ->as_array();
	}
	public function action_details($uid){
	    if(isset($_POST) && !empty($_POST)){
	        
	        $select = (isset($_POST['firsthand']) ? 1 : (isset($_POST['secondhand']) ? 2 : false));
            DB::update('interview_interest')
                   ->set(array(
                       'company_request' => $select
                   ))
                   ->where('company', '=', $_SESSION['user']->get_company_link())
                   ->where('user', '=', $uid)
                   ->execute();
	    }
	    $this->content = View::factory('/katalog/cvbasen/details');
	    list($this->content->user) =
	                DB::select('*')
                        ->from('user')
                        ->where('user_id', '=', $uid)
                        ->execute()
                        ->as_array();
        
        list($this->content->program) = Model::factory('data')->get_program($this->content->user['programId']);
        
        list($this->content->interest) =
                    DB::select('*')
                        ->from('interview_interest')
                        ->where('user', '=', $uid)
                        ->where('company', '=', $_SESSION['user']->get_company_link())
                        ->execute()
                        ->as_array();
	}
	public function action_selected(){
	    $this->css[] = '/css/katalog/ps.css';
	    $this->content = View::factory('/katalog/cvbasen/selected');
	    $cid = $_SESSION['user']->get_company_link();
	    $this->content->programs = Model::factory('data')->format_for_select(Model::factory('data')->get_program());
	    $this->content->users = 
	        DB::select_array(array('user.fname', 'user.lname', 'user.programId', 'user.user_id', 'interview_interest.company_request'))
	            ->from('user')
	            ->join('interview_interest')
	            ->on('user.user_id', '=', 'interview_interest.user')
	            ->where('interview_interest.company', '=', $cid)
	            ->where('interview_interest.company_request', 'in', DB::expr('(1,2)'))
	            ->order_by('company_request', 'asc')
	            ->execute()
	            ->as_array();
	}
	public function action_confirmed(){
		$this->content = View::factory('/katalog/cvbasen/confirmed');
	    $cid = $_SESSION['user']->get_company_link();
	    $this->content->programs = Model::factory('data')->format_for_select(Model::factory('data')->get_program());
	    $this->content->users = 
	        DB::select_array(array('user.fname', 'user.lname', 'user.programId', 'user.user_id', 'interview_interest.company_request'))
	            ->from('user')
	            ->join('interview_interest')
	            ->on('user.user_id', '=', 'interview_interest.user')
	            ->where('interview_interest.company', '=', $cid)
	            ->where('interview_interest.company_request', 'not', 0)
	            ->execute()
	            ->as_array();
		
	}
}
